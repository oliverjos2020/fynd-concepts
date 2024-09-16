
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to <strong>FLY-CATCHERS Dashboard</strong> </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        @if(Auth::user()->role_id == 1)
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <p class="mb-2">Total Admin</p>
                                    <h4 class="mb-0" id="totalCollection">
                                        {{$admins->count()}}
                                    </h4>
                                </div>
                                <div class="col-4">
                                    <div class="text-end">
                                        <div>
                                            <!-- 2.06 % <i class="mdi mdi-arrow-up text-success ms-1"></i> -->
                                        </div>
                                        <div class="progress progress-sm mt-3">
                                            <div class="progress-bar" role="progressbar" style="width: 62%" aria-valuenow="62"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <p class="mb-2">Local Client</p>
                                    <h4 class="mb-0" id="totalCount">
                                        {{$localClient->count()}}
                                    </h4>
                                </div>
                                <div class="col-4">
                                    <div class="text-end">
                                        <div>
                                            <!-- 3.12 % <i class="mdi mdi-arrow-up text-success ms-1"></i> -->
                                        </div>
                                        <div class="progress progress-sm mt-3">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 78%"
                                                aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <p class="mb-2">International Client</p>
                                    <h4 class="mb-0" id="totalSettlement">
                                        {{$internationalClient->count()}}
                                    </h4>
                                </div>
                                <div class="col-4">
                                    <div class="text-end">
                                        <div>
                                            <!-- 2.12 % <i class="mdi mdi-arrow-up text-success ms-1"></i> -->
                                        </div>
                                        <div class="progress progress-sm mt-3">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <p class="mb-2">Other Client</p>
                                    <h4 class="mb-0" id="totalSettlement">
                                        {{$otherClient->count()}}
                                    </h4>
                                </div>
                                <div class="col-4">
                                    <div class="text-end">
                                        <div>
                                            <!-- 2.12 % <i class="mdi mdi-arrow-up text-success ms-1"></i> -->
                                        </div>
                                        <div class="progress progress-sm mt-3">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->role_id == 2)
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <p class="mb-2">Local Client</p>
                                <h4 class="mb-0" id="totalCount">
                                    {{$localClient->count()}}
                                </h4>
                            </div>
                            <div class="col-4">
                                <div class="text-end">
                                    <div>
                                        <!-- 3.12 % <i class="mdi mdi-arrow-up text-success ms-1"></i> -->
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 78%"
                                            aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <p class="mb-2">International Client</p>
                                <h4 class="mb-0" id="totalSettlement">
                                    {{$internationalClient->count()}}
                                </h4>
                            </div>
                            <div class="col-4">
                                <div class="text-end">
                                    <div>
                                        <!-- 2.12 % <i class="mdi mdi-arrow-up text-success ms-1"></i> -->
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <p class="mb-2">Other Client</p>
                                <h4 class="mb-0" id="totalSettlement">
                                    {{$otherClient->count()}}
                                </h4>
                            </div>
                            <div class="col-4">
                                <div class="text-end">
                                    <div>
                                        <!-- 2.12 % <i class="mdi mdi-arrow-up text-success ms-1"></i> -->
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div id="container" style="width:100%; height:400px;"></div>
        </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Graphical Representation of client'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            // yAxis: {
            //     title: {
            //         text: 'Fruit eaten'
            //     }
            // },
            series: [{
                name: 'Local Clients',
                data: @json(array_values($localChart))
            },{
                name:'International Clients',
                data: @json(array_values($internationalChart))
            },{
                name:'Other Clients',
                data: @json(array_values($otherChart))
            }
            ]
        });
    });
</script>

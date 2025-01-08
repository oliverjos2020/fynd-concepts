<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to <strong>Fynd Concepts</strong> </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
    <i class="mdi mdi-alert-circle-outline me-2"></i> You have <strong>{{$pendingArtisans->count()}}</strong> pending request waiting to be accepted. <a href="user-artisans">View</a>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
</div>
@if (Auth::user()->role_id == 1)
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <p class="mb-2">Total Artisans</p>
                            <h4 class="mb-0" id="totalCollection">
                                {{ $artisans->count() }}
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
                            <p class="mb-2">Total users</p>
                            <h4 class="mb-0" id="totalCount">
                                {{ $users->count() }}
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
                            <p class="mb-2">Listed Subservices</p>
                            <h4 class="mb-0" id="totalSettlement">
                                {{ $subservices->count() }}
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
                            <p class="mb-2">Listed Services</p>
                            <h4 class="mb-0" id="totalSettlement">
                                {{ $services->count() }}
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
        document.addEventListener('DOMContentLoaded', function() {
            const chart = Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Graphical Representations'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                        'Nov', 'Dec'
                    ]
                },
                // yAxis: {
                //     title: {
                //         text: 'Fruit eaten'
                //     }
                // },
                series: [{
                    name: 'Artisans',
                    data: @json(array_values($artisanChart))
                }, {
                    name: 'Users ',
                    data: @json(array_values($usersChart))
                }]
            });
        });
    </script>

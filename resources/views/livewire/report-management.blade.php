<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Reports</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> -->
                        <!-- <li class="breadcrumb-item active">Welcome to Tax Drive Dashboard</li> -->
                    </ol>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-1">
                            <select name="limit" wire:model="limit" class="form-control form-control-sm mt-2">
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        <div class="col-md-11"></div>

                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>User</th>
                                    <th>Artisan</th>
                                    <th>Message</th>
                                    <th>When</th>
                                    {{-- <th>Status</th> --}}
                                    {{-- <th>Edit</th>--}}
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reports as $report)
                                <tr>
                                    <td>{{ ($reports->currentPage() - 1) * $reports->perPage() + $loop->iteration }}
                                    </td>
                                    <td>{{ $report->user->name }}</a></td>
                                    <td>{{ $report->artisan->name ?? '' }}</td>
                                    <td>{{ $report->message }}</td>
                                    <td>{{ $report->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="text-light btn btn-danger btn-sm" wire:click="delete({{$report->id}})">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger"> No record available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="loader text-center">
                            <div class="my-2">
                                {{ $reports->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

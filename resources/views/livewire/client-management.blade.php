<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Client Management</h4>

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
                        <div class="col-md-2">
                            <select name="limit" wire:model="limit" class="form-control form-control-sm mt-2">
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-4">
                            <input type="search" wire:model.live.debounce.500ms="search" placeholder="Search by name..."
                                class="form-control form-control-sm mt-2">
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->category->category }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_no }}</td>
                                    <td>
                                        <a href="/client/{{$user->id}}" class="btn btn-primary btn-sm text-light" style="cursor:pointer;">
                                            <i class="fa fa-edit"></i>
                                            View information
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/generate-pdf/{{$user->id}}" class="btn btn-primary btn-sm text-light" style="cursor:pointer;">
                                            <i class="fa fa-eye"></i>
                                            generate PDF
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/edit/{{$user->id}}" class="btn btn-success btn-sm text-light" style="cursor:pointer;">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-danger"> No record available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="loader text-center">
                            <div class="my-2">
                                {{-- {{ $users->links()}} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

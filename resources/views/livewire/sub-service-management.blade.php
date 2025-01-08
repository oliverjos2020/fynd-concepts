<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Sub Service</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> -->
                    <!-- <li class="breadcrumb-item active">Welcome to Tax Drive Dashboard</li> -->
                </ol>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label for="service">service</label>
                    <select wire:model="service" class="form-control">
                        <option value="">Select an option</option>
                        @forelse($services as $service)
                            <option value="{{ $service->id}}">{{ $service->service}}</option>
                        @empty
                        @endforelse
                    </select>
                    @error('service')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="subservice">Sub Service name</label>
                    <input type="text" wire:model="subservice" class="form-control" placeholder="Sub Service Name">
                    @error('subservice')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <button class="btn btn-primary btn-sm mt-3" wire:click.prevent="createSubService">
                    Create SubService
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-8">
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
                        <input type="search" wire:model.live.debounce.500ms="search" placeholder="Search..."
                            class="form-control form-control-sm mt-2">
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-bordered"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Sub Service</th>
                                <th>Service</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subservices as $subservice)
                            <tr>
                                <td>{{ ($subservices->currentPage() - 1) * $subservices->perPage() + $loop->iteration }}</td>
                                <td>{{ $subservice->subservice }}</td>
                                <td>{{ $subservice->services ? $subservice->services->service : 'No Service' }}</td>
                                <td><a class="btn btn-primary btn-sm text-light" style="cursor:pointer;"
                                        wire:click="edit({{$subservice->id}})"><i class="fa fa-edit"></i> Edit</a> </td>
                                <td>
                                    <a class="text-light btn btn-danger btn-sm" wire:click="delete({{$subservice->id}})">
                                        <i class="fa fa-trash"></i> Delete</a></td>
                            </tr>

                            @if($editingID === $subservice->id)
                            <tr>
                                <td colspan="3">
                                    <input type="text" wire:model="editingsubservice" placeholder="Sub Service.." id=""
                                        class="form-control mx-1">
                                        @error('editingsubservice')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <button type="submit" wire:click="update"
                                        class="btn btn-success btn-sm">Update</button> <button type="submit"
                                        wire:click="cancelEdit" class="btn btn-danger btn-sm">Cancel</button>
                                </td>
                                <td colspan="2">

                                        <select wire:model="editingservice" class="form-control">
                                            <option value="">Select an option</option>
                                            @forelse($services as $service)
                                                <option value="{{ $service->id}}">{{ $service->service}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    @error('editingservice')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </td>
                            </tr>
                            @endif

                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger"> No record available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="loader text-center">
                        <div class="my-2">
                            {{ $subservices->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

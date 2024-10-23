<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Category</h4>

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
                    <label for="category">Service name</label>
                    <input type="text" wire:model="category" class="form-control" placeholder="Service Name">
                    @error('category')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="icon_url" class="font-weight-bold">Icon</label>
                    <input type="file" wire:model="icon_url" accept="image/jpg, image/jpeg, image/png" placeholder="Icon..." class="form-control">
                    @error('icon_url')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    @if($icon_url)
                        <img src="{{ $icon_url->temporaryUrl() }}" style="max-height:80px" class="image mt-2">
                    @endif
                    <div wire:loading wire:target="image">Loading...</div>
                </div>
                <button class="btn btn-primary btn-sm mt-3" wire:click.prevent="createCategory">
                    Create Category
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
                                <th>Service</th>
                                <th>Icon URL</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                                <td>{{ $category->category }}</td>
                                {{-- <td>{{ $category->icon_url == '' ? 'N/A' : '<img src="{{asset($category->icon_url)}}">' }}</td> --}}
                                <td>@if($category->icon_url == '') N/A @else <img style="max-height:100px;" src="{{asset($category->icon_url)}}"> @endif</td>
                                <td><a class="btn btn-primary btn-sm text-light" style="cursor:pointer;"
                                        wire:click="edit({{$category->id}})"><i class="fa fa-edit"></i> Edit</a> </td>
                                <td>
                                    <a class="text-light btn btn-danger btn-sm"><i
                                            class="fa fa-trash"></i> Delete</a></a></td>
                            </tr>

                            @if($editingID === $category->id)
                            <tr>
                                <td colspan="3">
                                    <input type="text" wire:model="editingcategory" placeholder="role.." id=""
                                        class="form-control mx-1">
                                    @error('editingcategory')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <button type="submit" wire:click="update"
                                        class="btn btn-success btn-sm">Update</button> <button type="submit"
                                        wire:click="cancelEdit" class="btn btn-danger btn-sm">Cancel</button>
                                </td>
                                <td colspan="2">
                                    <input type="file" wire:model="editingicon_url" placeholder="Icon URL.." id=""
                                        class="form-control mx-1">
                                    @error('editingicon_url')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            @endif

                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger"> No record available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="loader text-center">
                        <div class="my-2">
                            {{ $categories->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

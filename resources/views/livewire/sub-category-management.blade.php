<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Sub Category</h4>

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
                    <label for="category">Category</label>
                    <select wire:model="category" class="form-control">
                        <option value="">Select an option</option>
                        @forelse($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->category}}</option>
                        @empty
                        @endforelse
                    </select>
                    @error('category')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="subcategory">Sub Category name</label>
                    <input type="text" wire:model="subcategory" class="form-control" placeholder="Sub Category Name">
                    @error('subcategory')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <button class="btn btn-primary btn-sm mt-3" wire:click.prevent="createCategory">
                    Create SubCategory
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
                                <th>Sub Category</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subcategories as $category)
                            <tr>
                                <td>{{ ($subcategories->currentPage() - 1) * $subcategories->perPage() + $loop->iteration }}</td>
                                <td>{{ $category->sub_category }}</td>
                                <td>{{ $category->category->category }}</td>
                                <td><a class="btn btn-primary btn-sm text-light" style="cursor:pointer;"
                                        wire:click="edit({{$category->id}})"><i class="fa fa-edit"></i> Edit</a> </td>
                                <td>
                                    <a class="text-light btn btn-danger btn-sm" wire:click="delete({{$category->id}})">
                                        <i class="fa fa-trash"></i> Delete</a></td>
                            </tr>

                            @if($editingID === $category->id)
                            <tr>
                                <td colspan="3">
                                        <select wire:model="editingcategory" class="form-control">
                                            <option value="">Select an option</option>
                                            @forelse($categories as $category)
                                                <option value="{{ $category->id}}">{{ $category->category}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    @error('editingcategory')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <button type="submit" wire:click="update"
                                        class="btn btn-success btn-sm">Update</button> <button type="submit"
                                        wire:click="cancelEdit" class="btn btn-danger btn-sm">Cancel</button>
                                </td>
                                <td colspan="2">
                                    <input type="text" wire:model="editingsub_category" placeholder="Sub Category.." id=""
                                        class="form-control mx-1">
                                    @error('editingsub_category')
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
                            {{ $subcategories->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

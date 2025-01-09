<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Topic</h4>

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
                            <label for="role">Topic name</label>
                            <input type="text" wire:model="topic" class="form-control" placeholder="Topic Name">
                            @error('topic')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror

                            @if(session('message'))
                            <div class="bg-success p-2 text-light mx-2 mt-3">{{session('message')}}</div>
                            @endif
                        </div>

                        <button class="btn btn-primary btn-sm mt-3" wire:click.prevent="createTopic">
                            Create Topic
                        </button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
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
                        <div class="col-md-7"></div>
                        <div class="col-md-4">
                            <input type="search" wire:model.live.debounce.500ms="search" placeholder="Search..." class="form-control form-control-sm mt-2">
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Topic</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topics as $topic)
                                    <tr>
                                        <td>{{ ($topics->currentPage() - 1) * $topics->perPage() + $loop->iteration }}</td>
                                        <td>{{ $topic->topic }}</td>
                                        <td><a class="btn btn-primary btn-sm text-light" style="cursor:pointer;" wire:click="edit({{$topic->id}})"><i class="fa fa-edit"></i> Edit</a> </td>
                                        <td><a class="text-light btn btn-danger btn-sm" wire:click="delete({{$topic->id}})"><i class="fa fa-trash"></i> Delete</a></a></td>
                                    </tr>

                                        @if($editingID === $topic->id)
                                        <tr>
                                        <td colspan="4">
                                            <input type="text" wire:model="editingTopic" placeholder="topic.." id="" class="form-control mx-1">
                                            @error('editingTopic')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <br>
                                            <button type="submit" wire:click="update" class="btn btn-success btn-sm">Update</button> <button type="submit"
                                                wire:click="cancelEdit" class="btn btn-danger btn-sm">Cancel</button>
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
                                {{ $topics->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

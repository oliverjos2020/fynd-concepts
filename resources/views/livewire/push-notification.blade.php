<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Push Notification</h4>

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
                        <label for="service">Title</label>
                        <input type="text" wire:model.debounce.500ms="title" placeholder="title" class="form-control">
                        @error('title')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="state">Body</label>
                        <textarea wire:model.debounce.500ms="body" placeholder="body" cols="30" rows="10" class="form-control"></textarea>
                        @error('body')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-sm mt-3" wire:click.prevent="send" wire:loading.attr="disabled" wire:target="send">
                        <span wire:loading.remove>Send Notification</span>
                        <span wire:loading>Processing...</span>
                    </button>

                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <select name="limit" wire:model.debounce.500ms="limit" class="form-control form-control-sm mt-2">
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($notifications as $notification)
                                <tr>
                                    <td>{{ ($notifications->currentPage() - 1) * $notifications->perPage() + $loop->iteration }}</td>
                                    <td>{{ $notification->title }}</td>
                                    <td>{{ Str::limit($notification->body, 35, '...') }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm text-light" style="cursor:pointer;" wire:click="edit({{$notification->id}})">
                                            <i class="fa fa-edit"></i> View
                                        </a>
                                    </td>
                                </tr>

                                @if($editingID === $notification->id)
                                <tr>
                                    <th colspan="4">
                                        <strong>Title</strong>
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        {{$editingTitle}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <strong>Body</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        {{$editingBody}}
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
                                {{ $notifications->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

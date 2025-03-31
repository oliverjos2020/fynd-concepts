<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Artisans</h4>

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
                        <div class="col-md-7"></div>
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
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Account Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    {{-- <th>Delete</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                    </td>
                                    <td><a href="/profile/{{ $user->id }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->role ?? '' }}</td>
                                    <td>
                                        @if($user->is_profile_complete == 1 && $user->status == 0)
                                            <a class="btn btn-danger btn-sm" wire:click="toggleStatus({{$user->id}},'1')"><i class="mdi mdi-alert-circle-outline me-1"></i>Not Approved</a>
                                        @elseif($user->is_profile_complete == 1 && $user->status == 1 )
                                            <a class="btn btn-success btn-sm" wire:click="toggleStatus({{$user->id}},'0')"><i class="mdi mdi-check-all me-1"></i>Approved</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->lock_user == 0)
                                        <a class="btn btn-success btn-sm" wire:click="changeStatus({{$user->id}},'1')">Lock User</a>
                                        @elseif($user->lock_user == 1)
                                        <a class="btn btn-danger btn-sm" wire:click="changeStatus({{$user->id}},'0')">Unock User</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->send_mail == 0)
                                        <a wire:click="sendMail('{{$user->email}}')" wire:loading.attr="disabled" wire:loading.class="cursor-not-allowed opacity-50"
                                            wire:target="sendMail('{{ $user->email }}')" class="btn btn-primary btn-sm">
                                             <span wire:loading.remove wire:target="sendMail('{{ $user->email }}')">
                                                 Send Mail <i class="mdi mdi-mail"></i>
                                             </span>
                                             <span class="indicator-progress" wire:loading wire:target="sendMail('{{ $user->email }}')">
                                                 Sending mail... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                             </span>
                                         </a>

                                        @elseif($user->send_mail == 1)
                                            <a class="btn btn-dark btn-sm">Mail Sent <i class="mdi mdi-mail"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-danger"> No record available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="loader text-center">
                            <div class="my-2">
                                {{ $users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

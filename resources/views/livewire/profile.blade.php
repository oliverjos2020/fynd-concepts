<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">User Management</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> -->
                    <!-- <li class="breadcrumb-item active">Welcome to Tax Drive Dashboard</li> -->
                </ol>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="profile-widgets py-3">

                        <div class="text-center">
                            <div class="">

                                @php
                                $getName = $user->name;
                                    $name = explode(" ", $getName);
                                    $count = count($name);
                                    if($count > 1):
                                        $name1 = $name[0];
                                        $name2 = $name[1];
                                        $displayName = $name1[0] . ' ' . $name2[0];
                                    else:
                                        $name1 = $name[0];
                                        $displayName = $name1[0];
                                    endif;
                                @endphp
                                <div class="mx-auto bg-info text-light" style="width: 6rem; height: 6rem; justify-content: center; display: flex; align-items: center; font-size:30px; border-radius:50%">
                                    {{ $displayName }}
                                </div>

                                <div class="online-circle"><i class="fas fa-circle text-success"></i>
                                </div>
                            </div>

                            <div class="mt-3 ">
                                <a class="text-reset fw-medium font-size-16">{{ $user->name }}</a>
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                <p class="text-body mt-1 mb-1">{{ $user->role->role}}</p>

                                <span class="badge bg-success">Joined: {{ $user->created_at->diffForHumans()}}</span>
                                <p>
                                    @if($user->is_profile_complete == 1 && $user->status == 0)
                                        <a class="btn btn-danger btn-sm mt-4" wire:click="toggleStatus({{$user->id}},'1')"><i class="mdi mdi-alert-circle-outline me-2"></i>Not Approved</a>
                                    @elseif($user->is_profile_complete == 1 && $user->status == 1 )
                                        <a class="btn btn-success btn-sm mt-4" wire:click="toggleStatus({{$user->id}},'0')"><i class="mdi mdi-check-all me-2"></i>Approved</a>
                                    @endif
                                </p>
                            </div>




                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="user-img">
                        <center>
                            <a href="{{asset($user->passport)}}"><img src="{{asset($user->passport)}}" alt="" class="avatar-lg mx-auto rounded-circle"></a>
                        </center>

                    </div>
                </div>
                <div class="card-footer">
                    <h6 class="text-center"><strong>Passport</strong></h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="user-img">
                        <center>
                            <a href="{{asset($user->id_doc)}}"><img src="{{asset($user->id_doc)}}" alt="" class="avatar-lg mx-auto"></a>
                        </center>

                    </div>
                </div>
                <div class="card-footer">
                    <h6 class="text-center"><strong>Document</strong></h6>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-3">
                    <h5 class="text-muted"><strong>User Information</strong></h5>
                </div>
                <div class="table-responsive-x card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Business name</th>
                            <td>{{$user->business_name}}</td>
                        </tr>
                        <tr>
                            <th>Service</th>
                            <td>{{$user->service->service ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Sub Service</th>
                            <td>{{$user->subservice->subservice}}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{$user->state->name}}</td>
                        </tr>
                        <tr>
                            <th>LGA</th>
                            <td>{{$user->lga->name}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$user->work_address}}</td>
                        </tr>
                        <tr>
                            <th>Years of Experience</th>
                            <td>{{$user->yrs_of_expertise}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$user->phone_no}}</td>
                        </tr>
                        <tr>
                            <th>Phone II </th>
                            <td>{{$user->work_phone_no}}</td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td>{{$user->bio}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-12 col-xl-9">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Vehicles</h4>
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
                            <input type="search" wire:model.live.debounce.500ms="search" placeholder="Search by make..."
                                class="form-control form-control-sm mt-2">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-bordered"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Make</th>
                                        <th>Model</th>
                                        <th>Year</th>
                                        <th>Category</th>
                                        <th>Air Condition</th>
                                        <th>Transmission</th>
                                        <th>Seats</th>
                                        <th>Booking Price</th>
                                        <th>Vehicle Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($vehicles as $vehicle)
                                    <tr>
                                        <td><img src="{{ asset($vehicle->photos->first()->image_path) }}" style="height:50px; width:70px;" alt="{{ $vehicle->vehicleMake }}"></td>
                                        <td>{{ $vehicle->vehicleMake }}</td>
                                        <td>{{ $vehicle->vehicleModel }}</td>
                                        <td>{{ $vehicle->vehicleYear }}</td>
                                        <td><span class="badge bg-{{ $vehicle->category->slug == 'booking'? 'primary': 'success'}}">{{ $vehicle->category->category }}</span></td>
                                        <td>{{ $vehicle->airCondition }}</td>
                                        <td><span class="badge bg-{{ $vehicle->transmission == 'automatic' ? 'warning' : 'danger'}}">{{ $vehicle->transmission }}</span></td>
                                        <td>{{ $vehicle->seats }}</td>
                                        <td>{{ $vehicle->priceSetup->amount }}</td>
                                        <td>
                                            @if($vehicle->status == 1)
                                                <a class="badge bg-primary btn-sm"><i class="fas fa-sync-alt"> Pending</a>
                                            @elseif($vehicle->status == 2)
                                                <a class="badge bg-success btn-sm"><i class="fa fa-check"></i> Approved</a>
                                            @elseif($vehicle->status == 3)
                                                <a class="badge bg-danger btn-sm"><i class="fas fa-info-circle"></i> Declined</a>
                                            @endif
                                        </td>
                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-danger"> No record available</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="loader text-center">
                                <div class="my-2">
                                    {{ $vehicles->links()}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}


    </div>

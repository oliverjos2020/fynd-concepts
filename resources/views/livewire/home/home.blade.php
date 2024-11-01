<div>
    <div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Dashboard <i class="far fa-user"></i></span></div>
            <div class="dashbard-menu-header">
                <div class="dashbard-menu-avatar fl-wrap">
                    @php
                                $getName = Auth::user()->name;
                                    $name = explode(" ", $getName);
                                    $count = count($name);
                                    if($count > 1):
                                        $name1 = $name[0];
                                        $name2 = $name[1];
                                        $displayName = $name1[0] . '' . $name2[0];
                                    else:
                                        $name1 = $name[0];
                                        $displayName = $name1[0];
                                    endif;
                                @endphp
                    {{-- <img src="images/avatar/5.jpg" alt=""> --}}
                    <div>{{$displayName}}</div>
                    <h4>Welcome, <span>{{Auth::user()->name}}</span></h4>
                </div>
                <a href="#" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Log Out"><i class="far fa-user"></i></a>
            </div>
            <!--Tariff Plan menu-->
            <div class="tfp-det-container">
                <div   class="tfp-btn"><span>You are logged in as an: </span> <strong>{{Auth::user()->role->role}}</strong></div>
            </div>
            <!--Tariff Plan menu end-->

        </div>
        <div class="list-single-main-container fl-wrap">
            @if(Auth::user()->is_profile_complete !== "1" || 1==1)
                @if($step == 1)
                    <div class="list-single-main-item fl-wrap">
                        <div class="list-single-main-item-title">
                            <h3>Kindly Complete your profile</h3>
                        </div>
                        <div class="list-single-main-item_content fl-wrap">
                            <p>Follow the guidelines below to successfully set up your service providing account:</p>
                            <ul>
                                <p>
                                    <b>Profile Picture:</b> Please ensure you are in a well lit environment and take a selfie picture showing your face.
                                </p>
                                <p>
                                <b>Sample:</b><br>
                                <img src="{{asset('img/1.jpg')}}" style="max-height:400px;">
                                </p>
                                <p>
                                    <b>Work Address:</b> Please provide an accurate work address.
                                </p>
                                <p>
                                    <b> Pictures:</b> Kindly ensure you upload very good and clear work pictures. This should include pictures of your work station. (Minimum of 3)
                                </p>
                                <p>
                                    <b>Bio:</b> Write a short bio about yourself explaining who you are and what you do.
                                </p>
                                <p>
                                    <b> ID Card:</b> You must upload your valid government issued ID Card for verification.
                                </p>
                            </ul>

                            <a wire:click="next" class="btn float-btn color-bg">Next</a>
                        </div>
                    </div>
                @elseif($step == 2)
                    <div class="list-single-main-item fl-wrap">
                        <div class="list-single-main-item-title">
                            <h3>Work Details</h3>
                        </div>
                        <div class="list-single-main-item_content fl-wrap">
                            {{-- <p>Follow the guidelines below to successfully set up your service providing account:</p> --}}
                            <div class="custom-form">
                                <label>Business Name<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                <input type="text" placeholder="Example:AE Ventures" wire:model="business_name">
                                @error('business_name')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror

                                <label>Work Phone Number<span class="dec-icon"><i class="far fa-phone"></i></span></label>
                                <input type="text" placeholder="+7(123)987654" wire:model="work_phone_no">
                                @error('work_phone_no')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror
                                <label>Select Work State<span class="dec-icon"><i class="far fa-globe"></i></span></label>
                                <select wire:model="state">
                                    <option value="">Select State</option> <!-- Default option -->
                                    @forelse($states as $state)
                                        <option value="{{ $state->slug }}">{{ $state->name }}</option>
                                    @empty
                                        <option value="">No states available</option>
                                    @endforelse
                                </select>
                                @error('state')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror

                                <label style="margin-top:15px">Select LGA<span class="dec-icon"><i class="far fa-globe"></i></span></label>
                                <select wire:model="lga">
                                    <option value="">Select LGA</option> <!-- Default option -->
                                    @forelse($lgas as $lga)
                                        <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                                    @empty
                                        <option value="">No LGAs available</option>
                                    @endforelse
                                </select>
                                @error('lga')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror

                                <label style="margin-top:15px">Select Service Type<span class="dec-icon"><i class="far fa-share-alt"></i></span></label>
                                <select wire:model="service">
                                    <option value="">Select Service</option> <!-- Default option -->
                                    @forelse($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->service }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('service')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror

                                <label style="margin-top:15px">Select Sub Service<span class="dec-icon"><i class="far fa-share-alt"></i></span></label>
                                <select wire:model="subservice">
                                    <option value="">Select Subservice</option> <!-- Default option -->
                                    @forelse($subservices as $subservice)
                                        <option value="{{ $subservice->id }}">{{ $subservice->subservice }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('subservice')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror

                                <label style="margin-top:15px">Years of Expertise <span class="dec-icon"><i class="far fa-shield-check"></i></span></label>
                                <input type="text" placeholder="" wire:model="yrs_of_expertise">
                                @error('yrs_of_expertise')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror


                                <label>Enter Work Address <span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                                <input type="text" wire:model="work_address" placeholder="USA 27TH Brooklyn NY" value="">
                                @error('work_address')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror

                                <label>Tell Us About Yourself </label>
                                <textarea wire:model="bio" cols="40" rows="3" placeholder="About Me" style="margin-bottom:20px;"></textarea>
                                @error('bio')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror
                            </div>

                            <a wire:click="previous" class="btn float-btn color-bg">Previous</a>
                            <a wire:click="next" style="margin-left:25px;" class="btn float-btn color-bg">Next</a>
                        </div>
                    </div>
                @elseif($step == 3)
                <div class="list-single-main-item fl-wrap">
                    <div class="list-single-main-item-title">
                        <h3>Upload Document</h3>
                    </div>
                    <div class="list-single-main-item_content fl-wrap">
                        <p>
                            <b>Upoload a selfie or passport:</b><br>
                            <div class="col-sm-12">
                                <div class="listsearch-input-item fl-wrap">
                                    <form class="fuzone">
                                        <div class="fu-text">
                                            <span><i class="far fa-cloud-upload-alt"></i> Click here or drop files to upload</span>
                                            <div class="photoUpload-files fl-wrap">
                                                @if($passport)
                                                    <img src="{{ $passport->temporaryUrl() }}" style="max-height:120px" class="image mt-2">
                                                @endif
                                            </div>
                                        </div>
                                        <input type="file" class="upload" wire:model="passport" accept="image/jpg, image/jpeg, image/png">
                                    </form>
                                </div>
                                @error('passport')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror
                            </div>
                        </p>

                    </div>
                    <div class="list-single-main-item_content fl-wrap">
                        <p>
                            <b>Upoload Government ID (NIN, Voter's Card, Driver's License, etc):</b><br>
                            <div class="col-sm-12">
                                <div class="listsearch-input-item fl-wrap">
                                    <form class="fuzone">
                                        <div class="fu-text">
                                            <span><i class="far fa-cloud-upload-alt"></i> Click here or drop files to upload</span>
                                            <div class="photoUpload-files fl-wrap">
                                                @if($id_doc)
                                                    <img src="{{ $id_doc->temporaryUrl() }}" style="max-height:120px" class="image mt-2">
                                                @endif
                                            </div>
                                        </div>
                                        <input type="file" class="upload" wire:model="id_doc" accept="image/jpg, image/jpeg, image/png">
                                    </form>
                                </div>
                                @error('id_doc')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror
                            </div>
                        </p>
                    </div>
                    <a wire:click="previous" class="btn float-btn color-bg">Previous</a>
                    <a wire:click="next" style="margin-left:25px;" class="btn float-btn color-bg">Next</a>
                </div>
                @elseif($step == 4)
                <div class="list-single-main-item fl-wrap">
                    <div class="list-single-main-item-title">
                        <h3>Upload Document</h3>
                    </div>
                <div class="list-single-main-item_content fl-wrap">
                    <p>
                        <b>Upload Work Images:</b><br>
                        <div class="col-sm-12">
                            <div class="listsearch-input-item fl-wrap">
                                <form class="fuzone">
                                    <div class="fu-text">
                                        <span><i class="far fa-cloud-upload-alt"></i> Click here or drop files to upload</span>
                                        <div class="photoUpload-files fl-wrap"></div>
                                    </div>
                                    <input type="file" class="upload" multiple="" wire:model="work_images" accept="image/jpg, image/jpeg, image/png">
                                </form>
                            </div>
                            @if ($errors->has('otherDoc.*'))
                                @foreach ($errors->get('otherDoc.*') as $error)
                                <span class="text-danger">{{ $error[0] }}</span><br>
                                @endforeach
                            @endif
                            @error('work_images')
                                <label class="text-danger"> {{ $message }} </label>
                            @enderror
                        </div>
                        <div class="row">
                            @if($work_images)
                            @foreach ($work_images as $image)
                                    @if ($image instanceof \Livewire\TemporaryUploadedFile)
                                        <div class="col-md-3">
                                            <img src="{{ $image->temporaryUrl() }}" class="image mb-2" style="max-width: 100%">
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </p>
                </div>
                    <a wire:click="previous" class="btn float-btn color-bg">Previous</a>
                    <a style="margin-left:25px;" wire:click="submit" class="btn float-btn color-bg">Submit</a>
                </div>
                @endif
            @else
                @if(Auth::user()->status == "0")
                    <div class="notification success-notif  fl-wrap">
                        <p>Your application is  <a href="#">Under Review </a> you will be contacted via mail between 48 hours with your request status. Thank You</p>
                        <a class="notification-close" href="#"><i class="fal fa-times"></i></a>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>

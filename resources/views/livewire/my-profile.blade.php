<div>
    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item"><span>Edit Profile</span></div>
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
            <!-- dashboard-title end -->
            <!-- dasboard-wrapper-->
            <div class="dasboard-wrapper fl-wrap no-pag">
                <div class="row">
                    <div class="col-md-7">
                        <div class="dasboard-widget-title fl-wrap">
                            <h5><i class="fas fa-user-circle"></i>Change Avatar</h5>
                        </div>
                        <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                            <div class="edit-profile-photo">
                                <img src="{{Auth::user()->passport}}" class="respimg" alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        {{-- <span>  Upload New Photo</span>
                                        <input type="file" class="upload"> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="bg-wrap bg-parallax-wrap-gradien"  wire:ignore>
                                <div class="bg"  data-bg="{{ Auth::user()->photos()->first()?->url }}"></div>
                            </div>
                            <div class="change-photo-btn cpb-2  ">
                                {{-- <div class="photoUpload color-bg">
                                    <span> <i class="far fa-camera"></i> Change Cover </span>
                                    <input type="file" class="upload">
                                </div> --}}
                            </div>
                        </div>



                        <div class="dasboard-widget-title fl-wrap" style="margin-top:15px;">
                            <h5><i class="fas fa-key"></i>Personal Info</h5>
                        </div>
                        <div class="dasboard-widget-box fl-wrap">
                            <div class="custom-form">
                                <label>Tell us about your business </label>
                                <textarea cols="40" rows="3" wire:model="bio" placeholder="Tell us something about your business" style="margin-bottom:20px;">{{$user->bio}}</textarea>

                                <label>Business Name <span class="dec-icon"><i class="far fa-user"></i></span></label>
                                <input type="text" wire:model="business_name" value="{{$user->business_name}}">

                                <label style="margin-top:0px">Select Work State<span class="dec-icon"><i class="far fa-globe"></i></span></label>
                                <select wire:model="state">
                                    <option value="">Select State</option> <!-- Default option -->
                                    @forelse($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
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

                                <div class="row">


                                    <div class="col-md-12" style="text-align: left">
                                        <label>Work Images</label>
                                        <input type="file" wire:model="newWorkImages" multiple>
                                    </div>
                                    @if($newWorkImages)
                                    @foreach ($newWorkImages as $image)
                                            @if ($image instanceof \Livewire\TemporaryUploadedFile)
                                                <div class="col-md-3">
                                                    <img src="{{ $image->temporaryUrl() }}" class="image mb-2" style="max-width: 100%">
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach ($photos as $image)
                                            <div class="col-sm-3 mt-2" style="margin-top:15px;">
                                                <img src="{{ $image->url }}" class="image mb-2" style="max-width: 100%; height:80px;">
                                            </div>
                                        @endforeach
                                    @endif

                                </div>

                                <button class="btn color-bg float-btn" wire:click="saveBusinessInfo">Save Business  Info</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="dasboard-widget-title dbt-mm fl-wrap">
                            <h5><i class="fas fa-key"></i>Change Password</h5>
                        </div>
                        <div class="dasboard-widget-box fl-wrap">
                            <div class="custom-form">
                                <div class="pass-input-wrap fl-wrap">
                                    <label>Current Password<span class="dec-icon"><i class="far fa-lock-open-alt"></i></span></label>
                                    <input type="password" wire:model="current_password" class="pass-input" placeholder="" value=""/>
                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                </div>
                                @error('current_password')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror
                                <div class="pass-input-wrap fl-wrap">
                                    <label>New Password<span class="dec-icon"><i class="far fa-lock-alt"></i></span></label>
                                    <input type="password" wire:model="new_password" class="pass-input" placeholder="" value=""/>
                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                </div>
                                @error('new_password')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror
                                <div class="pass-input-wrap fl-wrap">
                                    <label>Confirm New Password<span class="dec-icon"><i class="far fa-shield-check"></i> </span></label>
                                    <input type="password" wire:model="new_password_confirmation" class="pass-input" placeholder="" value=""/>
                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                </div>
                                @error('new_password_confirmation')
                                    <label class="text-danger"> {{ $message }} </label>
                                @enderror
                                <button class="btn color-bg float-btn" wire:click="changePassword">Save Changes</button>
                            </div>
                        </div>
                        <div class="dasboard-widget-title fl-wrap" style="margin-top: 30px;">
                            <h5><i class="fas fa-share-alt-x"></i>Documents</h5>
                        </div>
                        <div class="dasboard-widget-box fl-wrap">
                            <div class="custom-form">
                                {{-- <div class="list-single-main-item-title">
                                    <h3>Upload Document</h3>
                                </div> --}}
                                <div class="list-single-main-item_content fl-wrap">
                                    <p>
                                        <b>Upoload a selfie or passport:</b><br>
                                        <div class="col-sm-12">
                                            <div class="listsearch-input-item fl-wrap">
                                                <form class="fuzone">
                                                    <div class="fu-text">
                                                        <span><i class="far fa-cloud-upload-alt"></i> Click here or drop files to upload</span>
                                                        <div class="photoUpload-files fl-wrap">
                                                            @if($uploadPassport)
                                                                <img src="{{ $uploadPassport->temporaryUrl() }}" style="max-height:120px" class="image mt-2">
                                                            @else
                                                                <img src="{{ $passport }}" style="max-height:120px" class="image mt-2">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <input type="file" class="upload" wire:model="uploadPassport" accept="image/jpg, image/jpeg, image/png">
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
                                                            {{-- @if($id_doc)
                                                                <img src="{{ $id_doc->temporaryUrl() }}" style="max-height:120px" class="image mt-2">
                                                            @endif --}}
                                                        @if($upload_id_doc)
                                                            <img src="{{ $upload_id_doc->temporaryUrl() }}" style="max-height:120px" class="image mt-2">
                                                        @else
                                                            <img src="{{ $id_doc }}" style="max-height:120px" class="image mt-2">
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <input type="file" class="upload" wire:model="upload_id_doc" accept="image/jpg, image/jpeg, image/png">
                                                </form>
                                            </div>
                                            @error('id_doc')
                                                <label class="text-danger"> {{ $message }} </label>
                                            @enderror
                                        </div>
                                    </p>
                                </div>
                                <button class="btn color-bg float-btn" wire:click="uploadDocuments">Upload Documents</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- dasboard-wrapper end -->
        </div>
        <!-- dashboard-footer -->
        <div class="dashboard-footer">
            <div class="dashboard-footer-links fl-wrap">
                <span>Helpfull Links:</span>
                <ul>
                    <li><a href="about.html">About  </a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="pricing.html">Pricing Plans</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="help.html">Help Center</a></li>
                </ul>
            </div>
            <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
        </div>
        <!-- dashboard-footer end -->
    </div>
</div>

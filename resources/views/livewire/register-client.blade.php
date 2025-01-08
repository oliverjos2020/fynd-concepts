<div>
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Register Client</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> -->
                    <!-- <li class="breadcrumb-item active">Welcome to Tax Drive Dashboard</li> -->
                </ol>
            </div>

        </div>
    </div>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <p class="card-title text-uppercase text-muted"><strongx>Setting Up Client Profile</strongx></p>
            </div>
            <div class="card-body">
                @if ($step == 1)
                <div>
                    <h4><strong>Personal Information</strong></h4>
                    <div class="form-group mt-2">
                        <label for="category">Select client category</label>
                        <select wire:model="category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Fullname</label>
                        <input type="text" id="name" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" class="form-control" wire:model="dob">
                        @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="phone_no">Mobile Number</label>
                        <input type="text" id="phone_no" class="form-control" wire:model="phone_no">
                        @error('phone_no') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control form-control-md" wire:model="address">
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="workplace">Work Place</label>
                        <input type="text" id="workplace" class="form-control form-control-md" wire:model="workplace">
                        @error('workplace') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="state">State</label>
                        <input type="text" id="state" class="form-control form-control-md" wire:model="state">
                        @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="country">Country</label>
                        <input type="text" id="country" class="form-control form-control-md" wire:model="country">
                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                @elseif ($step == 2)
                <div>
                    <h4><strong>Next of KIN Information</strong></h4>
                    <div class="form-group mt-2">
                        <label for="nok_name">NOK Fullname</label>
                        <input type="text" id="nok_name" class="form-control" wire:model="nok_name">
                        @error('nok_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="nok_email">NOK Email</label>
                        <input type="nok_email" id="nok_email" class="form-control" wire:model="nok_email">
                        @error('nok_email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="nok_phone_no">NOK Mobile Number</label>
                        <input type="text" id="nok_phone_no" class="form-control" wire:model="nok_phone_no">
                        @error('nok_phone_no') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="nok_address">NOK Address</label>
                        <input type="text" id="nok_address" class="form-control form-control-md" wire:model="nok_address">
                        @error('nok_address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                @elseif ($step == 3)
                <div>
                    <h4><strong>Special Needs</strong></h4>

                        {{-- @foreach($needs as $index => $need)
                            <div class="row mb-2">
                                <div class="col-md-10">
                                    <input type="text" wire:model="needs.{{ $index }}" class="form-control" placeholder="Enter your need">
                                    @error('needs.' . $index) <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-2 d-flex">
                                    @if($index == count($needs) - 1 && count($needs) < $maxFields)
                                        <button wire:click.prevent="addField" class="btn btn-primary btn-sm">Add</button>
                                    @endif
                                    @if(count($needs) > 1)
                                        <button wire:click.prevent="removeField({{ $index }})" class="btn btn-danger btn-sm">Delete</button>
                                    @endif
                                </div>
                            </div>
                        @endforeach --}}
                        @foreach($needs as $index => $need)
                            <div class="row mb-2">
                                <div class="col-md-10">
                                    <input type="text" wire:model="needs.{{ $index }}" value="{{ $need }}" class="form-control" placeholder="Enter your need">
                                    @error('needs.' . $index) <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-2 d-flex">
                                    @if($index == count($needs) - 1 && count($needs) < $maxFields)
                                        <button wire:click.prevent="addField" class="btn btn-primary btn-sm">Add</button>
                                    @endif
                                    @if(count($needs) > 1)
                                        <button wire:click.prevent="removeField({{ $index }})" class="btn btn-danger btn-sm">Delete</button>
                                    @endif
                                </div>
                            </div>
                        @endforeach


                </div>
                @elseif ($step == 4)
                <h4><strong>Upload Documents</strong></h4>
                    <div>
                        {{-- //payslip --}}
                        <div class="form-group mt-2">
                            <label for="payslip">Pay Slip</label>
                            <input type="file" class="form-control {{$errors->has('payslip') ? 'is-invalid' : ''}}" wire:model="payslip" accept="image/jpg, image/jpeg, image/png" multiple>
                                @if ($errors->has('payslip.*'))
                                    @foreach ($errors->get('payslip.*') as $error)
                                    <span class="text-danger">{{ $error[0] }}</span><br>
                                    @endforeach
                                @endif
                                @error('payslip') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                        <div class="row mb-2 mt-2">
                            @if ($payslip)
                                @foreach ($payslip as $image)
                                    @if ($image instanceof \Livewire\TemporaryUploadedFile)
                                        <div class="col-md-3">
                                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid mb-2" style="max-width: 100%">
                                        </div>
                                    @endif
                                @endforeach
                            @elseif ($existingPayslips)
                                @foreach ($existingPayslips as $existingPayslip)
                                    <div class="col-md-3">
                                        <img src="{{ $existingPayslip->image_path }}" class="img-fluid mb-2" style="max-width: 100%">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        {{-- COS --}}
                        <div class="form-group row mt-0">
                            <label>COS <span class="text-danger">*</span></label>
                            <div class="col-xxl-9">
                                <input type="file" class="form-control {{$errors->has('cos') ? 'is-invalid' : ''}}" wire:model="cos" accept="image/jpg, image/jpeg, image/png">
                                <span class="text-warning">allowed extensions *jpg, jpeg, png</span>
                                @error('cos')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                {{-- @if($passport)
                                <img src="{{ $passport->temporaryUrl() }}" class="image" style="max-width: 300px">
                                @endif --}}
                                @if ($cos instanceof \Livewire\TemporaryUploadedFile)
                                <img src="{{ $cos->temporaryUrl() }}" class="image mt-3" style="max-width: 300px">
                                @elseif ($existingcos)
                                <img src="{{ asset($existingcos) }}" class="image mt-3" style="max-width: 300px">
                                @endif


                                <div wire:loading wire:target="passport" class="mt-3">
                                    Uploading...
                                </div>
                            </div>
                        </div>
                        {{-- BioMetric --}}
                        <div class="form-group mt-2">
                            <label for="biometric">Biometric</label>
                            <input type="file" class="form-control {{$errors->has('biometric') ? 'is-invalid' : ''}}" wire:model="biometric" accept="image/jpg, image/jpeg, image/png" multiple>
                                @if ($errors->has('biometric.*'))
                                    @foreach ($errors->get('biometric.*') as $error)
                                    <span class="text-danger">{{ $error[0] }}</span><br>
                                    @endforeach
                                @endif
                                @error('biometric') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="row mt-2 mb-3">
                            @if ($biometric)
                                @foreach ($biometric as $Biometricimage)
                                    @if ($image instanceof \Livewire\TemporaryUploadedFile)
                                        <div class="col-md-3">
                                            <img src="{{ $Biometricimage->temporaryUrl() }}" class="img-fluid mb-2" style="max-width: 100%">
                                        </div>
                                    @endif
                                @endforeach
                            @elseif ($existingBiometrics)
                                @foreach ($existingBiometrics as $existingBiometric)
                                    <div class="col-md-3">
                                        <img src="{{ $existingBiometric->image_path }}" class="img-fluid mb-2" style="max-width: 100%">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        {{-- Other Documents --}}
                        <div class="form-group mt-2">
                            <label for="otherDoc">Other Documents</label>
                            <input type="file" class="form-control {{$errors->has('otherDoc') ? 'is-invalid' : ''}}" wire:model="otherDoc" accept="image/jpg, image/jpeg, image/png" multiple>
                                @if ($errors->has('otherDoc.*'))
                                    @foreach ($errors->get('otherDoc.*') as $error)
                                    <span class="text-danger">{{ $error[0] }}</span><br>
                                    @endforeach
                                @endif
                                @error('otherDoc') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="row mt-2 mb-2">
                            @if ($otherDoc)
                                @foreach ($otherDoc as $otherDocimage)
                                    @if ($image instanceof \Livewire\TemporaryUploadedFile)
                                        <div class="col-md-3">
                                            <img src="{{ $otherDocimage->temporaryUrl() }}" class="img-fluid mb-2" style="max-width: 100%">
                                        </div>
                                    @endif
                                @endforeach
                            @elseif ($existingOtherDocs)
                                @foreach ($existingOtherDocs as $existingOtherDoc)
                                    <div class="col-md-3">
                                        <img src="{{ $existingOtherDoc->image_path }}" class="img-fluid mb-2" style="max-width: 100%">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @elseif ($step == 5)
                <h4><strong>Comment</strong></h4>
                <div class="form-group">
                    <textarea name="" id="" cols="30" rows="10" class="form-control" wire:model="comment" placeholder="Type in your comment"></textarea>
                </div>
                @endif

                <div class="mt-4">
                    @if ($step > 1)
                    <button type="button" class="btn btn-secondary" wire:click="previousStep" style="margin-right:15px;">Previous</button>
                    @endif

                    @if ($step < 5) <button type="button" class="btn btn-primary btn-block" wire:click="nextStep">Next</button>
                        @else
                        <button type="button" class="btn btn-success" wire:click="submit">Submit</button>
                    @endif

                </div>
                <div class="row">
                    <div class="col-7">

                    </div>
                    <div class="col-5">
                        <div class="mt-4">
                            <img style="margin-top:-60px" src="{{asset('assets/images/widget-img.png')}}" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
            </div>

            @if (session()->has('message'))
            <div class="card-footer">
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            </div>
            @endif
        </div>
    </div>

</div>

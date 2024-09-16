<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Vendor Data - {{$user->name}}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> -->
                        <!-- <li class="breadcrumb-item active">Welcome to Tax Drive Dashboard</li> -->
                    </ol>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div wire:click="currentStep('1')" class="{{$step == 1 ? 'bg-primary text-light p-3 rounded' : 'bg-not-active text-primary p-3 rounded'}}">
                1. Personal Information
            </div>
        </div>
        <div class="col-md-2">
            <div wire:click="currentStep('2')" class="{{$step == 2 ? 'bg-primary text-light p-3 rounded' : 'bg-not-active text-primary p-3 rounded'}}">
                2. Next of Kin
            </div>
        </div>
        <div class="col-md-3">
            <div wire:click="currentStep('3')" class="{{$step == 3 ? 'bg-primary text-light p-3 rounded' : 'bg-not-active text-primary p-3 rounded'}}">
                3. Special Needs
            </div>
        </div>
        <div wire:click="currentStep('4')" class="col-md-2">
            <div class="{{$step == 4 ? 'bg-primary text-light p-3 rounded' : 'bg-not-active text-primary p-3 rounded'}}">
                4. Documents
            </div>
        </div>
        <div wire:click="currentStep('5')" class="col-md-2">
            <div class="{{$step == 5 ? 'bg-primary text-light p-3 rounded' : 'bg-not-active text-primary p-3 rounded'}}">
                5. Comments
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card p-3">
                <div class="card-body">
                    @if ($step == 1)
                    <div>
                        <div class="row mt-3">

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Fullname:</th>
                                    <td>{{$user->name}}</td>

                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$user->email}}</td>

                                </tr>

                                <tr>
                                    <th>Fullname:</th>
                                    <td>{{$user->name}}</td>

                                </tr>
                                <tr>
                                    <th>Mobile Number:</th>
                                    <td>{{$user->phone_no}}</td>

                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{$user->address}}</td>
                                </tr>
                                <tr>
                                    <th>Workplace:</th>
                                    <td>{{$user->workplace}}</td>
                                </tr>
                                <tr>
                                    <th>State:</th>
                                    <td>{{$user->state}}</td>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <td>{{$user->country}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @elseif ($step == 2)
                        <div>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Next of Kin Name:</th>
                                    <td>{{$user->nok_name}}</td>

                                </tr>
                                <tr>
                                    <th>Next of Kin Email:</th>
                                    <td>{{$user->nok_email}}</td>

                                </tr>
                                <tr>
                                    <th>Next of Kin Mobile Number:</th>
                                    <td>{{$user->nok_phone_no}}</td>

                                </tr>
                                <tr>
                                    <th>Next of Kin Address:</th>
                                    <td>{{$user->nok_address}}</td>
                                </tr>

                            </table>
                        </div>
                    @elseif ($step == 3)
                    <div>
                        <table class="table table-bordered table-striped">
                            @forelse($needs as $need)
                            <tr>
                                <th>Need:</th>
                                <td>{{$need->need}}</td>
                            </tr>
                            @empty
                                <div class="alert alert-info text-center">No record available</div>
                            @endforelse
                    </table>

                    </div>
                    @elseif ($step == 4)
                        <div>
                            <div class="row">
                                <div class="col-md-12"><h6>PAYSLIP(S)</h6></div>
                                @forelse($payslips as $payslip)
                                    <div class="col-md-3" style="display: flex; justify-content: center;">
                                        <a href="{{ asset($payslip->image_path) }}" target="_blank">
                                            <img src="{{asset( $payslip->image_path )}}" class="img-fluid mb-2" style="max-width: 100%">
                                        </a>
                                    </div>
                                @empty
                                    <div class="alert alert-danger text-center">No images available</div>
                                @endforelse
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h6>COS</h6>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ asset($user->cos) }}" target="_blank">
                                    <img src="{{asset( $user->cos )}}" class="img-fluid mb-2" style="max-width: 100%">
                                </a>
                            </div>
                        </div>
                        <div>
                            <div class="row mt-3">
                                <div class="col-md-12"><h6>PAYSLIP(S)</h6></div>
                                @forelse($biometrics as $biometric)
                                    <div class="col-md-3" style="display: flex; justify-content: center;">
                                        <a href="{{ asset($biometric->image_path) }}" target="_blank">
                                            <img src="{{asset( $biometric->image_path )}}" class="img-fluid mb-2" style="max-width: 100%">
                                        </a>
                                    </div>
                                @empty
                                    <div class="alert alert-danger text-center">No images available</div>
                                @endforelse
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><h6>Other Documents</h6></div>
                                @forelse($otherDocs as $otherDoc)
                                    <div class="col-md-3" style="display: flex; justify-content: center;">
                                        <a href="{{ asset($otherDoc->image_path) }}" target="_blank">
                                            <img src="{{asset( $otherDoc->image_path )}}" class="img-fluid mb-2" style="max-width: 100%">
                                        </a>
                                    </div>
                                @empty
                                    <div class="alert alert-danger text-center">No images available</div>
                                @endforelse
                            </div>
                        </div>
                    @elseif($step == 5)
                        <div>
                           <table class="table table-striped table-bordered">
                            <tr>
                                <th>
                                    Comment
                                </th>
                            </tr>
                            <tr>
                                <td>{{ $user->comment }}</td>
                            </tr>
                           </table>
                        </div>
                    @endif
                    <div class="mt-4">
                        @if ($step > 1)
                        <button type="button" style="margin-right:15px;" class="btn btn-secondary" wire:click="previousStep">Previous</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        @endif

                        @if ($step < 5)
                        <button type="button" class="btn btn-primary btn-block px-3" wire:click="nextStep">Next</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

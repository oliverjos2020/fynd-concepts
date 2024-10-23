<div>
    <div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Dashboard</span></div>
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
                <a href="index-2.html" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
            </div>
            <!--Tariff Plan menu-->
            <div class="tfp-det-container">
                <div   class="tfp-btn"><span>You are logged in as an: </span> <strong>{{Auth::user()->role->role}}</strong></div>
            </div>
            <!--Tariff Plan menu end-->

        </div>
        <div class="list-single-main-container fl-wrap">
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

                        <a wire:click="next" class="btn float-btn color-bg">Proceed</a>
                    </div>
                </div>
            @elseif($step == 2)
                <div class="list-single-main-item fl-wrap">
                    <div class="list-single-main-item-title">
                        <h3>Work Details</h3>
                    </div>
                    <div class="list-single-main-item_content fl-wrap">
                        <p>Follow the guidelines below to successfully set up your service providing account:</p>
                        {{-- <ul>
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
                            </p> --}}
                        </ul>
                        <a wire:click="previous" class="btn float-btn color-bg">Previous</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a wire:click="next" class="btn float-btn color-bg">Proceed</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

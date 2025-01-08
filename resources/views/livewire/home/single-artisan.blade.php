<div>
    <div class="content" style="margin-top:70px;">
        <div class="breadcrumbs fw-breadcrumbs top-smpar smpar fl-wrap">
            <div class="container">
                <div class="breadcrumbs-list">
                    <a href="/">Home</a><a href="/artisan/{{$artisanID}}">Artisan</a>
                    @php
                    $averageRating = App\Models\Review::where('artisan_id', $user->id)->avg('rating');
                    $myrating = round($averageRating, 1);
                    $rating = " ";
                    if($myrating <= 1){
                        $rating = 'Unrated';
                    }elseif($myrating <= 2){
                        $rating = 'Fair';
                    }elseif($myrating <= 3){
                        $rating = 'Average';
                    }elseif($myrating <= 4){
                        $rating = 'Good';
                    }elseif($myrating > 4){
                        $rating = 'Excellent';
                    }
                @endphp
                </div>
                {{-- <div class="show-more-snopt smact"><i class="fal fa-ellipsis-v"></i></div>
                <div class="show-more-snopt-tooltip">
                    <a href="#sec15" class="custom-scroll-link"> <i class="fas fa-comment-alt"></i> Write a review</a>
                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                </div> --}}
                {{-- <a class="print-btn tolt" href="javascript:window.print()" data-microtip-position="bottom"  data-tooltip="Print"><i class="fas fa-print"></i></a>
                <a class="compare-top-btn tolt" data-microtip-position="bottom"  data-tooltip="Compare" href="#"><i class="fas fa-random"></i></a>
                <div class="like-btn"><i class="fas fa-heart"></i> Save</div> --}}
            </div>
        </div>
        <div class="gray-bg small-padding fl-wrap">
            <div class="container">
                <div class="row">
                    <!--  listing-single content -->
                    <div class="col-md-8">
                        <div class="list-single-main-wrapper fl-wrap">
                            <!--  scroll-nav-wrap -->
                            <div class="scroll-nav-wrap">
                                <nav class="scroll-nav scroll-init fixed-column_menu-init">
                                    <ul class="no-list-style">
                                        <li><a class="act-scrlink" href="#sec1"><i class="fal fa-info"></i> </a><span>Details</span></li>
                                        {{-- <li><a href="#sec2"><i class="fal fa-stars"></i></a><span>Features</span></li>
                                        <li><a href="#sec3"><i class="fal fa-bed"></i></a><span>Rooms</span></li>
                                        <li><a href="#sec4"><i class="fal fa-video"></i></a><span>Video</span></li> --}}
                                        <li><a href="#sec5"><i class="fal fa-map-pin"></i></a><span>Location</span></li>
                                        <li><a href="#sec6"><i class="fal fa-comment-alt-lines"></i></a><span>Reviews</span></li>
                                    </ul>
                                    <div class="progress-indicator">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="-1 -1 34 34">
                                            <circle cx="16" cy="16" r="15.9155"
                                                class="progress-bar__background" />
                                            <circle cx="16" cy="16" r="15.9155"
                                                class="progress-bar__progress
                                                js-progress-bar" />
                                        </svg>
                                    </div>
                                </nav>
                            </div>
                            <!--  scroll-nav-wrap end-->
                            <!--  list-single-opt_header-->
                            <div class="list-single-opt_header fl-wrap">
                                <ul class="list-single-opt_header_cat">
                                    <li><a href="#" class="cat-opt color-bg">{{$user->service->service ?? 'Fynd Concepts'}}</a></li>
                                    <li><a href="#" class="cat-opt blue-bg">{{$user->subservice->subservice ?? 'Fynd Concepts'}}</a></li>
                                </ul>
                                <div class="share-holder hid-share">
                                    <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                                    <div class="share-container  isShare"></div>
                                </div>
                            </div>

                            <!--  list-single-opt_header end -->
                            <!--  list-single-header-item-->
                            <div class="list-single-header-item  fl-wrap" id="sec1">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h1>{{$user->business_name}} <span class="verified-badge tolt" data-microtip-position="bottom"  data-tooltip="Verified"><i class="fas fa-check"></i></span></h1>
                                        <div class="geodir-category-location fl-wrap">
                                            <a href="#"><i class="fas fa-map-marker-alt"></i>  {{$user->work_address}}</a>
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="{{$myrating}}"><span class="re_stars-title">{{$rating}}</span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="host-avatar-wrap" href="agent-single.html">
                                        <span>By {{$user->name}}</span>
                                        <img src="{{url($user->passport ?? 'logo/logo-blue.png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="list-single-header-footer fl-wrap">
                                    {{-- <div class="list-single-header-price" data-propertyprise="50500">
                                        <strong>Price:</strong>
                                        <span>$</span>50.500
                                    </div> --}}
                                    <div class="list-single-header-date"><span>Joined:</span>{{$user->created_at->diffForHumans()}}</div>
                                    {{-- <div class="list-single-stats">
                                        <ul class="no-list-style">
                                            <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed -  156 </span></li>
                                            <li><span class="bookmark-counter"><i class="fas fa-heart"></i> Bookmark -  24 </span></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="list-single-main-media fl-wrap" wire:ignore>
                                <div class="single-slider-wrapper carousel-wrap fl-wrap">
                                    <div class="slider-for fl-wrap carousel lightgallery"  >
                                        <!--  slick-slide-item -->
                                        @forelse($user->photos as $photo)
                                        <div class="slick-slide-item">
                                            <div class="box-item">
                                                <a href="{{ url($photo->url?? 'logo/auto-logo.png') }}" class="gal-link popup-image"><i class="fal fa-search"  ></i></a>
                                                <img src="{{ url($photo->url?? 'logo/auto-logo.png') }}" alt="">
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <div class="swiper-button-prev ssw-btn"><i class="fas fa-caret-left"></i></div>
                                    <div class="swiper-button-next ssw-btn"><i class="fas fa-caret-right"></i></div>
                                </div>
                                <div class="single-slider-wrapper fl-wrap">
                                    <div class="slider-nav fl-wrap">
                                        @forelse($user->photos as $photo)
                                        <div class="slick-slide-item"><img src="{{ url($photo->url?? 'logo/auto-logo.png') }}" alt=""></div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="list-single-facts fl-wrap">
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-home-lg"></i>
                                        <h6>Type</h6>
                                        <span>Apartment/ House</span>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-users"></i>
                                        <h6>Accomodation</h6>
                                        <span>6 Guest</span>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-bed"></i>
                                        <h6>Bedrooms</h6>
                                        <span>3 Bedrooms / 4 Beds</span>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-bath"></i>
                                        <h6>Bathrooms</h6>
                                        <span>3 Full</span>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div> --}}
                            <div class="list-single-main-container fl-wrap">
                                <!-- list-single-main-item -->
                                {{-- <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title">
                                        <h3>About This Artisan</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <p>{{$user->bio}}</p>
                                    </div>
                                </div> --}}
                                <!-- list-single-main-item end -->

                                <!-- list-single-main-item -->
                                {{-- <div class="list-single-main-item fw-lmi fl-wrap" id="sec5">
                                    <div class="map-container mapC_vis mapC_vis2">
                                        <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location" data-infotitle="House in Financial Distric" data-infotext="70 Bright St New York, USA"></div>
                                        <div class="scrollContorl"></div>
                                    </div>
                                    <input id="pac-input" class="controls fl-wrap controls-mapwn" autocomplete="on" type="text" placeholder="What Nearby? Schools, Gym... " value="">
                                </div> --}}
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec6">
                                    <div class="list-single-main-item-title">
                                        <h3>Reviews <span>{{$myReview->count() ?? 0}}</span></h3>

                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap fl-wrap">
                                            <div class="review-total">

                                                <span class="review-number blue-bg">{{$myrating}}</span>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="{{$myrating}}"><span class="re_stars-title">{{$rating}}</span></div>
                                            </div>
                                            <!-- reviews-comments-item -->
                                            @forelse($myReview as $rev)
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="{{url('assets/images/users/avatar-1.jpg')}}" alt="fynd concepts">
                                                </div>
                                                <div class="reviews-comments-item-text smpar">

                                                    <h4><a href="#">{{$rev->user->name}}</a></h4>
                                                    @php
                                                    $myrating = $rev->rating;
                                                    $rating = " ";
                                                        if($myrating <= 1){
                                                            $rating = 'Very Bad';
                                                        }elseif($myrating <= 2){
                                                            $rating = 'Fair';
                                                        }elseif($myrating <= 3){
                                                            $rating = 'Average';
                                                        }elseif($myrating <= 4){
                                                            $rating = 'Good';
                                                        }elseif($myrating >= 5){
                                                            $rating = 'Excellent';
                                                        }
                                                    @endphp
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{$rev->rating}}"><span style="min-width:120px; left:256px!important;" class="re_stars-title">{{$rating}}</span></div>
                                                    <div class="clearfix"></div>
                                                    <p>{{$rev->review}}</p>
                                                    <div class="reviews-comments-item-date"><span class="reviews-comments-item-date-item"><i class="far fa-calendar-check"></i>{{$rev->created_at->diffForHumans()}}</span>
                                                        {{-- <a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>6</span> </a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            @endforelse
                                            <!--reviews-comments-item end-->
                                            <!-- reviews-comments-item -->
                                            {{-- <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="{{url('assets/images/users/avatar-2.jpg')}}" alt="fynd concepts">
                                                </div>
                                                <div class="reviews-comments-item-text smpar">
                                                    <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                    <div class="show-more-snopt-tooltip bxwt">
                                                        <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                        <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                    </div>
                                                    <h4><a href="#">Adam Koncy</a></h4>
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><span class="re_stars-title">Excellent</span></div>
                                                    <div class="clearfix"></div>
                                                    <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                    <div class="reviews-comments-item-date"><span class="reviews-comments-item-date-item"><i class="far fa-calendar-check"></i>03 December 2017</span><a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>2</span> </a></div>
                                                </div>
                                            </div> --}}
                                            <!--reviews-comments-item end-->
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec15">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Add Your Review</h3>
                                    </div>
                                    <!-- Add Review Box -->
                                    @if(auth()->check())
                                        <div id="add-review" class="add-review-box">
                                            <div class="leave-rating-wrap">
                                                <span class="leave-rating-title">Your rating  for this listing : </span>
                                                <div class="leave-rating">
                                                    <input type="radio" data-ratingtext="Excellent" name="rating" id="rating-5" value="5" wire:model="myIrating"/>
                                                    <label for="rating-5" class="fal fa-star"></label>
                                                    <input type="radio" data-ratingtext="Good" name="rating" id="rating-4" value="4" wire:model="myIrating"/>
                                                    <label for="rating-4" class="fal fa-star"></label>
                                                    <input type="radio" name="rating"  data-ratingtext="Average" id="rating-3" value="3" wire:model="myIrating"/>
                                                    <label for="rating-3" class="fal fa-star"></label>
                                                    <input type="radio" data-ratingtext="Fair" name="rating" id="rating-2" value="2" wire:model="myIrating"/>
                                                    <label for="rating-2" class="fal fa-star"></label>
                                                    <input type="radio" data-ratingtext="Very Bad" name="rating" id="rating-1" value="1" wire:model="myIrating"/>
                                                    <label for="rating-1" class="fal fa-star"></label>
                                                </div>
                                                <div>
                                                    @php
                                                        $irating = "";
                                                        if($myIrating == '1'){
                                                            $irating = 'Very Bad';
                                                        }elseif($myIrating == '2'){
                                                            $irating = 'Fair';
                                                        }elseif($myIrating == '3'){
                                                            $irating = 'Average';
                                                        }elseif($myIrating == '4'){
                                                            $irating = 'Good';
                                                        }elseif($myIrating == '5'){
                                                            $irating = 'Excellent';
                                                        }
                                                    @endphp
                                                    Your Rating: {{ $irating ? $irating : 'None' }}
                                                </div>

                                            </div>
                                            <!-- Review Comment -->
                                            <form class="add-comment custom-form">
                                                @error('rating')
                                                    <label class="text-danger"> {{ $message }} </label>
                                                @enderror
                                                <fieldset>
                                                    <textarea cols="40" rows="3" wire:model="review" placeholder="Your Review:"></textarea>
                                                </fieldset>
                                                @error('review')
                                                    <label class="text-danger"> {{ $message }} </label>
                                                @enderror
                                                <a wire:click="store" style="cursor:pointer" class="btn big-btn color-bg float-btn">Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                                            </form>
                                        </div>
                                    @else
                                        <p>You must be logged in to submit a review</p>
                                    @endif
                                    <!-- Add Review Box / End -->
                                </div>
                                <!-- list-single-main-item end -->
                            </div>
                        </div>
                    </div>
                    <!-- listing-single content end-->
                    <!-- sidebar -->
                    <div class="col-md-4">
                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="profile-widget">
                                <div class="profile-widget-header color-bg smpar fl-wrap">
                                    <div class="pwh_bg"></div>
                                    <div class="call-btn"><a href="tel:{{$user->phone_no}}" class="tolt color-bg" data-microtip-position="right"  data-tooltip="Call Now"><i class="fas fa-phone-alt"></i></a></div>
                                    <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                    <div class="show-more-snopt-tooltip bxwt">
                                        <a href="#sec15"> <i class="fas fa-comment-alt"></i> Write a review</a>
                                        {{-- <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a> --}}
                                    </div>
                                    <div class="profile-widget-card">
                                        <div class="profile-widget-image">
                                            <img src="{{url($user->passport ?? 'logo/logo-blue.png')}}" alt="">
                                        </div>
                                        <div class="profile-widget-header-title">
                                            <h4><a href="/artisan/{{$artisanID}}">{{$user->name}}</a></h4>
                                            <div class="clearfix"></div>
                                            {{-- <div class="pwh_counter"><span>22</span>Property Listings</div> --}}
                                            <div class="clearfix"></div>
                                                    @php
                                                        $averageRating = App\Models\Review::where('artisan_id', $user->id)->avg('rating');
                                                        $myrating = round($averageRating, 1);

                                                    @endphp
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="{{$myrating}}"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-widget-content fl-wrap">
                                    <div class="contats-list fl-wrap">
                                        <ul class="no-list-style">
                                            <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">{{$user->phone_no}}</a></li>
                                            <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#">{{$user->email}}</a></li>
                                            <li><span><i class="fal fa-envelope"></i> State :</span> <a href="#">{{$user->state->name}}</a></li>
                                            <li><span><i class="fal fa-envelope"></i> LGA :</span> <a href="#">{{$user->lga->name}}</a></li>
                                        </ul>
                                    </div>
                                    {{-- <div class="profile-widget-footer fl-wrap">
                                        <a href="/artisan/{{$artisanID}}" class="btn float-btn color-bg small-btn">View Profile</a>
                                        <a href="#sec-contact" class="custom-scroll-link tolt" data-microtip-position="left"  data-tooltip="Viewing Property"><i class="fal fa-paper-plane"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget fl-wrap" id="sec-contact">
                                <div class="box-widget-title fl-wrap box-widget-title-color color-bg">About This Artisan</div>
                                <div class="box-widget-content fl-wrap">
                                    <div class="custom-form">
                                            <p style="text-align: justify">{{$user->bio}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget end -->

                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget fl-wrap" id="sec-contact">
                                <div class="box-widget-title fl-wrap box-widget-title-color color-bg">Report This Artisan</div>

                                <div class="box-widget-content fl-wrap">
                                    @if(auth()->check())
                                    <div class="custom-form">
                                        <fieldset>
                                            <textarea cols="40" rows="3" wire:model="message" placeholder="Your Message:"></textarea>
                                        </fieldset>
                                        @error('message')
                                            <label class="text-danger"> {{ $message }} </label>
                                        @enderror
                                        <a wire:click="report" style="cursor:pointer" class="btn big-btn color-bg float-btn">Submit <i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

                                    </div>
                                    @else
                                        <p>You must be logged in to submit a report</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--  sidebar end-->
                </div>
                <div class="fl-wrap limit-box"></div>
                <div class="listing-carousel-wrapper carousel-wrap fl-wrap">
                    <div class="list-single-main-item-title">
                        <h3>Similar Properties</h3>
                    </div>
                    <div class="listing-carousel carousel" wire:ignore>
                        <!-- slick-slide-item -->
                        @forelse($similarArtisans as $similarArtisan)
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="/artisan/{{ $similarArtisan->id }}" class="geodir-category-img_item">
                                            <img src="{{ url($similarArtisan->photos->first()->url ?? 'logo/auto-logo.png') }}" alt="{{$similarArtisan->slug}}">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#4" class="map-item"><i class="fas fa-map-marker-alt"></i>  {{ Str::limit($similarArtisan->work_address, 35, '...') }}</a>
                                        </div>
                                        <ul class="list-single-opt_header_cat">
                                            <li><a href="#" class="cat-opt blue-bg">{{ $similarArtisan->service->service ?? '' }}</a></li>
                                            {{-- <li><a href="#" class="cat-opt color-bg">Apartment</a></li> --}}
                                        </ul>
                                        {{-- <a href="#" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                        <a href="#" class="compare-btn tolt" data-microtip-position="left" data-tooltip="Compare"><span><i class="fal fa-random"></i></span></a> --}}
                                        <div class="geodir-category-listing_media-list">
                                            <span><i class="fas fa-camera"></i> {{ $similarArtisan->photos->count() }}</span>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <h3><a href="/artisan/{{ $user->id }}">{{ $similarArtisan->business_name }}</a></h3>
                                        {{-- <div class="geodir-category-content_price">$ 600,000</div> --}}
                                        <p>{{ Str::limit($similarArtisan->bio, 135, '...') }}</p>
                                        {{-- <div class="geodir-category-content-details">
                                            <ul>
                                                <li><i class="fal fa-bed"></i><span>3</span></li>
                                                <li><i class="fal fa-bath"></i><span>2</span></li>
                                                <li><i class="fal fa-cube"></i><span>450 ft2</span></li>
                                            </ul>
                                        </div> --}}
                                        @php
                                        $averageRating = App\Models\Review::where(
                                            'artisan_id',
                                            $similarArtisan->id,
                                        )->avg('rating');
                                        $myrating = round($averageRating, 1);
                                        $rating = ' ';
                                        if ($myrating <= 1) {
                                            $rating = 'Unrated';
                                        } elseif ($myrating <= 2) {
                                            $rating = 'Fair';
                                        } elseif ($myrating <= 3) {
                                            $rating = 'Average';
                                        } elseif ($myrating <= 4) {
                                            $rating = 'Good';
                                        } elseif ($myrating >= 5) {
                                            $rating = 'Excellent';
                                        }
                                    @endphp
                                        <div class="geodir-category-footer fl-wrap">
                                            <a href="/artisan/{{ $user->id }}" class="gcf-company"><img src="{{ url($similarArtisan->passport ?? 'logo/logo-blue.png') }}" alt=""><span>By {{ $user->name }}</span></a>
                                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="{{ $rating }}" data-starrating2="{{ $myrating }}"></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                        @empty
                        @endforelse

                        <!-- slick-slide-item end-->
                    </div>
                    <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                    <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

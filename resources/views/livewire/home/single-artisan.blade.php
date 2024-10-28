<div>
    <div class="content" style="margin-top:70px;">
        <div class="breadcrumbs fw-breadcrumbs top-smpar smpar fl-wrap">
            <div class="container">
                <div class="breadcrumbs-list">
                    <a href="/">Home</a><a href="/artisan/{{$artisanID}}">Artisan</a>
                </div>
                <div class="show-more-snopt smact"><i class="fal fa-ellipsis-v"></i></div>
                <div class="show-more-snopt-tooltip">
                    <a href="#sec15" class="custom-scroll-link"> <i class="fas fa-comment-alt"></i> Write a review</a>
                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                </div>
                <a class="print-btn tolt" href="javascript:window.print()" data-microtip-position="bottom"  data-tooltip="Print"><i class="fas fa-print"></i></a>
                <a class="compare-top-btn tolt" data-microtip-position="bottom"  data-tooltip="Compare" href="#"><i class="fas fa-random"></i></a>
                <div class="like-btn"><i class="fas fa-heart"></i> Save</div>
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
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span class="re_stars-title">Good</span></div>
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
                            <div class="list-single-main-media fl-wrap">
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
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title">
                                        <h3>About This Artisan</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <p>{{$user->bio}}</p>
                                        {{-- <a href="#" class="btn float-btn color-bg">Visit Website</a> --}}
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->

                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fw-lmi fl-wrap" id="sec5">
                                    <div class="map-container mapC_vis mapC_vis2">
                                        <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location" data-infotitle="House in Financial Distric" data-infotext="70 Bright St New York, USA"></div>
                                        <div class="scrollContorl"></div>
                                    </div>
                                    <input id="pac-input" class="controls fl-wrap controls-mapwn" autocomplete="on" type="text" placeholder="What Nearby? Schools, Gym... " value="">
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec6">
                                    <div class="list-single-main-item-title">
                                        <h3>Reviews <span>2</span></h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap fl-wrap">
                                            <div class="review-total">
                                                <span class="review-number blue-bg">4.0</span>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span class="re_stars-title">Good</span></div>
                                            </div>
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="{{url('assets/images/users/avatar-1.jpg')}}" alt="fynd concepts">
                                                </div>
                                                <div class="reviews-comments-item-text smpar">
                                                    <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                    <div class="show-more-snopt-tooltip bxwt">
                                                        <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                        <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                    </div>
                                                    <h4><a href="#">Liza Rose</a></h4>
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="3"><span class="re_stars-title">Average</span></div>
                                                    <div class="clearfix"></div>
                                                    <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                    <div class="reviews-comments-item-date"><span class="reviews-comments-item-date-item"><i class="far fa-calendar-check"></i>12 April 2018</span><a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>6</span> </a></div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item">
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
                                            </div>
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
                                    <div id="add-review" class="add-review-box">
                                        <div class="leave-rating-wrap">
                                            <span class="leave-rating-title">Your rating  for this listing : </span>
                                            <div class="leave-rating">
                                                <input type="radio"    data-ratingtext="Excellent"   name="rating" id="rating-1" value="1"/>
                                                <label for="rating-1" class="fal fa-star"></label>
                                                <input type="radio" data-ratingtext="Good" name="rating" id="rating-2" value="2"/>
                                                <label for="rating-2" class="fal fa-star"></label>
                                                <input type="radio" name="rating"  data-ratingtext="Average" id="rating-3" value="3"/>
                                                <label for="rating-3" class="fal fa-star"></label>
                                                <input type="radio" data-ratingtext="Fair" name="rating" id="rating-4" value="4"/>
                                                <label for="rating-4" class="fal fa-star"></label>
                                                <input type="radio" data-ratingtext="Very Bad "   name="rating" id="rating-5" value="5"/>
                                                <label for="rating-5"    class="fal fa-star"></label>
                                            </div>
                                            <div class="count-radio-wrapper">
                                                <span id="count-checked-radio">Your Rating</span>
                                            </div>
                                        </div>
                                        <!-- Review Comment -->
                                        <form   class="add-comment custom-form">
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                        <input   name="phone" type="text"    onClick="this.select()" value="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Yourmail* <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                                        <input   name="reviewwname" type="text"    onClick="this.select()" value="">
                                                    </div>
                                                </div>
                                                <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                            </fieldset>
                                            <button class="btn big-btn color-bg float-btn">Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
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
                                    <div class="call-btn"><a href="tel:123-456-7890" class="tolt color-bg" data-microtip-position="right"  data-tooltip="Call Now"><i class="fas fa-phone-alt"></i></a></div>
                                    <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                    <div class="show-more-snopt-tooltip bxwt">
                                        <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                                        <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
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
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
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
                                    <div class="profile-widget-footer fl-wrap">
                                        <a href="/artisan/{{$artisanID}}" class="btn float-btn color-bg small-btn">View Profile</a>
                                        <a href="#sec-contact" class="custom-scroll-link tolt" data-microtip-position="left"  data-tooltip="Viewing Property"><i class="fal fa-paper-plane"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget fl-wrap" id="sec-contact">
                                <div class="box-widget-title fl-wrap box-widget-title-color color-bg">Post a Review</div>
                                <div class="box-widget-content fl-wrap">
                                    <div class="custom-form">
                                        <form method="post"  name="contact-property-form">
                                            <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                            <input name="phone" type="text" onClick="this.select()" value="">
                                            <label>Your email  * <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                            <input name="email" type="text" onClick="this.select()" value="">
                                            <label>Your review  * <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                            <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>

                                            <button type="submit" class="btn float-btn color-bg fw-btn"> Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget end -->
                    </div>
                    <!--  sidebar end-->
                </div>
                <div class="fl-wrap limit-box"></div>
                <div class="listing-carousel-wrapper carousel-wrap fl-wrap">
                    <div class="list-single-main-item-title">
                        <h3>Similar Properties</h3>
                    </div>
                    <div class="listing-carousel carousel ">
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="listing-single.html" class="geodir-category-img_item">
                                            <img src="images/all/3.jpg" alt="">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#4" class="map-item"><i class="fas fa-map-marker-alt"></i>  70 Bright St New York, USA</a>
                                        </div>
                                        <ul class="list-single-opt_header_cat">
                                            <li><a href="#" class="cat-opt blue-bg">Sale</a></li>
                                            <li><a href="#" class="cat-opt color-bg">Apartment</a></li>
                                        </ul>
                                        <a href="#" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                        <a href="#" class="compare-btn tolt" data-microtip-position="left" data-tooltip="Compare"><span><i class="fal fa-random"></i></span></a>
                                        <div class="geodir-category-listing_media-list">
                                            <span><i class="fas fa-camera"></i> 8</span>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <h3><a href="listing-single.html">Gorgeous house for sale</a></h3>
                                        <div class="geodir-category-content_price">$ 600,000</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                                        <div class="geodir-category-content-details">
                                            <ul>
                                                <li><i class="fal fa-bed"></i><span>3</span></li>
                                                <li><i class="fal fa-bath"></i><span>2</span></li>
                                                <li><i class="fal fa-cube"></i><span>450 ft2</span></li>
                                            </ul>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a href="agent-single.html" class="gcf-company"><img src="images/avatar/2.jpg" alt=""><span>By Liza Rose</span></a>
                                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good" data-starrating2="4"></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                        <!-- slick-slide-item end-->
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="listing-single.html" class="geodir-category-img_item">
                                            <img src="images/all/1.jpg" alt="">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#4" class="map-item"><i class="fas fa-map-marker-alt"></i>   40 Journal Square  , NJ, USA</a>
                                        </div>
                                        <ul class="list-single-opt_header_cat">
                                            <li><a href="#" class="cat-opt blue-bg">Sale</a></li>
                                            <li><a href="#" class="cat-opt color-bg">Apartment</a></li>
                                        </ul>
                                        <a href="#" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                        <a href="#" class="compare-btn tolt" data-microtip-position="left" data-tooltip="Compare"><span><i class="fal fa-random"></i></span></a>
                                        <div class="geodir-category-listing_media-list">
                                            <span><i class="fas fa-camera"></i> 47</span>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <h3><a href="listing-single.html">Luxury Family Home</a></h3>
                                        <div class="geodir-category-content_price">$ 300,000</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                                        <div class="geodir-category-content-details">
                                            <ul>
                                                <li><i class="fal fa-bed"></i><span>4</span></li>
                                                <li><i class="fal fa-bath"></i><span>2</span></li>
                                                <li><i class="fal fa-cube"></i><span>460 ft2</span></li>
                                            </ul>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a href="agent-single.html" class="gcf-company"><img src="images/avatar/1.jpg" alt=""><span>By Anna Lips</span></a>
                                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Excellent" data-starrating2="5"></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                        <!-- slick-slide-item end-->
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="listing-single.html" class="geodir-category-img_item">
                                            <img src="images/all/9.jpg" alt="">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#4" class="map-item"><i class="fas fa-map-marker-alt"></i> 34-42 Montgomery St , NY, USA</a>
                                        </div>
                                        <ul class="list-single-opt_header_cat">
                                            <li><a href="#" class="cat-opt blue-bg">Sale</a></li>
                                            <li><a href="#" class="cat-opt color-bg">Apartment</a></li>
                                        </ul>
                                        <a href="#" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                        <a href="#" class="compare-btn tolt" data-microtip-position="left" data-tooltip="Compare"><span><i class="fal fa-random"></i></span></a>
                                        <div class="geodir-category-listing_media-list">
                                            <span><i class="fas fa-camera"></i> 4</span>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <h3><a href="listing-single.html">Gorgeous house for sale</a></h3>
                                        <div class="geodir-category-content_price">$ 120,000</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                                        <div class="geodir-category-content-details">
                                            <ul>
                                                <li><i class="fal fa-bed"></i><span>2</span></li>
                                                <li><i class="fal fa-bath"></i><span>1</span></li>
                                                <li><i class="fal fa-cube"></i><span>220 ft2</span></li>
                                            </ul>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a href="agent-single.html" class="gcf-company"><img src="images/avatar/3.jpg" alt=""><span>By Mark Frosty</span></a>
                                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good" data-starrating2="4"></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                        <!-- slick-slide-item end-->
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="listing-single.html" class="geodir-category-img_item">
                                            <img src="images/all/6.jpg" alt="">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#4" class="map-item"><i class="fas fa-map-marker-alt"></i>  W 85th St, New York, USA </a>
                                        </div>
                                        <ul class="list-single-opt_header_cat">
                                            <li><a href="#" class="cat-opt blue-bg">Sale</a></li>
                                            <li><a href="#" class="cat-opt color-bg">Apartment</a></li>
                                        </ul>
                                        <a href="#" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                        <a href="#" class="compare-btn tolt" data-microtip-position="left" data-tooltip="Compare"><span><i class="fal fa-random"></i></span></a>
                                        <div class="geodir-category-listing_media-list">
                                            <span><i class="fas fa-camera"></i> 13</span>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <h3><a href="listing-single.html">Contemporary Apartment</a></h3>
                                        <div class="geodir-category-content_price">$ 1,600,000</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                                        <div class="geodir-category-content-details">
                                            <ul>
                                                <li><i class="fal fa-bed"></i><span>4</span></li>
                                                <li><i class="fal fa-bath"></i><span>1</span></li>
                                                <li><i class="fal fa-cube"></i><span>550 ft2</span></li>
                                            </ul>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a href="agent-single.html" class="gcf-company"><img src="images/avatar/4.jpg" alt=""><span>By Bill Trust</span></a>
                                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Excellent
                                                " data-starrating2="5"></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                        <!-- slick-slide-item end-->
                    </div>
                    <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                    <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

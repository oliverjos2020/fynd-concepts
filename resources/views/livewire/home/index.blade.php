<div>
    <!-- wrapper  -->
    <div id="wrapper">
        <!-- content -->
        <div class="content">
            <!--  section  -->
            <section class="no-padding-section" wire:ignore>
                <div class="hero-slider-wrap carousel-wrap fl-wrap">
                    <div class="hero-slider carousel">
                        <!-- hero-slider-item -->
                        <section class="hero-section gray-bg">
                            <div class="bg-wrap">
                                <div class="half-hero-bg-media full-height">
                                    <div class="slider-progress-bar">
                                        <span>
                                            <svg class="circ" width="30" height="30">
                                                <circle class="circ2" cx="15" cy="15" r="13"
                                                    stroke="rgba(255,255,255,0.4)" stroke-width="1" fill="none" />
                                                <circle class="circ1" cx="15" cy="15" r="13"
                                                    stroke="#fff" stroke-width="2" fill="none" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="slideshow-container">
                                        <!-- slideshow-item -->
                                        <div class="slideshow-item">
                                            <div class="bg" data-bg="{{ asset('img/slider-3-3.jpg') }}"></div>
                                        </div>
                                        <!--  slideshow-item end  -->
                                        <!-- slideshow-item -->
                                        <div class="slideshow-item">
                                            <div class="bg" data-bg="{{ asset('img/slider-2-2.jpg') }}"></div>
                                        </div>
                                        <!--  slideshow-item end  -->
                                        <!-- slideshow-item -->
                                        <div class="slideshow-item">
                                            <div class="bg" data-bg="{{ asset('img/slider-1.jpg') }}"></div>
                                        </div>
                                        <!--  slideshow-item end  -->
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="hero-title hero-title_small">
                                    <h2>Your Professional & Reliable <br>
                                        Handymen Finder
                                    </h2>
                                </div>
                                <div class="main-search-input-wrap shadow_msiw" wire:ignore>
                                    <div class="main-search-input fl-wrap">
                                        <div class="main-search-input-item">
                                            <input type="text" wire:model="keywords"
                                                placeholder="What are you looking for?" />
                                        </div>
                                        {{-- <div class="main-search-input-item">
                                        <select data-placeholder="All Categories"  class="chosen-select no-search-select" >
                                            <option>All Statuses</option>
                                            <option>For Rent</option>
                                            <option>For Sale</option>
                                        </select>
                                    </div> --}}
                                        <div class="main-search-input-item">
                                            <select data-placeholder="All Categories" wire:model="state"
                                                class="chosen-select">
                                                <option value="">Select Location</option>
                                                @forelse($states as $state)
                                                    <option value="{{ $state->slug }}">{{ $state->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <button class="main-search-button color-bg" wire:click="search"> Search <i
                                                class="far fa-search"></i> </button>
                                    </div>
                                </div>
                                <div class="hero-notifer fl-wrap">Need more search options? <a href="/listing">Advanced
                                        Search</a> </div>
                                <div class="scroll-down-wrap">
                                    <div class="mousey">
                                        <div class="scroller"></div>
                                    </div>
                                    <span>Scroll Down To Discover</span>
                                </div>
                            </div>
                        </section>
                        <!--  hero-slider-item end  -->
                        <!-- hero-slider-item -->
                        <div class="hero-slider-item fl-wrap">
                            <div class="bg" data-bg="images/bg/19.jpg"></div>
                            <div class="overlay"></div>
                            <div class="hero-listing-item">
                                <div class="container">
                                    <h2><a href="listing-single.html">House in Financial District</a></h2>
                                    <div class="geodir-category-location fl-wrap">
                                        <a href="#"><i class="fas fa-map-marker-alt"></i> 70 Bright St New York,
                                            USA</a>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span
                                                class="re_stars-title">Good</span></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                        neque. Nulla finibus lobortis pulvinar.</p>
                                    <div class="clearfix"></div>
                                    <a href="listing-single.html" class="btn color-bg float-btn">View Details</a>
                                    <div class="list-single-header-price"><strong>Price:</strong><span>$</span>50.500
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  hero-slider-item end  -->
                    </div>
                    {{-- <div class="hs-btn hs-btn_prev color-bg swiper-button-prev"><i class="far fa-angle-left"></i></div>
                <div class="hs-btn hs-btn_next color-bg swiper-button-next"><i class="far fa-angle-right"></i></div> --}}
                </div>
            </section>
            <!--  section  end-->
            <!-- breadcrumbs-->
            <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
                <div class="container">
                    <div class="breadcrumbs-list">
                        <a href="#">Home</a> <span>Home Image</span>
                    </div>
                    <div class="share-holder hid-share">
                        <a href="#" class="share-btn showshare sfcs"> <i class="fas fa-share-alt"></i> Share </a>
                        <div class="share-container  isShare"></div>
                    </div>
                </div>
            </div>
            <!-- breadcrumbs end -->
            <!-- section -->
            <section class="gray-bg small-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="section-title fl-wrap">
                                <h4>Browse Hot Offers</h4>
                                <h2>Featured Listing</h2>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="listing-filters gallery-filters">
                                <a href="#" class="gallery-filter  gallery-filter-active"
                                    data-filter="*"><span>All Categories</span></a>
                                @forelse($services as $service)
                                    <a href="#" class="gallery-filter" data-filter=".{{ $service->slug }}">
                                        <span>{{ $service->service }}</span></a>
                                @empty
                                    <a href="#" class="gallery-filter" data-filter=".for_sale"> <span>No
                                            Services</span></a>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- grid-item-holder-->
                    <div class="grid-item-holder gallery-items gisp fl-wrap">
                        @forelse($users as $user)
                            <div class="gallery-item {{ $user->service->slug ?? '' }}">
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img fl-wrap">
                                            <a href="/artisan/{{ $user->id }}" class="geodir-category-img_item">
                                                <img src="{{ url($user->photos->first()->url ?? 'logo/auto-logo.png') }}"
                                                    alt="fynd concepts">
                                                <div class="overlay"></div>
                                            </a>
                                            <div class="geodir-category-location">
                                                <a href="#" class="single-map-item tolt"
                                                    data-newlatitude="40.72956781" data-newlongitude="-73.99726866"
                                                    data-microtip-position="top-left" data-tooltip="On the map"><i
                                                        class="fas fa-map-marker-alt"></i> <span>
                                                        {{ Str::limit($user->work_address, 35, '...') }}
                                                    </span></a>
                                            </div>
                                            <ul class="list-single-opt_header_cat">
                                                <li><a href="#"
                                                        class="cat-opt blue-bg">{{ $user->service->service ?? '' }}</a>
                                                </li>
                                            </ul>
                                            <a wire:click="addFavorite({{$user->id}}, {{$user->is_favorite ? 1 : 0 }})" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="{{ $user->is_favorite ? 'Remove' : 'Add'}}">
                                                <span>
                                                    <i class="{{ $user->is_favorite ? 'fa fa-heart' : 'fal fa-heart'}}"></i>
                                                </span>
                                            </a>
                                            <div class="geodir-category-listing_media-list">
                                                <span><i class="fas fa-camera"></i>
                                                    {{ $user->photos->count() }}</span>
                                            </div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <h3 class="title-sin_item"><a
                                                    href="/artisan/{{ $user->id }}">{{ $user->business_name }}</a>
                                            </h3>
                                            <p>{{ Str::limit($user->bio, 135, '...') }}</p>

                                            <div class="geodir-category-footer fl-wrap">
                                                <a href="/" class="gcf-company">
                                                    @php
                                                        $averageRating = App\Models\Review::where(
                                                            'artisan_id',
                                                            $user->id,
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
                                                        } elseif ($myrating > 4) {
                                                            $rating = 'Excellent';
                                                        }
                                                    @endphp
                                                    <img src="{{ url($user->passport ?? 'logo/logo-blue.png') }}"
                                                        alt=""><span>By {{ $user->name }}</span></a>
                                                <div class="listing-rating card-popup-rainingvis tolt"
                                                    data-microtip-position="top" data-tooltip="{{ $rating }}"
                                                    data-starrating2="{{ $myrating }}"></div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>

                        @empty
                        @endforelse
                    </div>
                    <!-- grid-item-holder-->
                    <a href="/listing" class="btn float-btn small-btn color-bg">View More artisans </a>
                </div>
            </section>
            <!-- section end-->
            <!-- section -->

            <!-- section end-->
            <section class="hidden-section no-padding-section" wire:ignore>
                <div class="half-carousel-wrap">
                    <div class="half-carousel-title color-bg">
                        <div class="half-carousel-title-item fl-wrap">
                            <h2>Explore Our Best Artisans</h2>
                            <h5 style="text-align:justify!important;">From master carpenters to expert plumbers, our carefully selected artisans represent the finest in their trades. Discover skilled professionals who combine traditional craftsmanship with modern techniques to deliver exceptional results for your home.</h5>
                        </div>
                        <div class="pwh_bg"></div>
                    </div>
                    <div class="half-carousel-conatiner">
                        <div class="half-carousel fl-wrap full-height">
                            <!--slick-item -->
                            <div class="slick-item">
                                <div class="half-carousel-item fl-wrap">
                                    <div class="bg-wrap bg-parallax-wrap-gradien">
                                        <div class="bg" data-bg="{{ url('artisans/1.jpg') }}"></div>
                                    </div>
                                    <div class="half-carousel-content">
                                        {{-- <div class="hc-counter color-bg">26 Properties</div> --}}
                                        <h3><a href="/listing">Potter</a></h3>
                                        {{-- <p>Constant care and attention to the patients makes good record</p> --}}
                                    </div>
                                </div>
                            </div>
                            <!--slick-item end -->
                            <!--slick-item -->
                            <div class="slick-item">
                                <div class="half-carousel-item fl-wrap">
                                    <div class="bg-wrap bg-parallax-wrap-gradien">
                                        <div class="bg" data-bg="{{ url('artisans/6.jpg') }}"></div>
                                    </div>
                                    <div class="half-carousel-content">
                                        {{-- <div class="hc-counter color-bg">89 Properties</div> --}}
                                        <h3><a href="/listing">Carpenter</a></h3>
                                        {{-- <p>Constant care and attention to the patients makes good record</p> --}}
                                    </div>
                                </div>
                            </div>
                            <!--slick-item end -->
                            <!--slick-item -->
                            <div class="slick-item">
                                <div class="half-carousel-item fl-wrap">
                                    <div class="bg-wrap bg-parallax-wrap-gradien">
                                        <div class="bg" data-bg="{{ url('artisans/3.jpg') }}"></div>
                                    </div>
                                    <div class="half-carousel-content">
                                        {{-- <div class="hc-counter color-bg">102 Properties</div> --}}
                                        <h3><a href="/listing">Furniture Maker</a></h3>
                                        {{-- <p>Constant care and attention to the patients makes good record</p> --}}
                                    </div>
                                </div>
                            </div>
                            <!--slick-item end -->
                            <!--slick-item -->
                            <div class="slick-item">
                                <div class="half-carousel-item fl-wrap">
                                    <div class="bg-wrap bg-parallax-wrap-gradien">
                                        <div class="bg" data-bg="{{ url('artisans/4.jpg') }}"></div>
                                    </div>
                                    <div class="half-carousel-content">
                                        {{-- <div class="hc-counter color-bg">51 Properties</div> --}}
                                        <h3><a href="/listing">Upholsterer</a></h3>
                                        {{-- <p>Constant care and attention to the patients makes good record</p> --}}
                                    </div>
                                </div>
                            </div>
                            <!--slick-item end -->
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <!--about-wrap -->
                    <div class="about-wrap">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="about-title ab-hero fl-wrap">
                                    <h2>Why Choose Our Services </h2>
                                    <h4 style="color:gray">We’ve put our user experience design expertise to work, both
                                        in crafting exceptional experiences and in delivering top-tier handyman
                                        solutions.</h4>
                                </div>
                                <div class="services-opions fl-wrap">
                                    <ul>
                                        <li>
                                            <i class="fal fa-headset"></i>
                                            <h4>Reliability </h4>
                                            <p>Trust our handymen to show up on time, every time. We guarantee quality work with transparent pricing and clear communication.</p>
                                        </li>
                                        <li>
                                            <i class="fal fa-users-cog"></i>
                                            <h4>Skilled Professionals</h4>
                                            <p>Every handyman on our platform is thoroughly vetted and certified in their trade. We ensure you get expert service from professionals who take pride in their craft. </p>
                                        </li>
                                        <li>
                                            <i class="fal fa-phone-laptop"></i>
                                            <h4>Experience</h4>
                                            <p>With thousands of successfully completed projects across multiple specialties. Our handymen bring years of practical knowledge to solve any home maintenance challenge.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-6">
                                <div class="about-img fl-wrap">
                                    <img src="{{ url('artisans/1.jpg') }}" class="respimg" alt="fynd-concept">
                                    <div class="about-img-hotifer color-bg">
                                        <p>Every handyman listed on our platform has undergone a thorough verification
                                            process. You can trust that the individuals you find here are genuine
                                            experts in their respective fields.</p>
                                        {{-- <h4>Mark Antony</h4> --}}
                                        <h5>Fynd Concept Team</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- about-wrap end  -->
                </div>
            </section>
            <!--section end-->
            <!-- section -->

            <!-- section end-->
            <!-- section -->
            <section class="color-bg small-padding">
                <div class="container">
                    <div class="main-facts fl-wrap">
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="70">0+</div>
                                    </div>
                                </div>
                                <h6>Artisans</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="100">0+</div>
                                    </div>
                                </div>
                                <h6>Customers</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="120">0</div>
                                    </div>
                                </div>
                                <h6>Services</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="10">0</div>
                                    </div>
                                </div>
                                <h6>New Listing Every Week</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                    </div>
                </div>
                <div class="svg-bg">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" width="100%" height="100%" viewBox="0 0 1600 900"
                        preserveAspectRatio="xMidYMax slice">
                        <defs>
                            <lineargradient id="bg">
                                <stop offset="0%" style="stop-color:rgba(255, 255, 255, 0.6)"></stop>
                                <stop offset="50%" style="stop-color:rgba(255, 255, 255, 0.1)"></stop>
                                <stop offset="100%" style="stop-color:rgba(255, 255, 255, 0.6)"></stop>
                            </lineargradient>
                            <path id="wave" stroke="url(#bg)" fill="none"
                                d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
                            s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
                        </defs>
                        <g>
                            <use xlink:href="#wave">
                                <animatetransform attributeName="transform" attributeType="XML" type="translate"
                                    dur="10s" calcMode="spline" values="270 230; -334 180; 270 230"
                                    keyTimes="0; .5; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                    repeatCount="indefinite" />
                            </use>
                            <use xlink:href="#wave">
                                <animatetransform attributeName="transform" attributeType="XML" type="translate"
                                    dur="8s" calcMode="spline" values="-270 230;243 220;-270 230"
                                    keyTimes="0; .6; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                    repeatCount="indefinite" />
                            </use>
                            <use xlink:href="#wave">
                                <animatetransform attributeName="transform" attributeType="XML" type="translate"
                                    dur="6s" calcMode="spline" values="0 230;-140 200;0 230"
                                    keyTimes="0; .4; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                    repeatCount="indefinite" />
                            </use>
                            <use xlink:href="#wave">
                                <animatetransform attributeName="transform" attributeType="XML" type="translate"
                                    dur="12s" calcMode="spline" values="0 240;140 200;0 230"
                                    keyTimes="0; .4; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                    repeatCount="indefinite" />
                            </use>
                        </g>
                    </svg>
                </div>
            </section>
            <!-- section end-->
            <!-- section -->
            <section class="gray-bg" wire:ignore>
                <div class="container">
                    <div class="section-title st-center fl-wrap">
                        <h4>Testimonilas</h4>
                        <h2>What Our Clients Say</h2>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="testimonials-slider-wrap">
                    <div class="testimonials-slider">
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item fl-wrap">
                                <div class="text-carousel-item-header fl-wrap">
                                    {{-- <div class="popup-avatar"><img src="images/avatar/1.jpg" alt=""></div> --}}
                                    <div class="review-owner fl-wrap">Ngozi Peters</div>
                                    {{-- <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div> --}}
                                </div>
                                <div class="text-carousel-content fl-wrap">
                                    <p> "I was amazed by how quickly John fixed my kitchen cabinets. He arrived on time, worked efficiently, and even cleaned up afterward. The pricing was transparent and fair - exactly what I needed."
                                    </p>
                                    {{-- <a href="#" class="testim-link color-bg">Via Facebook</a> --}}
                                </div>
                            </div>
                        </div>
                        <!--slick-item end -->
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item fl-wrap">
                                <div class="text-carousel-item-header fl-wrap">
                                    {{-- <div class="popup-avatar"><img src="images/avatar/2.jpg" alt=""></div> --}}
                                    <div class="review-owner fl-wrap">Charles Igwe</div>
                                    {{-- <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div> --}}
                                </div>
                                <div class="text-carousel-content fl-wrap">
                                    <p> "We've used this platform three times now for different projects, and each handyman has been exceptional. The latest work on our bathroom renovation exceeded our expectations. Professional service from start to finish!"</p>
                                    {{-- <a href="#" class="testim-link color-bg">Via Twitter</a> --}}
                                </div>
                            </div>
                        </div>
                        <!--slick-item end -->
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item fl-wrap">
                                <div class="text-carousel-item-header fl-wrap">
                                    {{-- <div class="popup-avatar"><img src="images/avatar/3.jpg" alt=""></div> --}}
                                    <div class="review-owner fl-wrap">Olatunde Babatope</div>
                                    {{-- <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div> --}}
                                </div>
                                <div class="text-carousel-content fl-wrap">
                                    <p> "Finding reliable handymen used to be a nightmare until I discovered this platform. Dave came over to fix multiple issues around my house - from electrical work to door repairs. His expertise saved me from having to call multiple contractors."</p>
                                    {{-- <a href="#" class="testim-link color-bg">Via Facebook</a> --}}
                                </div>
                            </div>
                        </div>
                        <!--slick-item end -->
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item fl-wrap">
                                <div class="text-carousel-item-header fl-wrap">
                                    {{-- <div class="popup-avatar"><img src="images/avatar/4.jpg" alt=""></div> --}}
                                    <div class="review-owner fl-wrap">Daniel Musa</div>
                                    {{-- <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div> --}}
                                </div>
                                <div class="text-carousel-content fl-wrap">
                                    <p> "As a busy professional, I appreciate how easy it was to look and find through the platform. The handyman they sent was knowledgeable and patient in explaining every step of the repair process. Five stars!"</p>
                                    {{-- <a href="#" class="testim-link color-bg">Via Twitter</a> --}}
                                </div>
                            </div>
                        </div>
                        <!--slick-item end -->
                    </div>
                </div>
            </section>
            <!-- section end-->
        </div>
        <!-- content end -->
        <!-- subscribe-wrap -->
        {{-- <div class="subscribe-wrap fl-wrap">
            <div class="container">
                <div class="subscribe-container fl-wrap color-bg">
                    <div class="pwh_bg"></div>
                    <div class="mrb_dec mrb_dec3"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="subscribe-header">
                                <h4>newsletter</h4>
                                <h3>Sign up for newsletter and get latest news and update</h3>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="footer-widget fl-wrap">
                                <div class="subscribe-widget fl-wrap">
                                    <div class="subcribe-form">
                                        <form id="subscribe">
                                            <input class="enteremail fl-wrap" name="email" id="subscribe-email"
                                                placeholder="Enter Your Email" spellcheck="false" type="text">
                                            <button type="submit" id="subscribe-button"
                                                class="subscribe-button color-bg"> Subscribe</button>
                                            <label for="subscribe-email" class="subscribe-message"></label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- subscribe-wrap end -->
        <!-- footer -->
        {{-- <footer class="main-footer fl-wrap">
            <div class="footer-inner fl-wrap">
                <div class="container">
                    <div class="row">
                        <!-- footer widget-->
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <div class="footer-widget-logo fl-wrap">
                                    <img src="images/logo.png" alt="">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar.</p>
                                <div class="fw_hours fl-wrap">
                                    <span>Monday - Friday:<strong> 8am - 6pm</strong></span>
                                    <span>Saturday - Sunday:<strong> 9am - 3pm</strong></span>
                                </div>
                            </div>
                        </div>
                        <!-- footer widget end-->
                        <!-- footer widget-->
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <div class="footer-widget-title fl-wrap">
                                    <h4>Helpful links</h4>
                                </div>
                                <ul class="footer-list fl-wrap">
                                    <li><a href="about.html">About Our Company</a></li>
                                    <li><a href="blog.html">Our last News</a></li>
                                    <li><a href="pricing.html">Pricing Plans</a></li>
                                    <li><a href="contacts.html">Contacts</a></li>
                                    <li><a href="help.html">Help Center</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- footer widget end-->
                        <!-- footer widget-->
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <div class="footer-widget-title fl-wrap">
                                    <h4>Contacts Info</h4>
                                </div>
                                <ul class="footer-contacts fl-wrap">
                                    <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#"
                                            target="_blank">yourmail@domain.com</a></li>
                                    <li> <span><i class="fal fa-map-marker"></i> Adress :</span><a href="#"
                                            target="_blank">USA 27TH Brooklyn NY</a></li>
                                    <li><span><i class="fal fa-phone"></i> Phone :</span><a
                                            href="#">+7(111)123456789</a></li>
                                </ul>
                                <div class="footer-social fl-wrap">
                                    <ul>
                                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- footer widget end-->
                        <!-- footer widget-->
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <div class="footer-widget-title fl-wrap">
                                    <h4>Download our API</h4>
                                </div>
                                <p>Start working with Homeradar that can provide everything you need </p>
                                <div class="api-links fl-wrap">
                                    <a href="#" class="api-btn color-bg"><i class="fab fa-apple"></i> App
                                        Store</a>
                                    <a href="#" class="api-btn color-bg"><i class="fab fa-google-play"></i>
                                        Play Market</a>
                                </div>
                            </div>
                        </div>
                        <!-- footer widget end-->
                    </div>
                </div>
            </div>
        </footer> --}}
        <!-- footer end -->
    </div>
    <!-- wrapper end -->
    <!--register form -->
    <div class="main-register-wrap modal">
        <div class="reg-overlay"></div>
        <div class="main-register-holder tabs-act">
            <div class="main-register-wrapper modal_main fl-wrap">
                <div class="main-register-header color-bg">
                    <div class="main-register-logo fl-wrap">
                        <img src="images/white-logo.png" alt="">
                    </div>
                    <div class="main-register-bg">
                        <div class="mrb_pin"></div>
                        <div class="mrb_pin mrb_pin2"></div>
                    </div>
                    <div class="mrb_dec"></div>
                    <div class="mrb_dec mrb_dec2"></div>
                </div>
                <div class="main-register">
                    <div class="close-reg"><i class="fal fa-times"></i></div>
                    <ul class="tabs-menu fl-wrap no-list-style">
                        <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                        <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
                    </ul>
                    <!--tabs -->
                    <div class="tabs-container">
                        <div class="tab">
                            <!--tab -->
                            <div id="tab-1" class="tab-content first-tab">
                                <div class="custom-form">
                                    <form method="post" name="registerform">
                                        <label>Username or Email Address * <span class="dec-icon"><i
                                                    class="fal fa-user"></i></span></label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Password * <span class="dec-icon"><i
                                                        class="fal fa-key"></i></span></label>
                                            <input name="password" type="password" autocomplete="off"
                                                onClick="this.select()" value="">
                                            <span class="eye"><i class="fal fa-eye"></i> </span>
                                        </div>
                                        <div class="lost_password">
                                            <a href="#">Lost Your Password?</a>
                                        </div>
                                        <div class="filter-tags">
                                            <input id="check-a3" type="checkbox" name="check">
                                            <label for="check-a3">Remember me</label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <button type="submit" class="log_btn color-bg"> LogIn </button>
                                    </form>
                                </div>
                            </div>
                            <!--tab end -->
                            <!--tab -->
                            <div class="tab">
                                <div id="tab-2" class="tab-content">
                                    <div class="custom-form">
                                        <form method="post" name="registerform" class="main-register-form"
                                            id="main-register-form2">
                                            <label>Full Name * <span class="dec-icon"><i
                                                        class="fal fa-user"></i></span></label>
                                            <input name="name" type="text" onClick="this.select()"
                                                value="">
                                            <label>Email Address * <span class="dec-icon"><i
                                                        class="fal fa-envelope"></i></span></label>
                                            <input name="email" type="text" onClick="this.select()"
                                                value="">
                                            <div class="pass-input-wrap fl-wrap">
                                                <label>Password * <span class="dec-icon"><i
                                                            class="fal fa-key"></i></span></label>
                                                <input name="password" type="password" autocomplete="off"
                                                    onClick="this.select()" value="">
                                                <span class="eye"><i class="fal fa-eye"></i> </span>
                                            </div>
                                            <div class="filter-tags ft-list">
                                                <input id="check-a2" type="checkbox" name="check">
                                                <label for="check-a2">I agree to the <a href="#">Privacy
                                                        Policy</a> and <a href="#">Terms and
                                                        Conditions</a></label>
                                            </div>
                                            <div class="clearfix"></div>
                                            <button type="submit" class="log_btn color-bg"> Register </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--tab end -->
                        </div>
                        <!--tabs end -->
                        <div class="log-separator fl-wrap"><span>or</span></div>
                        <div class="soc-log fl-wrap">
                            <p>For faster login or register use your social account.</p>
                            <a href="#" class="facebook-log"> Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--register form end -->
    <!--secondary-nav -->
    {{-- <div class="secondary-nav">
        <ul>
            <li><a href="dashboard-add-listing.html" class="tolt" data-microtip-position="left"
                    data-tooltip="Sell Property"><i class="fal fa-truck-couch"></i> </a></li>
            <li><a href="listing.html" class="tolt" data-microtip-position="left" data-tooltip="Buy Property"> <i
                        class="fal fa-shopping-bag"></i></a></li>
            <li><a href="compare.html" class="tolt" data-microtip-position="left" data-tooltip="Your Compare"><i
                        class="fal fa-exchange"></i></a></li>
        </ul>
        <div class="progress-indicator">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                <circle cx="16" cy="16" r="15.9155" class="progress-bar__background" />
                <circle cx="16" cy="16" r="15.9155"
                    class="progress-bar__progress
                js-progress-bar" />
            </svg>
        </div>
    </div> --}}
    <!--secondary-nav end -->
    <a class="to-top color-bg"><i class="fas fa-caret-up"></i></a>
    <!--map-modal -->
    <div class="map-modal-wrap">
        <div class="map-modal-wrap-overlay"></div>
        <div class="map-modal-item">
            <div class="map-modal-container fl-wrap">
                <h3> <span>Listing Title </span></h3>
                <div class="map-modal-close"><i class="far fa-times"></i></div>
                <div class="map-modal fl-wrap">
                    <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                    <div class="scrollContorl"></div>
                </div>
            </div>
        </div>
    </div>
    <!--map-modal end -->
</div>

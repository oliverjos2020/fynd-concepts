<div>
    <!-- wrapper  -->
    <div id="wrapper">
        <!-- content -->
        <div class="content">
            <!--  section  -->
            <section class="no-padding-section">
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
                                <div class="main-search-input-wrap shadow_msiw">
                                    <div class="main-search-input fl-wrap">
                                        <div class="main-search-input-item">
                                            <input type="text" wire:model="search"
                                                placeholder="What are you looking for?" value="" />
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
                                        <button class="main-search-button color-bg"
                                            onclick="window.location.href='listing.html'"> Search <i
                                                class="far fa-search"></i> </button>
                                    </div>
                                </div>
                                <div class="hero-notifer fl-wrap">Need more search options? <a
                                        href="listing.html">Advanced Search</a> </div>
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
                                <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*"><span>All Categories</span></a>
                                    @forelse($services as $service)
                                    <a href="#" class="gallery-filter" data-filter=".{{$service->slug}}"> <span>{{$service->service}}</span></a>
                                    @empty
                                    <a href="#" class="gallery-filter" data-filter=".for_sale"> <span>No Services</span></a>
                                    @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- grid-item-holder-->
                    <div class="grid-item-holder gallery-items gisp fl-wrap">
                        @forelse($users as $user)
                        <div class="gallery-item {{$user->service->slug ?? ''}}">
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="/artisan/{{$user->id}}" class="geodir-category-img_item">
                                            <img src="{{ url($user->photos->first()->url?? 'logo/auto-logo.png') }}" alt="fynd concepts">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#" class="single-map-item tolt"
                                                data-newlatitude="40.72956781" data-newlongitude="-73.99726866"
                                                data-microtip-position="top-left" data-tooltip="On the map"><i
                                                    class="fas fa-map-marker-alt"></i> <span> {{ Str::limit($user->work_address, 35, '...') }}
                                                    </span></a>
                                        </div>
                                        <ul class="list-single-opt_header_cat">
                                            <li><a href="#" class="cat-opt blue-bg">{{$user->service->service ?? ''}}</a></li>
                                        </ul>
                                        <a href="#" class="geodir_save-btn tolt" data-microtip-position="left"
                                            data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                        <div class="geodir-category-listing_media-list">
                                            <span><i class="fas fa-camera"></i> {{$user->photos->count()}}</span>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <h3 class="title-sin_item"><a href="/artisan/{{$user->id}}">{{$user->business_name}}</a></h3>
                                        <p>{{ Str::limit($user->bio, 135, '...') }}</p>

                                        <div class="geodir-category-footer fl-wrap">
                                            <a href="/" class="gcf-company"><img
                                                    src="{{url($user->passport ?? 'logo/logo-blue.png')}}" alt=""><span>By {{$user->name}}</span></a>
                                            <div class="listing-rating card-popup-rainingvis tolt"
                                                data-microtip-position="top" data-tooltip="Good"
                                                data-starrating2="4"></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>

                        @empty
                        @endforelse
                    </div>
                    <!-- grid-item-holder-->
                    <a href="listing.html" class="btn float-btn small-btn color-bg">View More artisans </a>
                </div>
            </section>
            <!-- section end-->
            <!-- section -->
            <section>
                <div class="container">
                    <!--about-wrap -->
                    <div class="about-wrap">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="about-title ab-hero fl-wrap">
                                    <h2>Why Choose Our Services </h2>
                                    <h4>Check video presentation to find out more about us .</h4>
                                </div>
                                <div class="services-opions fl-wrap">
                                    <ul>
                                        <li>
                                            <i class="fal fa-headset"></i>
                                            <h4>24 Hours Support </h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </li>
                                        <li>
                                            <i class="fal fa-users-cog"></i>
                                            <h4>User Admin Panel</h4>
                                            <p>Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt.
                                                Curabitur convallis fringilla diam sed aliquam. </p>
                                        </li>
                                        <li>
                                            <i class="fal fa-phone-laptop"></i>
                                            <h4>Mobile Friendly</h4>
                                            <p>Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa
                                                faucibus feugiat. In fermentum facilisis massa.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-6">
                                <div class="about-img fl-wrap">
                                    <img src="{{url('artisans/1.jpg')}}" class="respimg" alt="fynd-concept">
                                    <div class="about-img-hotifer color-bg">
                                        <p>Your website is fully responsive so visitors can view your content from their
                                            choice of device.</p>
                                        <h4>Mark Antony</h4>
                                        <h5>Homeradar CEO</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- about-wrap end  -->
                </div>
            </section>
            <!-- section end-->
            <section class="hidden-section no-padding-section">
                <div class="half-carousel-wrap">
                    <div class="half-carousel-title color-bg">
                        <div class="half-carousel-title-item fl-wrap">
                            <h2>Explore Best Cities</h2>
                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</h5>
                        </div>
                        <div class="pwh_bg"></div>
                    </div>
                    <div class="half-carousel-conatiner">
                        <div class="half-carousel fl-wrap full-height">
                            <!--slick-item -->
                            <div class="slick-item">
                                <div class="half-carousel-item fl-wrap">
                                    <div class="bg-wrap bg-parallax-wrap-gradien">
                                        <div class="bg" data-bg="{{url('artisans/1.jpg')}}"></div>
                                    </div>
                                    <div class="half-carousel-content">
                                        <div class="hc-counter color-bg">26 Properties</div>
                                        <h3><a href="listing.html">Explore NewYork</a></h3>
                                        <p>Constant care and attention to the patients makes good record</p>
                                    </div>
                                </div>
                            </div>
                            <!--slick-item end -->
                            <!--slick-item -->
                            <div class="slick-item">
                                <div class="half-carousel-item fl-wrap">
                                    <div class="bg-wrap bg-parallax-wrap-gradien">
                                        <div class="bg" data-bg="{{url('artisans/6.jpg')}}"></div>
                                    </div>
                                    <div class="half-carousel-content">
                                        <div class="hc-counter color-bg">89 Properties</div>
                                        <h3><a href="listing.html">Awesome London</a></h3>
                                        <p>Constant care and attention to the patients makes good record</p>
                                    </div>
                                </div>
                            </div>
                            <!--slick-item end -->
                            <!--slick-item -->
                            <div class="slick-item">
                                <div class="half-carousel-item fl-wrap">
                                    <div class="bg-wrap bg-parallax-wrap-gradien">
                                        <div class="bg" data-bg="{{url('artisans/3.jpg')}}"></div>
                                    </div>
                                    <div class="half-carousel-content">
                                        <div class="hc-counter color-bg">102 Properties</div>
                                        <h3><a href="listing.html">Find Dream in Paris</a></h3>
                                        <p>Constant care and attention to the patients makes good record</p>
                                    </div>
                                </div>
                            </div>
                            <!--slick-item end -->
                            <!--slick-item -->
                            <div class="slick-item">
                                <div class="half-carousel-item fl-wrap">
                                    <div class="bg-wrap bg-parallax-wrap-gradien">
                                        <div class="bg" data-bg="{{url('artisans/4.jpg')}}"></div>
                                    </div>
                                    <div class="half-carousel-content">
                                        <div class="hc-counter color-bg">51 Properties</div>
                                        <h3><a href="listing.html">Elite Houses in Dubai</a></h3>
                                        <p>Constant care and attention to the patients makes good record</p>
                                    </div>
                                </div>
                            </div>
                            <!--slick-item end -->
                        </div>
                    </div>
                </div>
            </section>
            <!--section end-->
            <!-- section -->
            <section>
                <div class="container">
                    <!-- section-title -->
                    <div class="section-title st-center fl-wrap">
                        <h4>The Best Agents</h4>
                        <h2>Meet Our Agents</h2>
                    </div>
                    <!-- section-title end -->
                    <div class="clearfix"></div>
                    <div class="listing-carousel-wrapper lc_hero carousel-wrap fl-wrap">
                        <div class="listing-carousel carousel ">
                            <!-- slick-slide-item -->
                            <div class="slick-slide-item">
                                <!--  agent card item -->
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img fl-wrap  agent_card">
                                            <a href="agent-single.html" class="geodir-category-img_item">
                                                <img src="images/agency/agent/1.jpg" alt="">
                                                <ul class="list-single-opt_header_cat">
                                                    <li><span class="cat-opt color-bg">4 listings</span></li>
                                                </ul>
                                            </a>
                                            <div class="agent-card-social fl-wrap">
                                                <ul>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                <span class="re_stars-title">Excellent</span></div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <div class="card-verified tolt" data-microtip-position="left"
                                                data-tooltip="Verified"><i class="fal fa-user-check"></i></div>
                                            <div class="agent_card-title fl-wrap">
                                                <h4><a href="agent-single.html">Anna Lips</a></h4>
                                                <h5><a href="agency-single.html">CondorHome RealEstate agency</a></h5>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                                pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur
                                                nulla.</p>
                                            <div class="geodir-category-footer fl-wrap">
                                                <a href="agent-single.html"
                                                    class="btn float-btn color-bg small-btn">View Profile</a>
                                                <a href="mailto:yourmail@email.com" class="tolt ftr-btn"
                                                    data-microtip-position="left" data-tooltip="Write Message"><i
                                                        class="fal fa-envelope"></i></a>
                                                <a href="tel:123-456-7890" class="tolt ftr-btn"
                                                    data-microtip-position="left" data-tooltip="Call Now"><i
                                                        class="fal fa-phone"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <!--  agent card item end -->
                            </div>
                            <!-- slick-slide-item end-->
                            <!-- slick-slide-item -->
                            <div class="slick-slide-item">
                                <!--  agent card item -->
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img fl-wrap  agent_card">
                                            <a href="agent-single.html" class="geodir-category-img_item">
                                                <img src="images/agency/agent/3.jpg" alt="">
                                                <ul class="list-single-opt_header_cat">
                                                    <li><span class="cat-opt color-bg">6 listings</span></li>
                                                </ul>
                                            </a>
                                            <div class="agent-card-social fl-wrap">
                                                <ul>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-vk"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="3">
                                                <span class="re_stars-title">Average</span></div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <div class="card-verified cv_not tolt" data-microtip-position="left"
                                                data-tooltip="Not Verified"><i class="fal fa-minus-octagon"></i></div>
                                            <div class="agent_card-title fl-wrap">
                                                <h4><a href="agent-single.html">Jane Kobart</a></h4>
                                                <h5><a href="agency-single.html">Mavers RealEstate agency</a></h5>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                                pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur
                                                nulla.</p>
                                            <div class="geodir-category-footer fl-wrap">
                                                <a href="agent-single.html"
                                                    class="btn float-btn color-bg small-btn">View Profile</a>
                                                <a href="mailto:yourmail@email.com" class="tolt ftr-btn"
                                                    data-microtip-position="left" data-tooltip="Write Message"><i
                                                        class="fal fa-envelope"></i></a>
                                                <a href="tel:123-456-7890" class="tolt ftr-btn"
                                                    data-microtip-position="left" data-tooltip="Call Now"><i
                                                        class="fal fa-phone"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <!--  agent card item end -->
                            </div>
                            <!-- slick-slide-item end-->
                            <!-- slick-slide-item -->
                            <div class="slick-slide-item">
                                <!--  agent card item -->
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img fl-wrap  agent_card">
                                            <a href="agent-single.html" class="geodir-category-img_item">
                                                <img src="images/agency/agent/5.jpg" alt="">
                                                <ul class="list-single-opt_header_cat">
                                                    <li><span class="cat-opt color-bg">22 listings</span></li>
                                                </ul>
                                            </a>
                                            <div class="agent-card-social fl-wrap">
                                                <ul>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-vk"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                <span class="re_stars-title">Excellent
                                                </span>
                                            </div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <div class="card-verified tolt" data-microtip-position="left"
                                                data-tooltip="Verified"><i class="fal fa-user-check"></i></div>
                                            <div class="agent_card-title fl-wrap">
                                                <h4><a href="agent-single.html">Bill Trust</a></h4>
                                                <h5><a href="agency-single.html">Your Sweet Home agency</a></h5>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                                pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur
                                                nulla.</p>
                                            <div class="geodir-category-footer fl-wrap">
                                                <a href="agent-single.html"
                                                    class="btn float-btn color-bg small-btn">View Profile</a>
                                                <a href="mailto:yourmail@email.com" class="tolt ftr-btn"
                                                    data-microtip-position="left" data-tooltip="Write Message"><i
                                                        class="fal fa-envelope"></i></a>
                                                <a href="tel:123-456-7890" class="tolt ftr-btn"
                                                    data-microtip-position="left" data-tooltip="Call Now"><i
                                                        class="fal fa-phone"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <!--  agent card item end -->
                            </div>
                            <!-- slick-slide-item end-->
                            <!-- slick-slide-item -->
                            <div class="slick-slide-item">
                                <!--  agent card item -->
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img fl-wrap  agent_card">
                                            <a href="agent-single.html" class="geodir-category-img_item">
                                                <img src="images/agency/agent/6.jpg" alt="">
                                                <ul class="list-single-opt_header_cat">
                                                    <li><span class="cat-opt color-bg">12 listings</span></li>
                                                </ul>
                                            </a>
                                            <div class="agent-card-social fl-wrap">
                                                <ul>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                                <span class="re_stars-title">Good</span></div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <div class="card-verified tolt" data-microtip-position="left"
                                                data-tooltip="Verified"><i class="fal fa-user-check"></i></div>
                                            <div class="agent_card-title fl-wrap">
                                                <h4><a href="agent-single.html">Martin Smith</a></h4>
                                                <h5><a href="agency-single.html">Mavers RealEstate agency</a></h5>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                                pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur
                                                nulla.</p>
                                            <div class="geodir-category-footer fl-wrap">
                                                <a href="agent-single.html"
                                                    class="btn float-btn color-bg small-btn">View Profile</a>
                                                <a href="mailto:yourmail@email.com" class="tolt ftr-btn"
                                                    data-microtip-position="left" data-tooltip="Write Message"><i
                                                        class="fal fa-envelope"></i></a>
                                                <a href="tel:123-456-7890" class="tolt ftr-btn"
                                                    data-microtip-position="left" data-tooltip="Call Now"><i
                                                        class="fal fa-phone"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <!--  agent card item end -->
                            </div>
                            <!-- slick-slide-item end-->
                        </div>
                        <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                        <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div>
                    </div>
                </div>
            </section>
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
                                        <div class="num" data-content="0" data-num="578">0</div>
                                    </div>
                                </div>
                                <h6>Agents and Agencys</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="12168">0</div>
                                    </div>
                                </div>
                                <h6>Happy Customers Every Year</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="2172">0</div>
                                    </div>
                                </div>
                                <h6>Won Awards</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="732">0</div>
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
            <section class="gray-bg ">
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
                                    <div class="popup-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                    <div class="review-owner fl-wrap">Jessie Wilcox</div>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                </div>
                                <div class="text-carousel-content fl-wrap">
                                    <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis
                                        cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit
                                        amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut
                                        laoreet dolore luptatum."</p>
                                    <a href="#" class="testim-link color-bg">Via Facebook</a>
                                </div>
                            </div>
                        </div>
                        <!--slick-item end -->
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item fl-wrap">
                                <div class="text-carousel-item-header fl-wrap">
                                    <div class="popup-avatar"><img src="images/avatar/2.jpg" alt=""></div>
                                    <div class="review-owner fl-wrap">Austin Harisson</div>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                                </div>
                                <div class="text-carousel-content fl-wrap">
                                    <p> "Feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui
                                        blandit praesent luptatum zzril delenit augue duis dolore te odio dignissim qui
                                        blandit praesent blandit praesent luptatum zzril.Vulputate urna. Nulla tristique
                                        mi a massa convallis."</p>
                                    <a href="#" class="testim-link color-bg">Via Twitter</a>
                                </div>
                            </div>
                        </div>
                        <!--slick-item end -->
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item fl-wrap">
                                <div class="text-carousel-item-header fl-wrap">
                                    <div class="popup-avatar"><img src="images/avatar/3.jpg" alt=""></div>
                                    <div class="review-owner fl-wrap">Garry Colonsi</div>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                                </div>
                                <div class="text-carousel-content fl-wrap">
                                    <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis
                                        cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit
                                        amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut
                                        laoreet dolore luptatum."</p>
                                    <a href="#" class="testim-link color-bg">Via Facebook</a>
                                </div>
                            </div>
                        </div>
                        <!--slick-item end -->
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item fl-wrap">
                                <div class="text-carousel-item-header fl-wrap">
                                    <div class="popup-avatar"><img src="images/avatar/4.jpg" alt=""></div>
                                    <div class="review-owner fl-wrap">Antony Moore</div>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                </div>
                                <div class="text-carousel-content fl-wrap">
                                    <p> "Feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui
                                        blandit praesent luptatum zzril delenit augue duis dolore te odio dignissim qui
                                        blandit praesent blandit praesent luptatum zzril.Vulputate urna. Nulla tristique
                                        mi a massa convallis."</p>
                                    <a href="#" class="testim-link color-bg">Via Twitter</a>
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
        <div class="subscribe-wrap fl-wrap">
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
        </div>
        <!-- subscribe-wrap end -->
        <!-- footer -->
        <footer class="main-footer fl-wrap">
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
        </footer>
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
    <div class="secondary-nav">
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
    </div>
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

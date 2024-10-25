<div>
    <div class="content">
        <!--  section  -->
        <section class="hidden-section single-par2  " data-scrollax-parent="true">
            <div class="bg-wrap bg-parallax-wrap-gradien">
                <div class="bg par-elem" data-bg="{{ asset('img/slider-2.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
            </div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <h2><span>Browse Through Our Artisans</span></h2>
                    {{-- <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4> --}}
                </div>
                <div class="scroll-down-wrap">
                    <div class="mousey">
                        <div class="scroller"></div>
                    </div>
                    <span>Scroll Down To Discover</span>
                </div>
            </div>
        </section>
        <!--  section  end-->
        <!-- breadcrumbs-->
        <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
            <div class="container">
                <div class="breadcrumbs-list">
                    <a href="#">Home</a><a href="#">Listings</a>
                </div>
                <div class="share-holder hid-share">
                    <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                    <div class="share-container  isShare"></div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs end -->
        <!-- col-list-wrap -->
        <section class="gray-bg small-padding ">
            <div class="container">
                <div class="row">
                    <!-- search sidebar-->
                    <div class="col-md-4">
                        <div class="mob-nav-content-btn  color-bg show-list-wrap-search ntm fl-wrap">Show  Filters</div>
                        <div class="fl-wrap lws_mobile">
                            <div class="list-searh-input-wrap-title   fl-wrap"><i class="far fa-sliders-h"></i><span>Search Filters</span></div>
                            <div class="block-box fl-wrap search-sb" id="filters-column">
                                <!-- listsearch-input-item-->
                                <div class="listsearch-input-item">
                                    <label>Status</label>
                                    <select data-placeholder="Status" class="chosen-select on-radius no-search-select" >
                                        <option>Any Status</option>
                                        <option>For Rent</option>
                                        <option>For Sale</option>
                                    </select>
                                </div>
                                <!-- listsearch-input-item end-->
                                <!-- listsearch-input-item -->
                                <div class="listsearch-input-item">
                                    <label>Keywords</label>
                                    <input type="text" onClick="this.select()" placeholder="Address , Street , State..." value=""/>										
                                </div>
                                <!-- listsearch-input-item end-->
                                <!-- listsearch-input-item -->
                                <div class="listsearch-input-item">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Cities</label>
                                            <select data-placeholder="All Cities" class="chosen-select on-radius no-search-select" >
                                                <option>All Cities</option>
                                                <option>New York</option>
                                                <option>London</option>
                                                <option>Paris</option>
                                                <option>Kiev</option>
                                                <option>Moscow</option>
                                                <option>Dubai</option>
                                                <option>Rome</option>
                                                <option>Beijing</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Categories</label>
                                            <select data-placeholder="Categories" class="chosen-select on-radius no-search-select" >
                                                <option>All Categories</option>
                                                <option>House</option>
                                                <option>Apartment</option>
                                                <option>Hotel</option>
                                                <option>Villa</option>
                                                <option>Office</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- listsearch-input-item end-->											
                                <!-- listsearch-input-item -->
                                <div class="listsearch-input-item">
                                    <div class="price-rage-item fl-wrap">
                                        <span class="pr_title">Price:</span>
                                        <input type="text" class="price-range-double" data-min="100" data-max="100000"  name="price-range2"  data-step="100" value="1" data-prefix="$">
                                    </div>
                                </div>
                                <!-- listsearch-input-item end-->
                                <!-- listsearch-input-item -->
                                <div class="listsearch-input-item">
                                    <div class="price-rage-item fl-wrap">
                                        <span class="pr_title">Area:</span>                   
                                        <input type="text" class="price-range-double" data-min="1" data-max="1000"  name="price-range2"  data-step="1" value="1" data-prefix="">
                                    </div>
                                </div>
                                <!-- listsearch-input-item end-->										
                                <!-- listsearch-input-item -->
                                <div class="listsearch-input-item">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Bedrooms</label>
                                            <select data-placeholder="Bedrooms" class="chosen-select on-radius no-search-select" >
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Bathrooms</label>
                                            <select data-placeholder="Bathrooms" class="chosen-select on-radius no-search-select" >
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- listsearch-input-item end-->										
                                <!-- listsearch-input-item -->
                                <div class="listsearch-input-item">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Floors</label>
                                            <select data-placeholder="Bathrooms" class="chosen-select on-radius no-search-select" >
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Property Id</label>
                                            <input type="text" onClick="this.select()" placeholder="Id" value=""/>												
                                        </div>
                                    </div>
                                </div>
                                <!-- listsearch-input-item end-->										
                                <!-- listsearch-input-item-->
                                <div class="listsearch-input-item">
                                    <label>Amenities</label>
                                    <div class=" fl-wrap filter-tags">
                                        <ul class="no-list-style">
                                            <li>
                                                <input id="check-aa" type="checkbox" name="check">
                                                <label for="check-aa">Elevator in building</label>
                                            </li>
                                            <li>
                                                <input id="check-b" type="checkbox" name="check">
                                                <label for="check-b"> Laundry Room</label>
                                            </li>
                                            <li>
                                                <input id="check-c" type="checkbox" name="check" checked>
                                                <label for="check-c">Equipped Kitchen</label>
                                            </li>
                                            <li>
                                                <input id="check-d" type="checkbox" name="check">
                                                <label for="check-d">Air Conditioned</label>
                                            </li>
                                            <li>
                                                <input id="check-d2" type="checkbox" name="check" checked>
                                                <label for="check-d2">Parking</label> 
                                            </li>
                                            <li>
                                                <input id="check-d3" type="checkbox" name="check" checked>
                                                <label for="check-d3">Swimming Pool</label> 
                                            </li>
                                            <li>   
                                                <input id="check-d4" type="checkbox" name="check">
                                                <label for="check-d4">Fitness Gym</label>
                                            </li>
                                            <li>   
                                                <input id="check-d5" type="checkbox" name="check">
                                                <label for="check-d5">Security</label>
                                            </li>
                                            <li>   
                                                <input id="check-d6" type="checkbox" name="check">
                                                <label for="check-d6">Garage Attached</label>
                                            </li>
                                            <li>   
                                                <input id="check-d7" type="checkbox" name="check">
                                                <label for="check-d7">Back yard</label>
                                            </li>
                                            <li>   
                                                <input id="check-d8" type="checkbox" name="check">
                                                <label for="check-d8">Fireplace</label>
                                            </li>
                                            <li>   
                                                <input id="check-d9" type="checkbox" name="check">
                                                <label for="check-d9">Window Covering</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- listsearch-input-item end--> 										
                                <div class="msotw_footer">
                                    <a href="#" class="btn small-btn float-btn color-bg">Search</a>
                                    <div class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Reset Filters</div>
                                </div>
                            </div>
                            <a class="back-tofilters color-bg custom-scroll-link fl-wrap scroll-to-fixed-fixed" href="#filters-column">Back to filters <i class="fas fa-caret-up"></i></a>
                        </div>
                    </div>
                    <!-- search sidebar end-->
                    <div class="col-md-8">
                        <!-- list-main-wrap-header-->
                        <div class="list-main-wrap-header box-list-header fl-wrap">
                            <!-- list-main-wrap-title-->
                            <div class="list-main-wrap-title">
                                <h2>Results For : <span>New York </span><strong>8</strong></h2>
                            </div>
                            <!-- list-main-wrap-title end-->
                            <!-- list-main-wrap-opt-->
                            <div class="list-main-wrap-opt">
                                <!-- price-opt-->
                                <div class="price-opt">
                                    <span class="price-opt-title">Sort   by:</span>
                                    <div class="listsearch-input-item">
                                        <select data-placeholder="Popularity" class="chosen-select no-search-select" >
                                            <option>Popularity</option>
                                            <option>Average rating</option>
                                            <option>Price: low to high</option>
                                            <option>Price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- price-opt end-->
                                <!-- price-opt-->
                                <div class="grid-opt">
                                    <ul class="no-list-style">
                                        <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="far fa-th"></i></span></li>
                                        <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="far fa-list"></i></span></li>
                                    </ul>
                                </div>
                                <!-- price-opt end-->
                            </div>
                            <!-- list-main-wrap-opt end-->                    
                        </div>
                        <!-- list-main-wrap-header end-->					
                        <!-- listing-item-wrap-->
                        <div class="listing-item-container  box-list_ic fl-wrap">
                            <!-- listing-item -->
                            @forelse($users as $user)
                                {{-- <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img fl-wrap">
                                            <a href="listing-single.html" class="geodir-category-img_item">
                                                <img src="images/all/3.jpg" alt="">
                                                <div class="overlay"></div>
                                            </a>
                                            <div class="geodir-category-location">
                                                <a href="#" class="single-map-item tolt" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"   data-microtip-position="top-left" data-tooltip="On the map"><i class="fas fa-map-marker-alt"></i> <span>  70 Bright St New York, USA</span></a>
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
                                            <h3 class="title-sin_item"><a href="listing-single.html">Gorgeous House For Sale</a></h3>
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
                                </div> --}}
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
                            @empty
                            @endforelse
                        </div>
                        <!-- listing-item-wrap end-->
                        <!-- pagination-->
                     
                        <div class="pagination">
                            {{ $users->links()}}
                        </div>
                        
                        <!-- pagination end-->						
                    </div>
                    <!-- col-md 8 end -->
                </div>
            </div>
        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
</div>

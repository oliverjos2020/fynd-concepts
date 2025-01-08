<div>
    <div class="content">
        <!--  section  -->
        <section class="hidden-section single-par2 " wire:ignore data-scrollax-parent="true">
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
                    <a href="/">Home</a><a href="#">Listings</a>
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

                                <div class="listsearch-input-item">
                                    <label>Keywords</label>
                                    <input type="text" wire:model.debounce.500ms="keywords" placeholder="What service are you looking for"/>
                                </div>

                                <div wire:ignore>
                                    <label for="state" class="my-label">State</label>
                                    <select wire:model="state" class="my-select">
                                        <option value="">Select State</option>
                                        @forelse ($states as $state)
                                            <option value="{{$state->slug}}">{{$state->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>

                                <div>
                                    <label class="my-label">LGA</label>
                                    <select class="my-select" wire:model="lga">
                                        <option value="">Select lga</option>
                                        @forelse ($lgas as $lga)
                                            <option value="{{$lga->slug}}">{{$lga->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>

                                <div>
                                    <label class="my-label">Service</label>
                                    <select class="my-select" wire:model="service">
                                        <option value="">Select a Service</option>
                                        @forelse ($services as $service)
                                            <option value="{{$service->slug}}">{{$service->service}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                                <div>
                                    <label class="my-label">Sub Service</label>
                                    <select class="my-select" wire:model="subservice">
                                        <option value="">Select a Service</option>
                                        <@forelse ($subservices as $subservice)
                                                <option value="{{$subservice->slug}}">{{$subservice->subservice}}</option>
                                            @empty

                                            @endforelse
                                    </select>
                                </div>


                                <div class="msotw_footer">
                                    {{-- <a class="btn small-btn float-btn color-bg">Search</a> --}}
                                    <div wire:click="resetFilter" class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Reset Filters</div>
                                </div>
                            </div>
                            {{-- <a class="back-tofilters color-bg custom-scroll-link fl-wrap scroll-to-fixed-fixed" href="#filters-column">Back to filters <i class="fas fa-caret-up"></i></a> --}}
                        </div>
                    </div>
                    <!-- search sidebar end-->
                    <div class="col-md-8">
                        <!-- list-main-wrap-header-->
                        <div class="list-main-wrap-header box-list-header fl-wrap">
                            <!-- list-main-wrap-title-->
                            <div class="list-main-wrap-title">
                                <h2>Results found: <strong>{{$users->count()}}</strong></h2>
                            </div>
                            <!-- list-main-wrap-title end-->
                            <!-- list-main-wrap-opt-->
                            <div class="list-main-wrap-opt">
                                <!-- price-opt-->
                                {{-- <div class="price-opt" wire:ignore>
                                    <span class="price-opt-title">Sort   by:</span>
                                    <div class="listsearch-input-item">
                                        <select data-placeholder="Popularity" class="chosen-select no-search-select" >
                                            <option>Popularity</option>
                                            <option>Average rating</option>
                                            <option>Price: low to high</option>
                                            <option>Price: high to low</option>
                                        </select>
                                    </div>
                                </div> --}}
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

                                            <a wire:click="addFavorite({{$user->id}}, {{$user->is_favorite ? 1 : 0 }})" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="{{ $user->is_favorite ? 'Remove' : 'Add'}}">
                                                <span>
                                                    <i class="{{ $user->is_favorite ? 'fa fa-heart' : 'fal fa-heart'}}"></i>
                                                </span>
                                            </a>
                                            <div class="geodir-category-listing_media-list">
                                                <span><i class="fas fa-camera"></i> {{$user->photos->count()}}</span>
                                            </div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <h3 class="title-sin_item"><a href="/artisan/{{$user->id}}">{{$user->business_name}}</a></h3>
                                            <p>{{ Str::limit($user->bio, 135, '...') }}</p>

                                            <div class="geodir-category-footer fl-wrap">
                                                <a href="/" class="gcf-company">
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
                                                        }elseif($myrating >= 5){
                                                            $rating = 'Excellent';
                                                        }
                                                    @endphp
                                                    <img src="{{url($user->passport ?? 'logo/logo-blue.png')}}" alt=""><span>By {{$user->name}}</span></a>
                                                <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="{{$rating}}"
                                                    data-starrating2="{{$myrating}}"></div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @empty
                            <div class="col-md-12 my-warning">
                                No record available
                            </div>
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

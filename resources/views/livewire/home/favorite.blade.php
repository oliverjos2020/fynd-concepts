<div>
    <div class="content">
        <!--  section  -->
        <section class="hidden-section single-par2" wire:ignore data-scrollax-parent="true">
            <div class="bg-wrap bg-parallax-wrap-gradien">
                <div class="bg par-elem"  data-bg="{{ asset('img/slider-2.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
            </div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <h2><span>My Favorites</span></h2>
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
                    <a href="/">Home</a><span> Favorite</span>
                </div>
                {{-- <div class="share-holder hid-share">
                    <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                    <div class="share-container  isShare"></div>
                </div> --}}
            </div>
        </div>
        <!-- breadcrumbs end -->
        <!-- col-list-wrap -->
        <section class="gray-bg small-padding ">
            <div class="container">
                <div class="grid-item-holder gallery-items gisp fl-wrap">
                    @forelse($favorites as $favorite)
                        <div class="gallery-item {{ $favorite->service->slug ?? '' }}">
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="/artisan/{{ $favorite->id }}" class="geodir-category-img_item">
                                            <img src="{{ url($favorite->photos->first()->url ?? 'logo/auto-logo.png') }}"
                                                alt="fynd concepts">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#" class="single-map-item tolt"
                                                data-newlatitude="40.72956781" data-newlongitude="-73.99726866"
                                                data-microtip-position="top-left" data-tooltip="On the map"><i
                                                    class="fas fa-map-marker-alt"></i> <span>
                                                    {{ Str::limit($favorite->work_address, 35, '...') }}
                                                </span></a>
                                        </div>
                                        <ul class="list-single-opt_header_cat">
                                            <li><a href="#"
                                                    class="cat-opt blue-bg">{{ $favorite->service->service ?? '' }}</a>
                                            </li>
                                        </ul>
                                        <a wire:click="addFavorite({{$favorite->id}}, {{$favorite->is_favorite ? 1 : 0 }})" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="{{ $favorite->is_favorite ? 'Remove' : 'Add'}}">
                                            <span>
                                                <i class="{{ $favorite->is_favorite ? 'fa fa-heart' : 'fal fa-heart'}}"></i>
                                            </span>
                                        </a>
                                        <div class="geodir-category-listing_media-list">
                                            <span><i class="fas fa-camera"></i>
                                                {{ $favorite->photos->count() }}</span>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <h3 class="title-sin_item"><a
                                                href="/artisan/{{ $favorite->id }}">{{ $favorite->business_name }}</a>
                                        </h3>
                                        <p>{{ Str::limit($favorite->bio, 135, '...') }}</p>

                                        <div class="geodir-category-footer fl-wrap">
                                            <a href="/" class="gcf-company">
                                                @php
                                                    $averageRating = App\Models\Review::where(
                                                        'artisan_id',
                                                        $favorite->id,
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
                                                <img src="{{ url($favorite->passport ?? 'logo/logo-blue.png') }}"
                                                    alt=""><span>By {{ $favorite->name }}</span></a>
                                            <div class="listing-rating card-popup-rainingvis tolt"
                                                data-microtip-position="top" data-tooltip="{{ $rating }}"
                                                data-starrating2="{{ $myrating }}"></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>

                    @empty
                        <div class="alert alert-danger">No artisan added to favorite</div>
                    @endforelse
                </div>
            </div>
            <div class="limit-box fl-wrap"></div>
        </section>
    </div>
</div>

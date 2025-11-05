<section class="services section-padding pb-0 pt-100" id="research">
    <div class="container">
        <div class="sec-head mb-40">
            <div  >
                <h3 class="fw-600 fz-30 text-u d-rotate wow  mb-30">SI Research Lab</h3>
                <div class="">
                    <div class="d-flex align-items-center gap-2">
                        <div class=" vi-more">
                    <a href="{{ env('LAB_URL') }}/research" class="butn butn-sm butn-bord radius-30">
                        <span>View All SI Research</span>
                    </a>
                    <i class="icon fas fa-arrow-right"></i>
                </div>
                    </div>
                </div>
            </div>
        </div>

        @if($researches->count() > 0)
        <div class="serv-swiper" data-carousel="swiper" data-loop="true" data-space="40">
            <div id="content-carousel-container-unq-serv" class="swiper-container" data-swiper="container" style="overflow: hidden">
                <div class="swiper-wrapper">
                    @foreach($researches as $research)
                    <div class="swiper-slide">
                        <div class="item-box">
                            <div class="  mb-40 opacity-5">
                                @if($research->image_url)
                                    <img class="research-img-300" src="{{ $research->image_url }}" alt="{{ $research->title }}"  />
                                @else
                                    <img style="height: 300px;width: 100%;object-fit: cover;" src="{{ env('LAB_URL') }}/assets/img/placeholder.svg" alt="{{ $research->title }}" />
                                @endif
                            </div>
                            <h5 class="mb-15">
                                {{ $research->title }}
                            </h5>
                            <p>
                                {{ Str::limit($research->description, 120) }}
                            </p>
                            <a href="{{ route('research.show', $research->id) }}" class="rmore mt-30">
                                <span class="sub-title text-white">Read More</span>
                                <img src="{{ asset('assets/imgs/arrow-right.png') }}" alt="" class="icon-img-20 ml-5" />
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-5">
            <h5>No research available at the moment</h5>
            <p class="text-muted">Check back later for research updates.</p>
        </div>
        @endif
    </div>
</section>

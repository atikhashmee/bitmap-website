@extends('site.files.style-layout')

@section('contents')
      <!--Content -->
                    <div class="content full-height hidden-item">
                        <!--hero-title -->
                        <div class="hero-title fl-wrap first-tile_load">
                            <div class="container">
                                <div class="section-title fl-wrap">
                                    <h2>The<span>Side</span>   <br>Architecture  Studio</h2>
                                    <p> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                    <div class="section-title_category"><a href="#">Architecture</a> <a href="#">Interior</a> </div>
                                </div>
                            </div>
                        </div>
                        <!-- media-container-->
                        <div class="media-container">
                            <!--multi-slideshow-wrap_1 -->
                            <div class="multi-slideshow-wrap_1 ms-wrap multi-slideshow-wrap_fs">
								<div class="sec-lines"></div>
                                <div class="pr-bg"></div>
                                <div class="full-height fl-wrap">
                                    <!--ms-container-->
                                    <div class="multi-slideshow_fs ms-container fl-wrap full-height">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <!--ms_item-->
                                                <div class="swiper-slide">
                                                    <div class="ms-item_fs fl-wrap">
                                                        <div class="bg" data-bg="{{  asset("siteasset/img/bg/14.jpg") }}"></div>
                                                        <div class="overlay"></div>
                                                    </div>
                                                </div>
                                                <!--ms_item end-->
                                                <!--ms_item-->
                                                <div class="swiper-slide ">
                                                    <div class="ms-item_fs fl-wrap">
                                                        <div class="bg" data-bg="{{  asset("siteasset/img/bg/10.jpg") }}"></div>
                                                        <div class="overlay"></div>
                                                    </div>
                                                </div>
                                                <!--ms_item end-->
                                                <!--ms_item-->
                                                <div class="swiper-slide">
                                                    <div class="ms-item_fs fl-wrap">
                                                        <div class="bg" data-bg="{{  asset("siteasset/img/bg/9.jpg") }}"></div>
                                                        <div class="overlay"></div>
                                                    </div>
                                                </div>
                                                <!--ms_item end-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--ms-container end-->
                                </div>
                            </div>
                            <!--multi-slideshow-wrap_1 end-->
                        </div>
                        <!-- media-container end-->
                        <div class="hero-start-link   dark-bg hero-start-link_mlt bedec_hstl bot-element">
                            <div class="scroll-down-wrap">
                                <div class="mousey">
                                    <div class="scroller scroller2"></div>
                                </div>
                                <span>Click to  Start discover</span>
                            </div>
                            <a href="portfolio.html" class="ajax color-bg"><i class="fal fa-long-arrow-right"></i></a>
                        </div>
                        <!--hero-title end -->
                    </div>
                    <!-- content  end -->
@endsection

               
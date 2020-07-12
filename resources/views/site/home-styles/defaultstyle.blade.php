@extends('site.files.style-layout')

@section('contents')
      <!--Content -->
                    <div class="content full-height hidden-item home-half-slider">
                        <div class="hero-canvas-wrap">
                            <div class="dots gallery__dots" data-dots=""></div>
                        </div>
                        <!-- option-panel-->  
                        <div class="option-panel bot-element">
                            <a href="{{url("/About")}}" class="ajax start-btn color-bg"> Start explore <i class="fal fa-long-arrow-right"></i></a>
                            <div class="swiper-counter">
                                <div id="current">01</div>
                                <div id="total"></div>
                            </div>
                            <div class="slide-progress-container">
                                <div class="slide-progress-warp">
                                    <div class="slide-progress color-bg"></div>
                                </div>
                            </div>
                        </div>
                        <!--option-panel end -->                
                        <!-- hero-slider-wrap --> 
                        <div class="hero-slider-wrap fl-wrap full-height">
                            <div class="hero-slider fs-gallery-wrap fl-wrap full-height">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach ($sliders as $slider)
                                            <!-- swiper-slide-->
                                        <div class="swiper-slide">
                                            <div class="half-hero-wrap">
                                                <div class="pr-bg"></div>
                                                <div class="rotate_text">{{  date("Y-M-d", strtotime($slider->project_date) )  }}</div>
                                                <h1> <?=Foo::homeSliderFontStyle($slider->slider_Title)?>  </h1>
                                                <h4>{{  $slider->slider_Description }}</h4>
                                                <div class="clearfix"></div>
                                                <a href="#" class="half-hero-wrap_link ajax">View Project <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- swiper-slide end-->
                                        @endforeach
                                       
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="hero-slider_control-wrap bot-element">
                                <div class="hero-slider_control hero-slider-button-next"><span>Next<i class="fal fa-angle-right"></i></span> </div>
                                <div class="hero-slider_control hero-slider-button-prev"><span><i class="fal fa-angle-left"></i>Prev </span></div>
                            </div>
                            <div class="hero-slider-wrap_pagination hlaf-slider-pag"></div>
                        </div>
                        <!-- hero-slider-wrap  end--> 
                        <!-- hero-slider-img--> 
                        <div class="hero-slider-img hero-slider-wrap_halftwo">
                         <div class="sec-lines"></div>
                            <div class="swiper-container">
                                <div class="swiper-wrapper" >

                                    @foreach ($sliders as $sliderimage)
                                         <!-- swiper-slide-->
                                    <div class="swiper-slide">
                                    <div class="bg" 
                                        data-bg="{{  asset("storage/".$sliderimage->image_link)}}"
                                    ></div>
                                        <div class="overlay"></div>
                                    </div>
                                    <!-- swiper-slide end-->
                                    @endforeach                                                                
                                </div>
                            </div>
                        </div>
                        <!-- hero-slider-img  end--> 
                    </div>
                    <!-- content  end --> 

@endsection

               
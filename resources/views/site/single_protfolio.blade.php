 
 @extends('site.pages.pages-layout')

@section('page-contents')
 
 
 

                    <!--content--> 
                    <div class="content">
                        <!--section--> 
                        <section class="hero-section dark-bg"  data-scrollax-parent="true">
                            <div class="hero-canvas-wrap fs-canvas first-tile_load">
                                <div class="dots gallery__dots" data-dots=""></div>
                            </div>
                            <div class="hero-bg">
                                <div class="bg par-elem"  data-bg="{{ $details->project_cover_photo }}" data-scrollax="properties: { translateY: '30%' }"></div>
                                <div class="overlay"></div>
                                <div class="pr-bg"></div>
                                <div class="hero-bg-dec"><span></span></div>
                            </div>
                            <div class="container">
                                <div class="section-title fl-wrap first-tile_load">
                                    <h2>{{ $details->project_title }}</h2>
                                    <p> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                    <div class="section-title_category"><a href="#">Architecture</a> <a href="#">Design</a> </div>
                                </div>
                            </div>
                            <div class="hero-start-link bot-element">
                                <div class="scroll-down-wrap">
                                    <div class="mousey">
                                        <div class="scroller"></div>
                                    </div>
                                    <span>Scroll Down to discover</span>
                                </div>
                                <a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-long-arrow-down"></i></a>
                            </div>
                        </section>
                        <!--section end--> 
                        <!--section  --> 
                        <section class="no-padding-bottom " id="sec1">
                            <!-- container-->  
                            <div class="container">
                                <!-- det-wrap-->  
                                <div class="fl-wrap det-wrap">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="fixed-column fl-wrap">
                                                <div class="pr-bg pr-bg-white"></div>
                                                <div class="pr-title">
                                                    About Project
                                                    <span>
                                                    {{ $details->about_project }}
                                                       
                                                    </span>
                                                </div>
                                                <ul class="pr-list dark-bg">
                                                    <li><span>Date :</span> {{ $details->date }} </li>
                                                    <li><span>Client :</span>  {{ $details->client_name }} </li>
                                                    <li><span>Status :</span> Completed </li>
                                                    <li><span>Location : </span>  <a href="https://goo.gl/maps/UzN5m" target="_blank"> {{ $details->project_location }}  </a></li>
                                                </ul>
                                                <div class="fixed-column-top"><i class="fal fa-long-arrow-up"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 first-tile_load">
                                            <!-- tabs-container-->  
                                            <div id="tabs-container" class="fl-wrap">
                                                <div class="tabs-counter">
                                                    <span>0</span>
                                                    <div class="tc_item">1</div>
                                                </div>
                                                <ul class="tabs-menu fl-wrap">
                                                    <li class="selectedLava"><a href="#tab-1" data-tabnum="1"><span>01.</span>Details</a></li>
                                                    <li><a href="#tab-2" data-tabnum="2"><span>02.</span>Video Presentation</a></li>
                                                    <li><a href="#tab-3" data-tabnum="3"><span>03.</span>Plans</a></li>
                                                </ul>
                                                <!-- tab-content--> 
                                                <div id="tab-1" class="tab-content">
                                                    <h3 class="pr-subtitle  "> Gallery</h3>
                                                    <!-- portfolio start -->
                                                    <div class="gallery-items min-pad  lightgallery three-column fl-wrap">
                                                          @foreach ($images as $image)
                                                                 <!-- gallery-item-->
                                                        <div class="gallery-item">
                                                            <div class="grid-item-holder">
                                                                <a href="{{ asset("storage/".$image->images) }}" class="fet_pr-carousel-box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                                                <img  src="{{ asset("storage/".$image->images) }}"    alt="">
                                                            </div>
                                                        </div>
                                                        <!-- gallery-item end-->
                                                            @endforeach
                                                        
                                                       
                                                      
                                                      
                                                        									
                                                    </div>
                                                    <!-- portfolio end --> 
                                                    <h3 class="pr-subtitle mar-top">About Project </h3>
                                                    <p>
                                                       {{ $details->about_project }}
                                                    </p>

                                                    <h3 class="pr-subtitle mar-top">Project  Description</h3>
                                                    <p>
                                                       {{ $details->description_project }}
                                                    </p>

                                                      <h3 class="pr-subtitle mar-top"> Frequently Asked Question</h3>
                                                    <!-- accordion-->                            
                                                    <div class="accordion mar-top">
                                                        @foreach ($faqs as $faq)
                                                            <a class="toggle act-accordion" href="#"> {{ $faq->title }} <span></span></a>
                                                        <div class="accordion-inner visible">
                                                            <p>
                                                               {{ $faq->description }}
                                                            </p>
                                                        </div>
                                                        @endforeach
                                                        
                                                        
                                                    </div>
                                                    <!-- accordion end -->  
                                                </div>
                                                <!-- tab-content end--> 
                                                <!-- tab-content--> 
                                                <div id="tab-2" class="tab-content">
                                                    <h3 class="pr-subtitle"> Project Presentation.</h3>
                                                    <p> 
                                                         {{ $details->video_description }}
                                                        </p>
                                                   
                                                    <div class="video-box fl-wrap">
                                                        <img src="{{ $details->project_cover_photo }}" class="respimg" alt="">
                                                        <a class="video-box-btn image-popup" href=" {{ $details->video_url }}"><i class="fas fa-play"></i></a>
                                                    </div>
                                                </div>
                                                <!-- tab-content end-->                                                      
                                                <!-- tab-content--> 
                                                <div id="tab-3" class="tab-content">
                                                    <h3 class="pr-subtitle">Plan and sketches of the project.</h3>
                                                    <div class="palns-gal fl-wrap lightgallery">
                                                        <!-- plans-gal_item--> 
                                                        <div class="plans-gal_item hov_zoom">
                                                            <img src="images/plans/1.jpg" alt="" class="respimg">
                                                            <a href="images/plans/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                                        </div>
                                                        <!-- plans-gal_item end-->
                                                        <!-- plans-gal_item--> 
                                                        <div class="plans-gal_item hov_zoom">
                                                            <img src="images/plans/2.jpg" alt="" class="respimg">
                                                            <a href="images/plans/2.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                                        </div>
                                                        <!-- plans-gal_item end-->
                                                        <!-- plans-gal_item--> 
                                                        <div class="plans-gal_item hov_zoom">
                                                            <img src="images/plans/3.jpg" alt="" class="respimg">
                                                            <a href="images/plans/3.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                                        </div>
                                                        <!-- plans-gal_item end-->                                                                                                           
                                                    </div>
                                                </div>
                                                <!-- tab-content end-->                                                     
                                            </div>
                                            <!-- tabs-container end-->  
                                            <div class="clearfix"></div>
                                            <span class="dec-border fl-wrap"></span>
                                            <a href="#" class="pr-view" target="_blank">View project <i class="fal fa-long-arrow-right"></i></a>
                                            <div class="pr-bg pr-bg-white"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- det-wrap end-->  
                            </div>
                            <!-- container end -->
                            <div class="clearfix"></div>
                            <div class="limit-box fl-wrap"></div>
                            <div class="content-nav_holder fl-wrap first-tile_load">
                                <div class="container">
                                    <div class="content-nav">
                                        <ul>
                                            <li>
                                                <a href="#" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span>Prev - Project Title</span></a>
                                                <div class="content-nav_mediatooltip cnmd_leftside"><img  src="images/folio/4.jpg"   alt=""></div>
                                            </li>
                                            <li>
                                                <a href="#" class="ajax list-folio_nav">
                                                <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="rn ajax"><span >Next - Project Title</span> <i class="fal fa-long-arrow-right"></i></a>
                                                <div class="content-nav_mediatooltip cnmd_rightside"><img  src="images/folio/5.jpg"   alt=""></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!--content end -->   

                    @endsection
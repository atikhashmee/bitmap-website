             
@extends('site.pages.pages-layout')

@section('page-contents')
                      <!-- content -->    
                    <div class="content dark-bg">
                        <div class="fixed-filter-panel bot-element in-filter_mobpanel">
                            <div class="fixed-filter-panel_title color-bg">
                                Works Filter <i class="fal fa-long-arrow-right"></i>
                            </div>
                            <div class="gallery-filters">
                                <a href="#" class="gallery-filter gallery-filter-active"  data-filter="*">All Works</a>
                                 @foreach ($pcate as $prot_category)
                                            <a href="#" class="gallery-filter" data-filter=".{{$prot_category->id}}">{{$prot_category->category_name}}</a>
                                        @endforeach
                                
                            </div>
                            <div class="folio-counter">
                                <div class="num-album"></div>
                                <div class="all-album"></div>
                            </div>
                        </div>
                        <!-- portfolio start -->
                        <div class="gallery-items min-pad   four-column fl-wrap ff_panel-conainer">
                            @php
                                         $i=0;
                                     @endphp
                                    @foreach ($Protfolios as $protfolio)
                                        <!-- gallery-item-->
                                           @php
                                               $i++;
                                           @endphp
                                        @if ( $i == 4)

                                             <div class="gallery-item gallery-item-second {{$protfolio->protfolio_categories_id}}">
                                        <div class="grid-item-holder">
                                          
                                                 <img  src="{{  asset("storage/".$protfolio->project_cover_photo) }}"    alt="">
                                           
                                            
                                            <div class="grid-det">
                                                <div class="grid-det_category"><a href="#">Architecture</a> <a href="#">Design</a></div>
                                                <div class="grid-det-item">
                                                    <a href="{{ url("/Protfolio/show/".$protfolio->id) }}" class="ajax grid-det_link">Go Details<i class="fal fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pr-bg pr-bg-white"></div>
                                    </div>
                                    <!-- gallery-item end-->
                                        @else

                                        <div class="gallery-item {{$protfolio->protfolio_categories_id}}">
                                        <div class="grid-item-holder">
                                          
                                                 <img  src="{{  asset("storage/".$protfolio->project_cover_photo) }}"    alt="">
                                            
                                            
                                            <div class="grid-det">
                                                <div class="grid-det_category"><a href="#">Architecture</a> <a href="#">Design</a></div>
                                                <div class="grid-det-item">
                                                    <a href="{{ url("/Protfolio/show/".$protfolio->id) }}" class="ajax grid-det_link">Go Details<i class="fal fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pr-bg pr-bg-white"></div>
                                    </div>
                                    <!-- gallery-item end-->
                                            
                                        @endif

                                   @endforeach
                                                                                   
                        </div>
                        <!-- portfolio end -->
                    </div>
                    <!-- content end --> 
                      
                    @endsection
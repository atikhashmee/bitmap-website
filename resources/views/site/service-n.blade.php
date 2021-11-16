@extends('site.pages.pages-layout')
@section('page-contents')
<!--content--> 

        <style >
            .col-wc_dec{
              height: 125px !important;
            }
             .service-bg-description{
                color: rgba(255, 255, 255, 0.85);
                text-align: right;
                max-width: 450px;
                float: right;
                line-height: 18px;
                font-size: 14px;
            }
        </style>
                    <div class="content">
                        <!--fixed-column-wrap-->
                        <div class="fixed-column-wrap">
                            <div class="pr-bg"></div>
                            <!--fixed-column-wrap-content-->
                            <div class="fixed-column-wrap-content">
                                <div class="scroll-nav-wrap color-bg">
                                    <div class="carnival">Scroll down</div>
                                    <div class="snw-dec">
                                        <div class="mousey">
                                            <div class="scroller"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg" data-bg="{{ asset('storage/'.$serviceBg->service_bg_img) }}"></div>
                                <div class="overlay"></div>
                                <div class="progress-bar-wrap bot-element">
                                    <div class="progress-bar"></div>
                                </div>
                                <!--fixed-column-wrap_title-->
                                <div class="fixed-column-wrap_title first-tile_load">
                                    <h2> {{ $serviceBg->service_headline }}</h2>
                                    <p class="service-bg-description content-style" >
                                      {{ $serviceBg->service_description }}
                                    </p>
                                </div>
                                <!--fixed-column-wrap_title end-->
                                <div class="fixed-column-dec"></div>
                            </div>
                            <!--fixed-column-wrap-content end-->
                        </div>
                        <!--fixed-column-wrap end-->
                        <!--column-wrap--> 
                        <div class="column-wrap">
                            <!--column-wrap-container -->   
                            <div class="column-wrap-container fl-wrap" style="padding-bottom:0px">
                                <div class="col-wc_dec">
                                    <div class="pr-bg pr-bg-white"></div>
                                </div>
                                {{-- <div class="col-wc_dec col-wc_dec2">
                                    <div class="pr-bg pr-bg-white"></div>
                                </div> --}}
                              
                               <style>
                            .rightslash::before{
                                content: "";
                                position: absolute;
                                width: 30px;
                                height: 40px;
                                top: 105px;
                                right: 80px;
                                border-right: 5px solid yellow;
                                transition: .2s;
                            }
                            .rightslash::after{
                                content: "";
                                position: absolute;
                                width: 30px;
                                top: 105px;
                                right: 80px;
                                height: 40px;
                                border-top: 5px solid yellow;
                                transition: .2s;
                            }
                            .leftslash::before{
                                content: "";
                                position: absolute;
                                width: 30px;
                                height: 40px;
                                 top: 105px;
                                left: 80px;
                                border-left: 5px solid yellow;
                                transition: .2s;
                            }
                            .leftslash::after{
                                content: "";
                                position: absolute;
                                width: 30px;
                                height: 40px;
                                top: 105px;
                                left: 80px;
                                border-top: 5px solid yellow;
                                  transition: .2s;
                            }
                            .rightslashbottom::before{
                                content: "";
                                position: absolute;
                                width: 30px;
                                height: 40px;
                                bottom: 105px;
                                right: 80px;
                                border-right: 5px solid yellow;
                                transition: .2s;
                            }
                            .rightslashbottom::after{
                                content: "";
                                position: absolute;
                                width: 30px;
                                height: 40px;
                                bottom: 105px;
                                right: 80px;
                                border-bottom: 5px solid yellow;
                                transition: .2s;
                            }
                            .leftslashbottom::before{
                                content: "";
                                position: absolute;
                                width: 30px;
                                height: 40px;
                                bottom: 105px;
                                left: 80px;
                                border-bottom: 5px solid yellow;
                                transition: .2s;
                            }
                            .leftslashbottom::after{
                                content: "";
                                position: absolute;
                                width: 30px;
                                height: 40px;
                                bottom: 105px;
                                left: 80px;
                                border-left: 5px solid yellow;
                                transition: .2s;
                            }

                            .team-box:hover  .leftslash::after {
                                top: 100px;
                                left: 80px;
                                border-top: 5px solid white;
                                z-index: 3;
                            }
                            .team-box:hover .leftslash::before{
                                 top: 100px;
                                 left: 75px;
                                 border-left: 5px solid white;
                                  z-index: 3;
                            }
                            .team-box:hover .leftslashbottom::before{
                                 border-bottom: 5px solid white;
                                 bottom: 100px;
                                 left: 80px;
                                  z-index: 3;
                            }
                            .team-box:hover .leftslashbottom::after{
                                border-left: 5px solid white;
                                bottom: 100px;
                                left: 75px;
                                 z-index: 3;
                            }
                            .team-box:hover   .rightslashbottom::before{
                                 bottom: 100px;
                                 right: 75px;
                                border-right: 5px solid white;
                                 z-index: 3;
                            }
                          .team-box:hover  .rightslashbottom::after{
                                 bottom: 100px;
                                 right: 80px;
                                border-bottom: 5px solid white;
                                 z-index: 3;
                          }
                          .team-box:hover .rightslash::after{
                                top: 100px;
                                right: 80px;
                                border-top: 5px solid white;
                                 z-index: 3;
                          }
                          .team-box:hover  .rightslash::before{
                                top: 100px;
                                right: 75px;
                                border-right: 5px solid white;
                                 z-index: 3;
                          }
                            .background-style{
                                width: 100%;
                                height:320px;
                                background-color: #000;
                            }
                            .team-box:hover  .icon-container{
                                font-size: 50px;
                                 bottom: 45%;
                            }
                            .icon-container{
                            position: absolute;
                            right: 46%;
                            z-index: 14;
                            color: white;
                            bottom: 50%;
                            font-size: 41px;
                            top: 42%;
                              }
                        </style>
                                <!--section--> 
                                <section id="sec2" class="small-padding">
                                    <div class="container">
                                        <div class="split-sceen-content_title fl-wrap">
                                            <div class="pr-bg pr-bg-white"></div>
                                            <h3>What We Do </h3>
                                          
                                        </div>
                                        <div class="row">
                                             <style >
                                                 @import url('https://fonts.googleapis.com/css?family=Nunito+Sans');
                                                 .service-work-title{
                                                      font-size: 21px;
                                                      margin: 5px;
                                                      font-family: 'Nunito Sans', sans-serif;
                                                      color: rgba(0,0,0,0.9);
                                                 }
                                                 .service-headline{
                                                     padding: 10px;
                                                    
                                                 }
                                                 .service-headline>h1{
                                                     font-size: 21px;
                                                      font-family: 'Nunito Sans', sans-serif;
                                                 }
                                                 .service-headline>p{
                                                      font-size: 16px;
                                                      font-family: 'Nunito Sans', sans-serif;
                                                 }
                                                 .top-service{
                                                  /*    border:2px solid red; */
                                                 }
                                                 .top-service>p{
                                                  font-size: 15px;
                                                  line-height: 19px;
                                                  text-align: center;
                                                    /* padding-left: 23px; */
                                                    font-family: 'Nunito Sans', sans-serif;
                                                    /* font-weight: 500; */
                                                    color: rgba(0, 0, 0, 0.8);
                                                    /* text-align: left; */
                                                    font-size: 15px;
                                                    text-align-last: justify;
                                                 } 
                                                 .card-img-top{
                                                     width: 80px;
                                                     height: 80px;
                                                 }

                                                 .section-number.right_sn {
                                                        left: inherit;
                                                        top: -126px;
                                                        right: -40px;
                                                    }
                                             </style>
                                        
                                             
                                                @foreach ($servicesTop as $topservice)
                                                    <div class="col-md-4">
                                              <div class="card">
                                                  <img class="card-img-top" src="{{ asset("storage/".$topservice->services_photo) }}" alt="">
                                                  <div class="card-body top-service">
                                                      <h4 class="service-work-title"> {{ $topservice->service_name  }} </h4>
                                                      <p class="card-text">
                                                          @php
                                                              Foo::wordLimitForServicePage($topservice->about_service,15);
                                                          @endphp
                                                        
                                                         
                                                      </p>
                                                  </div>
                                              </div>
                                              
                                          </div>
                                                @endforeach
                                            
                                          
                                       
                                       </div>

                                       <div class="row" style="margin:30px;">
                                            <div class="col">
                                                  <div class="card card-body service-headline">
                                                        <h1>Services</h1>
                                                        <p>
                                                          Studio Bitmap is a dynamic full-fledged interior design & fit-out company/firm in Dhaka Bangladesh, established in the year 2015, 
                                                        </p>
                                                  </div>
                                            </div>
                                       </div>

                                       <style>
                                           .service-container{
                                                   width: 100%;
                                                    box-shadow: 0px -5px 18px 0px rgba(0,0,0,0.09);
                                                 
                                           }
                                           .imageholder{
                                              margin: 27px 0px;
                                                /* padding: 0px; */
                                                width: 75%;
                                                height: auto;
                                                overflow: hidden;
                                                width: 25%;
                                                float: left;
                                           }
                                           .imageholder>img{
                                                width:100%;
                                                height: auto;
                                                object-fit: contain;
                                               
                                           }
                                          
                                           .service-list-content{
                                                    float: left;
                                                    font-family: 'Nunito Sans', sans-serif;
                                                    padding-right: 3px;
                                                    padding-bottom: 7px;
                                                    width: 75%;
                                              
                                           }
                                           .service-list-content>h2{
                                                text-align: left;
                                                font-size: 16px;
                                                font-weight: bold;
                                                margin: 3px 0px;
                                                padding: 0;
                                                color: #00000096;
                                           }
                                           .service-list-content>p{
                                               font-size: 10px;
                                                line-height: 13px;
                                                font-weight: bold;
                                                color: #5e646aad;
                                                text-align: left;
                                                /* margin-top: 4px; */
                                                white-space: wrap;
                                                word-break: break-word;
                                                padding-right: 6px;
                                                text-align: justify;
                                           }
                                           .card{
                                               background-color: #ffff;
                                               
                                           }
                                           .each-service-container{
                                                   padding: 4px;
                                           }

                                           .section-number.right_sn {
                                                left: inherit;
                                                top: -89px;
                                                right: -40px;
                                            }
                                            .service-lists{
                                                        margin: auto;
                                                        padding: 4px 20px;
                                                            background: rgba(0,0,0,0.03);
                                                        overflow: hidden;
                                            }
                                          
                                           
                                       </style>
                                       <div class="row service-lists">
                                            <div class="row">
                                                @foreach ($listsServices as $listitem)
                                                    <div class="col-md-4 each-service-container">
                                               <div class="card clearfix">
                                                   <div class="card-body service-container">
                                                        <div class="imageholder">
                                                            <img src='{{ asset("storage/".$listitem->img) }}'   />
                                                        </div>
                                                        <div class="service-list-content">
                                                       <h2>{{ $listitem->list_title  }}</h2>
                                                       <p class="card-text">{{ $listitem->short_description  }}  </p>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                                @endforeach
                                                
                                                
                                                
                                            </div>
                                           
                                        </div>
                                        <div class="section-number right_sn">
                                            <div class="pr-bg pr-bg-white"></div>
                                            <span>0</span>1.
                                        </div>
                                    </div>
                                </section>
                                <!--section end-->    
                                <div class="section-separator"></div>
                                <!--section--> 
                                <section id="sec5" class="small-padding" style="padding-bottom:0px">
                                    <div class="container">
                                            <div class="split-sceen-content_title fl-wrap">
                                                    <div class="pr-bg pr-bg-white"></div>
                                                    <h3>Our  Clients</h3>
                                                   
                                                </div>
                                    </div>
                                    <div class="container-fluid" style="padding:0px" >
                                        
                                        <style>
                                            .client-contaner{
                                                    background-color: #fff;
                                                    margin-bottom: 10px;
                                                    height: 150px;
                                                    width: 100%;
                                                    display: flex;
                                                    justify-content: center;
                                                    align-items: center;
                                                    overflow: hidden;
                                                    object-fit: cover;
                                                    position: relative;
                                            }
                                            .right-content-border::before{
                                                position: absolute;
                                                        content: "";
                                                        border-right: 1px solid #ddd;
                                                        width: 2px;
                                                        height: 115px;
                                                        top: 15px;
                                                        right: 6px;
                                            }
                                            .right-content-border::after{
                                                     position: absolute;
                                                        content: "";
                                                        border-bottom: 1px solid #ddd;
                                                        width: 196px;
                                                        /* height: 40px; */
                                                        left: 30px;
                                                        bottom: 3px;
                                            }
                                            .companylogos{
                                                width: 120px;
                                                height: auto;
                                                object-fit: cover;
                                                transform: scale;
                                                transform: scale(0.9, 0.9);
                                                filter: grayscale(100%);
                                                transition: .2s;
                                               
                                            }
                                            .companylogos:hover{
                                                filter: grayscale(0%);
                                                transform: scale(1,1);
                                            }
                                            .client-list-container{
                                                width: 100%;
                                                height: 520px;
                                                /*  background-image: url("{{ asset('siteasset/img/service/service-client-bg.jpeg') }}");
                                                object-position: center;
                                                background-position: center;
                                                background-size: cover;  */
                                                background-color: #fff;
                                                padding: 20px;
                                                position: relative;
                                                margin: 0px !important;
                                            }
                                            .client-list-overlay{
                                                position: absolute;
                                                top: 0px;
                                                left: 0px;
                                                width: 100%;
                                                height: 100%;
                                                background: #000000d6;
                                            }
                                        </style>
                                        <div class="column-wrap-content fl-wrap">
                                            <div class="column-wrap-text">
                                                <div class="testilider fl-wrap" data-effects="slide">
                                                    <div class="pr-bg pr-bg-white"></div>
                                                      <div class="row client-list-container">
                                                      {{--    <div class="client-list-overlay"></div>  --}}
                                 
                                                  
                                                    @foreach ($clients as $client)
                                                    <a href="#">
                                                        <div class="col-md-3 right-content-border">
                                                                <div class="client-contaner">
                                                                    <img src="{{ asset("storage/".$client->avater) }}"  class="companylogos"  />
                                                                </div>
                                                             
                                                          </div> 
                                                          </a>
                                                    @endforeach

                                                        
                                                          
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section-number right_sn">
                                            <div class="pr-bg pr-bg-white"></div>
                                            <span>0</span>2.
                                        </div>
                                    </div>
                                </section>
                                <!--section end-->         
                            </div>
                            <!--column-wrap-container end-->         
                        </div>
                        <!--column-wrap end--> 
                        <div class="limit-box fl-wrap"></div>
                    </div>
                    <!--content end -->  @endsection
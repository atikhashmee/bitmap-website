
        @extends('site.pages.pages-layout')

@section('page-contents')
<!--content--> 
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
                                <div class="bg" data-bg="images/bg/12.jpg"></div>
                                <div class="overlay"></div>
                                <div class="progress-bar-wrap bot-element">
                                    <div class="progress-bar"></div>
                                </div>
                                <!--fixed-column-wrap_title-->
                                <div class="fixed-column-wrap_title first-tile_load">
                                    <h2> Our<br> Service</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
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
                            <div class="column-wrap-container fl-wrap">
                                <div class="col-wc_dec">
                                    <div class="pr-bg pr-bg-white"></div>
                                </div>
                                <div class="col-wc_dec col-wc_dec2">
                                    <div class="pr-bg pr-bg-white"></div>
                                </div>
                              
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
                                            <h3>Our awesome Services </h3>
                                          
                                        </div>

                                        @for ($i = 0; $i < 4; $i++)
                                             <!-- team-box   --> 
                                        <div class="team-box">
                                            <div class="pr-bg pr-bg-white"></div>
                                            <div class="team-photo">
                                                <div class="overlay"></div>
                                                  <div class="background-style"></div>
                                                  <div class="rightslash"></div>
                                                  <div class="leftslash"></div>
                                                  <a href="#" class="icon-container"> <i class="fab fa-facebook" aria-hidden="true"></i> </a>
                                                  <div class="rightslashbottom"></div>
                                                  <div class="leftslashbottom"></div>
                                            </div>
                                            <div class="team-info">
                                                <h3>Service Name 1</h3>
                                               
                                               
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                                    <a href="#">Read More</a>
                                                 </p>
                                            </div>
                                        </div>
                                        <!-- team-box end --> 
                                        @endfor
                                       
                                       
                                                                             
                                        
                                        <div class="section-number right_sn">
                                            <div class="pr-bg pr-bg-white"></div>
                                            <span>0</span>1.
                                        </div>
                                    </div>
                                </section>
                                <!--section end-->    
                                <div class="section-separator"></div>
                                <!--section--> 
                                <section id="sec5" class="small-padding">
                                    <div class="container">
                                        <div class="split-sceen-content_title fl-wrap">
                                            <div class="pr-bg pr-bg-white"></div>
                                            <h3>Our Clients</h3>
                                           
                                        </div>
                                        <style>
                                            .client-contaner{
                                                overflow: hidden;
                                                position: relative;
                                                border-radius: 50%;
                                                margin-bottom: 10px;
                                                background-color:rgba(0, 0, 0, 0.7);
                                                padding:20px;
                                                cursor: pointer;
                                            }
                                            .img-rounded{
                                                width: 100%;
                                                height: auto;
                                                border-radius: 50%;
                                            }
                                            .clinet-overlay{
                                                position: absolute;
                                                height: 100%;
                                                width: 100%;
                                                top: 0;
                                                right: -100%;
                                                background: rgba(0, 0, 0,0.5);
                                                transition: .5s;
                                                
                                            }
                                            .company-name{
                                                   position: absolute;
                                                   height: 100%;
                                                   width: 100%;
                                                   top: 36%;
                                                   left: -100%;
                                                   color: white;
                                                  text-align: center;
                                                  transition: .5s;
                                                  z-index: 13;
                                                  
                                            }
                                            .company-name>h3{
                                                 font-size:20px;
                                                 font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                                            }

                                            .client-contaner:hover .clinet-overlay{
                                                 right: 0;
                                            }
                                            .client-contaner:hover .company-name{
                                                 left: 0;
                                            }
                                            
                                        </style>
                                        <div class="column-wrap-content fl-wrap">
                                            <div class="column-wrap-text">
                                                <div class="testilider fl-wrap" data-effects="slide">
                                                    <div class="pr-bg pr-bg-white"></div>
                                                      <div class="row">
                                                          @for ($i = 0; $i < 10; $i++)
                                                              <div class="col-md-3 ">
                                                                <div class="client-contaner">
                                                                    <div class="clinet-overlay"></div>
                                                                         <img src="//unsplash.it/100/100" class="img-rounded" />
                                                                         <div class="company-name">
                                                                             <h3>Abc Compnay</h3>
                                                                         </div>
                                                                </div>
                                                             
                                                          </div> 
                                                          @endfor
                                                          
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
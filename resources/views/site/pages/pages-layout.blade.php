<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $settings->title }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('siteasset/css/reset.css') }}"   rel="stylesheet">
    <link href="{{ asset('siteasset/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('siteasset/css/style.css') }}"   rel="stylesheet">
    <link href="{{ asset('siteasset/css/color.css') }}"   rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel=icon href={{ asset("storage/".$settings->fevicon) }}>
</head>
<body>
    
        
       <!--Loader -->
         <div class="loader2">
            <div class="loader loader_each"><span></span></div>
        </div>
        <!-- loader end  -->
        <!-- main start  -->
        <div id="main">
            <!-- header start  -->
            <header class="main-header">
            <a href="{{ url('/') }}" class="header-logo ajax"><img src="{{ asset("siteasset/img/templogo.png") }}" alt=""></a>
                <!-- sidebar-button --> 
                <!-- nav-button-wrap-->
                <div class="nav-button-wrap">
                    <div class="nav-button">
                        <span  class="nos"></span>
                        <span  class="ncs"></span>
                        <span  class="nbs"></span>
                        <div   class="menu-button-text">Menu</div>
                    </div>
                </div>
                <!-- nav-button-wrap end-->
                <!-- sidebar-button end-->  
                <!--  navigation --> 
                <div class="header-contacts">
                    <ul>
                   <li><span> Call </span> <a href="tel:{{$settings->phone}}">{{$settings->phone}}</a></li>
                        <li><span> Write </span> <a href="mailto:{{$settings->email}}">{{$settings->email}}</a></li>
                    </ul>
                </div>
                <!-- navigation  end -->            
            </header>
            <!-- header end -->
            <!-- left-panel -->
            <div class="left-panel">
                <div class="horizonral-subtitle"><span><strong></strong></span></div>
                <div class="left-panel_social">
                    <ul >
                        
                         <li><a href="https://www.facebook.com/{{$settings->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                 <li><a href="https://www.instagram.com/{{$settings->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/{{$settings->twitter}}" target="_blank"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a></li>
                        
                                </ul>
                </div>
            </div>
            <!-- left-panel end -->
            <!-- share-button -->
            <div class="share-button showshare">
                <span>Share</span>
            </div>
            <!-- share-button end -->
            <!-- wrapper  -->	
            <div id="wrapper">
                <!-- content-holder  -->	
                <div class="content-holder" data-pagetitle="<?= Foo::getPageName() ?>">
                    <!-- nav-holder-->
                    <div class="nav-holder but-hol">
                        <div class="nav-scroll-bar-wrap fl-wrap">
                            <div class="nav-search">
                                <form action="#" class="searh-inner fl-wrap">
                                    <input name="se" id="se" type="text" class="search fl-wrap" placeholder="Search.." value="Search..." />
                                    <button class="search-submit color-bg" id="submit_btn"><i class="fal fa-search"></i> </button>
                                </form>
                            </div>
                            <!-- nav -->
                            <nav class="nav-inner" id="menu">
                                <ul>
                                    <li>
                                    <a href="{{ url('/') }}" class="act-link">Home</a>
                                       
                                    </li>
                                    <li>
                                        <a href="{{ url('/About') }}">About</a>
                                       
                                    </li>
                                    <li>
                                        <a href="{{ url("/Protfolio") }}">Portfolio</a>
                                        
                                    </li>
                                    <li><a href="{{ url("/Service") }}" class="ajax">Services</a></li>
                                  <li><a href="{{ url("/ContactUs") }}" class="ajax">Contacts</a></li>
                               
                                </ul>
                            </nav>
                            <!-- nav end-->
                            <!--lang-links-->
                            <div class="lang-links fl-wrap">
                                <a href="#" class="act-leng">EN</a><a href="#">BN</a> 
                            </div>
                            <!--lang-links end-->
                        </div>
                        <!--nav-social-->
                        <div class="nav-social">
                            <span class="nav-social_title">Follow us : </span>
                            <ul >
                                 <li><a href="https://www.facebook.com/{{$settings->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                 <li><a href="https://twitter.com/{{$settings->twitter}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                 <li><a href="https://www.instagram.com/{{$settings->instagram}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                        <!--nav-social end -->
                    </div>
                    <div class="nav-overlay">
                        <div class="element"></div>
                    </div>
                    <!-- nav-holder end -->                
                         @yield('page-contents') 

                          <!-- footer -->
      <div class="height-emulator fl-wrap"></div>
      <footer class="main-footer fixed-footer">
         <div class="pr-bg"></div>
         <div class="container">
            <div class="fl-wrap footer-inner">
               <div class="row">
                  <div class="col-md-4">
                     <div class="footer-logo">
                        <img src="{{ asset("siteasset/img/templogo.png") }}" alt="">
                     </div>
                     <div class="footer_text  footer-box fl-wrap">
                        <p class='content-style'>  
                            <b><small> short description</small> <br />
                                {{ $settings->short_description }}
                                </b>
                        </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="footer-header fl-wrap"><span>01.</span> Contacts</div>
                     <!-- footer-contacts-->
                     <div class="footer-contacts footer-box fl-wrap">
                         <style>
                             
                             .address-container{
                                 display: flex;
                             }
                         </style>
                        <ul>
                           <li><span>Call:</span><a href="#">{{ $settings->phone }}</a></li>
                           <li><span>Write  :</span><a href="#">{{ $settings->email }}</a></li>
                           <li class="address-container"> 
                               
                                    <span>Find us : </span>
                               
                                 <a href="#" class="address-footer"> {{ $settings->address }} </a>   
                               
                             </li>
                        </ul>
                     </div>
                     <!-- footer contacts end -->
                     <a href=" {{ url("/ContactUs") }} " class="ajax fc_button">Get In Touch <i class="fal fa-envelope"></i></a>
                  </div>
                  <div class="col-md-4">
                     <div class="footer-header fl-wrap"><span>02.</span> Subscribe</div>
                     <div class="footer-box fl-wrap">
                        <p>Subscribe our channel</p>
                        <div class="subcribe-form fl-wrap">
                           <form id="subscribe" class="fl-wrap">
                              <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                              <button type="submit" id="subscribe-button" class="subscribe-button">  Send  <i class="fal fa-long-arrow-right"></i></button>
                              <label for="subscribe-email" class="subscribe-message"></label>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="subfooter fl-wrap">
               <!-- policy-box-->
               <div class="policy-box">
                  <span>&#169; Studiobitmap 2019  /  All rights reserved. </span>
               </div>
               <!-- policy-box end-->
               <a href="#" class="to-top-btn to-top">Back to top <i class="fal fa-long-arrow-up"></i></a>
            </div>
         </div>
         <div class="footer-canvas">
            <div class="dots gallery__dots" data-dots=""></div>
         </div>
      </footer>
      <!-- footer  end -->
                    <!-- share-wrapper-->  
                    <div class="share-wrapper">
                        <div class="close-share-btn"><i class="fal fa-long-arrow-left"></i> Close</div>
                        <div class="share-container fl-wrap  isShare"></div>
                    </div>
                    <!-- share-wrapper  end --> 

                         
                    

                </div>
                <!-- content-holder end -->	
            </div>
            <!-- wrapper end -->
        </div>
        <!-- Main end -->
        
        

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
 <script src="{{ asset("siteasset/js/jquery.min.js") }}"></script>
 <script src="{{ asset("siteasset/js/plugins.js") }}"> </script>
 <script src="{{ asset("siteasset/js/core.js") }}">    </script>
 <script src="{{ asset("siteasset/js/scripts.js") }}">  </script>


          
</body>
</html>

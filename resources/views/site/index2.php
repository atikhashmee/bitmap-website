            
         
               

                               <?php 

                    $sql = "SELECT * FROM `home_page`";
                    $queryall = $db->joinQuery($sql)->fetchAll();
                    /* echo "<pre>";
                     print_r($queryall);
                     echo "</pre>";*/
                    
                   ?>           
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
                        <!--multi-slideshow-wrap_1 -->
                        <div class="multi-slideshow-wrap_1 ms-wrap">
                            <div class="pr-bg"></div>
                            <div class="full-height fl-wrap">
                                <!--ms-container-->
                                <div class="multi-slideshow_1 ms-container fl-wrap full-height">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!--ms_item-->
                                            <!-- <div class="swiper-slide">
                                                <div class="ms_item fl-wrap">
                                                    <div class="bg" data-bg="images/bg/2.jpg"></div>
                                                    <div class="overlay"></div>
                                                </div>
                                            </div> -->
                                            <!--ms_item end-->
                                                
                                    <?php 

                                        for ($i=0; $i <3; $i++) 
                                        { 
                                            $addclass=($i==1)?"kenburns":"";
                                            ?>
                                            <!--ms_item-->
                                            <div class="swiper-slide <?=$addclass?>">
                                            <div class="ms_item fl-wrap  ">
                                                    <div class="bg" data-bg="admin/homeimage/<?=$queryall[$i][4]?>"></div>
                                                    <div class="overlay"></div>
                                                </div>
                                            </div>
                                            <!--ms_item end-->
                                            <?php
                                        }

                                    ?>

                                            
                                                                                         
                                        </div>
                                    </div>
                                </div>
                                <!--ms-container end-->
                            </div>
                        </div>
                        <!--multi-slideshow-wrap_1 end-->
                        <!--multi-slideshow-wrap_2-->
                        <div class="multi-slideshow-wrap_2">
                            <div class="pr-bg"></div>
                            <div class="full-height fl-wrap">
                                <!--ms-container-->
                                <div class="multi-slideshow_2 ms-container fl-wrap full-height">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                           
                                            

                                             <?php 

                                        for ($i=0; $i <3; $i++) 
                                        { 
                                            $addclass=($i==2)?"kenburns":"";
                                            ?>
                                             <!--ms_item-->
                                            <div class="swiper-slide">
                                     <div class="ms_item2 fl-wrap <?=$addclass?> ">
                                                    <div class="bg" data-bg="admin/homeimage/<?=$queryall[$i][4]?>"></div>
                                                    <div class="overlay"></div>
                                                </div>
                                            </div>
                                            <!--ms_item end-->  
                                            <?php
                                        }

                                    ?>
                                                                                          
                                        </div>
                                    </div>
                                </div>
                                <!--ms-container end-->                
                            </div>
                        </div>
                        <!--multi-slideshow-wrap_2 end-->
                        <!--multi-slideshow-wrap_3-->
                        <div class="multi-slideshow-wrap_3 dark-bg">
                            <div class="pr-bg"></div>
                            <div class="full-height fl-wrap">
                                <!--ms-container-->
                                <div class="multi-slideshow_3 ms-container fl-wrap full-height">
                                    <div class="swiper-container" dir="rtl">
                                        <div class="swiper-wrapper">
                                            

                                             <?php 

                                        for ($i=0; $i <3; $i++) 
                                        { 
                                            $addclass=($i==0)?"kenburns":"";
                                            ?>
                                             <!--ms_item-->
                                            <div class="swiper-slide">
                                     <div class="ms_item3 fl-wrap <?=$addclass?>">
                                                    <div class="bg" data-bg="admin/homeimage/<?=$queryall[$i][4]?>"></div>
                                                    <div class="overlay"></div>
                                                </div>
                                            </div>
                                            <!--ms_item end-->
                                            <?php
                                        }

                                    ?>
                                                                                          
                                        </div>
                                    </div>
                                </div>
                                <!--ms-container end-->   
                            </div>
                        </div>
                        <!--multi-slideshow-wrap_3 end-->
                    </div>
                    <!-- content  end -->  
                    
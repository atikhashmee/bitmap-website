


                    <!--content-->
                    <div class="content full-height dark-bg hidden-item">
                        <!-- section-->
                        <!-- media-container  -->
                        <div class="media-container">
                            <div class="fs-slider-wrap full-height fl-wrap">
                                <div class="fs-slider lightgallery" data-mousecontrol2="true">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper" >
                                   
                                            
                                          <?php 
                           $sql = "SELECT * FROM `home_page`";
                           $queryall = $db->joinQuery($sql)->fetchAll();
                           
                           foreach ($queryall as $dat)
                           {
                               ?>
                        <!-- swiper-slide-->
                        <div class="swiper-slide hov_zoom">
                           <div class="fs-slider-item fl-wrap">
                              <div class="bg"  data-bg="admin/homeimage/<?=$dat['img']?>"></div>
                              <div class="overlay"></div>
                              <div class="sec-lines"></div>
                              <a href="admin/homeimage/<?=$dat['img']?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                              <div class="hero-title fl-wrap">
                                 <div class="container">
                                    <div class="section-title fl-wrap">
                                       <div class="pr-bg"></div>
                                       <h2><?=$dat['headertitle']?></h2>
                                       <p> <?=$dat['description']?></p>
                                       <!-- <div class="section-title_category"><a href="#">Architecture</a> <a href="#">Design</a> </div> -->
                                       <a href="<?=$dat['projectlink']?>" class="half-hero-wrap_link ajax">View Project <i class="fal fa-long-arrow-right"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- swiper-slide-->
                        <?php
                           }
                           ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-slider_control-wrap bot-element">
                                <div class="hero-slider_control hero-slider-button-next"><span>Next<i class="fal fa-angle-right"></i></span> </div>
                                <div class="hero-slider_control hero-slider-button-prev"><span><i class="fal fa-angle-left"></i>Prev </span></div>
                            </div>
                            <div class="hero-slider-wrap_pagination hlaf-slider-pag"></div>
                        </div>
                        <!-- media-container   end -->
                        <a href="#sec1" class="custom-scroll-link start-btn color-bg hero-start bot-element"> Start explore <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <!--content  end-->

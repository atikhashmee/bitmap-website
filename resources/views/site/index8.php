


  <!-- fw-carousel-wrap -->
                    <div class="fw-carousel-wrap fsc-holder full-height dark-bg fl-wrap">
                        <!-- fw-carousel  -->
                        <div class="grid-carousel   fl-wrap full-height lightgallery">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                              
                                   <?php 

                    $sql = "SELECT * FROM `home_page`";
                    $queryall = $db->joinQuery($sql)->fetchAll();

                    foreach ($queryall as $dat)
                    {
                        ?>

                                    <!-- swiper-slide-->
                                    <div class="swiper-slide hov_zoom">
                                        <div class="bg"  data-bg="admin/homeimage/<?=$dat['img']?>" ></div>

                                        <a href="admin/homeimage/<?=$dat['img']?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                        <div class="carousel-title-wrap">
                                            <h2><a href="<?=$dat['projectlink']?>" class="ajax"><?=$dat['headertitle']?> <i class="fal fa-long-arrow-right"></i></a></h2>
                                            <p><?=$dat['description']?></p>
                                        </div>
                                        <div class="carousle-item-number"><span>01.</span></div>
                                        <div class="pr-bg"></div>
                                    </div>
                                    <!-- swiper-slide end-->
                  <?php
                   }
                   ?>
                                </div>
                            </div>
                        </div>
                        <!-- fw-carousel end -->
                        <div class="fw-carousel-control dark-bg fl-wrap fsc-control fsc-control_anim bot-element">
                            <div class="fw-carousel-control_container">
                                <a href="about.html" class="flat-project_title_link ajax">Start explore <i class="fal fa-long-arrow-right"></i></a>
                                <div class="fw-carousel-counter"></div>
                                <div class="fw_cb fw-carousel-button-next"><i class="fal fa-long-arrow-right"></i></div>
                                <div class="fw_cb fw-carousel-button-prev"><i class="fal fa-long-arrow-left"></i></div>
                            </div>
                            <div class="half-scrollbar">
                                <div class="slide-progress-warp grid-carousel-progress">
                                    <div class="slide-progress color-bg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fw-carousel-wrap end -->
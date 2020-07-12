<?php  include 'files/header.php';  ?>


           <!-- wrapper  -->	
            <div id="wrapper">
                <!-- content-holder  -->	
                <div class="content-holder" data-pagetitle="Portfolio Boxed">
                           <?php include 'files/rightnav.php';?> 
                    <!--content--> 
                    <div class="content">
                        <!--section--> 
                        <section class="hero-section dark-bg"  data-scrollax-parent="true">
                            <div class="hero-canvas-wrap fs-canvas">
                                <div class="dots gallery__dots" data-dots=""></div>
                                <div class="pr-bg"></div>
                            </div>
                            <?php 

                            $prot_bg = $db->selectAll("protbg","protbg_id='1'")->fetch(PDO::FETCH_ASSOC);
                                 ?>
                            <div class="hero-bg">
                                <div class="bg par-elem"  data-bg="admin/protfolio_img/<?=$prot_bg['bg_image']?>" data-scrollax="properties: { translateY: '30%' }"></div>
                                <div class="overlay"></div>
                                <div class="pr-bg"></div>
                                <div class="hero-bg-dec"><span></span></div>
                            </div>
                            <div class="container">
                            <div class="section-title fl-wrap first-tile_load">
                                
                                    <h2><?=$prot_bg['headertitle']?></h2>
                                    <p> <?=$prot_bg['description']?></p>
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
                        <section class="no-padding-bottom" id="sec1">
                            <div class="col-wc_dec col-wc_dec2">
                                <div class="pr-bg pr-bg-white"></div>
                            </div>
                            <div class="container">
                                <div class="pr-bg pr-bg-white"></div>
                                <div class="inline-filter-panel fl-wrap">
                                    <div class="inline-filter_title color-bg">
                                        Works Filter <i class="fal fa-long-arrow-right"></i>
                                    </div>
                                    <div class="gallery-filters">
                                        <a href="#" class="gallery-filter gallery-filter-active"  data-filter="*">All Works</a>
                                        <?php
                                        $catname = [];
                        $procat = $db->selectAll("cateogory")->fetchAll();
                        foreach ($procat as $cat) 
                        {
                            $catname[$cat['cat_id']] = $cat['cat_name'];
                             ?>
                             <a href="#" class="gallery-filter " data-filter=".<?=$cat['cat_name']?>"><?=$cat['cat_name']?></a>
                             <?php
                        }

                                        ?>
                                        <!-- <a href="#" class="gallery-filter " data-filter=".houses">Houses</a>
                                        <a href="#" class="gallery-filter" data-filter=".apartments">Apartments</a>
                                        <a href="#" class="gallery-filter" data-filter=".interior">Interior</a>
                                        <a href="#" class="gallery-filter" data-filter=".design">Design</a> -->
                                    </div>
                                    <div class="folio-counter">
                                        <div class="num-album"></div>
                                        <div class="all-album"></div>
                                    </div>
                                </div>
                                <!-- portfolio start -->
                                <div class="gallery-items min-pad   three-column fl-wrap ff_panel-conainer">
                                    

                        <?php 
                                
                                $pro = $db->selectAll("protfolio")->fetchAll();
                                foreach ($pro as $pr) 
                                {
                                    ?>
                                    <!-- gallery-item-->
                                    <div class="gallery-item <?=$catname[$pr['prot_category']]?>">
                                        <div class="grid-item-holder">
           <img  src="admin/protfolio_img/<?=$pr['project_cover_photo']?>" alt="">
                                            <div class="grid-det">
                                                <div class="grid-det_category">
                                               <a href="#"><?=$catname[$pr['prot_category']]?></a></div>
                                                <div class="grid-det-item">
                        <a href="portfolio-single.php?detail=<?=$pr['prot_id']?>" class="ajax grid-det_link"> See details <i class="fal fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pr-bg pr-bg-white"></div>
                                    </div>
                                    <!-- gallery-item end-->

                                    <?php 
                                }

                        ?>            
                                    
                                    
                                </div>
                                <!-- portfolio end -->
                                <div class="order-wrap dark-bg fl-wrap">
                                    <div class="pr-bg pr-bg-white"></div>
                                    <h4>Ready to order Your Project ? </h4>
                                    <a href="contacts.html" class="ajax">Get In Touch <i class="fal fa-envelope"></i></a>
                                </div>
                            </div>
                        </section>
                        <!--section end--> 
                    </div>
                    <!--content end -->       

            <?php  include 'files/footer.php';  ?>
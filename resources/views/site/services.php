<?php  include 'files/header.php';  ?>
<!-- wrapper  -->   
<div id="wrapper">
   <!-- content-holder  --> 
   <div class="content-holder" data-pagetitle="Our Services">
      <?php include 'files/rightnav.php';?>
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
               <?php 
                  $servbg = $db->selectAll("servicesbg","ser_id='1'")->fetch(PDO::FETCH_ASSOC);
                  
                  
                  ?>
               <div class="bg" data-bg="admin/serimage/<?=$servbg['serimage']?>"></div>
               <div class="overlay"></div>
               <div class="progress-bar-wrap bot-element">
                  <div class="progress-bar"></div>
               </div>
               <!--fixed-column-wrap_title-->
               <div class="fixed-column-wrap_title first-tile_load">
                  <h2><?=$servbg['sertitle']?></h2>
                  <p><?=$servbg['serdesc']?></p>
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
               <?php
                  $services = $db->selectAll("service")->fetchAll();
                  foreach ($services as $servic) 
                  {
                      ?>
               <!--section--> 
               <section   class="small-padding">
                  <div class="container">
                     <div class="split-sceen-content_title fl-wrap">
                        <div class="pr-bg pr-bg-white"></div>
                        <h3><?=$servic['serv_title']?></h3>
                        <p><?=$servic['about_serv']?></p>
                     </div>
                     <div class="column-wrap-content fl-wrap">
                        <div class="column-wrap-media fl-wrap">
                           <div class="pr-bg pr-bg-white"></div>
                           <img src="admin/serimage/<?=$servic['serv_image']?>"  class="respimg" alt="">
                           <div class="cont-det-wrap dark-bg">
                              <div class="pr-bg pr-bg-white"></div>
                              <ul>
                                 <?php 
                                    $list =  $db->selectAll("service_list","service_id='".$servic['serv_id']."'")->fetchAll();
                                    $i=0;
                                    foreach ($list as $sl) 
                                    { $i++;
                                        ?>
                                 <li><strong><?=$i?>.</strong><span><?=$sl['title']?>  : </span> <a href="#"><?=$sl['details_serv']?></a></li>
                                 <?php
                                    }
                                    
                                            ?>
                              </ul>
                           </div>
                        </div>
                        <div class="serv-text fl-wrap">
                           <div class="pr-bg pr-bg-white"></div>
                           <div class="row">
                              <div class="col-md-8">
                                 <p><?=$servic['details_serv']?> </p>
                              </div>
                              <div class="col-md-4">
                                 <div class="serv-price-wrap dark-bg"><span>Price</span><?=$servic['price']?></div>
                              </div>
                           </div>
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
               <?php 
                  }
                  
                  ?>
               <div class="clearfix"></div>
               <div class="container">
                  <div class="order-wrap dark-bg fl-wrap">
                     <div class="pr-bg pr-bg-white"></div>
                     <h4>Ready to order Your Project ? </h4>
                     <a href="contacts.html" class="ajax">Get In Touch <i class="fal fa-envelope"></i></a>
                  </div>
               </div>
            </div>
            <!--column-wrap-container end-->         
         </div>
         <!--column-wrap end--> 
         <div class="limit-box fl-wrap"></div>
      </div>
      <!--content end -->       
     <?php  include 'files/footer.php'; ?>
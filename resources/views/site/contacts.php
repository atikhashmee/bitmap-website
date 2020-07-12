<?php  include 'files/header.php';  ?>
<?php 
 $contacts = $db->selectAll("contact_page","contact_inof_id='1'")->fetch(PDO::FETCH_ASSOC);
                   $latlong = "[23.854917, 90.420613]";
                    if (!empty($contacts['latong'])) 
                    {
                       $latlong = $contacts['latong'];
                    }
                    $mapnote = "note is empty yet";
                    if (!empty($contacts['mapnote'])) 
                    {
                       $mapnote = $contacts['mapnote'];
                    }
     ?>
<!-- wrapper  -->
<div id="wrapper">
   <!-- content-holder  -->
   <div class="content-holder" data-pagetitle="About Our Studio">
      <?php include 'files/rightnav.php';?>
      <!--content-->
      <div class="content">
         <!--fixed-column-wrap-->
         <div class="fixed-column-wrap">
            <div class="pr-bg"></div>
            <div class="fixed-column-wrap-content map-mobile">
               <div class="scroll-nav-wrap color-bg">
                  <div class="carnival">Scroll down</div>
                  <div class="snw-dec">
                     <div class="mousey">
                        <div class="scroller"></div>
                     </div>
                  </div>
               </div>
               <div class="progress-bar-wrap bot-element">
                  <div class="progress-bar"></div>
               </div>
               <div class="map-container mc_big">

                  <div id="map-single" class="map" data-latlog="<?=$latlong?>" data-popuptext="<?=$mapnote?>"></div>
               </div>
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
               <!--section-->
               
               <section id="sec1" class="small-padding">
                  <div class="container">
                     <div class="split-sceen-content_title fl-wrap">
                        <div class="pr-bg pr-bg-white"></div>
                        <h3> <?=$contacts['cont_title']?></h3>
                        <p><?= htmlspecialchars_decode($contacts['cont_des'],ENT_QUOTES)?> </p>
                     </div>
                     <div class="column-wrap-content fl-wrap">
                        <div class="column-wrap-media fl-wrap">
                           <div class="pr-bg pr-bg-white"></div>
                           <img src="admin/contact_page_image/<?=$contacts['cover_photo']?>"  class="respimg" alt="">
                           <div class="cont-det-wrap dark-bg">
                              <div class="pr-bg pr-bg-white"></div>
                              <ul>
                                 <li><strong>01.</strong><span>Write : </span> <a href="<?=$contacts['cont_email']?>"><?=$contacts['cont_email']?></a></li>
                                 <li><strong>02.</strong><span> Call :</span> <a href="tel:+4(897)56412322"><?=$contacts['cont_cell']?></a></li>
                                 <li><strong>03.</strong><span> Visit :</span> <a href="#"><?=$contacts['cont_adrs']?></a>
                                    <a href=""><?=$contacts['cont_website']?></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="section-number right_sn"><span>0</span>1.</div>
                  </div>
               </section>
               <!--section end-->
               <div class="section-separator"></div>
               <!--section-->
               <section id="sec2" class="small-padding">
                  <div class="container">
                     <div class="split-sceen-content_title fl-wrap">
                        <div class="pr-bg pr-bg-white"></div>
                        <h3>Get In touch</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.  </p>
                     </div>
                     <div id="contact-form">
                        <div class="pr-bg pr-bg-white"></div>
                        <div id="message"></div>
                        <form  class="custom-form" action="#" name="contactform" id="contactform">
                           <fieldset>
                              <div class="row">
                                 <div class="col-md-6">
                                    <input type="text" name="name" id="name" placeholder="Your Name *" value=""/>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text"  name="email" id="email" placeholder="Email Address *" value=""/>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text"  name="phone" id="phone" placeholder="Phone *" value=""/>
                                 </div>
                                 <div class="col-md-6">
                                    <select name="subject" id="subject" data-placeholder="Subject" class="chosen-select sel-dec">
                                       <option>Subject</option>
                                       <option value="Order Project">Order Project</option>
                                       <option value="Support">Support</option>
                                       <option value="Other Question">Other Question</option>
                                    </select>
                                 </div>
                              </div>
                              <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Your Message:"></textarea>
                              <div class="verify-wrap">
                                 <span class="verify-text"> How many gnomes were in the story about the "Snow-white" ?</span>
                                 <select name="verify" id="verify" data-placeholder="0" class="chosen-select">
                                    <option>0</option>
                                    <option value="9">9</option>
                                    <option value="5">5</option>
                                    <option value="7">7</option>
                                    <option value="2">2</option>
                                 </select>
                              </div>
                              <div class="clearfix"></div>
                              <button class="btn float-btn flat-btn color-bg" id="submit">Send Message <i class="fal fa-long-arrow-right"></i></button>
                           </fieldset>
                        </form>
                     </div>
                     <!-- contact form  end-->
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
      <!--content end -->
     <?php include 'files/footer.php'; ?>
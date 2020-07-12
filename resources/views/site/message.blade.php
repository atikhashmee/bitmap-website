 <style>
                                .chat-option{
                                      position: fixed;
                                      bottom: 120px;
                                      right: 10px;
                                      /* background-color:#2d2d32; */
                                      z-index: 998;
                                      width: 30px;
                                      height: 30px;
                                }
                                .chat-option>a{
                                     color: yellow;
                                     font-size: 30px;
                                }
                                .message-container{
                                         position: relative;
                                        height: 500px;
                                        background-color: #35353a;
                                        width: 500px;
                                        right: 500px;
                                        bottom: 420px;
                                        z-index: 999;
                                        padding: 20px;
                                        transform: 2s;
                                        /* browaser compatibility */
                                        -ms-transform: 2s;  
                                        -moz-transition: 2s;
                                        
                                         
                                }
                                .form-container{
                                     border:2px solid yellow;
                                     width: 100%;
                                     height: 100%;
                                     padding: 20px;
                                }

                                

                                
                                
                        </style>

                        <script>

                            function meesagepop(obj) {
                                var togglebar = obj.getAttribute("toggleid");
                                 if(togglebar === "close")
                                 {
                                 document.getElementById("message-body").style.display="block";
                                  obj.setAttribute("toggleid","open");
                                 }
                                
                                  else if (togglebar === "open") {
                                      document.getElementById("message-body").style.display="none";
                                       obj.setAttribute("toggleid","close");
                                  }
                            }

                                  
                        
                        </script>

                        
                    {{-- messaging option --}}
                        <div class="chat-option">
                             
                            <a href="#" toggleid="close" onclick="meesagepop(this)" ><i class="fas fa-comments"></i>  </a>
                              <div class="message-container" id="message-body" style="display:none">
                                   <div class="form-container">
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
                                                    {{-- <div class="verify-wrap">
                                                        <span class="verify-text"> How many gnomes were in the story about the "Snow-white" ?</span>
                                                        <select name="verify" id="verify" data-placeholder="0" class="chosen-select">
                                                            <option>0</option>
                                                            <option value="9">9</option>
                                                            <option value="5">5</option>
                                                            <option value="7">7</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div> --}}
                                                    <div class="clearfix"></div>
                                                    <button class="btn float-btn flat-btn color-bg" id="submit">Send Message <i class="fal fa-long-arrow-right"></i></button>
                                                </fieldset>
                                            </form>
                                   </div>
                              </div>
                        </div>




                    {{-- messaging option  end--}}
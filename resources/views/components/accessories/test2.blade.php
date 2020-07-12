<html>
<head>
  <style>
      
    @page { margin: 100px 100px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; height: auto; }
    footer { position: fixed; bottom: 60px; left: 0px; right: 0px;
    background-color: rgba(0, 0, 0, 0.02);
     height: auto;
      }
      .clearfix{
          overflow: auto;
      }
    .printbody { page-break-after: always; }
    .printbody:last-child { page-break-after: never; }


     .preview-container{
            width: 100%;
            margin: 0 auto;
            height: auto;
            background-color: #fff;

        }
        .underline{
            display: block;
            width: 100%;
            height: 1px;
            background: #867a7a;
            border: 1px solid #403e3e05;
        }

       .v-divider::before{
            position: absolute;
            content: "";
            width: 3px;
            height: 50%;
            left: -26px;
            top: 10px;
            background-color: #867a7a;
       }
       .footer-design h4{
            text-transform: uppercase;
            font-size: 16px;
            color: yellow;
            font-weight: bolder;
       }

       .logo-holder{
            width: 100px;
            height: 89px;
            overflow: hidden;
          
       }
       .top-logo{
            height: 100%;
            width: 100%;
            object-fit: contain;
            
         }
            .subjectLine{
                margin: 10px 0px;
            }
            .quotation-table{
                margin: 10px 0px;
            }

          
            .footer-design{
                width: 100%;
                margin: 0px;
                font-family: 'Times New Roman', Times, serif
            }
            .address-bar{
                width: 40%;
                float: left;
            }
            .space-between{
                width: 10%;
                float: left;
            }
            .findus-bar{
                 width: 50%;
                float: right;
            }
            .sub-find-us{
                width: 100%;
            }
            .phone-sec{
                width: 50%;
                float: left;
            }
            .website-sec{
                width: 50%;
                float: right;
                position: relative;
            }
            .image-class{
                filter: opacity(0.5);
            }


  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       
</head>
<body>
  <header>
      <img src="{{ public_path().'/siteasset/img/templogo-black.png' }}" alt="Logo" 
        height="50"  class="image-class"
      />
    </header>
  <footer class="clearfix">
      <div class="footer-design" id="foot-design"> 
          <div class="address-bar">
                             <h4>Address</h4>
                             <span class="underline"></span>
                             hosue #34; road #34 mirpur DOHS <br>
                             Dhaka, Bangladesh 1230; 
                         </div>
                         <div class="space-between"></div>
                    
                     <div class="findus-bar">
                         <h4>Find Us</h4>
                             <span class="underline"></span>
                             <div class="sub-find-us">
                                 <div class="phone-sec">
                                     <div class="phone-call">
                             <strong style="color:black">  Call Us </strong> <br>
                              01767365346
                          </div>
                                 </div>
                              
                                 <div class="website-sec">
                                     <div class="v-divider"></div>
                                      <div class="website">
                             <strong style="color:black"> Website </strong> <br>
                              www.studiobitmap.com
                          </div>
                                 </div>
                             </div>
                          
                         
                     </div>
                
            </div>
    </footer>
  <main>
      
    <div class="printbody">
        
          <div class="quotation-table">
             <div class="top-content-container" id="top_pages_content_de">
          
            <p class="date-holder">
                Date: 2<sup>th</sup> Jan 2019
            </p>
            <div class="qoute-to-adderess">
                <p>Quotation To</p> 
                <strong>Md. Jamal Hossain</strong>
                <address>23#rd, Uttara Dhaka, 1230, Bangladesh</address>
            </div>

            <div class="subjectLine">
                <p>Subject: Softexpo quotation send</p>
            </div>

            <div class="greet-writing">
                <p>
                    Dear Sir, <br>
Had talked over phone with you regarding Basis Soft expo 2019 stall design & decoration, we are quoting out of best rate of perspective area the BOQ, note, terms and conditions are mentioned in the following pages: 
                </p>
            </div>
            


           

        </div>
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <td>S.L</td>
                            <td>Description</td>
                            <td>Quantity</td>
                            <td>Unit</td>
                            <td>Rate</td>
                            <td>Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                             <tr> 
                             <td>a</td>
                             <td>Wood work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base.  Wooden Base: 3” thick wooden base. Wooden Base: 3” thick wooden base. Wooden Base: 3” thick wooden base.  </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>b.</td>
                             <td>Plastic work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr> 
                        <tr>
                             <td>b.</td>
                             <td>Plastic work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>b.</td>
                             <td>Plastic work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr> 
                         <tr>
                             <td>b.</td>
                             <td>Plastic work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>b.</td>
                             <td>Plastic work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr> 
                         <tr>
                             <td>b.</td>
                             <td>Plastic work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>b.</td>
                             <td>Plastic work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>f.</td>
                             <td>Plastic work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>h.</td>
                             <td>Plastic work</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>1</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Wooden Base: 3” thick wooden base. </td>
                             <td>128</td>
                             <td>sft</td>
                             <td>60</td>
                             <td>7680.00</td>
                         </tr>
                    </tbody>
                </table>
            </div></div>
   
  </main>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
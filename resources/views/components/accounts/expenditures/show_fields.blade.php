



@section('styles')
<style>
        @import url('https://fonts.googleapis.com/css?family=Bungee');
         .company-information{
            
         }
         .pay-for{
             position: relative;
         }     
         .pay-for::before{
             position: absolute;
             content: "Showmik";
             left: 31%;
             top: -7px;
         } 
         .expense-details{
            width: 100%;
            height: auto;
            border: 16px solid #ddd;
            border-left: none;
            border-right: none;
         }   
         .right-side-design{
            margin-left: 28px;
         }
         .footer-prepare-design{
            line-height: 13px;
         }

</style>
    
@endsection



<div class="company-information">
    <img src="{{ asset('siteasset/img/templogo-black.png') }}" style="width: 98px;" />
    
      <p style="font-size:11px; font-weight:bold">A Splendid Craft Art    <br>
       
    </p>
     
     
      
</div>
<div class="row">
     <div class="col">
            <div class="employee-information" style="padding: 20px 0px;">
                   <p class="pay-for"> 
                       <strong>Pay for : </strong> <span class="bar"> ---------------------------------- </span> </p> <p>  <strong>Description:</strong> </p>
                </div>
     </div>
     <div class="col">
         
          <div class="right-side-design">
          <h4 style=" text-transform: uppercase;
          font-weight: 800;
          margin: 0px;
          margin-top: 3px; font-size: 31px;" >Pay Slip</h4>
          <span class="underline" style="width:62%;background: #f9bf23;"></span>
          
          <p> <span style="color: #100e07;
            font-weight: bold;
        "> Date </span> 2019-12-05</p>
        </div>
     </div>
</div>

 <div class="expense-details" style="padding:20px">
     <div class="row">
         <div class="col">
                <p><strong>In Words:</strong>-------------------------------</p>
                <p><strong> Account from:  </strong></p>
         </div>
         <div class="col">
               <p> <br><br> Amount</p>
         </div>
     </div>
 </div>

       <div class="row" style="margin-top:31px">
           <div class="col">
               <div class="footer-prepare-design">
               <span>
                   
                   -------------
                </span>
                 <br>
                   <span> Prepared By</span>
                </div>
                   
               
           </div>
           <div class="col">
                <div class="footer-prepare-design" style="text-align:center">
            <span>
                
                ---------------
            </span>
            <br>
               <span>Authorized By </span> 
                </div>
            
           </div>
           <div class="col">
                <div class="footer-prepare-design" style="text-align:right">
            <span>
                 
                -------------
            </span>
            <br>
                <span>Head of A/C</span>
                </div>
           
           </div>
           
       </div>

   <div class="row" style="margin-top:25px">
       <div class="col">@include('layouts.print-footer')</div>
   </div>










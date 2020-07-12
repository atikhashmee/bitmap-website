




@section('styles')
<style>

         .company-information{
             width: 50%;
             margin: 0 auto;
         }     

</style>
    
@endsection



<div class="company-information">
      <h4 style="text-align:center;"> <strong>Studio Bitmap</strong> </h4>
      <p style="text-align:center;">House No. 18, Road No. 04, <br>
        Block – A, Banasree, Dhaka – 1219
    </p>
      
</div>
<div class="row">
     <div class="col">
            <div class="employee-information">
                    <p> <strong>Employee Name : </strong> {{ $users->member_name }} <br>
                        <strong>Designation:</strong>  {{ $users->designation }}  <br>
                        <strong>Working Hourse </strong> 120hrs <br>
                        <strong>Month </strong> April <br>
                        
                    </p>
             </div>
     </div>
     <div class="col">
          <h1 style="padding:30px;" >Salery Pay Slip</h1>
     </div>
</div>



<table class="table table-bordered">
        
        <tbody>
            <tr>
                <th>Salery Amount</th>
                <td></td>
                <td> {!! $paysalery->payamount !!} </td>
            </tr>
            <tr>
                <th rowspan="3">Deducted Amounts</th>
            
            </tr>
            <tr>
                <td>tax</td>
                <td>{!! $paysalery->tax !!}</td>
            </tr>
            <tr>
                <td>Loan</td>
                <td>{!! $paysalery->loan !!}</td>
            </tr>
            <tr>
                <td></td>
                <td>Total</td>
                <td>    <?=$paysalery->payamount-(($paysalery->tax/100)*$paysalery->payamount)-$paysalery->loan ?>  </td>
            </tr>
        </tbody>

</table>
<p><strong>In Words</strong> <input type="text" /> </p>
<p>Chief Accountant --</p>










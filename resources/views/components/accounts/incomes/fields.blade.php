

   @section('styles')
          <style>
                .source-type-style{
                     margin-top: 1rem;
                }
              </style>
   @endsection


<table class="table table-bordered">

    <tr>
            <!-- Date Field -->
        <td>
                {!! Form::label('date', 'Date:') !!}
        </td>
        <td>
                {!! Form::date('date', null, ['class' => 'form-control form-control-alternative','id'=>'date']) !!}
        </td>
    </tr>

    <tr>
            <td>
                    <label for=""> Source </label>
            </td>
            <td>
                      <select name="moneysource" id="moneysource" class="form-control form-control-alternative" >
                                  <option value="">Select an option</option>
                                  <option value="baccount">From Bank Account</option>
                                  <option value="client">From Client</option>
                                  <option value="project">From Project</option>
                                
                 </select> 

                        <div id="bank_account"  style="display:none">
                                <div class="form-group source-type-style">
                                        {!! Form::select('account_id', array_add($accounts,'',"Select an account"), null, ['class' => 'form-control form-control-alternative']) !!}
                                </div>
                        </div>
                        <div id="client_source"   style="display:none">
                                        <div class="form-group source-type-style">
                                        {!! Form::select('client_id', array_add($clients,'',"Select a client"), null, ['class' => 'form-control form-control-alternative']) !!}
                                        </div>
                        </div>
                        <div id="project_source"  style="display:none">
                                        <div class="form-group source-type-style">
                                        {!! Form::select('project_id',array_add( $projects, '','Select a Project'), null, ['class' => 'form-control form-control-alternative']) !!}
                                        </div>
                        </div>

            </td>
    </tr>

    <tr>
            <!-- Amount Field -->
        <td>
                {!! Form::label('amount', 'Amount:') !!}
        </td>
        <td>
                {!! Form::text('amount', null, ['class' => 'form-control form-control-alternative']) !!}
        </td>
    </tr>
    <tr>
            <!-- Description Field -->
        <td>
                {!! Form::label('description', 'Description:') !!}
        </td>
        <td>
                {!! Form::textarea('description', null, ['class' => 'form-control form-control-alternative']) !!}
        </td>
    </tr>
    <tr>
            <!-- Carrier Field -->
            <td>
                    {!! Form::label('carrier', 'Carrier:') !!}
            </td>
            <td>
                    {!! Form::text('carrier', null, ['class' => 'form-control form-control-alternative']) !!}
            </td>
    </tr>
    <tr>
        <td></td>
        <td>
                {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
                <a href="{!! route('incomes.index') !!}" class="btn btn-default">Cancel</a>
        </td>
    </tr>
</table>




@section('scripts')
<script>
       
      document.getElementById('moneysource').addEventListener("change",function(event){
           var res = event.target.value;
            if(res === "baccount") {
                 document.getElementById("bank_account").style.display="block";

                 document.getElementById("client_source").style.display="none";
                 document.getElementById("project_source").style.display="none";
            }
            else if(res === "client"){
                document.getElementById("client_source").style.display="block";

                document.getElementById("project_source").style.display="none";
                document.getElementById("bank_account").style.display="none";
            }
            else if(res === "project"){
                document.getElementById("project_source").style.display="block";

                document.getElementById("bank_account").style.display="none";
                document.getElementById("client_source").style.display="none";
            }
       });

</script>
    
@endsection







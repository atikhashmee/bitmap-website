@extends('layouts.app')
@section('content')
@include('components.accessories.invoicre_menu')
<div class="container">
    <div class="card">
     <div class="card-body">
   <div class="row">
     
      <div class="col-md-8" style="margin:0 auto;">
          <form action="{{ url("Admin/Invoice/updateItems/".$editabledata->id ) }}"  method="post">
                    @csrf 
                    <div class="form-group">
                        <label>Item Name</label>
                        <input id="item_name" name="item_name" class="form-control"
                         type="text"
                    value="{{ $editabledata->Item_name }}"
                          />
                    </div>
                  <div class="form-group">
                      <label >Unit</label>
                      <input id="unit"  name="unit" class="form-control" 
                      type="text"
                  value="{{ $editabledata->Item_unit }}" 
                      />
                  </div>
                 <div class="form-group">
                     <label >Price</label>
                     <input id="price" name="price" class="form-control" type="text" 
                     value="{{ $editabledata->Item_price  }}" 
                     />
                 </div>
                     <div class="input-group-append">
        <button class="btn btn-outline-primary" type="submit" name="btnupdate">Update</button>
                     </div>
                  </form>
      </div>
    
   </div>
   </div>
   </div>

    
</div>

@endsection

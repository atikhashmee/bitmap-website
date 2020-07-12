@extends('layouts.app')
@section('content')
@include('components.accessories.invoicre_menu')
<div class="container">
    <div class="card">
     <div class="card-body">
   <div class="row">
      <div class="col-md-4">
          <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>SL</th>
                              <th>Item Name </th>
                              <th>Unit</th>
                              <th>Rate</th>
                              
                           </tr>
                        </thead>
                        <tbody>
                                
                             @foreach ($itemslists as $item)
                                 <tr>
                                     <td> {{ $loop->iteration }} </td>
                                     <td> {{ $item->Item_name }} 
                                       <a href="{{ url('Admin/Invoice/editItems/'.$item->id) }}"> <i class="fa fa-pencil" aria-hidden="true"></i>  </a> 
                                     <a href="{{ url('Admin/Invoice/deleteItems/'.$item->id) }}" onclick="return confirm('Are you sure?')"> <i class="fa fa-times" aria-hidden="true"></i></a> 
                                       
                                    </td>
                                     <td> {{ $item->Item_unit }} </td>
                                     <td> {{ $item->Item_price }} </td>
                                 </tr>
                             @endforeach
                           
                        </tbody>
                     </table>
              
      </div>
      <div class="col-md-8">
          <form action="{{ url("Admin/Invoice/saveNew") }}"  method="post">
                    @csrf 
                    <div class="form-group">
                        <label>Item Name</label>
                        <input id="item_name" name="item_name" class="form-control" type="text" />
                    </div>
                  <div class="form-group">
                      <label >Unit</label>
                      <input id="unit"  name="unit" class="form-control" type="text">
                  </div>
                 <div class="form-group">
                     <label >Price</label>
                     <input id="price" name="price" class="form-control" type="text">
                 </div>
                     <div class="input-group-append">
        <button class="btn btn-outline-primary" type="submit" name="btnupdate">Create</button>
                     </div>
                  </form>
      </div>
    
   </div>
   </div>
   </div>

      <div class="card" style="margin-top:20px;">
          <div class="card-body">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="w-75" style="margin:0 auto">
                          <form method="post" style="margin-bottom:20px;" 
                          action="{{ url('Admin/Invoice/saveNewItemHead') }}">
                          @csrf
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                        <label for="my-input">Head Name</label>
                                        <input id="headname" name="headname" class="form-control" type="text">
                                    </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                       <button class="btn btn-outline-primary" 
                                       style="position:absolute;top:30px;">Add <i class="fa fa-plus" aria-hidden="true"></i> </button>
                                    </div>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-light table-bordered">
                                    <thead><tr> <th>SL</th>
                                    <th>Name</th>
                                     </tr></thead>
                                    <tbody>
                                        @foreach ($itemHeads as $itemh)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ $itemh->item_head_name }} <a href="{{ url('Admin/Invoice/delItemHead/'.$itemh->id) }}" onclick="return confirm('Are you sure? ')"> <i class="fa fa-times" aria-hidden="true"></i> </a>  </td>
                                           
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>

@endsection






<div class="container">
   <div class="row">
    @foreach($vendors as $vendor)
     <div class="col-md-3 each-type">
        
       <div class="card vendor-card-holder">
         <div class="card-body text-center">
           <img src="//unsplash.it/150/150" class="rounded-circle" alt="">
           <div class="short-info">
             <h4><strong >{!! $vendor->vendor_name !!}</strong></h4>
              <p>{!! $vendor->contact_number !!}</p>
             <p>{!! $vendor->email !!}</p>
           </div>
            {!! Form::open(['route' => ['vendors.destroy',request()->route('vendor_type_id'),$vendor->id], 'method' => 'delete']) !!}
               <div class="position-absolute carset-close" >
                {{--   <button type="button" class="close" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>  --}}
   
   {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'close text-white text-right ', 'onclick' => "return confirm('Are you sure?')"]) !!}
 
               </div>
               
               <div class="position-absolute carset-edit" >
               
                 <a href="{!! route('vendors.edit', [request()->route('vendor_type_id'),$vendor->id]) !!}"  class="close" aria-label="Close">
                   <i class="fa fa-edit" style="font-size:16px; color:white"></i>
  </a>
  
  
               </div>
                 {!! Form::close() !!}
         </div>
       </div>
        
     </div>

       @endforeach
   </div>
</div>





{{--  
<div class="table-responsive">
        <table class="table align-items-center table-dark">
        <thead >
            <tr>
                <th scope="col">Vendor Type</th>
                <th scope="col">Vendor Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
                @foreach($vendors as $vendor)
                <tr>
                    <td>{!! $vendor->vendortype->title !!}</td>
                    <td>{!! $vendor->vendor_name !!}</td>
                  
                    <td>{!! $vendor->contact_number !!}</td>
                    <td>{!! $vendor->email !!}</td>
                   
                    
                    <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        {!! Form::open(['route' => ['vendors.destroy', $vendor->id], 'method' => 'delete']) !!}
                                        
                                            <a href="{!! route('vendors.show', [$vendor->id]) !!}" class="dropdown-item" >
                                            <i class="fa fa-eye"></i></a>
                                            <a href="{!! route('vendors.edit', [$vendor->id]) !!}" class="dropdown-item" >
                                            <i class="fa fa-edit"></i></a>
                                            {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'dropdown-item', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        
                                        {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                </tr>
            @endforeach
           
        </tbody>
    </table>
    
    </div>
  --}}





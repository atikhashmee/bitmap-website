
  <div class="container">
     <div class="row">
   @foreach($vendorTypes as $vendorType)

        <div class="col-md-3 each-type">
           <div class="card vendor-card-holder">
             <div class="card-body text-center position-relative">
               <p> <a href="{{ url('Admin/'.$vendorType->id.'/vendors') }}">{!! $vendorType->title !!}</a>  </p> 
                <p> ( {{ $vendorType->vendors->count()   }}  )  </p>
                 {!! Form::open(['route' => ['vendorTypes.destroy', $vendorType->id], 'method' => 'delete']) !!}
               <div class="position-absolute carset-close" >
                {{--   <button type="button" class="close" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>  --}}
   
   {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'close text-white text-right ', 'onclick' => "return confirm('Are you sure?')"]) !!}
 
               </div>
               
               <div class="position-absolute carset-edit" >
               
                 <a href="{!! route('vendorTypes.edit', [$vendorType->id]) !!}"  class="close" aria-label="Close">
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
<table class="table table-bordered" id="vendorTypes-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Details</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($vendorTypes as $vendorType)
        <tr>
            <td>{!! $vendorType->title !!}</td>
            <td>{!! $vendorType->details !!}</td>
            <td>
                {!! Form::open(['route' => ['vendorTypes.destroy', $vendorType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vendorTypes.show', [$vendorType->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('vendorTypes.edit', [$vendorType->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>  --}}
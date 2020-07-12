

@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-3">
     @include('components.website-control.webcontrol-menu')
  </div>
  <div class="col-md-9">
        @include('components.website-control.webcontrol-header')
  <div class="row">
	      	<div class="col-4">
	      	<div class="card card-body">
			 <form action="{{ url("Admin/Protfolio/saveFaqs/".request()->route('id')) }}" class="form" method="post">
             @csrf
                <div class="legendbtnholder">
                <legend> Add FAQs</legend>
                <button type="button"  class="addmorebtn btn btn-sm btn-outline-primary sm pull-right" onclick="addmore()">Add more <i class="fa fa-plus"></i></button>
                </div>
                
                <div id="holder">
                <div id="items" class="itemholder">
                  
                <div class="form-group">
                  <label for="">Fact Title</label>
                  <input type="text" name="title[]" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Fact Description</label>
                  <input type="text" name="descrp[]" class="form-control">
                </div>
                </div>
                </div>
                <div class="form-group">
                	<button name="savefaqs" class="btn btn-outline-primary"> Save <i class="fa fa-floppy-o"></i> </button>
                </div>
			 </form>
			 
			 </div>
			 </div>
			 <div class="col-8">
			 	<div class="card card-body">
			 		<table class="table table-bordered">
			 			<thead>
                             <tr>
			 				<th>SL</th>
			 				<th>Title</th>
			 				<th>Description</th>
                             <th>Action</th>
                             </tr>
			 			</thead>
			 			<tbody>
			 			  @foreach ($faqs as $faq)
                               <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $faq->title }}</td>
                              <td>{{ $faq->description }}</td>
                                <td> <a href="{{ url("Admin/Protfolio/delFaqs/".$faq->id) }}" onclick="return confirm('Are you sure?')"  > <i class="fa fa-times-circle-o" style="font-size: 20px !important;
    color: red !important;" aria-hidden="true"></i> </a> </td>
                               </tr>
                           @endforeach
			 			</tbody>
			 		</table>
			 	</div>
			 </div>
	      </div>
</div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
  var cntr =0;
function addmore()
{
 cntr++;
   $("#holder").append('<div id="items_'+cntr+'" class="itemholder"><button type="button" onclick="removeItem('+cntr+')" class="btn btn-sm btn-outline-danger closebtn "><i class="fa fa-times"></i></button><div class="form-group"><label for="">Fact Title</label><input type="text" name="title[]" class="form-control"></div><div class="form-group"><label for="">Fact Description</label><input name="descrp[]" type="text" class="form-control"></div></div>');
}

function removeItem(id) 
{
   var ele =  document.getElementById("items_"+id);
   ele.style.display = 'none';
   //alert(id);

}
</script>
    
@endsection

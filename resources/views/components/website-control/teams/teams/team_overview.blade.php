@extends('layouts.app')

  @section('styles')
  <style>

        
   </style>
       
  @endsection

@section('content')

   <div class="row">
     
     
      




            @foreach ($teamtypes as $tt)  
                     @foreach ($tt->members as $member)

                     <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
           <img src="//unsplash.it/100/100" class="rounded-circle" alt="">
          
         <div class="card-content">
              <h4><strong>{{ $member->member_name }}</strong></h4>
           <p>{{ $member->types->category_title }} / {{ $member->designation }}</p>
          </div>
          
          <div class="badge badge-default"> Overview </div>
          <div class="badge badge-default"> Project </div>
          <div class="badge badge-default"> Profile </div>
        </div>
      </div>
    </div>
                     <!-- <div class="col-md-3">
                         <div class="card">
                           <img class="card-img-top" 
                           
                           src="{{ asset('storage/'.$member->memberimage) }}"
                          
                           alt="">
                           <div class="card-body">
                              <h5 class="card-title"> <a href="#" >{{ $member->member_name }} </a>
                                  - <small> {{ $member->designation }} </small> 
                                  </h5>
                              <p class="card-text">Content</p>
                           </div>
                           
                           <div class="card-footer" style="padding:0px;">
                              <ul style="display: flex; list-style:none;" >
                                 <li style="flex-basis: 100%;"> <a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> </a> </li>
                                 <li style="flex-basis: 100%;"> <a href="{{ url("Admin/Team/editMember/".$member->id) }}"> <i class="fa fa-pencil" aria-hidden="true"></i></a> </li>
                                 <li style="flex-basis: 100%;"> <a 
                                    href="{{ url("Admin/Team/deleteMember/".$member->id) }}"
                                    onclick="return confirm('Are you sure?')"
                                    > <i class="fa fa-times" aria-hidden="true"></i> </a> 
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div> -->
                     @endforeach
                    
                     
                    
            @endforeach
        
     
     
   </div>


@endsection

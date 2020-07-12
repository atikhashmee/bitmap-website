@extends('layouts.app')

  @section('styles')
  <style>
      .card{
      flex-direction: column;
      }

      .teamheadline{
         width: 100%;
         overflow: hidden;
         background-color: #ddd;
      }
      .control-option{
              display: flex; 
              list-style:none;
              margin: 0;
              
              float: right;
             
      }
      .control-option>li{ 
          padding: 15px;
          background-color: #ccc;
          color: #ffffff;
          cursor: pointer;
      }
      .each-members-container{
          border: 2px solid #ddd;
          border-top: none;
          background-color: #fff;
          padding: 20px;
      }
      .left-headline{
          float:left;
          padding: 15px;
      }
      .addnewbutton{
              border-radius: 50%;
            background-color: #010101;
            color: #fff;
            cursor: pointer;
            position: relative;
            height: 60px;
            width: 60px;
      }
      .addnewbutton::before{
              position: absolute;
content: "";
width: 4px;
height: 100%;
top: 0px;
right: 50%;
background-color: #cc0;
          
      }
      .addnewbutton::after{
         position: absolute;
content: "";
width: 100%;
height: 4px;
top: 50%;
left: 0px;
background-color: #cc0;

      }
      
   </style>
      
  @endsection

@section('content')

   <div class="row">
      <div class="col-md-3">
         <div class="left-sidebar-website">
           @include('components.website-control.webcontrol-menu')
         </div>
       </div>
      <div class="col-md-9">
            @include('components.website-control.webcontrol-header')
            @foreach ($teamtypes as $tt)
                 <div class="row">
           <div class="col-md-12">
               <div class="teamheadline">
                     <div class="left-headline">
                      {{ $tt->category_title}}
                     </div>
                        <ul class="control-option">
                        
                          <li> <i class="fa fa-minus-square foldup" id="{{$loop->iteration}}"  aria-hidden="true"></i> </li>
                          <li> <i class="fa fa-times-circle" aria-hidden="true"></i> </li>
                      </ul>
                 </div>
           </div>
            <div class="col-md-12">
                  <div class="each-members-container ">
                        @php
                            $teammembers = Foo::getTeamMemberByTypeId($tt->id);
                        @endphp
                        <div class="row" id="foldinup_{{$loop->iteration}}">
                          
                           <div class="col-md-3">
                              <a href="{{ url("Admin/Team/createForm/".$tt->id) }}">
                                  <div  class="addnewbutton"></div>
                              </a>
                          
                             </div>
                            
                     @foreach ($teammembers as $member)
                     <div class="col-md-3">
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
                                 <li style="flex-basis: 100%;"> <a href="{{ url("Admin/Team/editMember/".$member->id) }}"> Edit</a> </li>
                                 <li style="flex-basis: 100%;"> <a 
                                    href="{{ url("Admin/Team/deleteMember/".$member->id) }}"
                                    onclick="return confirm('Are you sure?')"
                                    > <i class="fa fa-times" aria-hidden="true"></i> </a> 
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     @endforeach
                      </div>
                     
                     </div>
            </div>
            


         </div>
            @endforeach
        
      </div>
     
   </div>


@endsection

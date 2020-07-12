@extends('layouts.app')
@section('content')

   <div class="row">
      <div class="col-md-3">
         <div class="left-sidebar-website">
           @include('components.website-control.webcontrol-menu')
         </div>
       </div>
      <div class="col-md-9">
            @include('components.website-control.webcontrol-header')
              <div class="card card-body">
              <form action="{{ url("Admin/Team/updateMember/".$member->id) }}" class="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-10">
                       <label for="example-text-input" class="col-form-label">Team Member Type</label>
                        <input 
                        type="hidden" 
                        name="dbmembertype"
                        value="{{ $member->team_types_id }}"
                          />
                       <select class="form-control" id="membertype" name="membertype">
                       <option value="">Select a type</option>
                         @foreach ($teamtypes as $type)
                        <option value="{{$type->id}}">{{$type->category_title}}</option>
                         @endforeach
                     </select>
                    </div>
                    <div class="col-md-2">
                      <a href="#" style="position: absolute;top: 35px" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
                    </div>
                    
                  </div>
                  <div class="form-group">
                     <label for="example-text-input" class="col-form-label">Team Member Name</label>
                     <input class="form-control" type="text"  id="membername" 
                     name="membername"
                  value="{{ $member->member_name }}"
                     />
                  </div>
                  <div class="form-group">
                     <label for="example-search-input" class="col-form-label">Designation</label>
                     <input 
                     class="form-control"
                      type="text" 
                       id="designation" 
                       name="designation"
                       value="{{ $member->designation }}"
                       />
                  </div>
                  <div class="form-group">
                     <label for="example-url-input" class="col-form-label">description</label>
                     <input 
                     class="form-control" 
                     type="text"  
                     id="description" 
                     name="description"
                     value="{{ $member->description }}"
                     />
                  </div>
                  <div class="form-group">
                     <label for="example-url-input" class="col-form-label">Email Address <i class="fa fa-envelope"></i> </label>
                     <input 
                     class="form-control" 
                     type="text"  
                     id="email" 
                     name="email"
                     value="{{ $member->email }}"
                     />
                  </div>
                  <div class="form-group">
                        <label for="example-url-input" class="col-form-label">Status  </label>
                        <select name="employee_status" id="employee_status" class="form-control">
                           <option value="">Select an option</option>
                           <option value="1">Active</option>
                           <option value="2">On leave</option>
                           <option value="3">left</option>
                        </select>
                     </div>
                  <div class="form-group">
                        <label for="my-input">Make this employee visible to the website</label>
                        <input id="my-input"  type="radio" name="visibilty" value="yes" 
                        @if ($member->visibility == 'yes')
                        checked
                        @endif
                            
                       
                         />  Yes
                        <input id="my-input"  type="radio" name="visibilty"  value='no'

                         @if ($member->visibility == 'no')
                        checked
                        @endif
                        />  No
                     </div>
                  <div class="form-group">
                     <label for="example-url-input" class="col-form-label">Linkedin <i class="fa fa-linkedin"></i> </label>
                        <div class="row">
                            <input type="text" class="form-control col-md-6 text-right" readonly value="https://www.linkedin.com/in/">
                            <input 
                            class="form-control col-md-6" 
                            type="text"  
                            id="linedin" 
                            name="linedin"
                            value="{{ $member->linkedin }}"
                            />
                                    </div>
                     
                  </div>
                  <div class="form-group">
                     <label for="example-url-input" class="col-form-label">Twitter Link <i class="fa fa-twitter"></i> </label>
                     <div class="row">
                                          <input type="text" class="form-control col-md-6 text-right" readonly value="https://www.twitter.com/">
                                          <input 
                                          class="form-control col-md-6" 
                                          type="text"  
                                          id="twitterlink" 
                                          name="twitterlink"
                                          value="{{ $member->twitter }}"
                                          />
                            </div>
                     
                  </div>
                  <div class="form-group">
                     <label for="example-url-input" class="col-form-label">Instagram Link <i class="fa fa-instagram"></i> </label>
                            <div class="row">
                                          <input type="text" class="form-control col-md-6 text-right" readonly value="https://www.instagram.com/">
                                          <input 
                                          class="form-control col-md-6" 
                                          type="text" 
                                          id="instalink" 
                                          name="instalink"
                                          value="{{ $member->instagram }}"
                                          />
                            </div>
                     
                  </div>
                  
                     
                     <div class="form-group">
                        <input 
                        type="hidden" 
                        name="dbpersonimage"
                        value="{{ $member->memberimage }}"
                         />
                        <input type="file"  id="personimage" name="personimage">

                     <img src="{{ asset("storage/".$member->memberimage) }}" width="300" height="200" style="object-fit:cover" />

                     </div>
                 
                  <div class="input-group-append">
                     <button class="btn btn-outline-primary" type="submit" name="btnsave">Update <i class="fa fa-floppy-o"></i> </button>
                  </div>
               </form>
            </div>
      </div>
     
   </div>

@endsection
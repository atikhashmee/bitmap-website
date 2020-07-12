@extends('layouts.app')
@section('styles')
    <style>
      .card-body{
        padding: 0px !important;
      }
        .card-header{
          background-color: #232b32;
        }
       
        .card-header>p{
          color: #f9f9f9;
          display: inline-block;
        }
        thead {
          background-color: #4e4e50;
      }
      .table-dark {
        color: #f8f9fe;
        background-color: #232b32;
    }
    </style>
@endsection
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p> User Lists <i class="fa fa-list" aria-hidden="true"></i></p>
                    <a class="btn btn-warning float-right btn-sm" href="{{ url('Admin/register') }}">Create New <i class="fa fa-plus" aria-hidden="true"></i> </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-dark">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>E-mail adress</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($users as $user)
                               <tr>
                                   <td>  {{ $loop->iteration }}</td>
                                   <td>  {{ $user->name }}  </td>
                                   <td>  {{ $user->email }}  </td>
                                   <td>  {{ userType($user->role) }}  </td>
                                   <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a href="#" class="dropdown-item" >
                                                        <i class="fa fa-eye"></i></a>
                                                        <a href="{{ url('Admin/edit_user/'.$user->id) }}" class="dropdown-item" >
                                                        <i class="fa fa-edit"></i></a>
                                                        <a href="{{ url('Admin/delete_user/'.$user->id) }}" onclick="return confirm('Are you sure?')" class="dropdown-item" >
                                                        <i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </td>
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

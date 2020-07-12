@extends('layouts.app')

@section('content')


<div class="container">
                 <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                           <div class="card-header" style=' position:relative; padding:10px;'>
                             <h4>Update Account Category</h4>
                            
                           </div>
                           <div class="card-body">
                              @include('adminlte-templates::common.errors')
                           {!! Form::model($accountCategory, ['route' => ['accountCategories.update', $accountCategory->id], 'method' => 'patch']) !!}

                        @include('components.accounts.account_categories.fields')

                   {!! Form::close() !!}
                           </div>
                           <div class="card-footer text-muted">
                              
                           </div>
                         </div>
                    </div>
                 </div>
             </div>
@endsection
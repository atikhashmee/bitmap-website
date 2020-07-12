@extends('layouts.app')

@section('content')



                  
                        
                             <div class="row">
                                 <div class="col-md-3">
                                    @include('components.accounts.menu')
                                 </div>
                                 <div class="col-md-9">
                                      <div class="card content-section">
                                          <div class="card-header  content-header" > 
                                                <h4>Update Income</h4>
                                          </div>
                                          <div class="card-body">
                                              @include('adminlte-templates::common.errors')
                                              {!! Form::model($income, ['route' => ['incomes.update', $income->id], 'method' => 'patch']) !!}
               
                                              @include('components.accounts.incomes.fields')
                      
                                         {!! Form::close() !!}
                                           </div>
                                      </div>
                                 </div>
                             </div>
                          
@endsection
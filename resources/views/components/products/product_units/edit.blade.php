@extends('layouts.app')

@section('content')





                 <div class="row">
                 <div class="col-md-3">
                    @include('components.products.product_menu')
                 </div>
                 <div class="col-md-9">
                      <div class="card content-section">
                          
                          <div class="card-header  content-header" > 
                        <h4>Update Product Unit</h4>
                            
                          </div>
                          <div class="card-body">
                              @include('adminlte-templates::common.errors')
                           {!! Form::model($productUnit, ['route' => ['productUnits.update', $productUnit->id], 'method' => 'patch']) !!}

                        @include('components.products.product_units.fields')

                   {!! Form::close() !!}
                           </div>
                           
                      </div>
                 </div>
             </div>
@endsection
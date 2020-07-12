@extends('layouts.app') 

@section('content') {{-- this page is kept for overview of the project --}}
<style>
    
    
    .content-box {
        width: 100%;
        height: 118px;
        background-color: #212529;
        padding: 20px;
        border: 2px solid #212529;
        margin-bottom: 10px;
    }
    
    .content-details {
        text-align: center;
        line-height: 7px;
        
    }
    .content-details > h4,p {
          color: white;
          
    }
</style>

<div class="row">
    <div class="col-md-3">
        @include('components.products.product_menu')
    </div>
    <div class="col-md-9">
        <div class="card content-section">

            <div class="card-header  content-header">
                <h4>Product dashboard  Overview</h4>
            </div>
            
                
        </div>
    </div>
</div>

@endsection
@extends('layouts.app') @section('content') {{-- this page is kept for overview of the project --}}
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
        @include('components.accounts.menu')
    </div>
    <div class="col-md-9">
        <div class="card content-section">

            <div class="card-header  content-header">
                <h4>Accounts Overview</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="content-box">

                            <div class="content-details">
                                <h4>Expenditure</h4>
                                <p><b>{{ $expenditure }}</b></p>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="content-box">

                            <div class="content-details">
                                <h4>E. Loans</h4>
                                <p><b>{{ $loans }}</b></p>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="content-box">

                            <div class="content-details">
                                <h4>Incomes</h4>
                                <p><b>{{ $income }}</b></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="content-box">

                            <div class="content-details">
                                <h4>Salery</h4>
                                <p><b>{{ $saleries }}</b></p>
                            </div>

                        </div>
                    </div>
                   

                </div>

            </div>

        </div>
    </div>
</div>

@endsection
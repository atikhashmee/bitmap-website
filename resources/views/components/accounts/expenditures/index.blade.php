@extends('layouts.app') @section('content')

<div class="row">
    <div class="col-md-3">
        @include('components.accounts.menu')

    </div>
    <div class="col-md-9">
        <div class="card content-section">

            <div class="card-header  content-header">
                <h4>Expenditures</h4>
                <a href="{!! route('expenditures.create') !!}" class='btn btn-warning float-right' style="position:absolute;top:10px;right:10px;"> Add new</a>

            </div>
            <div class="card-body">
                @include('flash::message')
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('Admin/Accounts/expenditures/dates') }}" method="POST">
                            @csrf
                            <div class="row p-2">

                                <div class=" col-sm-2">
                                    <div class="form-group">
                                        <label for="my-input">Start Date</label>
                                        <input type="date" name="stdate" class="form-control form-control-alternative" />
                                    </div>
                                </div>
                                <div class=" col-sm-2">
                                    <div class="form-group">
                                        <label for="my-input">End Date</label>
                                        <input type="date" name="endate" class="form-control form-control-alternative" />
                                    </div>

                                </div>
                                <div class=" col-sm-2">
                                    <div class="form-group">
                                        <label for="my-input">Employee</label>
                                        <select name="employee" class="form-control form-control-alternative">
                                            <option value="">--Employee--</option>
                                            @foreach ($teamMembers as $member)
                                            <option value="{{ $member->id }}">{{ $member->member_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <Button class="btn btn-outline-danger btn-xs-sm position-absolute" style="top:35px;">Search <i class="fa fa-search" aria-hidden="true"></i></Button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('components.accounts.expenditures.table')
                    </div>
                </div>

            </div>
            <div class="card-footer">

                @include('adminlte-templates::common.paginate', ['records' => $expenditures])

            </div>
        </div>
    </div>
</div>

@endsection
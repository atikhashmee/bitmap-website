@extends('layouts.admin')

@section('content')

<div class="row">
    <section class="col-lg-7 connectedSortable ui-sortable">
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Sliders</h3>
                <div class="card-tools">
                    <a href="{{route('admin.sliders.create')}}" class="btn btn-primary">Create New</a>
                </div>
            </div>
            <div class="card-body">
                @include('components.website-control.sliders.index')
            </div>
        </div>




      <!-- /.card -->
    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable ui-sortable">

      <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>About US</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @include('components.website-control.about.aboutus')
        </div>
    </div>

      <!-- solid sales graph -->
      <div class="card bg-gradient-info">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="fas fa-th mr-1"></i>
            Sales Graph
          </h3>

          <div class="card-tools">
            <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas class="chart chartjs-render-monitor" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 627px;" width="627" height="250"></canvas>
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-transparent">
          <div class="row">
            <div class="col-4 text-center">
              <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

              <div class="text-white">Mail-Orders</div>
            </div>
            <!-- ./col -->
            <div class="col-4 text-center">
              <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

              <div class="text-white">Online</div>
            </div>
            <!-- ./col -->
            <div class="col-4 text-center">
              <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

              <div class="text-white">In-Store</div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </section>
    <!-- right col -->
  </div>

@endsection

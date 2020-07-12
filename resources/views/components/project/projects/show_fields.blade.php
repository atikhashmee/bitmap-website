








<div class="row">
      <div class="col">
           <div style="text-align:center; line-height:12px;">
               <h3 style="margin-bottom:0px;">{!! $project->project_title !!}</h3>
                <div style=" width: 13%;
      height:4px;
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
         padding: 10px;
    margin: 0 auto;"></div>
               <p style="line-height: 15px;
    font-size: 17px;"> <strong> Client Name : </strong> {!! $project->client->Compnay_name !!} <br>
                <strong>Site Location :    </strong>  {!! $project->location !!} <br>
                 <strong> Project Budget : </strong>  {!! $project->budget !!} </p>
           </div>
      </div>
</div>


 <div class="table-responsive">
<table class="table table-bordered table-light">
     <thead>
       <tr>
           <th>#SL</th>
             <th> Task Name </th>
             <th> Vendors </th>
             <th> Teams </th>
             <th> Amount </th>
       </tr>
     </thead>
    <tbody>
          @foreach ($tasks as $task)
                <tr>
            <td>{{ $loop->iteration }}</td>
             <td> {{ $task->task_name  }} </td>
             <td> 
                  <ol>
                            @foreach ($task->projectVendors as $taskvendor)
                            <li> {{ $taskvendor->vendors->vendor_name }} </li>
                            @endforeach

                        </ol>
              </td>
             <td> 
             
             <ol>
                            @foreach ($task->projectTeams as $taskproject)
                            <li> {{ $taskproject->teams->member_name }} </li>
                            @endforeach
                        </ol>
              </td>
             <td>  {{ $task->budget  }} </td>
           </tr>
          @endforeach
    </tbody>
</table>
</div>

<div class="row" style="margin-top:50px;">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="each-overview">
                      <h3 class="card-title">Vendor Payment <br> {{  number_format($vpayment,2,'.','')  }} <h3>
                      
                </div>
               
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
               <div class="each-overview">
                      <h3 class="card-title">Expense <br> {{  number_format($expnse,2,'.','')  }} </h3>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col">  {{--start of coloumn --}}
        <div class="card">
            <div class="card-body">
                <div class="each-overview">
                      <h3 class="card-title">Goods <br>  {{  number_format($goodsbuy,2,'.','')  }}</h3>
                     
                </div>
            </div>
        </div>
    </div>     {{--end of coloumn --}}

    <div class="col">  {{--start of coloumn --}}
        <div class="card">
            <div class="card-body">
                <div class="each-overview">
                      <h3 class="card-title">Collections <br>   {{  number_format($collection,2,'.','')  }}</h3>
                      
                </div>
            </div>
        </div>
    </div>     {{--end of coloumn --}}
</div>





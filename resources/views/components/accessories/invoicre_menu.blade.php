
  <style>
      .card{
          padding: 0px;
      }
        .menu-item>a{
            margin: 0px;
            padding: 20px;
            border-right: 2px solid #ddd;
            font-size: 20px;
            background: black;
            color: yellow;
        }
  </style>
  
  
  <div class="container" style="margin-bottom: 20px;">
       <div class="card">
      <div class="card-body">
          <div class="d-flex menu-item">
          <a href="{{ url('Admin/Invoice/Create') }}"> Create </a>
            <a href="{{ url('Admin/Invoice/Items') }}"> Items </a>
            {{-- <a href=""> Adress </a> --}}
        </div>
      </div>
  </div>
  </div>
 
  
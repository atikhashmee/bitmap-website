@extends('layouts.app')
@section('content')
@include('components.accessories.invoicre_menu')
<div class="container">
   <style>
      .addlist{
         position:absolute;
         top: 20px;
         float: left;
      }
      label{
         font-size: 15px;
      }
      input{
         width: 50%;
         padding: 5px;
      }
      .row-controller>button{
         padding: 10px;
         text-align: center;
         margin-right: 5px;
         outline: none;
         border: none;
         cursor: pointer;
         background: #000;
         color: yellow;

      }
      .row-controller>button:hover{
         background: #010101;
         color: white;
      }
     .table td{
         padding: 0px;
      }
     
   </style>
   <div class="row">
      <div class="col-md-12">
              <div class="card ">
                  <div class="card-body">
              <form action="{{ url("Admin/aboutupdate") }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                       <div class="col-md-6">
                          <div class="form-group">
                     <input  type="date"  id="date" name="date" value="2/1/2019" >
                     </div>
                     <div class="form-group">
               <input  type="text"  id="companyname" name="compnayname" placeholder="To John Due" >
               </div>
               <div class="form-group">
                 
               <input  type="text"  id="address" name="address" placeholder="23#rd,#4ln, Dhaka,1230" >
               </div>
               <div class="form-group">
               <input  type="text" id="address" name="address" placeholder="Subject line " >
               </div>
                       </div>
                       <div class="col-md-6"></div>
                    </div>
                  <div class="form-group">
                        <textarea class="letterbox" rows="3" type="search" id="history-description" name="history-description"></textarea>
                        
                     </div>  
                     <div class="d-flex pull-right row-controller ">
                         <button type="button" onclick="addItemToList()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                         <button type="button" onclick="addHeadList()"><i class="fa fa-question" aria-hidden="true"></i></button>
                     </div>
                      <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>Description </th>
                              <th>Quantity</th>
                              <th>Unit</th>
                              <th>Rate</th>
                              <th>Amount</th>
                           </tr>
                        </thead>
                        <tbody id="item-holder">
                            <tr>  
                              <td colspan="5"><input type="text" class="form-control itemcategories" placeholder="Item Categories"  /> </td>
                            </tr>
                           <tr>
                              <td> <input type="text" class="form-control" id="itemhead"  placeholder="Type item Name" /></td> 
                              <td> <input type="number" class="form-control" min="1" value="1" id="quantity" /></td>
                              <td> <input type="text" class="form-control" 
                                 id="itemunit"  
                                 placeholder="item unit"
                                 readonly
                                 />
                              </td>
                              <td> <input type="text" 
                                 class="form-control" 
                                 id="priceitem"
                                 placeholder="unit price"
                                 readonly
                                  /></td>
                              <td rowspan="2"></td>
                           </tr>
                           <tr> <td colspan="4"> 
                              <textarea class="form-control" placeholder="details about item"></textarea>
                            </td> </tr>
                        </tbody>
                     </table>
                     <div class="input-group-append">
        <button class="btn btn-outline-primary" type="submit" name="btnupdate">Update</button>
                     </div>
                  </form>
                  </div>
            </div>
      </div>
    
   </div>
</div>
  <script>

         var heads = <?=json_encode($invoHeads)?>;
         //console.log(heads);

         var itemsnames = <?=json_encode($itemlists)?>;
       //  console.log(itemsnames);
        
                     $(".itemcategories").autocomplete({
                           source:heads,
                           search:function(event,ui){
                                 console.log("head  has been submitted");
                                 
                           }
                     });

             function newObj(item_name,item_unit,item_price){
                    this.value = item_name;
                    this.label = item_name;
                    this.item_unit = item_unit;
                    this.item_price = item_price;
             }

             var itemNames = [];
            itemsnames.forEach(element => {
                  itemNames.push( new newObj(element.Item_name,element.Item_unit,element.Item_price));
            });
            // console.log(itemNames);
            
            $("#itemhead").autocomplete({
                  source: itemNames,
      focus: function( event, ui ) {
        $( "#itemhead" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
         // console.log(ui.item);
         
        $( "#itemhead" ).val( ui.item.label);
        $( "#itemhead" ).val( ui.item.value);
        $( "#itemunit" ).val( ui.item.item_unit);
        $( "#priceitem" ).val( ui.item.item_price);
        return false;
      }
               });
       
     var addItemToList = function(){
           $("#item-holder").append('<tr><td><input type="text" class="form-control" /></td><td> <input type="text" class="form-control" /></td><td> <input type="text" class="form-control"/></td><td> <input type="text" class="form-control" /></td><td rowspan="2" ></td><td rowspan="2"> <a href="#"> <i class="fa fa-times-circle" style="font-size:26px; color:red;" aria-hidden="true"></i> </a></td></tr><tr> <td colspan="4"> <textarea class="form-control"></textarea> </td> </tr>');
     }

     var addHeadList = function(){
         $("#item-holder").append('<tr><td colspan="5"><input type="text" class="form-control itemcategories" placeholder="Item Categories"  /> </td></tr>');
     }
</script>
@endsection
//    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
//   <script src="//code.jquery.com/jquery-1.12.4.js"></script>
//   <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

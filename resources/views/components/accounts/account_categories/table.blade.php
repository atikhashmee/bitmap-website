







<table class="table table-bordered" id="accountCategories-table">
    <thead>
        <tr>
           
        <th>Category</th>
  
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @php
        $travarse  = function($Categories,$prefix=" ") use (&$travarse)
        {
            foreach($Categories as $Category){
                
              echo  
                "<tr>
                      <td> <span class='categoryName' > ".$prefix." ".$Category->Category." </span> </td>
                     
                      <td>".Form::open(['route' => ['accountCategories.destroy', $Category->id], 'method' => 'delete'])."
                      <div class='btn-group'>
                    <a href=".route('accountCategories.show', [$Category->id])." class='btn btn-default btn-xs'>
                    View</a>
                    <a href=".route('accountCategories.edit', [$Category->id])." class='btn btn-default btn-xs'>
                    Edit</a>".
                   Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"])."
                   
                </div>".
                 Form::close()."</td>
                </tr>";
                
                  $travarse($Category->children, $prefix.'-');
                   
            }
        };

         $travarse($accountCategories);
    @endphp
   {{--  @foreach($accountCategories as $accountCategory)
        <tr>
            <td>{!! $accountCategory->parent !!}</td>
            <td>{!! $accountCategory->Category !!}</td>
            <td>{!! $accountCategory->description !!}</td>
            <td>
                {!! Form::open(['route' => ['accountCategories.destroy', $accountCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('accountCategories.show', [$accountCategory->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-eye"></i></a>
                    <a href="{!! route('accountCategories.edit', [$accountCategory->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach --}}
    </tbody>
</table>
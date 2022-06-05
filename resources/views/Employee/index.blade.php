<!DOCTYPE html>
<html>
<head>

</head>
<body>

<h2>HTML Table</h2>
<div class="col-md-2"></div>
   <form action="/search" method="get">
   <div class="input-group">
      <input type="search" name="search"  value="{{request()->get('search')}}" class="form-control">
    &nbsp;
      <input type="search" name="search1" value="{{request()->get('search1')}}" class="form-control">
    
      <span class="input-group-prepend">
         <button type="summit" style="background-color:yellow;">Search</button>
         <br>
      </span>
   </div>
   </form>
   <br><br>
</div>
<div class="container">
  
   @if(session('status'))
   <div class="form group mb-3" style="width:300px;height:60px;border:3px
   background-color:yellow;">{{ session('status') }}</div>
   @endif

<table class="table-sortable">
   <thead>
  <tr>
    <th width="10">id     &uarr; &darr;</th>
    <th width="50%">name</th>
    <th width="30%">phone</th>
    <th width="10%">check</th>
  </tr>
</thead>
<tbody>
   @foreach($bases as $value)
   
  <tr>

     @if($value->check==1)
     <td bgcolor="yellow" >{{ $value->id }}</td>
     <td bgcolor="yellow" >{{ $value->name }}</td>
     <td bgcolor="yellow" >{{ $value->phone }}</td>
     <td bgcolor="yellow">
      <form action="{{ url('employee/'.$value->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for=""></label>
        <input type="checkbox" name="check"  {!! $value->check == 1 ? 'checked':'' !!}
        <div class="form group mb-3">
        <button type="submit" class="btn btn-primary">已確認</button>
     </div>
     </form>
      {{ $value->updated_at }}
     </td>
     @endif

     @if($value->check==0)
     <td>{{ $value->id }}</td>
     <td>{{ $value->name }}</td>
     <td >{{ $value->phone }}</td>
     <td>
      <form action="{{ url('employee/'.$value->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for=""></label>
        <input type="checkbox" name="check"  {!! $value->check == 1 ? 'checked':'' !!}
        <div class="form group mb-3">
        <button type="submit" class="btn btn-primary">確認</button>
     </div>
     </form>
      {{ $value->updated_at }}
     </td>
     @endif
    
      
  </tr>
  @endforeach
</tbody>
</table>



<style>
   table {
     font-family: arial, sans-serif;
     border-collapse: collapse;
     width: 100%;
   }
   
   td, th {
     border: 1px solid #dddddd;
     text-align: left;
     padding: 8px;
   }

   
   tr:nth-child(even) {
     background-color: #dddddd;
   }
   </style>

    <script src="{{ asset('/tablesort.js') }}"></script>
  

</body>
</html>


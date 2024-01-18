<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - Join Multiple Table</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Laravel 5.8 - Join Multiple Table</h3>
     <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
           <thead>
            <tr>
                <th>1</th>
                <th>2</th>
            </tr>
           </thead>
           <tbody>
           @foreach($albums as $row)
            <tr>
             <td>{{ $row->name_alex }}</td>
             <td>{{ $row->name22 }}</td>
            </tr>
           @endforeach
           </tbody>
       </table>
   </div>
  </div>
 </body>
</html>
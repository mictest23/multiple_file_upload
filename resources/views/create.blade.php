<html lang="en">
<head>
  <title>Laravel Multiple File Upload Example</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif

    <h3 class="jumbotron">Laravel Multiple File Upload</h3>
<form method="post" action="{{url('file')}}" enctype="multipart/form-data">
  {{csrf_field()}}

        <div class="input-group control-group increment" >
          <input type="file" name="filename[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
        <div class="clone hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="file" name="filename[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

  </form>        
  </div>


<script type="text/javascript">


    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });
</script>

<table class="table">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>

      

        {{-- @foreach ($file as $key => $value)

            @foreach (json_decode($value->filename) as $value)
                <br><a href="/test">{{ $value }}</a>
            @endforeach

        @endforeach --}}


        @foreach ($file as $key => $value)
          <tr>
            <td>{{ $value->id }}</td>
            <td>
              @foreach (json_decode($value->filename) as $test)
                <a href="files/{{ $test }}">{{ $test }}</a>
              @endforeach
            </td>
          </tr>

        {{-- <tr>
          <td>
            @foreach (json_decode($value->filename) as $value)
              <a href="files/{{ $value }}">{{ $value }}</a>
            @endforeach
          </td> --}}
          {{-- <td><p>{{ $value->id }}</p></td> --}}
        {{-- </tr> --}}
        @endforeach


          {{-- <a href="files/{{ str_replace (array('[', ']', '"'), '' , $files->filename); }}">{{ str_replace (array('[', ']', '"'), '' , $files->filename); }}</a> --}}
          {{-- <a href="files/{{ str_replace (array('[', ']', '"'), '' , $files->filename); }}">{{ $files->filename}}</a> --}}


    </tbody>
  </table>

</body>
</html>
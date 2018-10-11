<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.5 image upload example</title>

    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">
<style>
body
{
 width:100%;
 margin:0 auto;
 padding:0px;
 font-family:helvetica;
}
#wrapper
{
 text-align:center;
 margin:0 auto;
 padding:0px;
 width:995px;
}
#output_image
{
 max-width:300px;
}
</style>
</head>

<body>

<div class="container">

    <div class="panel panel-primary">

      <div class="panel-heading"><h2>Laravel 5.5 image upload example</h2></div>

      <div class="panel-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
        @endif
        @if (count($errors) > 0)
             <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
            <div class="row">
                <div class="col-md-6">
                    {!! Form::file('image', array('class' => 'form-control')) !!}
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>
        {!! Form::close() !!}
      </div>

    </div>

</div>
    <div id="wrapper">
     <input type="file" accept="image/*" onchange="preview_image(event)">
     <img id="output_image"/>
    </div>

<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>

</html>
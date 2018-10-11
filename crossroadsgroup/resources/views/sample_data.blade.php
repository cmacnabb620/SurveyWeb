<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><!-- 
//csvdata start -->
<form class="form-horizontal" method="POST" action="{{ route('import_parse') }}" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
<label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

<div class="col-md-6">
<input id="csv_file" type="file" class="form-control" name="csv_file">

@if ($errors->has('csv_file'))
<span class="help-block">
<strong>{{ $errors->first('csv_file') }}</strong>
</span>
@endif
</div>
</div>
<!-- csv data end -->
<div class="form-group">
<div class="col-md-8 col-md-offset-4">
<button type="submit" class="btn btn-primary">
Parse CSV
</button>
</div>
</div>
</form>

<!-- maatwebsite start -->
<div class="container">
	@if($message = Session::get('success'))
		<div class="alert alert-info alert-dismissible fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">×</span>
	      </button>
	      <strong>Success!</strong> {{ $message }}
	    </div>
	@endif
	{!! Session::forget('success') !!}
	<br />
	<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
	<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
	<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
	<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="import_file" />
		<button class="btn btn-primary">Import File</button>
	</form>
</div>
<!-- maatwebsite end -->
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Datepicker Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    </head>
    <body>
        <div class="container" style="padding-top: 50px;">
    		<div class="row col-md-12">
	        	<form role="form" class="form-horizontal">
					<div class="container">
					    <div class='col-md-4'>
					        <div class="form-group">
					            <div class='input-group date'>
					                <input type='text' class="form-control" id='datetimepicker6' />
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					        </div>
					    </div>			
					    <div class='col-md-4'>
					        <div class="form-group">
					            <div class='input-group date' >
					                <input type='text' class="form-control" id='datetimepicker7' />
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					        </div>
					    </div>
					</div>
				</form>  				
        	</div>
        </div>	
    </body>
    <script type="text/javascript">
		$(document).ready(function() {
		  $(function() {
		    $('#datetimepicker6').datetimepicker();
		    $('#datetimepicker7').datetimepicker({
		      useCurrent: false //Important! See issue #1075
		    });
		    $("#datetimepicker6").on("dp.change", function(e) {
		      $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
		    });
		    $("#datetimepicker7").on("dp.change", function(e) {
		      $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
		    });
		  });
		});
	</script>
</html>
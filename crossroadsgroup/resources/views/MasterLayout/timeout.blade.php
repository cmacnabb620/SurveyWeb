@section('local-style')
<style type="text/css">

</style>
@endsection
<!-- <a href="#timeout-modal" data-toggle="modal">&nbsp;<i class="icon-plus-sign"></i>&nbsp;open modal</a> -->
<div id="timeout-modal" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
		<h3 id="myModalLabel" class="center">Message</h3>
	</div>
	<div class="modal-body">
			<p>
			For security purposes, please click continue below to continue your session. If this is not clicked within 1 minute, you will be automatically logged out.
			</p>		
            <div style="font-size: 18px;font-weight: bold; text-align: center" id="getting-started">
            	
            </div>
            <div class="center">
            <img style="max-width: 10%;" src="{{asset('timer.gif')}}"/>            	
            </div>
            <p class="center">is remaining to logout</p>
	</div>
	<div class="modal-footer">
		<!-- <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button> -->
		<div class="center">
			<a href="{{url('logout')}}" class="btn btn-default"  aria-hidden="true">Logout</a>
            <a class="btn btn-primary" id="confirm_continue" href="javascript:void()" onclick="window.location.reload()">Continue</a>
		</div>
	</div>
</div>

    
    
   
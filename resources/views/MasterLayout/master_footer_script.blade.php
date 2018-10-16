<footer>
	<p>
		<span style="text-align:left;float:left"><i class="fa fa-love"></i><a href="#">Cross-Roads Group</a></span>
	</p>
</footer>
<!-- start: JavaScript-->
<!-- <script src="{{asset('crossroads/js/jquery-1.9.1.min.js')}}"></script> -->
<script src="{{asset('crossroads/js/jquery-migrate-1.0.0.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.ui.touch-punch.js')}}"></script>

<script src="{{asset('crossroads/js/modernizr.js')}}"></script>

<script src="{{asset('crossroads/js/bootstrap.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.cookie.js')}}"></script>

<script src="{{asset('crossroads/js/fullcalendar.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('crossroads/js/excanvas.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.flot.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.flot.pie.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.flot.stack.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.flot.resize.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.chosen.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.uniform.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.cleditor.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.noty.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.elfinder.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.raty.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.iphone.toggle.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.uploadify-3.1.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.gritter.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.imagesloaded.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.masonry.min.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.knob.modified.js')}}"></script>

<script src="{{asset('crossroads/js/jquery.sparkline.min.js')}}"></script>

<script src="{{asset('crossroads/js/counter.js')}}"></script>

<script src="{{asset('crossroads/js/retina.js')}}"></script>
<script src="{{asset('crossroads/js/custom.js')}}"></script>
<!-- end: JavaScript-->
<!-- Tostar errors display start(Below 3 links required to show messages) -->
<script src="{{asset('js/loader.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!-- Script for login code end-->

<!-- Page level script start-->
@yield('page-script')
<!-- Page level script end -->
<script src="{{asset('timer_countdown/jquery.countdown.min.js')}}"></script>
<script>
$(document).ready(function(){
request_url="{{url()->full()}}";
var _token = "<?php echo csrf_token(); ?>";
$.ajax({
url: '{{ url("update_url_request_time") }}',
type: 'POST',
data: {
name:request_url,
_token: _token,
},
success: function (res) {
console.log(res);
}
});
});
$(document).on('click',function(){
request_url="{{url()->full()}}";
var _token = "<?php echo csrf_token(); ?>";
$.ajax({
url: '{{ url("update_url_request_time") }}',
type: 'POST',
data: {
name:request_url,
_token: _token,
},
success: function (res) {
  @if(Session::has('success'))
  toastr.success("{{ Session::get('success') }}");
  @endif	
  @if(Session::has('error'))
  toastr.error("{{ Session::get('error') }}");
  @endif
});
});
setInterval(function () { check_user_session(); },105000);
function check_user_session()
{
var _token = "<?php echo csrf_token(); ?>";
$.ajax({
url: '{{ url("check_ajax_time_every_3seconds") }}',
type: 'POST',
data: {
_token: _token,
},
success: function (res) {
if(res >=840000){
var current_time  = new Date().getTime();
dateTime = moment(current_time).format("YYYY-MM-DD HH:mm:ss");
var one_min_time = moment(dateTime).add(59, 'seconds').format("YYYY-MM-DD HH:mm:ss");
$('#timeout-modal').modal({
backdrop: 'static',
keyboard: false
});
$("#timeout-modal").modal('show');

$("#getting-started").countdown(one_min_time, function(event)
{
var countdown = $(this).text( event.strftime('%S') +' Seconds');

if(event.strftime('%S') == 00)
{
window.location = "{{ url('/logout') }}";
}
});
}
}
});
}
</script>
<script>
function useId(user_id){
	var user_id=user_id;
var url   = "{{url('user_previous_login_timings_fetch')}}";
var _token = "<?php echo csrf_token(); ?>";
$.ajax({
url: url,
type: 'POST',
data:{
_token: _token,
user_id:user_id,
},
beforeSend: function()
{
showProcessingOverlay();
},
success: function(data)
{
/*console.log(res);*/
hideProcessingOverlay();
$("#last_login_modal").modal('show');
$('#data_load').html(data);
},
});
}
</script>
@extends('ProjectManager.Layouts.master')
@section('page-title')
New Project Duration
@endsection
@section('content')
<div id="content" class="span10">
  <ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="{{url('project_manager/dashboard')}}">Dashboard</a>
    </li>
    <i class="icon-angle-right"></i>
    <li><a href="{{url('project_manager/new_projects')}}">New Projects</a></li>
    <i class="icon-angle-right"></i>
    <li><a href="#">Project Schedule</a></li>
  </ul>
  <div class="row-fluid sortable">
    <div class="box span6 offset3" onTablet="span6" onDesktop="span6 offset3">
      <div class="box-header">
        <h2><i class="halflings-icon file white"></i>&ensp;Add Project Duration</h2>
        <div class="box-icon">
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
      </div>
      <div class="box-content">
        <!-- <form class="form-horizontal" method="POST" id="updateProjectDate">  -->
        <form class="form-horizontal"  action="{{url('project_manager/update_project_date')}}"  method="POST" id="updateProjectDate">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" value="{{$data['project_id']}}" name="project_id">
          <div class="row-fluid padding10">
            <div class="span4">
              <label for="name"><b>Project Name</b></label>
            </div>
            <div class="span8">
              <input type="text" id="project-name"  placeholder="Enter Project Name" value="{{$data['project_name']}}"  maxlength="50" readonly="">
            </div>
          </div>
          <div class="row-fluid padding10">
            <div class="span4">
              <label><b>Project Start Date</b></label>
            </div>
            <div class="span8">
              <input type="text" name="start_date" id="start_date" class="datepicker" data-format="mm/dd/yyyy" value="@if(isset($data['end_date'])){{$data['start_date']}}@else @endif">
            </div>
          </div>
          <div class="row-fluid padding10">
            <div class="span4">
              <label><b>Project End Date</b></label>
            </div>
            <div class="span8">
              <input type="text" name="end_date" id="end_date" class="datepicker" data-format="mm/dd/yyyy" value="@if(isset($data['end_date'])){{$data['end_date']}} @else @endif">
            </div>
          </div>
          <div class="row-fluid padding10">
            <div class="span4 offset4">
              <button type="button" onclick="reset()" class="btn btn-importand">Reset</button>
              <button type="submit"  class="btn btn-primary">Save</button>
             <!--  <button type="button" onclick="projectDateCheck()" class="btn btn-primary">Save</button> -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
function reset(){
document.getElementById("updateProjectDate").reset();
}
function projectDateCheck()
{
var start_date             =  $('#start_date').val();
var end_date               =  $('#end_date').val();
if($.trim(start_date)=='')
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Start Date.');
return false;
}
else if($.trim(end_date)=='')
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter End Date.');
return false;
}
else if(start_date >= end_date){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Start Date should be less than End Date');
return false;
}
else
{
updateProjectDate();
}
}
//post data
function updateProjectDate()
{
var url               =  "{{url('project_manager/update_project_date')}}";
var updateProjectDate =  $('#updateProjectDate').serialize();
var csrf              = $('#_token').val();
$.ajax({
url: url,
type: 'POST',
data:updateProjectDate,
beforeSend: function()
{
showProcessingOverlay();
},
success: function(res)
{
// alert(res);
hideProcessingOverlay();
toastr.options.timeOut = 1500; // 1.5s
toastr.success('Project Dates are Updated Successfully.');
window.location = "{{url('project_manager/active_projects')}}";
},
error: function (errormessage) {
// alert(errormessage);
hideProcessingOverlay();
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Something went Wrong');
return false;
}
});
}
</script>
<!-- Add new Client add end-->
@endsection
@section('page-script')
<script type="text/javascript">
@if(Session::has('message'))
toastr.options.timeOut = 1500;
toastr.success("{{ Session::get('message') }}");
@endif
@if(Session::has('error'))
toastr.options.timeOut = 1500;
toastr.error("{{ Session::get('error') }}");
@endif
</script>
@endsection
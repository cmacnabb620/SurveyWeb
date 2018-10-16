@extends('ProjectManager.Layouts.master')
@section('page-title')
Project Schedule
@endsection
@section('content')
<div id="content" class="span10">
  <ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="{{url('project_manager/dashboard')}}">Dashboard</a>
    </li>
    <i class="icon-angle-right"></i>
    <li><a href="{{url('project_manager/active_projects')}}">Active Projects</a></li>
    <i class="icon-angle-right"></i>
    <li><a href="#">Project Schedule</a></li>
  </ul>
  <div class="row-fluid sortable">
    <div class="box span12">
      <div class="box-header" data-original-title>
        <h2><i class="halflings-icon file white"></i>&ensp;Project Schedule</h2>
        <div class="box-icon">
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
      </div>
      <div class="box-content">
        <form class="form-horizontal" method="POST" id="updateProject">
          <div class="span6">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{$data['project_id']}}" name="project_id">
            <div class="control-group">
              <label class="control-label" for="name"><b>Project Name</b></label>
              <div class="controls">
                <input type="text" id="project-name"  placeholder="Enter Project Name" value="{{$data['project_name']}}"  maxlength="50" readonly="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="name"><b>Surveyor</b></label>
              <div class="controls">
                <select data-placeholder="Select Surveyor" id="surveyor" data-rel="chosen" readonly>
                  <option selected disabled>Select Surveyor</option>
                  <option value="">Surveyor A</option>
                  <option value="">Surveyor B</option>
                  <option value="">Surveyor C</option>
                  <option value="">Surveyor D</option>
                  <option value="">Surveyor E</option>
                  <option value="">Surveyor F</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><b>Project Start Date</b></label>
              <div class="controls">
                <input type="text" name="start_date" id="start_date" class="datepicker" data-format="mm/dd/yyyy" value="@if(isset($data['end_date'])){{$data['start_date']}}@else @endif" readonly>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><b>Project End Date</b></label>
              <div class="controls">
                <input type="text" name="end_date" id="end_date" class="datepicker" data-format="mm/dd/yyyy" value="@if(isset($data['end_date'])){{$data['end_date']}} @else @endif" readonly>
              </div>
            </div>
          </div>
          <div class="span6">
            <div class="control-group">
              <label class="control-label" class="control-label" for="projectname"><b>Survey Type</b></label>
              <div class="controls">
                <select data-placeholder="Select Survey Type" multiple name="survey_type_id" id="survey_type_id" data-rel="chosen" disabled>
                  @if(isset($survey_type) && count($survey_type) > 0)
                  @foreach ($survey_type as $surveys)
                  <option value="{{$surveys->survey_type_id}}"  @if ($data['survey_type_id']==$surveys->survey_type_id) selected="selected" @endif>{{$surveys->survey_type}}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" class="control-label" for="projectname"><b>Language</b></label>
              <div class="controls">
                <select data-placeholder="Select Language" multiple name="language_id" id="language_id" data-rel="chosen" disabled>
                  @if(isset($language) && count($language) > 0)
                  @foreach ($language as $lang)
                  <option value="{{$lang->language_id}}" @if ($data['project_language_id']==$lang->language_id) selected="selected" @endif>{{$lang->language}}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="name"><b>Quality User</b></label>
              <div class="controls">
                <select data-placeholder="Link with QC" id="qc_user" data-rel="chosen" readonly>
                  <option value=""></option>
                  <option value="">QC A</option>
                  <option value="">QC B</option>
                  <option value="">QC C</option>
                  <option value="">QC D</option>
                  <option value="">QC E</option>
                  <option value="">QC F</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid sortable">
        <div class="box span12">
          <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
              <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
          </div>
          <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="center">Check</th>
                  <th>Week</th>
                  <th>Date registered</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th class="center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td class="center"><input type="checkbox" id="optionsCheckbox2" value="option1"></td>
                  <td>Week 1</td>
                  <td class="center">2012/01/01</td>
                  <td class="center">Member</td>
                  <td class="center">
                    <span class="label label-success">Active</span>
                  </td>
                  <td class="center">
                    <a class="btn btn-success" href="#">
                      <i class="halflings-icon white zoom-in"></i>
                    </a>
                    <a class="btn btn-info" href="#">
                      <i class="halflings-icon white edit"></i>
                    </a>
                    <a class="btn btn-danger" href="#">
                      <i class="halflings-icon white trash"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td class="center"><input type="checkbox" id="optionsCheckbox2" value="option1"></td>
                  <td>Week 2</td>
                  <td class="center">2012/01/01</td>
                  <td class="center">Member</td>
                  <td class="center">
                    <span class="label label-success">Active</span>
                  </td>
                  <td class="center">
                    <a class="btn btn-success" href="#">
                      <i class="halflings-icon white zoom-in"></i>
                    </a>
                    <a class="btn btn-info" href="#">
                      <i class="halflings-icon white edit"></i>
                    </a>
                    <a class="btn btn-danger" href="#">
                      <i class="halflings-icon white trash"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td class="center"><input type="checkbox" id="optionsCheckbox2" value="option1"></td>
                  <td>Week 3</td>
                  <td class="center">2012/01/01</td>
                  <td class="center">Member</td>
                  <td class="center">
                    <span class="label label-success">Active</span>
                  </td>
                  <td class="center">
                    <a class="btn btn-success" href="#">
                      <i class="halflings-icon white zoom-in"></i>
                    </a>
                    <a class="btn btn-info" href="#">
                      <i class="halflings-icon white edit"></i>
                    </a>
                    <a class="btn btn-danger" href="#">
                      <i class="halflings-icon white trash"></i>
                    </a>
                  </td>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td class="center"><input type="checkbox" id="optionsCheckbox2" value="option1"></td>
                <td>Week 4</td>
                <td class="center">2012/01/01</td>
                <td class="center">Member</td>
                <td class="center">
                  <span class="label label-success">Active</span>
                </td>
                <td class="center">
                  <a class="btn btn-success" href="#">
                    <i class="halflings-icon white zoom-in"></i>
                  </a>
                  <a class="btn btn-info" href="#">
                    <i class="halflings-icon white edit"></i>
                  </a>
                  <a class="btn btn-danger" href="#">
                    <i class="halflings-icon white trash"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td class="center"><input type="checkbox" id="optionsCheckbox2" value="option1"></td>
                <td>Week 5</td>
                <td class="center">2012/02/01</td>
                <td class="center">Staff</td>
                <td class="center">
                  <span class="label label-important">Banned</span>
                </td>
                <td class="center">
                  <a class="btn btn-success" href="#">
                    <i class="halflings-icon white zoom-in"></i>
                  </a>
                  <a class="btn btn-info" href="#">
                    <i class="halflings-icon white edit"></i>
                  </a>
                  <a class="btn btn-danger" href="#">
                    <i class="halflings-icon white trash"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td class="center"><input type="checkbox" id="optionsCheckbox2" value="option1"></td>
                <td>Week 6</td>
                <td class="center">2012/02/01</td>
                <td class="center">Staff</td>
                <td class="center">
                  <span class="label label-important">Banned</span>
                </td>
                <td class="center">
                  <a class="btn btn-success" href="#">
                    <i class="halflings-icon white zoom-in"></i>
                  </a>
                  <a class="btn btn-info" href="#">
                    <i class="halflings-icon white edit"></i>
                  </a>
                  <a class="btn btn-danger" href="#">
                    <i class="halflings-icon white trash"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row-fluid padding10">
        <div class="span4 offset4 center">
          <button type="button" onclick="goBack()" class="btn btn-importand">Go Back</button>
          <!-- <button type="submit"  class="btn btn-primary">Save</button> -->
          <button type="button" onclick="make_schedule()" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<script>
function goBack(){
   window.location = "{{url('project_manager/active_projects')}}";
}
function reset(){
document.getElementById("updateProject").reset();
}
function make_schedule()
{
var start_date             =  $('#start_date').val();
var end_date               =  $('#end_date').val();
var project_name           =  $('#project-name').val();
var surveyor               =  $('#surveyor').val();
var language_id            =  $('#language_id').val();
var survey_type_id         =  $('#survey_type_id').val();
var qc_user                =  $('#qc_user').val();
if($.trim(project_name)=='')
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Project Name.');
return false;
}
else if($.trim(start_date)=='')
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
else if($.trim(surveyor)=='')
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Surveyor Name.');
return false;
}
else if($.trim(language_id)=='')
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Language.');
return false;
}
else if($.trim(survey_type_id)=='')
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Survey Type.');
return false;
}
else if($.trim(qc_user)=='')
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter QC User.');
return false;
}
else
{
updateProject();
}
}
//post data
function updateProject()
{
var url               =  "{{url('project_manager/update_project_date')}}";
var updateProject     =  $('#updateProject').serialize();
var csrf              =  $('#_token').val();
$.ajax({
url: url,
type: 'POST',
data:updateProject,
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
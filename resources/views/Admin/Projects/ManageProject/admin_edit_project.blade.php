@extends('Admin.Layouts.master')
@section('page-title')
Edit Projects
@endsection
@section('local-style')
<style type="text/css">
.form-btns{
  padding-top: 20px;
}
</style>
@endsection
@section('content')
<div id="content" class="span10">
  <ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
      <i class="icon-angle-right"></i>
      <li><a href="{{ url('admin/manage_projects') }}">Manage Projects</a></li>
    </li>
    <i class="icon-angle-right"></i>
    <li><a href="#">Edit Project</a></li>
  </ul>
  <!-- ************************Form Table : Starts****************************************** -->
  <div class="row-fluid sortable">
    <div class="box span9">
      <div class="box-header" data-original-title>
        <h2>
        <i class="halflings-icon white edit"></i>
        <span>Edit Project</span></h2>
        <div class="box-icon">
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
      </div>
      <div class="box-content">
        <form class="form-horizontal" method="POST" id="updateProject">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
          <input type="hidden" name="project_id" value="{{$data['project_id']}}">
          <input type="hidden" name="project_original_name" value="{{$data['project_name']}}">
          <fieldset>
            <div class="row-fluid">
              <div class="span10 offset1">
                <div class="control-group">
                  <label class="control-label" for="projectname">Project Name</label>
                  <div class="controls">
                    <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name" maxlength="50" value="{{$data['project_name']}}">
                  </div>
                </div>
                <div class="control-group">
                   <label class="control-label" for="projectname">Project Manager</label>
                  <div class="controls">
                    <select data-placeholder="Select Project Manager" name="project_manager_id" id="project_manager_id" data-rel="chosen" required>
                      <option disabled selected>Select Project Manager</option>
                      @if(isset($project_managers) && count($project_managers) > 0)
                      @foreach($project_managers as $project_manager)
                      <option value="{{$project_manager->main_user_id}}" @if ($data['project_manager_id']==$project_manager->main_user_id) selected="selected" @endif>{{(\Crypt::decryptString($project_manager->first_name))}}&nbsp;{{(\Crypt::decryptString($project_manager->last_name))}}</option>
                      @endforeach
                      @else
                      <option disabled selected>Select Project Manager</option>
                      @endif
                    </select>
                    <a href="{{url('admin/add_project_managers')}}" data-toggle="modal">&nbsp;<i class="icon-plus-sign"></i>&nbsp;Add new Project Manager</a>
                  </div>
                </div>
                 <div class="control-group">
                   <label class="control-label" for="projectname">Client</label>
                  <div class="controls">
                    <select data-placeholder="Select Client" data-rel="chosen" name="client_id" id="client_id">
                      <option disabled selected>Select Client</option>
                      @if(isset($clients) && count($clients) > 0)
                      @foreach ($clients as $client)
                      <option value="{{$client->client_id}}" @if ($data['client_id']==$client->client_id) selected="selected" @endif>{{(\Crypt::decryptString($client->name))}}</option>
                      @endforeach
                      @endif
                    </select>
                    <!-- Add New Client Modal Starts -->
                    <!-- <a href="#add-client" data-toggle="modal">&nbsp;<i class="icon-plus-sign"></i>&nbsp;Add new Client</a> -->
                    <a href="{{url('admin/add_new_client')}}" data-toggle="modal">&nbsp;<i class="icon-plus-sign"></i>&nbsp;Add new Client</a>
                    <!-- Add New Client Modal End -->
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="projectname">Frequecy Report</label>
                  <div class="controls">
                    <select data-placeholder="Select Frequecy Report" name="report_frequency_id" id="report_frequency_id" data-rel="chosen" >
                      <option disabled selected>Frequecy Report</option>
                      @if(isset($report_freq) && count($report_freq) > 0)
                      @foreach ($report_freq as $rep_freq)
                                     
                      <option value="{{$rep_freq->report_freq_id}}" @if ($data['report_freq_id']==$rep_freq->report_freq_id) selected="selected" @endif>{{$rep_freq->report_frequency}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="control-group">
                   <label class="control-label" for="projectname">Status</label>
                  <div class="controls">
                    <select data-placeholder="Select Status" name="status_id" id="status_id" data-rel="chosen" required>
                      <option disabled selected>Select Status</option>
                      
                      @if(isset($status) && count($status) > 0)
                      @foreach ($status as $project_status)
                      <option value="{{$project_status->status_id}}" @if ($data['project_status_id']==$project_status->status_id) selected="selected" @endif>{{$project_status->status}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="control-group">
                   <label class="control-label" for="projectname">Survey Type</label>
                  <div class="controls">
                    <select data-placeholder="Select Survey Type" multiple name="survey_type_id[]" id="survey_type_id" data-rel="chosen">
                     <!--  <option disabled selected>Select Survey Type</option> -->
                      @if(isset($survey_type) && count($survey_type) > 0)
                       @foreach ($survey_type as $surveys)
                       @if(in_array($surveys->survey_type_id, $survey_type_id))
                        <option value="{{$surveys->survey_type_id}}" selected="true">{{$surveys->survey_type}}</option>
                        @else
                        <option value="{{$surveys->survey_type_id}}">{{$surveys->survey_type}}</option>
                        @endif
                       @endforeach 
                      @endif
                    </select>
                    <!-- Add New Survey Modal Starts -->
                    <a href="#add-survey" data-toggle="modal">&nbsp;<i class="icon-plus-sign"></i>&nbsp;Add New Survey</a>
                    <!-- Add New Survey Modal End -->
                  </div>
                </div>
                <div class="control-group">
                 <label class="control-label" for="projectname">Language</label>
                  <div class="controls">
                    <select data-placeholder="Select Language" multiple name="language_id[]" id="language_id" data-rel="chosen">
                      <!-- <option disabled selected>Select Language</option> -->
                      @if(isset($language) && count($language) > 0)
                      @foreach ($language as $lang)
                       @if(in_array($lang->language_id, $language_id))
                        <option value="{{ $lang->language_id }}" selected="true">{{ $lang->language }}</option>
                        @else
                        <option value="{{ $lang->language_id }}">{{$lang->language}}</option>
                        @endif
                       @endforeach 
                      @endif
                    </select>
                    <!-- Add New Language Modal Starts -->
                    <a href="#add_new_language" data-toggle="modal">&nbsp;<i class="icon-plus-sign"></i>&nbsp;Add new Language</a>
                    <!-- Add New Language Modal End -->
                  </div>
                </div>

              </div>
              <div class="form-btns span4 offset4">
                <button type="button" onclick="redirect()" class="btn btn-default"><i class="halflings-icon chevron-left white"></i>Go Back</button>
                <!-- <button type="button" onclick="reset()" class="btn btn-warning">Reset</button> -->
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                <button type="button"  class="btn btn-primary" onclick="javascript:return projectDetailsCheck();" >Save</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <!-- ************************Form Table : End****************************************** -->
</div>
<!-- Modal Start -->
@include('Admin.Layouts.ProjectModals.add_new_survey')
@include('Admin.Layouts.ProjectModals.add_new_language')
@include('Admin.Layouts.ProjectModals.add_new_client')
@include('Admin.Layouts.ProjectModals.add_new_project_manager')
<!-- Modal End -->
<script type="text/javascript">
/********Trigger Reset button***********/
function reset(){
document.getElementById("addNewProject").reset();
}

function redirect(){
window.location = "{{url('admin/manage_projects')}}";
}
function populateStates(countryElementId, stateElementId) {
var selectedCountryIndex = document.getElementById(countryElementId).selectedIndex;
var stateElement = document.getElementById(stateElementId);
//console.log(stateElement);
stateElement.length = 0; // Fixed by Julian Woods
stateElement.options[0] = new Option('Select State', '');
stateElement.selectedIndex = 0;
var state_arr = s_a[selectedCountryIndex].split("|");
for (var i = 0; i < state_arr.length; i++) {
stateElement.options[stateElement.length] = new Option(state_arr[i], state_arr[i]);
}
}
function populateCountries(countryElementId, stateElementId) {
// given the id of the <select> tag as function argument, it inserts <option> tags
  var countryElement = document.getElementById(countryElementId);
  countryElement.length = 0;
  countryElement.options[0] = new Option('Select Country', '');
  countryElement.selectedIndex = 0;
  for (var i = 0; i < country_arr.length; i++) {
  countryElement.options[countryElement.length] = new Option(country_arr[i], country_arr[i]);
  }
  // Assigned all countries. Now assign event listener for the states.
  if (stateElementId) {
  countryElement.onchange = function () {
  populateStates(countryElementId, stateElementId);
  };
  }
  }
  </script>
  <script type="text/javascript">
  populateCountries("country", "state");
  //populateCountries("country2");
  </script>
  <!-- validation code start -->
  <script>
  function projectDetailsCheck()
  {
  var alphaExp            =  /^[a-zA-Z]+$/;
  var number_filter       =  /^[0-9]*$/;
  var project_name        =  $('#project_name').val();
  var report_frequency    =  $('#report_frequency_id').val();
  var status              =  $('#status_id').val();
  var survey_type         =  $('#survey_type_id').val();
  var language            =  $('#language_id').val();
  var client              =  $('#client_id').val();
  var project_manager     =  $('#project_manager_id').val();
  if($.trim(project_name)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Project Name.');
  return false;
  }
  else if($.trim(project_name).length<2)
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Project Name more than 2 characters.');
  return false;
  }
  else if($.trim(report_frequency)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Select Report Frequency.');
  return false;
  }
  else if($.trim(status)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Select Status .');
  return false;
  }
  else if($.trim(survey_type)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Select Survey Type .');
  return false;
  }
  else if($.trim(language)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Select language.');
  return false;
  }
  else if($.trim(client)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Select Client.');
  return false;
  }
  else if($.trim(project_manager)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Select Project Manager.');
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
  var url      = "{{url('admin/update_project_details')}}";
  var csrf     = $('#_token').val();
  var formdata = $('#updateProject').serialize();
  $.ajax({
  url: url,
  type: 'POST',
  data:formdata,
  beforeSend: function()
  {
  showProcessingOverlay();
  },
  success: function(res)
  {
    hideProcessingOverlay();
  if(res.status == 'fail'){
    toastr.options.timeOut = 1500; // 1.5s
    toastr.error(res.message);
    return false;
  }else{
  toastr.options.timeOut = 1500; // 1.5s
  toastr.success('Project Updated Successfully.');
  /*window.location = "{{url('admin/manage_projects')}}";*/
  return false;
  }
  
  },
  error: function (errormessage) {
  hideProcessingOverlay();
  toastr.options.timeOut = 3000; // 1.5s
  toastr.error('Some thing went wrong.');
  return false;
  }
  });
  }
  </script>
  <!-- validation code end -->
 
  <!-- Add New Survey Starts here -->
  <script>
  function surveyTypeCheck()
  {
  var alphaExp            =  /^[a-zA-Z]+$/;
  var survey_new_type         =  $('#survey_new_type').val();
  if($.trim(survey_new_type)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Survey Type.');
  return false;
  }
  else if(!$.trim(survey_new_type).match(alphaExp))
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Survey Type with characters only.');
  return false;
  }
  else if($.trim(survey_new_type).length<2)
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Survey Type more than 2 characters.');
  return false;
  }
  else
  {
  addNewSurveyType();
  }
  }
  //post data
  function addNewSurveyType()
  {
  var url         = "{{url('admin/modal_add_new_survey_type')}}";
  var csrf        = $('#_token').val();
  var mysurveytypeform     = $('#survey_new_type').val();
  $.ajax({
  url: url,
  type: 'POST',
  data:{
  mysurveytypeform:mysurveytypeform,
  _token: '{{csrf_token()}}'
  },
  beforeSend: function()
  {
  showProcessingOverlay();
  },
  success: function(ress)
  {
  hideProcessingOverlay();
  toastr.options.timeOut = 1500; // 1.5s
  toastr.success('New Survey Type Added Successfully.');
  location.reload();
  },
  error: function (errormessage) {
  hideProcessingOverlay();
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Surveyor Type Already Existed.');
  return false;
  }
  
  });
  }
  </script>
  <!-- Add New Survey ends here -->
  <!-- Add new Language add start-->
  <script>
  function newLanguageAdd()
  {
  var alphaExp            =  /^[a-zA-Z]+$/;
  var new_language         =  $('#new_language').val();
  var new_iso_name         =  $('#new_iso_name').val();
  if($.trim(new_language)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter New Language.');
  return false;
  }
  else if(!$.trim(new_language).match(alphaExp))
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Language with characters only.');
  return false;
  }
  else if($.trim(new_language).length<2)
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Language more than 2 characters.');
  return false;
  }
  else if($.trim(new_iso_name).length<2){
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter ISO Name more than 2 characters.');
  return false;
  }
  else if(!$.trim(new_iso_name).match(alphaExp))
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter ISO Name with characters only.');
  return false;
  }
  else
  {
  addNewLanguage();
  }
  }
  //post data
  function addNewLanguage()
  {
  var url           =  "{{url('admin/modal_add_new_language')}}";
  var csrf          =  $('#_token').val();
  var new_language  =  $('#new_language').val();
  var new_iso_name  =  $('#new_iso_name').val();
  $.ajax({
  url: url,
  type: 'POST',
  data:{
  new_language:new_language,
  new_iso_name:new_iso_name,
  _token: '{{csrf_token()}}'
  },
  beforeSend: function()
  {
  showProcessingOverlay();
  },
  success: function(res)
  {
  hideProcessingOverlay();
  toastr.options.timeOut = 1500; // 1.5s
  toastr.success('New Language Added Successfully.');
  location.reload();
  },
  error: function (errormessage) {
  hideProcessingOverlay();
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Language Name Already Existed.');
  return false;
  }
  
  });
  }
  </script>
  <!-- Add new Language add end-->
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
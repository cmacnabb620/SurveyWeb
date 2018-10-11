@extends('ProjectManager.Layouts.master')
@section('page-title')
New Project Schedule
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

  <ul class="nav nav-pills nav-justified">
      <li class="active">
      <a data-toggle="tab" href="#home">Project Info &nbsp;<i class="halflings-icon chevron-right"></i></a>
      </li>
      <li>
      <a data-toggle="tab" href="#menu1">Client Info &nbsp;<i class="halflings-icon chevron-right"></i></a>
      </li>
      <li>
      <a data-toggle="tab" href="#menu2">Add Project Duration &nbsp;<i class="halflings-icon chevron-right"></i></a>
      </li>
      <li>
      <a data-toggle="tab" href="#menu3">Assign to Surveyors</a>
      </li>
  </ul>

  <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="box span6 offset3" onTablet="span6" onDesktop="span6 offset3">
          <div class="box-header">
            <h2><i class="halflings-icon file white"></i>&ensp;Project Information</h2>
            <div class="box-icon">
              <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
          </div>
          <div class="box-content">
            <ul class="dashboard-list">
              <li>
                <h3>Project Name : {{$data['project_name']}}</h3>                                 
              </li>
              <li>
               <h3>Report Frequency : {{$data['project_report_frequency']}}</h3>                            
              </li>
              <li>
               <h3>Required Survey : </h3>
              </li>
              <li>
               <h3>Language : {{$data['project_language']}} </h3>
              </li>
              <li>
              <h3> Status : {{$data['project_status']}}</h3>
              </li>
              <li>
              <h3> Survey Type : {{$data['survey_type']}} </h3>
              </li>
              <li>
               <h3>Posted On: {{$data['posted']}}</h3>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div id="menu1" class="tab-pane fade">
        <div class="box span6 offset3" onTablet="span6" onDesktop="span6 offset3">
          <div class="box-header">
            <h2><i class="halflings-icon file white"></i>&ensp;Client Information</h2>
            <div class="box-icon">
              <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
          </div>
          <div class="box-content">
            <ul class="dashboard-list">
              <li>
                <h3>Client Name : {{$data['client_name']}} </h3>                                 
              </li>
              <li>
               <h3>ORG Abbrevation : {{$data['org_abbrev']}}</h3>                            
              </li>
              <li>
               <h3>Client Type : {{$data['client_type']}}</h3>
              </li>
              <li>
               <h3>Address Line 1 : {{\Crypt::decryptString($data['client_address']->address)}}</h3>
              </li> 
              <li>
               <h3>Address Line 2 : {{\Crypt::decryptString($data['client_address']->address2)}}</h3>
              </li>
              <li>
              <h3>Country : {{\Crypt::decryptString($data['client_address']->country)}}</h3>
              </li>
              <li>
              <h3> State : {{\Crypt::decryptString($data['client_address']->state)}} </h3>
              </li>
              <li>
               <h3>City: {{\Crypt::decryptString($data['client_address']->city)}}</h3>
              </li>
              <!-- <li>
               <h3>Pin : 123456</h3>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
      <div id="menu2" class="tab-pane fade">
        <div class="box span6 offset3" onTablet="span6" onDesktop="span6 offset3">
          <div class="box-header">
            <h2><i class="halflings-icon file white"></i>&ensp;Add Project Duration</h2>
            <div class="box-icon">
              <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
          </div>
          <div class="box-content">
              <form class="form-horizontal formname">
                <div class="row-fluid padding10">
                  <div class="span4">
                    <label><b>Project Start Date</b></label>
                  </div>
                  <div class="span8">
                    <input type="text" name="start_date" id="start_date" class="datepicker" data-format="mm/dd/yyyy">
                  </div>      
                </div>
                <div class="row-fluid padding10">
                  <div class="span4">
                    <label><b>Project End Date</b></label>
                  </div>
                  <div class="span8">
                    <input type="text" name="end_date" id="end_date" class="datepicker" data-format="mm/dd/yyyy">
                  </div>      
                </div>
                <div class="row-fluid padding10">
                    <div class="span2 offset5">
                      <input type="submit" class="btn btn-success" value="Save" >
                    </div>
                </div>
              </form>  
          </div>
        </div>
      </div>
      <div id="menu3" class="tab-pane fade">
       <div class="box span6 offset3" onTablet="span6" onDesktop="span6 offset3">
          <div class="box-header">
            <h2><i class="halflings-icon file white"></i>&ensp;Assign to Surveyors</h2>
            <div class="box-icon">
              <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
          </div>
          <div class="box-content">
            <form class="form-horizontal padding10">
              <div class="row-fluid padding10">
                  <div class="span4">
                    <label for="name">Project Name</label>
                  </div>
                  <div class="span8">
                    <input type="text" id="project-name"  placeholder="Enter Project Name" value="{{$data['project_name']}}"  maxlength="50" readonly="">
                  </div>      
                </div>

                  
                 <div class="row-fluid padding10">
                  <div class="span4">
                    <label for="name">Surveyor</label>
                  </div>
                  <div class="span8"> 
                    <select data-placeholder="Select Surveyor" id="surveyor" data-rel="chosen">
                      <option value=""></option>
                      <option value="">Surveyor A</option>
                      <option value="">Surveyor B</option>
                      <option value="">Surveyor C</option>
                      <option value="">Surveyor D</option>
                      <option value="">Surveyor E</option>
                      <option value="">Surveyor F</option>
                    </select>
                   </div>      
                </div>
                  
                <div class="row-fluid padding10">
                  <div class="span4">
                    <label for="name">Language</label>
                  </div>
                  <div class="span8"> 
                    <input type="text" id="language"  placeholder="Enter Language" value="{{$data['project_language']}}" maxlength="50" required readonly="">
                 </div>      
                </div> 
                <div class="row-fluid padding10">
                  <div class="span4">
                     <label for="name">Quality User</label>
                  </div>
                  <div class="span8"> 
                    <select data-placeholder="Link with QC" id="qc" data-rel="chosen">
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
                <div class="row-fluid padding10">
                  <div class="span4 offset4">
                    <!-- <button type="button" onclick="reload()" class="btn btn-default">Cancel</button> -->
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection


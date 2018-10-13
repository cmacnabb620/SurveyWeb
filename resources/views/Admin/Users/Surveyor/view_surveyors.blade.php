@extends('Admin.Layouts.master')
@section('page-title')
Manage Surveyors
@endsection
@section('content')
<div id="content" class="span10">
  <ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
      <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{ url('admin/prospective_surveyors') }}">Surveyors</a></li>
    <i class="icon-angle-right"></i>
    <li><a href="{{ url('admin/add_project_managers') }}">Surveyor Details(<b>{{ucfirst(\Crypt::decryptString($project_surveyor_edt_record->first_name))}} {{ucfirst(\Crypt::decryptString($project_surveyor_edt_record->last_name))}}</b>)</a></li>
  </ul>
  
  <div class="row-fluid sortable">
    <div class="box span10">
      <div class="box-header" data-original-title>
        <h2>
        <i class="halflings-icon eye-open white"></i>
        <span>Surveyor Details</span></h2>
        <div class="box-icon">
          <!-- <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a> -->
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
          <!-- <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a> -->
        </div>
      </div>
      <div class="box-content">
        <form class="form-horizontal" action="#" method="POST" id="myform">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <!-- <input type="hidden" name="user_type" value="{{$project_surveyor_edt_record->user_type_id}}"> -->
          <input type="hidden" name="user_id" value="{{$project_surveyor_edt_record->main_user_id}}">
          <input type="hidden" name="address_id" value="{{$project_surveyor_edt_record->address_table_id}}">
          <input type="hidden" name="contact_id" value="{{$project_surveyor_edt_record->contact_id}}">
          <input type="hidden" name="tag_user_id" value="{{$project_surveyor_edt_record->tag_user_id}}">
          <fieldset>
            <div class="span6">
              <div class="control-group">
                <label class="control-label" for="name"><b>User Name</b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="fname" name="fname" value="{{$project_surveyor_edt_record->username}}"  placeholder="Enter First Name" maxlength="50" readonly="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>First Name</b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="fname" name="fname" value="{{\Crypt::decryptString($project_surveyor_edt_record->first_name)}}"  placeholder="Enter First Name" maxlength="50" readonly="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>Last Name</b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="lname" name="lname" value="{{\Crypt::decryptString($project_surveyor_edt_record->last_name)}}"  placeholder="Enter Last Name" maxlength="50" readonly="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>Email</b></label>
                <div class="controls">
                  <input type="email" class="form-control" id="email" name="email" value="{{\Crypt::decryptString($project_surveyor_edt_record->email)}}"  placeholder="Enter Email" maxlength="50" readonly=""/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>Phone Number</b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="phone" value="{{\Crypt::decryptString($project_surveyor_edt_record->phone)}}" name="phone" placeholder="Enter Phone Number" maxlength="14" maxlength="14" readonly=""/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>User Type</b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="fname" name="fname" value="{{$project_surveyor_edt_record->user_type_desc}}"  placeholder="Enter First Name" maxlength="50" readonly="">
                </div>
              </div>
            </div>
            <div class="span6">
              <div class="control-group">
                <label class="control-label"><b>Start Date</b></label>
                <div class="controls">
                  <input type="text" id="start_date" class="form-control datepicker" name="start_date" data-format="mm/dd/yyyy" value="{{ $project_surveyor_edt_record->start_date }}" placeholder="Enter Start Date" readonly="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><b>Date of Birth</b></label>
                <div class="controls">
                  <input type="text"  class="form-control datepicker" value="@if(!empty($project_surveyor_edt_record->DOB)){{\Crypt::decryptString($project_surveyor_edt_record->DOB)}}@else @endif" readonly="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="country"><b>Country</b></label>
                <div class="controls">
                  <input type="text" id="date" class="form-control datepicker" value="@if(!empty($project_surveyor_edt_record->country)){{\Crypt::decryptString($project_surveyor_edt_record->country)}}@else @endif" readonly="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="state"><b>State</b></label>
                <div class="controls">
                  <input type="text" id="date" class="form-control datepicker" value="@if(!empty($project_surveyor_edt_record->state)){{\Crypt::decryptString($project_surveyor_edt_record->state)}}@else @endif" readonly="">
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label" for="city"><b>District</b></label>
                <div class="controls">
                  <input type="text" name="district" class="form-control" value="@if(!empty($project_surveyor_edt_record->district)){{\Crypt::decryptString($project_surveyor_edt_record->district)}}@else @endif" id="district"  placeholder="Enter District" maxlength="50" readonly="">
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label" for="city"><b>City</b></label>
                <div class="controls">
                  <input type="text" name="city" value="@if(!empty($project_surveyor_edt_record->city)){{\Crypt::decryptString($project_surveyor_edt_record->city)}}@else @endif" class="form-control" id="city"  placeholder="Enter City" maxlength="50" readonly="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="address"><b>Address</b></label>
                <div class="controls">
                  <textarea rows="2" cols="50" name="address" id="address" placeholder="Address..." readonly="">@if(!empty($project_surveyor_edt_record->DOB)){{\Crypt::decryptString($project_surveyor_edt_record->address)}}@else @endif</textarea>
                </div>
              </div>
            </div>
            <div class="span10 offset1">
             <div class="box">
                <div class="box-header">
                  <h2>Surveyor History</h2>
                </div>
                <div class="box-content">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Prospective Date</th>
                        <th>Trainee Date</th>
                        <th>Active Date</th>
                        <th>Inactive Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      @if(!empty($project_surveyor_edt_record->prospective_date))
                        <td>{{ $project_surveyor_edt_record->prospective_date }}</td>
                      @else
                        <td>--</td>
                      @endif
                     
                      @if(!empty($project_surveyor_edt_record->trainee_date))
                        <td>{{$project_surveyor_edt_record->trainee_date}}</td>
                      @else
                        <td>--</td>
                      @endif

                      @if(!empty($project_surveyor_edt_record->active_date))
                        <td>{{$project_surveyor_edt_record->active_date}}</td>
                      @else
                        <td>--</td>
                      @endif

                      @if(!empty($project_surveyor_edt_record->inactive_date))
                        <td>{{$project_surveyor_edt_record->inactive_date}}</td>
                      @else
                        <td>--</td>
                      @endif
                      </tr> 
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span2 offset5">
              <button type="button" onclick="redirect('{{$project_surveyor_edt_record->user_type_id}}')" class="btn btn-default">Go Back</button>
              </div>
            </div>  
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <!-- *******Surveyor Table Starts*********** -->
 <!--  <div class="row-fluid sortable">
    <div class="box">
      <div class="box-header">
        <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Surveyor History</h2>
      </div>
      <div class="box-content">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Surveyor Type</th>
              <th class="center">Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>ABCD</td>
              <td class="center">2012/01/01</td>
            </tr> 
            <tr>
              <td>ABCD</td>
              <td class="center">2012/01/01</td>
            </tr> 
            <tr>
              <td>ABCD</td>
              <td class="center">2012/01/01</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div> -->
  <!-- *******Surveyor Table End*********** -->
  <!-- <div class="row-fluid">
    <div class="span2 offset5">
    <button type="button" onclick="redirect()" class="btn btn-default">Go Back</button>
    </div>
  </div> -->
</div>
<script type="text/javascript">
function redirect(usertype){
   if(usertype == 3){
    window.location = "{{url('admin/prospective_surveyors')}}";
  }else if(usertype == 4){
    window.location = "{{url('admin/trainee_surveyors')}}";
  }else if(usertype == 5){
    window.location = "{{url('admin/active_surveyors')}}";
  }else if(usertype == 8){
    window.location = "{{url('admin/inactive_surveyors')}}";
  }
}
</script>
<!-- validation code end -->
@endsection
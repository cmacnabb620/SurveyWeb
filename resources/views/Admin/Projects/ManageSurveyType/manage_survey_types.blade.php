@extends('Admin.Layouts.master')
@section('page-title')
Manage Survey Types
@endsection
@section('local-style')
@endsection
@section('content')
<div id="content" class="span10">
  <ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
      <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{ url('admin/project_settings') }}">Project Settings</a></li>
        <i class="icon-angle-right"></i>
    <li><a href="{{url('admin/manage_survey_types')}}">Manage Survey Types</a></li>
  </ul>
  
  <div class="row-fluid">
    <div class="statbox purple rolebox border-radius" onTablet="span8 offset2" onDesktop="span6 offset3">
      <!-- Create new role form start -->
      <form action="{{url('admin/add_new_survey_type')}}" method="post">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <div class="formname">
          <div class="form-group span12">
            <label for="role-name" class="control-lable span4 lable-name"><b>Survey Types</b></label>
            <input type="text" class="form-control span8 border-radius" name="survey_type" value="{{old('survey_type')}}" id="survey_type" aria-describedby="survey_type" placeholder="Enter Survey Type" maxlength="50">
          </div>
          <div class="form-group">
            <div class="span5 offset5">
              <button type="Submit" class="btn btn-success">Add</button>
            </div>
            
          </div>
        </div>
      </form>
      <!-- Create new role form end -->
    </div>
  </div>
  <div class="row-fluid sortable">
    <div class="box span12">
      <div class="box-header">
      <h2><i class="halflings-icon white align-justify"></i></span>Manage Survey Types</h2>
      <div class="box-icon">
        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
      </div>
    </div>
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable datatable table-responsive">
        <thead>
          <tr>
            <th>Sr No. <a><i class="icon-sort"></i></a> </th>
            <th>Survey Type <a><i class="icon-sort"></i></a> </th>
            <th>Updated Date <a><i class="icon-sort"></i></a> </th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @include('Admin.Projects.ManageSurveyType.crud_operations')
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection
@section('page-script')
<script type="text/javascript">
  @if($errors->any())
@foreach($errors->all() as $error)
toastr.options.timeOut = 1500;
toastr.error("{{$error}}");
@endforeach
@endif
@if(Session::has('message'))
toastr.success("{{ Session::get('message') }}");
@endif
@if(Session::has('error'))
toastr.error("{{ Session::get('error') }}");
@endif
@if(Session::has('fail'))
toastr.error("{{ Session::get('fail') }}");
@endif
</script>
@endsection
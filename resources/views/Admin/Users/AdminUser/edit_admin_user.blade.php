@extends('Admin.Layouts.master')
@section('page-title')
Manage Admin Users
@endsection
@section('content')
<div id="content" class="span10">
  <ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
      <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{url('admin/admin_users')}}">Admin Users</a></li>
    <i class="icon-angle-right"></i>
    <li><a href="#">Edit Admin User(<b>{{ucfirst(\Crypt::decryptString($admin_user->first_name))}} {{ucfirst(\Crypt::decryptString($admin_user->last_name))}}</b>)</a></li>
  </ul>
  <div class="row-fluid sortable">
    <div class="box span10">
      <div class="box-header" data-original-title>
        <h2>
        <i class="halflings-icon white edit"></i>
        <span> Edit Admin User</span></h2>
        <div class="box-icon">
          <!-- <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a> -->
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
          <!-- <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a> -->
        </div>
      </div>
      <div class="box-content">
        <form class="form-horizontal" action="{{url('admin/update_admin_user_details')}}" method="POST" id="myform">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <!-- <input type="hidden" name="user_type" value="{{$admin_user->user_type_id}}"> -->
          <input type="hidden" name="user_id" value="{{$admin_user->main_user_id}}">
          <input type="hidden" name="address_id" value="{{$admin_user->address_table_id}}">
          <input type="hidden" name="contact_id" value="{{$admin_user->contact_id}}">
          <input type="hidden" name="tag_user_id" value="{{$admin_user->tag_user_id}}">
          <fieldset>
            <div class="span6">
              
              <div class="control-group">
                <label class="control-label" for="name"><b>First Name<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="fname" name="fname" value="{{\Crypt::decryptString($admin_user->first_name)}}"  placeholder="Enter First Name" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>Last Name<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="lname" name="lname" value="{{\Crypt::decryptString($admin_user->last_name)}}"  placeholder="Enter Last Name" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>Email<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="email" class="form-control" id="email" name="email" value="{{\Crypt::decryptString($admin_user->email)}}"  placeholder="Enter Email" maxlength="50" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>Phone Number<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="phone" value="{{\Crypt::decryptString($admin_user->phone)}}" name="phone" placeholder="Enter Phone Number" maxlength="14" maxlength="14"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><b>Date of Birth<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" id="date" class="form-control datepicker" value="{{\Crypt::decryptString($admin_user->DOB)}}" name="date" data-format="mm/dd/yyyy" placeholder="Enter Date of Birth">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><b>Start Date<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" id="start_date" class="form-control datepicker" name="start_date" value="{{ $admin_user->start_date }}" data-format="mm/dd/yyyy" placeholder="Enter Start Date">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="country"><b>User Type<span style="color:red">*</span></b></label>
                <div class="controls">
                  <select data-placeholder="" id="user_type"  name="user_type">
                  @foreach($user_types as $user_type)
                   <option value="{{$user_type->user_type_id}}" @if($user_type->user_type_id == $admin_user->user_type_id) selected="selected" @endif>{{$user_type->user_type_desc}}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label" for="selectError"><b>Title<span style="color:red">*</span></b></label>
                <div class="controls">
                  <select id="selectError" data-rel="chosen">
                  <option>Option 1</option>
                  <option>Option 2</option>
                  <option>Option 3</option>
                  <option>Option 4</option>
                  <option>Option 5</option>
                  </select>
                </div>
              </div> -->
            </div>
            <div class="span6">
              <div class="control-group">
                <label class="control-label" for="country"><b>Country<span style="color:red">*</span></b></label>
                <div class="controls">
                  <select data-placeholder="" id="country"  name="country">
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="state"><b>State<span style="color:red">*</span></b></label>
                <div class="controls">
                  <select data-placeholder="Select State" id="state" name="state">
                    <option value="{{Crypt::decryptString($admin_user->state)}}" selected="selected">{{Crypt::decryptString($admin_user->state)}}</option>
                  </select>
                </div>
              </div>
              
              <!-- <div class="control-group">
                <label class="control-label" for="city"><b>District<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" name="district" class="form-control" value="" id="district"  placeholder="Enter District" maxlength="50" >
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label" for="city"><b>City<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" name="city" value="{{\Crypt::decryptString($admin_user->city)}}" class="form-control" id="city"  placeholder="Enter City" maxlength="50" >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="address"><b>Address<span style="color:red">*</span></b></label>
                <div class="controls">
                  <textarea rows="3" cols="50" name="address" id="address" placeholder="Address...">{{\Crypt::decryptString($admin_user->address)}}</textarea>
                </div>
              </div>
            </div>
            <div class="row-fluid span12">
              <div class="span3 offset5">
                <button type="button" onclick="redirect()" class="btn btn-default"><i class="halflings-icon chevron-left white"></i>Go Back</button>
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                <button type="button"  class="btn btn-primary" onclick="javascript:return managerValidationCheck();" >Update</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function redirect(){
 window.location = "{{url('admin/admin_users')}}";
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
  countryElement.options[0] = new Option('{{Crypt::decryptString($admin_user->country)}}', '{{Crypt::decryptString($admin_user->country)}}');
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
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script type="text/javascript">
  $( function() {
  $("#date").datepicker({
  /*dateFormat: "mm-dd-yy",*/
  changeMonth: true,
  changeYear: true,
  //showButtonPanel: true,
  yearRange: "-100:+0",
  maxDate: new Date,
  beforeShow: function () {
  setTimeout(function (){
  $('.ui-datepicker').css('z-index', 99999999999999);
  }, 0);
  },
  }).on('change', function() {
  if($('#date').valid()){
  $('#date').removeClass('errRed');
  }
  // triggers the validation test on change
  });
  } );
  </script>
  <!-- validation code start -->
  <script>
  function managerValidationCheck()
  {
  var alphaExp        = /^[a-zA-Z]+$/;
  var email_filter    = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var mobile_filter   = /^[0-9]*$/;
  var start_date      =  $('#start_date').val();
  var fname           =  $('#fname').val();
  var lname           =  $('#lname').val();
  var email           =  $('#email').val();
  var phone           =  $('#phone').val();
  var date            =  $('#date').val();
  var country         =  $('#country').val();
  var state           =  $('#state').val();
  // var district        =  $('#district').val();
  var city            =  $('#city').val();
  var address         =  $('#address').val();
  
  if($.trim(fname)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter First Name.');
  return false;
  }
  else if(!$.trim(fname).match(alphaExp))
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter First Name with characters only.');
  return false;
  }
  else if($.trim(fname).length<2)
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter First Name more than 2 characters.');
  return false;
  }
  else if($.trim(lname)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Last Name.');
  return false;
  }
  else if(!$.trim(lname).match(alphaExp))
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Last Name with characters only.');
  return false;
  }
  else if($.trim(lname).length<2)
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Last Name more than 2 characters.');
  return false;
  }
  else if($.trim(email) == '')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Email.');
  return false;
  }
  else if(!email_filter.test(email))
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Valid Email.');
  return false;
  }
  else if($.trim(phone)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Phone Number.');
  return false;
  }
  else if(!mobile_filter.test(phone))
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Numbers Only.');
  return false;
  }else if($.trim(phone).length<10)
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Phone Number Minimum 10 Digits.');
  return false;
  }
  else if($.trim(date) == '')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Date of Birth.');
  return false;
  }
  else if($.trim(start_date) == '')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Start Date');
  return false;
  }
  else if($.trim(country) == '')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Select Country.');
  return false;
  }
  else if($.trim(state) == '')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Select State.');
  return false;
  }
  // else if($.trim(district)=='')
  // {
  // toastr.options.timeOut = 1500; // 1.5s
  // toastr.error('Please Enter District.');
  // return false;
  // }
  // else if($.trim(district).length<3)
  // {
  // toastr.options.timeOut = 1500; // 1.5s
  // toastr.error('Please Enter District More than 3 Characters.');
  // return false;
  // }
  else if($.trim(city)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter City.');
  return false;
  }
  else if($.trim(city).length<3)
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter City More than 3 Characters.');
  return false;
  }
  else if($.trim(address)=='')
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Address.');
  return false;
  }
  else if($.trim(address).length<10)
  {
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Please Enter Address More than 10 Characters.');
  return false;
  }
  else
  {
   makeManager();
  }
  }
  //post data
  function makeManager()
  {
  var url   = "{{url('admin/update_admin_user_details')}}";
  var csrf  = $('#_token').val();
  var formdata = $('#myform').serialize();
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
  if(res.status=="200")
  {
   /* console.log(res);
    document.getElementById("myform").reset();*/
    window.alert(res.success);
    window.location = "{{url('admin/admin_users')}}";
    /*toastr.options.timeOut = 2000; // 1.5s
    toastr.success(res.success);*/
    return false;
  }
  },
  error: function (errormessage) {
    alert('err');
  hideProcessingOverlay();
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('Some thing went wrong.');
  return false;
  }
  });
  }
  </script>
  <!-- validation code end -->
  @endsection
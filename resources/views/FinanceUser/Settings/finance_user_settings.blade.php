@extends('FinanceUser.Layouts.master')
@section('page-title')
FinanceUser Setting
@endsection
@section('local-style')
<style type="text/css">
.btn-custom{
width: 170px;
height: 45px;
}
.row-fluid .span6{
margin-left: 0px;
}
#output_image
{
max-width: 100px;
max-height: 120px;
}
.tab-content{
overflow: hidden !important;
}
</style>
@endsection
@section('content')
<div id="content" class="span10">
  <ul class="breadcrumb">
    <li>
      <i class="icon-cog"></i>
      <a href="{{ url('finance_user/settings') }}">Settings</a>
    </li>
  </ul>
  <!-- ***********************Upside Buttons Start************************** -->
  <div class="row-fluid center">
    <a data-toggle="tab" href="#my-profile"><button class="btn btn-custom btn-primary">My Profile</button></a>
    <a data-toggle="tab" href="#change-password"><button class="btn btn-custom btn-primary">Change Password</button></a>
  </div>
  <!-- ************************Upside Buttons End**************************** -->
  <!-- ************************Tab Content Start***************************** -->
  <br>
  <br>
  <div class="tab-content">
    <div id="my-profile" class="tab-pane fade in active">
      <div class="row-fluid sortable">
        <div class="box span10 offset1">
          <div class="box-header" data-original-title>
            <h2>
            <i class="halflings-icon white edit"></i>
            <span>My Profile</span></h2>
            <div class="box-icon">
              <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
          </div>
          <div class="box-content">
          <!--   <form class="form-horizontal" method="POST" id="myform" files= 'true'> -->
            <form class="form-horizontal" action="{{url('finance_user/update_user')}}" method="POST" id="myform" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="user_type" value="{{$finance_user_profile->user_type_id}}">
              <input type="hidden" name="user_id" value="{{$finance_user_profile->main_user_id}}">
              <input type="hidden" name="address_id" value="{{$finance_user_profile->address_table_id}}">
              <input type="hidden" name="contact_id" value="{{$finance_user_profile->contact_id}}">
              <input type="hidden" name="tag_user_id" value="{{$finance_user_profile->tag_user_id}}">
              <!-- ****Profile Image Upload:Start********* -->
              <div class="row-fluid offset2">
                <div class="span3">
                  <label>Upload Profile Image</label>
                  @if(!empty($finance_user_profile->profile_pic))
                  <img id="output_image" class="img-circle" src="{{asset('crossroads/ProfilePics/FinancePics/'.$finance_user_profile->profile_pic)}}" />
                  @else
                  <img src="http://172.10.1.5:8050/crossroads/images/user.png" id="output_image" class="img-circle">
                  @endif
                </div>
                <div class="span3">
                <input type="file" name="profile_pic">
                </div>
                
              </div>
              <!-- ****Profile Image Upload:End*********** -->
              <br>
              <br>
              <!-- ****Profile Details:Start************** -->
              <div class="row-fluid">
                <fieldset>
                  <div class="span6">
                    <div class="control-group">
                      <label class="control-label" for="fname"><b>First Name<span style="color:red">*</span></b></label>
                      <div class="controls">
                        <input type="text" class="form-control" name="fname" id="fname"  placeholder="Enter First Name" value="{{\Crypt::decryptString($finance_user_profile->first_name)}}" maxlength="50">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="lname"><b>Last Name<span style="color:red">*</span></b></label>
                      <div class="controls">
                        <input type="text" class="form-control" name="lname" id="lname"  placeholder="Enter Last Name" value="{{\Crypt::decryptString($finance_user_profile->last_name)}}" maxlength="50">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="name"><b>Email<span style="color:red">*</span></b></label>
                      <div class="controls">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{\Crypt::decryptString($finance_user_profile->email)}}" maxlength="70" />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="name"><b>Phone Number<span style="color:red">*</span></b></label>
                      <div class="controls">
                        <input type="text" class="form-control" id="phone" value="{{\Crypt::decryptString($finance_user_profile->phone)}}" name="phone" placeholder="Enter Phone Number" maxlength="14"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label"><b>Date of Birth<span style="color:red">*</span></b></label>
                      <div class="controls">
                        <input type="text" name="date" id="date" class="form-control datepicker" value="{{\Crypt::decryptString($finance_user_profile->DOB)}}" data-format="mm/dd/yyyy">
                      </div>
                    </div>
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
                          <option value="{{Crypt::decryptString($finance_user_profile->state)}}" selected="selected">{{Crypt::decryptString($finance_user_profile->state)}}</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="city"><b>City<span style="color:red">*</span></b></label>
                      <div class="controls">
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{\Crypt::decryptString($finance_user_profile->city)}}" autocomplete="off" maxlength="50" required>
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label" for="address"><b>Address<span style="color:red">*</span></b></label>
                      <div class="controls">
                        <textarea rows="3" cols="50" name="address" id="address" placeholder="Address...">{{\Crypt::decryptString($finance_user_profile->address)}}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row-fluid span12">
                    <div class="span3 offset5">
                      <button type="submit"  class="btn btn-danger">Update</button>
                     <!--  <button type="button"  class="btn btn-success" onclick="javascript:return managerValidationCheck();" >Update</button> -->
                    </div>
                  </div>
                </fieldset>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- ****Profile Details:End**************** -->
    <div id="change-password" class="tab-pane fade">
      <div class="row-fluid sortable">
        <div class="box span6 offset3">
          <div class="box-header" data-original-title>
            <h2>
            <i class="halflings-icon white edit"></i>
            <span>Change Password</span></h2>
            <div class="box-icon">
              <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
          </div>
          <div class="box-content">
            <form class="form-horizontal" id="my-password">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
              <!-- ****Profile Details:Start************** -->
              <div class="row-fluid">
                <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="pwd"><b>Old Password<span style="color:red">*</span></b></label>
                    <div class="controls">
                      <input type="password" class="form-control" name="old_pwd" id="old_pwd" placeholder="Enter password">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="pwd"><b>New Password<span style="color:red">*</span></b></label>
                    <div class="controls">
                      <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter new password">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="pwd"><b>Confirm New Password<span style="color:red">*</span></b></label>
                    <div class="controls">
                      <input type="password" class="form-control" id="re_enter_password" name="re_enter_password" placeholder="Confirm new password">
                    </div>
                  </div>
                  <div class="span4 offset4">
                    <button type="button" onclick="reset()" class="btn btn-danger">Reset</button>
                    <button type="button" onclick="javascript:return passwordUpdationValidationCheck();" class="btn btn-success">Update</button>
                  </div>
                </fieldset>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ************************Tab Content End************************ -->
</div>
<script type="text/javascript">
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
  countryElement.options[0] = new Option('{{Crypt::decryptString($finance_user_profile->country)}}', '{{Crypt::decryptString($finance_user_profile->country)}}');
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
  <script>
   function passwordUpdationValidationCheck()
     {
      var old_pwd =  $('#old_pwd').val();
      var new_password =  $('#new_password').val();
      var re_enter_password =  $('#re_enter_password').val();
      if($.trim(old_pwd)=='')
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please Enter Old paswword.');
         return false;  
      }else if($.trim(old_pwd).length<6){
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Old Password more than 6 characters.');
         return false;  
      }

      if($.trim(new_password)=='')
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please Enter paswword.');
         return false;  
      }
      else if($.trim(new_password).length<6)
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Password more than 6 characters.');
         return false;  
      }else if($.trim(re_enter_password)==''){
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please Enter Confirm paswword.');
         return false;  
      }else if($.trim(re_enter_password).length<6){
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Confirm Password more than 6 characters.');
         return false;  
      }else if($.trim(re_enter_password) != $.trim(new_password)){
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Confirm-password same as new password.');
         return false;  
      }
      else
      {
         passwordUpdate();
      }
     }

     //post data
      function passwordUpdate()
      {
         var url  = "{{url('finance_user/update_manager_password')}}";
         var old_pwd= $('#old_pwd').val();
         var new_password= $('#new_password').val();
         var re_password= $('#re_enter_password').val();
         var user_id= $('#user_id').val();
         var csrf  = $('#_token').val();
        $.ajax({
              url: url,
              type: 'POST',
              data:{
               old_pwd:old_pwd, 
               new_password:new_password,
               re_password:re_password,
               user_id:user_id,
              _token: '{{csrf_token()}}'
              },
             beforeSend: function()
             {
               showProcessingOverlay();
             },
             success: function(res)   
             {
              console.log(res);
              hideProcessingOverlay();
              if(res.status=="200")
              {
                toastr.options.timeOut = 1500; // 1.5s
                toastr.success(res.success);
                document.getElementById('my-password').reset();
              }
             },
             error: function (errormessage) {
                hideProcessingOverlay();
                toastr.options.timeOut = 1500; // 1.5s
                toastr.error('Sorry, Old password does not match');
                return false; 
            }
        }); 
      }
  </script>
  @endsection
  @section('page-script')
  <script type="text/javascript">
  @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}");
  @endif

  @if(Session::has('error'))
      toastr.error("{{ Session::get('error') }}");
  @endif
</script>
  @endsection
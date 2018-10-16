@extends('Admin.Layouts.master')
@section('page-title')
Add New Client
@endsection
@section('local-style')
<style type="text/css">
</style>
@endsection
@section('content')
<div id="content" class="span10">
  <ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
      <i class="icon-angle-right"></i>
      <li><a href="{{ url('admin/project_settings') }}">Project Settings</a></li>
      <i class="icon-angle-right"></i>
      <li><a href="{{ url('admin/manage_client') }}">Manage Clients</a></li>
    </li>
    <i class="icon-angle-right"></i>
    <li><a href="{{ url('admin/add_new_client') }}">Add New Client</a></li>
  </ul>
  <!-- ************************Form Table : Starts****************************************** -->
  <div class="row-fluid sortable">
    <div class="box span12">
      <div class="box-header" data-original-title>
        <h2>
        <i class="halflings-icon white edit"></i>
        <span>Add New Client</span></h2>
        <div class="box-icon">
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
      </div>
      <div class="box-content">
       <!--  <form class="form-horizontal" action="{{ url('admin/add_new_client') }}" method="POST" id="addNewClient"> -->
        <form class="form-horizontal" id="addNewClient">
          <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
          <fieldset>
            <div class="span6">
              <div class="control-group">
                <label class="control-label" for="client">Client Name:</label>
                <div class="controls">
                  <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter Client Name" maxlength="50">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label" for="email">Client Email:</label>
                <div class="controls">
                  <input type="email" class="form-control" id="client_email" name="client_email" placeholder="Enter Client Email" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="client">Org Abbrev:</label>
                <div class="controls">
                  <input type="text" class="form-control" id="org_abbrev" name="org_abbrev" placeholder="Enter Org Abbrev" maxlength="50">

                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="client">Client Type:</label>
                <div class="controls">
                  <input type="text" class="form-control" id="client_type" name="client_type" placeholder="Enter Client Type" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="client">Country:</label>
                <div class="controls">
                <select data-placeholder="" id="country"  name="country"></select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="client">State:</label>
              <div class="controls">
              <select data-placeholder="Select State" id="state" name="state"></select>
            </div>
          </div>
        </div>
        <div class="span6">
          <div class="control-group">
            <label class="control-label" for="client">City:</label>
            <div class="controls">
              <input type="text" class="form-control" id="city" name="city" placeholder="Enter Enter City" maxlength="50">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="client">Address-1:</label>
            <div class="controls">
              <textarea rows="3" cols="50" name="address_1" id="address_1" placeholder="Address One..."></textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="client">Address-2:</label>
            <div class="controls">
              <textarea rows="3" cols="50" name="address_2" id="address_2" placeholder="Address Two..."></textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="client">Phone Number:</label>
            <div class="controls">
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" maxlength="50" onkeypress="return isNumberKey(event)">
            </div>
          </div>
        </div> 
        <div class="span5 offset4">
          <button type="button" onclick="redirect()" class="btn btn-default">Go Back</button>
          <button type="button" onclick="reset()" class="btn btn-warning">Reset</button>
          <!-- <button type="submit" class="btn btn-primary">Save</button> -->
          <button type="button"  class="btn btn-primary" onclick="javascript:return clientDetailsCheck();" >Save</button>
        </div>
      </div>
      
    </fieldset>
  </form>
</div>
</div>
</div>
<!-- ************************Form Table : End****************************************** -->
</div>
<script>
function isNumberKey(evt){
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
} 
</script>
<script type="text/javascript">
/********Trigger Reset button***********/
function reset(){
document.getElementById("addNewClient").reset();
}
function redirect(){
window.location = "{{url('admin/manage_client')}}";
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
function clientDetailsCheck()
{
var alphaExp            =  /^[a-zA-Z]+$/;
var mobile_filter       =  /^[0-9]*$/;
var email_filter        =  /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
var client_name         =  $('#client_name').val();
var client_email        =  $('#client_email').val();
var org_abbrev          =  $('#org_abbrev').val();
var client_type         =  $('#client_type').val();
var address_1           =  $('#address_1').val();
var address_2           =  $('#address_2').val();
var country             =  $('#country').val();
var state               =  $('#state').val();
var city                =  $('#city').val();
var phone               =  $('#phone').val();
if($.trim(client_name)=='')
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Client Name.');
return false;
}
else if($.trim(client_name).length<2)
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Client Name more than 2 characters.');
return false;
}
else if($.trim(client_email)=='')
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Client Email.');
return false;
}
else if(!$.trim(client_email).match(email_filter))
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Client Email with Correct-Format.');
return false;
}
else if($.trim(org_abbrev)==''){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Organization Abbrevation.');
return false;
}else if($.trim(org_abbrev).length<2){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Organization Abbrevation more than 2 characters.');
return false;
}else if($.trim(client_type)==''){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Client Type.');
return false;
}else if($.trim(client_type).length<2){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter client Type more than 2 characters.');
return false;
}else if($.trim(country)==''){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Select Country.');
return false;
}else if($.trim(state)==''){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Select State.');
return false;
}else if($.trim(city)==''){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter City.');
return false;
}else if($.trim(address_1)==''){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Address-1.');
return false;
}else if($.trim(address_1).length<10){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Address-1 more than 10 characters.');
return false;
}else if($.trim(address_2)==''){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Address-2.');
return false;
}else if($.trim(address_2).length<10){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Address-2 more than 10 characters.');
return false;
}else if($.trim(city).length<2){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter City more than 2 characters.');
return false;
}else if($.trim(phone)==''){
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Phone Number.');
return false;
}else if(!mobile_filter.test(phone))
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
else
{
 addNewClient();
}
}
//post data
function addNewClient()
{
var url_client      =  "{{url('admin/add_new_client')}}";
var newclientform   =  $('#addNewClient').serialize();
$.ajax({
url: url_client,
type: 'POST',
data:newclientform,
beforeSend: function()
{
showProcessingOverlay();
},
success: function(res)
{
hideProcessingOverlay();
toastr.options.timeOut = 1500; // 1.5s
toastr.success('New Client Added Successfully.');
location.reload();
},
error: function (errormessage) {
  hideProcessingOverlay();
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('All fields are required.');
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
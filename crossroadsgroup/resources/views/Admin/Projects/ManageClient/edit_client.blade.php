@extends('Admin.Layouts.master')
@section('page-title')
Edit New Client
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
      <li><a href="{{ url('admin/manage_client') }}">Manage Clients</a></li>
    </li>
    <i class="icon-angle-right"></i>
    <li><a href="#">Edit Client</a></li>
  </ul>
  <!-- ************************Form Table : Starts****************************************** -->
 
  <div class="row-fluid sortable">
    <div class="box span12">
      <div class="box-header" data-original-title>
        <h2>
        <i class="halflings-icon white edit"></i>
        <span>Edit Client</span></h2>
        <div class="box-icon">
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
      </div>
      <div class="box-content">
       <!--  <form class="form-horizontal" action="{{ url('admin/add_new_client') }}" method="POST" id="addNewClient"> -->
        <form class="form-horizontal" id="addNewClient">
          <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="client_id" name="client_id" value="{{$client_record->client_id}}">
          <fieldset>
            <div class="span6">
              <div class="control-group">
                <label class="control-label" for="client">Client Name:</label>
                <div class="controls">
                  <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter Client Name" value="{{(\Crypt::decryptString($client_record->name))}}" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="client">Org Abbrev:</label>
                <div class="controls">
                  <input type="text" class="form-control" id="org_abbrev" name="org_abbrev" placeholder="Enter Org Abbrev" value="{{(\Crypt::decryptString($client_record->org_abbrev))}}" maxlength="50">

                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="client">Client Type:</label>
                <div class="controls">
                  <input type="text" class="form-control" id="client_type" name="client_type" placeholder="Enter Client Type" value="{{(\Crypt::decryptString($client_record->client_type))}}" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="country">Country</label>
                <div class="controls">
                  <select data-placeholder="" id="country"  name="country">
                  </select>
                </div>
              </div>
            <div class="control-group">
              <label class="control-label" for="client">State:</label>
              <div class="controls">
              <select data-placeholder="Select State" id="state" name="state">
                <option value="{{Crypt::decryptString($client_record->state)}}" selected="selected">{{Crypt::decryptString($client_record->state)}}</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="client">City:</label>
            <div class="controls">
              <input type="text" class="form-control" id="city" name="city" value="{{(\Crypt::decryptString($client_record->city))}}"  placeholder="Enter Enter City" maxlength="50">
            </div>
          </div>
        </div>
        <div class="span6">
          
          <div class="control-group">
            <label class="control-label" for="client">Address-1:</label>
            <div class="controls">
              <textarea rows="3" cols="50" name="address_1" id="address_1" placeholder="Address One...">{{(\Crypt::decryptString($client_record->address))}}</textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="client">Address-2:</label>
            <div class="controls">
              <textarea rows="3" cols="50" name="address_2" id="address_2" placeholder="Address Two...">{{(\Crypt::decryptString($client_record->address2))}}
              </textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="client">Phone Number:</label>
            <div class="controls">
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" maxlength="50" value="{{(\Crypt::decryptString($client_record->phone))}}">
            </div>
          </div>
           <div class="control-group">
                <label class="control-label" for="country">Status</label>
                <div class="controls">
                  <select data-placeholder="" id="status"  name="status">
                   <option value="1" @if($client_record->client_status == 1) selected='selected' @endif>Active</option>
                   <option value="0" @if($client_record->client_status == 0) selected='selected' @endif>In Active</option>
                  </select>
                </div>
              </div>
        </div> 
        <div class="span5 offset4">
          <button type="button" onclick="redirect()" class="btn btn-default">Go Back</button>
          <!-- <button type="submit" class="btn btn-primary">Save</button> -->
          <button type="button"  class="btn btn-primary" onclick="javascript:return clientDetailsCheck();" >Update</button>
        </div>
      </div>
      
    </fieldset>
  </form>
</div>
</div>
</div>
<!-- ************************Form Table : End****************************************** -->
</div>
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
  countryElement.options[0] = new Option('{{Crypt::decryptString($client_record->country)}}', '{{Crypt::decryptString($client_record->country)}}');
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
// Assigned all countries. Now assign event listener for the states.
if (stateElementId) {
countryElement.onchange = function () {
populateStates(countryElementId, stateElementId);
};
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
var client_name         =  $('#client_name').val();
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
else if(!$.trim(client_name).match(alphaExp))
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Client Name with characters only.');
return false;
}
else if($.trim(client_name).length<2)
{
toastr.options.timeOut = 1500; // 1.5s
toastr.error('Please Enter Client Name more than 2 characters.');
return false;
}else if($.trim(org_abbrev)==''){
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
 updateClient();
}
}
//post data
function updateClient()
{
var url_client      =  "{{url('admin/update_client')}}";
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
toastr.success('Client Updates Successfully.');
//location.reload();
},
error: function (errormessage) {
  hideProcessingOverlay();
  toastr.options.timeOut = 1500; // 1.5s
  toastr.error('All fields are required');
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
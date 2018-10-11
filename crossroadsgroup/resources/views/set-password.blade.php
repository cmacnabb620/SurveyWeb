<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Crossroads Group Form</title>
      <link rel="stylesheet" href="{{asset('login-form/css/style.css')}}">
      <script src="{{asset('js/loader.js')}}"></script> 
</head>
<body>
  <div class="login-wrap" id="login_form">
   <img src="{{ asset('crossroads/images/logo.png')}}" style="width: 100%;">
  <h2>Set Password</h2>
  
  <div class="form">
   <!-- <form action="{{url('submit-login')}}" method="GET"> -->
   <form>
    
     <input type="text" placeholder="Username" name="username" value="{{$user['username']}}" id="username" readonly=""  maxlength="20"/>
    
    <input type="password" placeholder="Enter New Password" name="new_password" id="new_password" maxlength="15"/>
    <input type="password" placeholder="Re Enter Password" name="re_enter_password" id="re_enter_password"  maxlength="15" />
    <input type="hidden" name="user_id" id="user_id" value="{{$user['user_id']}}" />
   <!--  <button type="submit">Login</button> -->
    <button type="button" onclick="javascript:return passwordUpdationValidationCheck();" >Update</button>
   </form>
   
    <a href="{{url('/')}}" id="show_forgot"> <p> Login?</p></a>
  </div>
</div>

 

  <script src='https://code.jquery.com/jquery-1.10.0.min.js'></script>
  <script  src="{{asset('login-form/js/index.js')}}"></script>

  <!-- Tostar errors display start(Below 3 links required to show messages) -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<!-- Script for forgot code start-->
 <script>
   function passwordUpdationValidationCheck()
     {
      var new_password =  $('#new_password').val();
      var re_enter_password =  $('#re_enter_password').val();
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
         toastr.error('Please Enter Re paswword.');
         return false;  
      }else if($.trim(re_enter_password).length<6){
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Re Password more than 6 characters.');
         return false;  
      }else if($.trim(re_enter_password) != $.trim(new_password)){
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter re-password same as new password.');
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
         var url  = "{{url('update-password')}}";
         var new_password= $('#new_password').val();
         var re_password= $('#re_enter_password').val();
         var user_id= $('#user_id').val();
         var csrf  = $('#_token').val();
        $.ajax({
              url: url,
              type: 'POST',
              data:{
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
              hideProcessingOverlay();
              if(res.status=="200")
              {
                toastr.options.timeOut = 1500; // 1.5s
                toastr.success(res.success);
                 window.location = '/';
              }
             },
             error: function (errormessage) {
                hideProcessingOverlay();
                toastr.options.timeOut = 1500; // 1.5s
                toastr.error('Password updation something went wrong.');
                return false; 
            }
        }); 
      }
  </script>
<!-- Script for forgot code end-->
</body>
</html>

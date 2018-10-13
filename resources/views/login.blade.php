<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Crossroads Group Form</title>
      <link rel="stylesheet" href="{{asset('login-form/css/style.css')}}">
      <script src="{{asset('js/loader.js')}}"></script>
      <!-- browser backbutton code start (NOTE: find body strat tag also added code[onload="noBack();" 
  onpageshow="if (event.persisted) noBack();" onunload=""])-->
      <SCRIPT type="text/javascript">
        window.history.forward();
        function noBack() { window.history.forward(); }
      </SCRIPT> 
      <!-- browser backbutton code end -->
</head>
<body onload="noBack();" 
  onpageshow="if (event.persisted) noBack();" onunload="">
  <div class="login-wrap" id="login_form">
   <img src="{{ asset('crossroads/images/logo.png')}}" style="width: 100%;">
  <h2>Login</h2>
  
  <div class="form">
   <!-- <form action="{{url('submit-login')}}" method="GET"> -->
   <form>
    
     <input type="text" placeholder="Username" name="username" id="username" maxlength="20"/>
    
    <input type="password" placeholder="Password" name="password" id="password" maxlength="15" />
   <!--  <button type="submit">Login</button> -->
    <button type="button" onclick="javascript:return loginValidationCheck();" >Login</button>
   </form>
   
    <a href="#" id="show_forgot"> <p> Forgot Password?</p></a>

  </div>
</div>
 <div class="login-wrap" id="forgot_form" style="display: none;">
  <img src="{{ asset('crossroads/images/logo.png')}}" style="width: 100%;">
  <!-- <h2>Forgot Password</h2> -->
  
  <div class="form">
    <input type="text" placeholder="Enter Username" name="forgot_username" id="forgot_username" maxlength="20" />
    <button type="button" onclick="javascript:return forgotValidationCheck();" >Check</button>
    <a href="#" id="show_login"> <p> Want Login?</p></a>
  </div>
</div>

  <script src='https://code.jquery.com/jquery-1.10.0.min.js'></script>
  <script  src="{{asset('login-form/js/index.js')}}"></script>

  <!-- Tostar errors display start(Below 3 links required to show messages) -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

 <!-- Script for login code end-->   
  <script>
   function loginValidationCheck()
     {
      var username_login      =  $('#username').val();
      var password_login  =  $('#password').val();
      if($.trim(username_login)=='')
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter username.');
         return false;  
      }
      else if($.trim(username_login).length<6)
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Username more than 6 characters.');
         return false;  
      }
      else if($.trim(password_login)=='')
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Password.');
         return false;  
      }
      else if($.trim(password_login).length<6)
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Password more than 6 characters.');
         return false;  
      }
      else
      {
         makeUserLogin();
      }
     }

     //post data
      function makeUserLogin()
      {
         var url               = "{{url('submit-login')}}";
         var user_name     = $('#username').val();
         var user_password  = $('#password').val();
         var csrf  = $('#_token').val();
        $.ajax({
              url: url,
              type: 'POST',
              data:{
              username:user_name,
              password:user_password,
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
                window.location = res.redirect_url;
              }else{
                toastr.options.timeOut = 1500; // 1.5s
                toastr.error(res.deactivate);
                return false; 
              }
             },
             error: function (errormessage) {
                hideProcessingOverlay();
                toastr.options.timeOut = 1500; // 1.5s
                toastr.error('You are Not Authorised Person.');
                return false; 
            }
        }); 
      }
  </script>
<!-- Script for login code end-->

<!-- Script for forgot code start-->
 <script>
   function forgotValidationCheck()
     {
      var forgot_username =  $('#forgot_username').val();
      if($.trim(forgot_username)=='')
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter username.');
         return false;  
      }
      else if($.trim(forgot_username).length<6)
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Username more than 6 characters.');
         return false;  
      }
      else
      {
         checkFrogotUseName();
      }
     }

     //post data
      function checkFrogotUseName()
      {
         var url  = "{{url('forgot-check-username')}}";
         var forgot_username= $('#forgot_username').val();
         var csrf  = $('#_token').val();
        $.ajax({
              url: url,
              type: 'POST',
              data:{
              username:forgot_username,
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
                window.location = res.redirect_url;
                 window.location = '/set-password/' + res.user_id;
              }
             },
             error: function (errormessage) {
                hideProcessingOverlay();
                toastr.options.timeOut = 1500; // 1.5s
                toastr.error('You are Not Authorised Person.');
                return false; 
            }
        }); 
      }
  </script>
<!-- Script for forgot code end-->

<!-- Script for login forgot password forms changing start-->
  <script type="text/javascript">
    $(function(){
        $('#show_forgot').click(function(){
            $('#login_form').hide();
            $('#forgot_form').show();
            return false;
        });

        $('#show_login').click(function(){
            $('#forgot_form').hide();
            $('#login_form').show();
            return false;
        });    
});
  </script>
<!-- Script for login forgot password forms changing end-->

<!-- Script for any success message displlay with tostr start-->
<script>
  @if(Session::has('message'))
      toastr.success("{{ Session::get('message') }}");
  @endif
</script>
<!-- Script for any success message displlay with tostr end-->

<!-- Script for any success message displlay with tostr start-->
<script>
  @if(Session::has('after-logout-access-dashboard'))
      toastr.warning("{{ Session::get('after-logout-access-dashboard') }}");
  @endif
</script>
<!-- Script for any success message displlay with tostr end-->

<!-- Script for emial setpassword link expire then redirect login and show message start-->
<script>
  @if(Session::has('emial_setpassword_link_expired_warning_message'))
      toastr.warning("{{ Session::get('emial_setpassword_link_expired_warning_message') }}");
  @endif
</script>
<!-- Script for any success message displlay with tostr end-->

<!-- Script for browser back button hide start -->
<!-- <script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> -->
<!-- Script for browser back button hide end -->

</body>
</html>

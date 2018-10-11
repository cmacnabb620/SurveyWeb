@if(isset($user_login_record_update))
<div class="box-content">
<table class="table table-hover table-bordered table-responsive">
@if(count($user_login_record_update) != 0)
			<thead>
			  <tr>
				  <th>#</th>
				  <th>Username</th>
				  <th>Login Time</th>
				  <th>Logout Time</th>
				  <th>Browser</th>
				  <th>Device</th>
				  <th>Plateform</th>
				  <th>IP Address</th>
			  </tr>
		   </thead> 
		  <tbody>
		  <?php $i=1; ?>
		  	@foreach($user_login_record_update as $user_login_record)
		  	<tr>
		  	    <?php
		  	    $contact_record_id= \DB::table('users')->where('user_id',$user_login_record->user_id)->select('contact_id')->first();
		  	    $user_name_record= \DB::table('contact')->where('contact_id',$contact_record_id->contact_id)->first();
		  	    ?>
		  		<td>{{$i++}}</td>
		  		<td>{{\Crypt::decryptString($user_name_record->first_name)}} {{\Crypt::decryptString($user_name_record->last_name)}}</td>
		  		<td>{{$user_login_record->login_time}}</td>
		  		<td>{{$user_login_record->logout_time}}</td>
		  		<td>{{$user_login_record->browser_name}}</td>
		  		@if($user_login_record->is_mobile == 'true')
		  		<td>Mobile Device</td>
		  		@elseif($user_login_record->is_tablet == 'true')
		  		<td>Tablet</td>
		  		@elseif($user_login_record->is_desktop == 'true')
		  		<td>Desktop</td>
		  		@endif
		  		<td>{{$user_login_record->plateform_name}}</td>
		  		<td>{{$user_login_record->ip_address}}</td>	
		  	</tr>
		  	@endforeach
		  	</tbody>
@else
 <tr>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th style="color:red">No Login Attempts Found</th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
</tr>
@endif		  	
</table>
</div>
@endif
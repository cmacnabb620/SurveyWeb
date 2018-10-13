 @if(isset($user_types) && !empty($user_types))
  <?php $i=1; ?>
  @foreach($user_types as $user_type)
	<tr>
		<td>{{$i++}}</td>
		<td>{{$user_type->user_type_desc}}</td>
		<td>{{Carbon::parse($user_type->last_update)->format('m-d-y g:i A')}}</td>
		<td>
			<!-- <a class="btn btn-success" href="#">
				<i class="halflings-icon white zoom-in"></i>  
			</a> -->
			
			<a class="btn btn-info" href="{{url('admin/roles/edit-role/'.Hashids::encode($user_type->user_type_id))}}">
				<i class="halflings-icon white edit"></i>  
			</a>
			<!-- <a class="btn btn-danger" href="{{url('admin/role-delete/'.Hashids::encode($user_type->user_type_id))}}">
				<i class="halflings-icon white trash"></i> 
			</a> -->
			
		</td>  
	</tr>
	@endforeach
@else
	<tr>
		<td></td>
		<td></td>
		<td>No User Types Found</td>
		<td>
			
		</td>  
	</tr>	
@endif
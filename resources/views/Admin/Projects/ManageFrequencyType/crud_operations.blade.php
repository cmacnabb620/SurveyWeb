 @if(isset($freq_types) && !empty($freq_types))
  <?php $i=1; ?>
  @foreach($freq_types as $freq_type)
	<tr>
		<td>{{$i++}}</td>
		<td>{{$freq_type->report_frequency}}</td>
		<td>{{Carbon::parse($freq_type->last_update)->format('m-d-y g:i A')}}</td>
		<td>
			<!-- <a class="btn btn-success" href="#">
				<i class="halflings-icon white zoom-in"></i>  
			</a> -->
			
			<a class="btn btn-info" href="{{url('admin/edit_frequency_type/'.Hashids::encode($freq_type->report_freq_id))}}">
				<i class="halflings-icon white edit"></i>  
			</a>
			<a class="btn btn-danger" href="{{url('admin/delete_frequency_type/'.Hashids::encode($freq_type->report_freq_id))}}">
				<i class="halflings-icon white trash"></i> 
			</a>
			
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
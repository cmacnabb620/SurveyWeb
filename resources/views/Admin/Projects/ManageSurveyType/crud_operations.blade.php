 @if(isset($survey_types) && !empty($survey_types))
  <?php $i=1; ?>
  @foreach($survey_types as $survey_type)
	<tr>
		<td>{{$i++}}</td>
		<td>{{$survey_type->survey_type}}</td>
		<td>{{Carbon::parse($survey_type->last_update)->format('m-d-y g:i A')}}</td>
		<td>
			<!-- <a class="btn btn-success" href="#">
				<i class="halflings-icon white zoom-in"></i>  
			</a> -->
			
			<a class="btn btn-info" href="{{url('admin/edit_survey_type/'.Hashids::encode($survey_type->survey_type_id))}}">
				<i class="halflings-icon white edit"></i>  
			</a>
			<a class="btn btn-danger" href="{{url('admin/delete_survey_type/'.Hashids::encode($survey_type->survey_type_id))}}">
				<i class="halflings-icon white trash"></i> 
			</a>
			
		</td>  
	</tr>
	@endforeach
@else
	<tr>
		<td></td>
		<td></td>
		<td>No Survey Types Found</td>
		<td>	
		</td>  
	</tr>	
@endif
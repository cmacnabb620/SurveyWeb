 @if(isset($languages) && !empty($languages))
  <?php $i=1; ?>
  @foreach($languages as $language)
	<tr>
		<td>{{$i++}}</td>
		<td>{{$language->language}}</td>
		<td>{{Carbon::parse($language->last_update)->format('m-d-y g:i A')}}</td>
		<td>
			<!-- <a class="btn btn-success" href="#">
				<i class="halflings-icon white zoom-in"></i>  
			</a> -->
			
			<a class="btn btn-info" href="{{url('admin/edit_language/'.Hashids::encode($language->language_id))}}">
				<i class="halflings-icon white edit"></i>  
			</a>
			<a class="btn btn-danger" href="{{url('admin/delete_language/'.Hashids::encode($language->language_id))}}">
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
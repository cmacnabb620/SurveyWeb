 @if(isset($dist_types) && !empty($dist_types))
  <?php $i=1; ?>
  @foreach($dist_types as $dist_type)
	<tr>
		<td>{{$i++}}</td>
		<td>{{$dist_type->dist_type}}</td>
		<td>
			<!-- <a class="btn btn-success" href="#">
				<i class="halflings-icon white zoom-in"></i>  
			</a> -->
			
			<a class="btn btn-info" href="{{url('admin/edit_dist_type/'.Hashids::encode($dist_type->dist_types_id))}}">
				<i class="halflings-icon white edit"></i>  
			</a>
			<a class="btn btn-danger" href="{{url('admin/delete_dist_type/'.Hashids::encode($dist_type->dist_types_id))}}">
				<i class="halflings-icon white trash"></i> 
			</a>
			
		</td>  
	</tr>
	@endforeach
@else
	<tr>
		<td></td>
		<td></td>
		<td>No Distribution Type Found</td>
		<td>
			
		</td>  
	</tr>	
@endif
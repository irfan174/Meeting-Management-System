@extends('Layout.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-12 p-5">
<table id="UserDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name</th>
	   <th class="th-sm">Designation</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($UsersData as $UsersData)
  	<tr>
  		<td>{{$UsersData->name}} </td>
  		<td>{{$UsersData->dasignation}} </td>
  	</tr>
    @endforeach
    
  </tbody>
</table>
</div>
</div>
</div>

@endsection


@section('jsCode')
<script type="text/javascript">
    
    $(document).ready(function() {
    $('#UserDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

</script>

@endsection
@extends('layouts.app')

@section('content')

<div class="container" style="width: 70%;">
	<table class="table table-dark">
		<?php
			$serial_no = 1;
		?>

		  <thead>
		    <tr>
		      <th>#Serial</th>
		      <th>Name</th>
		      <th>Tagged</th>
		    </tr>
		  </thead>
		  <tbody>
		@foreach($users as $user)
			@if($serial_no == 1)
			    <tr class="success">
			    	<td>{{$serial_no}}</td>
			    	<td>{{$user->name}}</td>
			    	<td>{{$user->tagged}}</td>
			    </tr>
			@endif
			@if($serial_no == 2)
			    <tr class="info">
			    	<td>{{$serial_no}}</td>
			    	<td>{{$user->name}}</td>
			    	<td>{{$user->tagged}}</td>
			    </tr>
			@endif
			@if($serial_no == 3)
			    <tr class="warning">
			    	<td>{{$serial_no}}</td>
			    	<td>{{$user->name}}</td>
			    	<td>{{$user->tagged}}</td>
			    </tr>
			@endif
			@if($serial_no > 3)
			    <tr>
			    	<td>{{$serial_no}}</td>
			    	<td>{{$user->name}}</td>
			    	<td>{{$user->tagged}}</td>
			    </tr>
			@endif
			<?php
				$serial_no = $serial_no + 1;
			?>
		 @endforeach
		  </tbody>
	</table>
<div>
@endsection
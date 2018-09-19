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
		      <th>Tagged on this hour</th>
		      <th>Tagged</th>
		    </tr>
		  </thead>
		  <tbody>
		@foreach($users as $serial_no => $user)
			@if($serial_no == 0)
			    <tr class="success">
			    	<td>{{$serial_no + 1}}</td>
			    	<td>{{$user->name}}</td>
			    	<td>{{$user->hourly_tag}}</td>
			    	<td>{{$user->tagged}}</td>
			    </tr>
			@endif
			@if($serial_no == 1)
			    <tr class="info">
			    	<td>{{$serial_no + 1}}</td>
			    	<td>{{$user->name}}</td>
					<td>{{$user->hourly_tag}}</td>
			    	<td>{{$user->tagged}}</td>
			    </tr>
			@endif
			@if($serial_no == 2)
			    <tr class="warning">
			    	<td>{{$serial_no + 1}}</td>
			    	<td>{{$user->name}}</td>
					<td>{{$user->hourly_tag}}</td>
			    	<td>{{$user->tagged}}</td>
			    </tr>
			@endif
			@if($serial_no > 2)
			    <tr>
			    	<td>{{$serial_no + 1}}</td>
			    	<td>{{$user->name}}</td>
					<td>{{$user->hourly_tag}}</td>
			    	<td>{{$user->tagged}}</td>
			    </tr>
			@endif
		 @endforeach
		  </tbody>
	</table>
<div>
@endsection
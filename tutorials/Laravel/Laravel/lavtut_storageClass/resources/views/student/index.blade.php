@extends("student.layout.master")

@section("title","Student Application 
| Listing")

@section("body")
	<div class="panel panel-primary">
	  <div class="panel-heading">Student Lists
		<a href="{{ url('student/create') }}" class="btn btn-success pull-right owtbtn">Add Student</a>
	  </div>
	  <div class="panel-body">
		
		{{ url('storage/Desert.jpg') }}
	  
		<table class="table">
			<thead>
			  <tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Image</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1;?>
			@foreach($students as $student)
			  <tr>
				<td>{{ $i++ }}</td>
				<td>{{ $student->name }}</td>
				<td>{{ $student->email }}</td>
				<td>
				@php 
				if(!empty($student->st_image)){
				@endphp
					<img src="{{ url('upload/'.$student->st_image) }}" style="height:50px;width:50px;">
				@php 
				}else{
				@endphp
				
					<h3>No Image Found</h3>
				@php 
				}
				@endphp
				</td>
				<td>
					<a href="{{ url('student/'.$student->id.'/edit') }}" class="btn btn-info">Edit</a>
					<form class="pull-right" action="/student/{{ $student->id }}" method="post">
						{{ csrf_field() }}
						{{ method_field("DELETE") }}
						<button class="btn btn-danger" type="submit">Delete</button>
					</form>
				</td>
				</tr>      
			@endforeach  
			</tbody>
		  </table>
	  </div>
	</div>
@endsection
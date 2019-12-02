@extends("student.layout.master")

@section("title","Student Application 
| Create Form")

@section("body")
	<div class="panel panel-primary">
	  <div class="panel-heading">
		{{ ucfirst(substr(Route::currentRouteName(),8)) }} Student
		
		<a href="{{ url('student') }}" class="btn btn-info pull-right owtbtn">< Back</a>
	  </div>
	  <div class="panel-body">
		<form class="form-horizontal" action="/student/@yield('studentId')" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		@section("editMethod")
		@show
		  <div class="form-group">
			<label class="control-label col-sm-2" for="name">Name:</label>
			<div class="col-sm-10">
			  <input type="text" value="@yield('studentName')" class="form-control" id="name" name="name" placeholder="Enter name">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label class="control-label col-sm-2" for="email">Email:</label>
			<div class="col-sm-10">
			  <input type="text" value="@yield('studentEmail')" class="form-control" id="email" name="email" placeholder="Enter email">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label class="control-label col-sm-2" for="image">Image:</label>
			<div class="col-sm-10">
			  <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Submit</button>
			</div>
		  </div>
		</form> 
	  </div>
	</div>
@endsection


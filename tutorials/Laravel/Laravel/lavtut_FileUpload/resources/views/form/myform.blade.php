@if($errors->any())
	@foreach($errors->all() as $error)
	<p>{{$error}}</p>
	@endforeach
@endif
<form method="post" action="/submitmyform">
	{{csrf_field()}}
	<p>
		<label>Name</label>
		<input type="text" name="name" value="{{ old('name') }}"/>
	</p>
	<p>
		<label>Email</label>
		<input type="text" name="email" value="{{ old('email') }}"/>
	</p>
	<p>
		<label>Age</label>
		<input type="text" name="age" value="{{ old('age') }}"/>
	</p>
	<p>
		<input type="submit" value="Submit"/>
	</p>

</form>
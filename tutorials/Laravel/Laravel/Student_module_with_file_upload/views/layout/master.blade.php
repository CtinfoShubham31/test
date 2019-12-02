<html>
	<head>
		<title>@yield("title")</title>
		<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
		<style>
			.owtcontainer{margin-top:50px;}
		</style>
	</head>
	<body>
		<div class="container owtcontainer">
			<div class="row">
				@section("body")
				@show
			</div>
		</div>
	</body>
</html>
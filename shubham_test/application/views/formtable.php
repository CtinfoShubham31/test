<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <base href="<?php echo base_url();?>" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
<h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
	<form id="formtab">
  <div class="form-group">
    <label for="email">Username:</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <input type="hidden" name="user_id">
  <div class="form-group">
    <label for="pwd">Email:</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

              
  <table class="table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="usersinfo">
	<?php
	if(!empty($udata)){
		foreach($udata as $user){
	?>
		<tr>
			<td><?php echo $user->username;?></td>
			<td><?php echo $user->email;?></td>
			<td><a herf="javascript:;" onclick="editUsers(<?php echo $user->user_id;?>)">Edit</a></td>
		</tr>
	<?php
		}
	}
	?>
      
      
    </tbody>
  </table>
</div>

<script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'quiz/formtsubmit',
            data: $('form').serialize(),
            success: function (data) {
			  if(data){
				$("#usersinfo").html(data);
			  }
            }
          });

        });

      });
	  
	  function editUsers(user_id){
		$.ajax({
            type: 'post',
            url: 'quiz/editform',
            data: {user_id:user_id},
            success: function () {
              
            }
		});
	  }
    </script>

</body>
</html>

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
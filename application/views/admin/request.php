<!doctype html>
<html lang="en-US">
<body>
	<h2>Request Digital Certificate</h2>
    <?php
		echo '<table border="1">';
		echo '<tr>';
		echo '<th>Serial Number</th>';
		echo '<th>Common Name</th>';
		echo '<th>Organization Name</th>';
		echo '<th>Address</th>';
		echo '<th>City</th>';
		echo '<th>Postal Code</th>';
		echo '<th>Username Requested</th>';
		echo '<th>ID Country</th>';
		echo '<th>Status</th>';
		echo '<th>Action</th>';
		echo '</tr>';
		if($request != NULL)
		{
			foreach($request as $temp)
			{
				echo '<tr>';
				echo '<td>'.$temp->serial_number.'</td>';
				echo '<td>'.$temp->common_name.'</td>';
				echo '<td>'.$temp->organization_name.'</td>';
				echo '<td>'.$temp->address.'</td>';
				echo '<td>'.$temp->city.'</td>';
				echo '<td>'.$temp->postal_code.'</td>';
				echo '<td>'.$temp->username.'</td>';
				echo '<td>'.$temp->id_country.'</td>';
				if($temp->status == true)
				{
					echo '<td>Accepted</td>';
					echo '<td></td>';
				}
				else
				{
					echo '<td>Pending</td>';
					echo '<td><a href="'.base_url().'admin/acceptRequest/'.$temp->id_request.'"><img src="'.base_url().'images/tick.png" alt="" title="Accept" /></a></td>';
				}
				echo '</tr>';
			}
		}
		echo '</table>';
	?>
</body> 
</html>
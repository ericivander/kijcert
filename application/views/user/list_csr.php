<!doctype html>
<html lang="en-US">
<body>
	<h2>Download Certificate Signing Request</h2>
    <?php
		echo '<table border="1">';
		echo '<tr>';
		echo '<th>Serial Number</th>';
		echo '<th>Common Name</th>';
		echo '<th>Organization Name</th>';
		echo '<th>Address</th>';
		echo '<th>City</th>';
		echo '<th>Postal Code</th>';
		echo '<th>ID Country</th>';
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
				echo '<td>'.$temp->id_country.'</td>';
				echo '<td><a href="'.base_url().'user/downloadCSR/'.$temp->id_request.'"><img src="'.base_url().'images/cert.png" alt="" title="Download" /></a></td>';
				echo '</tr>';
			}
		}
		echo '</table>';
	?>
</body> 
</html>
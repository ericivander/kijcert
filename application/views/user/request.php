<!doctype html>
<html lang="en-US">
<body>
	<h2>Request Digital Certificate</h2>
    <?php
		echo form_open('user/submitRequest');
		echo form_hidden('username', $this->session->userdata('username'));
		echo form_label('Common Name', 'common_name');
		echo '<br>';
		echo form_input('common_name', '');
		echo '<br>';
		echo form_label('Organization Name', 'organization_name');
		echo '<br>';
		echo form_input('organization_name', '');
		echo '<br>';
		echo form_label('Address', 'address');
		echo '<br>';
		echo form_input('address', '');
		echo '<br>';
		echo form_label('City', 'city');
		echo '<br>';
		echo form_input('city', '');
		echo '<br>';
		echo form_label('Postal Code', 'postal_code');
		echo '<br>';
		echo form_input('postal_code', '');
		echo '<br>';
		echo form_label('Country', 'id_country');
		echo '<br>';
		echo '<select name="id_country">';
		if($country != NULL)
		{
			foreach($country as $temp)
			{
				echo '<option value="'.$temp->id_country.'">';
				echo $temp->country_name;
				echo '</option>';
			}
		}
		echo '</select>';
		echo '<br>';
		echo '<br>';
		echo form_submit('submit', 'Submit');
		echo form_close();
	?>
</body> 
</html>
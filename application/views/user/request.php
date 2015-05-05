<!doctype html>
<html lang="en-US">
<body>
	<h2>Request Digital Certificate</h2>
    <?php
		echo form_open('user/submitRequest');
		echo form_hidden('username', $this->session->userdata('username'));
		echo form_label('Certificate Signing Request', 'csr_file');
		echo '<br>';
		echo '<input type="file" name="csr_file" size="1000"/>';
		echo '<br>';
		echo '<br>';
		echo form_submit('submit', 'Submit');
		echo form_close();
	?>
</body> 
</html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>
</head>
<body>

<h1>Reassign Vendors to List</h1>
    <?php
		$redirect = current_url();
		echo form_open_multipart('/script/maya_post/');
		echo form_hidden('redirect', $redirect);
        echo form_label('Original Vendor ID', 'oldvendor');
	    echo form_input('oldvendor', 'vendor id');
        echo form_label('New Vendor ID', 'newvendor');
	    echo form_input('newvendor', 'New Vendor ID');
		echo form_upload('userfile');
		echo form_submit('upload', 'Upload');
		echo form_close();
	?>
<h1>Upload Leads to LeadTmp</h1>
    <?php
		$redirect = current_url();
		echo form_open_multipart('/script/lead_post/');
		echo form_hidden('redirect', $redirect);
		echo form_upload('userfile');
		echo form_submit('upload', 'Upload');
		echo form_close();
	?>
</body>
</html>
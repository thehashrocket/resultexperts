<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>
</head>
<body>
<?php echo validation_errors(); ?>
<p>Error: <?php echo ($error_message); ?></p>
<p>Success: <?php echo ($success_message); ?></p>
<p>Curl: <?php echo ($curl_post); ?></p>
</body>
</html>
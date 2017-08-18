<!DOCTYPE html>
<html lang="en">
<head>
<?php $CI =& get_instance(); if($CI->uri->segment(1) == "auth") {?>
<title>Welcome | Crunchy</title>
<meta http-equiv="refresh" content="15">
<?php } else { ?>
<title>Database Error</title>
<?php } ?>
<style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	-webkit-box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
	<?php  
		if($CI->uri->segment(1) == "auth") {
			echo "<code>Loading Website...<span id='counter'>15</span><input type='hidden' name='counter_hid' id='counter_hid' value='15'></code>";

		} else {
			echo '<div id="container"><h1>'.$heading.'</h1>';
			echo $message."</div>";
		}
	?>
	<script>
		setInterval(function(){ 
			document.getElementById('counter_hid').value = document.getElementById('counter_hid').value - 1;
			document.getElementById('counter').innerHTML = document.getElementById('counter_hid').value;
			
		}, 1000);
	</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id='d1'>
	</div>
	<script type="text/javascript">
		function insert(id,txt){
			document.getElementById(id).innerHTML=txt;
		}
	</script>
	<?php
		$txt='<div style="color:red;text-align:center">Hi</div>';
		echo "<script> insert('d1','$txt')</script>";
		$ary=array("a","b");
		echo count($ary);
		echo date("Y-m-d");
	?>
</body>
</html>
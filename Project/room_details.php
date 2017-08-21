<html>
	<body>
	<?php
	include "sql_con.php";
$roomno=$_POST["roomno"];
$roomtype=$_POST["roomType"];
$query="insert into room values('$roomno', '$roomtype')";
$rs=mysql_query($query);


?>
		
	</body>
</html>


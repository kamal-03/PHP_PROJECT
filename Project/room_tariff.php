<html>
	<body>
	<?php
	include "sql_con.php";
$roomtype=$_POST["roomtype"];
$roomtariff=$_POST["roomtariff"];
$extra=$_POST["extra"];
$query="insert into tariff values('$roomtype', '$roomtariff','$extra')";
$rs=mysql_query($query);
echo "Entry entered successfully";



?>
		
	</body>
</html>
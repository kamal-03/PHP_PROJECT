<html>
<pre>

<?php

include "sql_con.php";
$roomno=$_POST["roomno"];
$Clientname=$_POST["clientname"];
$Startdate=$_POST["startdate"];
$Enddate=$_POST["enddate"];
$extraperson=$_POST["extraperson"];


$d1=date_create($Startdate);
$d2=date_create($Enddate);
$interval=date_diff($d1,$d2);
$ddate=(int)$interval->format("%a");

$qrt="select roomtype from room where roomno=$roomno";
$rs1=mysql_query($qrt);
$res1=mysql_fetch_row($rs1);
$rt=$res1[0];

$qe="select roomtariff from tariff where roomtype='$rt'";
$rs2=mysql_query($qe);
$res2=mysql_fetch_row($rs2);
$rtr=$res2[0];


$qt="select extra from tariff where roomtype='$rt'";
$rs3=mysql_query($qt);
$res3=mysql_fetch_row($rs3);
$extariff=$res3[0];

$finalamt=($ddate * $rtr) + ($extraperson*$extariff);
$query="insert into client values('$Clientname','$roomno','$Startdate','$Enddate',$finalamt)";
$rs=mysql_query($query);
//echo "<h3> Your  total bill amount=".$finalamt;

echo "<table style='text-align:center' border=2 cellpadding=5 cellspacing=2><tr><th>Client Name</th><th>Roomno</th><th>Room Type</th><th>Start Date</th><th>End Date</th><th>Amount</th></tr>";
echo "<tr><td>".$Clientname."</td><td>".$roomno."</td><td>".$rt."</td><td>".$Startdate."</td><td>".$Enddate."</td><td>".$finalamt."</td></tr>";
//echo "<br /><br /><br /><br /><br /><br /><br /><br />";

echo "<h3 style='text-align:center'>Enjoy your vist!!!</h3>";

?>
</pre>
</html>
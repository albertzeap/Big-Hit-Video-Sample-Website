
<!-- TODO: Include header file -->

<!-- TODO: connect to the database
check if connection successfully established.
-->

<!-- TODO: Format the sql query result: Formatting has been done for you already: see code below
-->
<?php
include 'HeaderFile.php';


$link = mysqli_connect("127.0.0.1", "root", "", "bighitvideo");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$sql = "SELECT * FROM
(SELECT rateWorkTable.ssn, (hourlyRate*hoursWorked) AS payOwed FROM
(SELECT *, TIMEDIFF(startTime, endTime)/-10000 AS hoursWorked FROM 
(SELECT timecard.ssn,date,startTime, endTime, hourlyemployee.hourlyRate FROM timecard LEFT JOIN hourlyemployee ON timecard.ssn=hourlyemployee.ssn)
AS hourlyRateTable) AS rateWorkTable) AS payOwedTable";

$result = mysqli_query($link,$sql);
$row = mysqli_fetch_row($result);


$displayForm = true;

if(isset($_POST['button1'])) { 
            print "<pre>";
			print "<table border=1 align= center bordercolor=#0489B1> ";
			print "<tr><td>SSN </td><td> Pay Owed </td>";
			print "<tr><td>$row[0] </td><td> $row[1]  </td></tr>	";
			while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
			{
			print "\n";
			print "<tr><td>$row[ssn] </td><td> $row[payOwed]  </td></tr>	";
			}
			print "</table>";
			print "</pre>";
			mysqli_free_result($result);
			mysqli_close($link);
			
			$displayForm = false;
 }
 
 if($displayForm){	
	print "<form method=\"post\">"; 
	print "<input type=\"submit\" name=\"button1\"
                value=\"View\"/>"; 
	print  "</form>"; 
}

?>
</center>

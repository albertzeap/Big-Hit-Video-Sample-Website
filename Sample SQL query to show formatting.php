
<!-- TODO: Include header file -->

<!-- TODO: connect to the database
check if connection successfully established.
-->

<!-- TODO: Format the sql query result: Formatting has been done for you already: see code below
-->
<?php
$sql = "SELECT *
        FROM customer";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_row($result);
print "<pre>";
print "<table border=1>";
print "<tr><td>Account id </td><td> Video id </td>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
print "\n";
print "<tr><td>$row[accountid] </td><td> $row[videoid]  </td></tr>	";
}
print "</table>";
print "</pre>";
mysqli_free_result($result);
mysqli_close($link);
?>
</center>

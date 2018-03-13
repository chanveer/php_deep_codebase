<?php 
$con = mysqli_connect('localhost','root','','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"my_db");
$sql="SELECT * FROM sleep_cycle";
$result = mysqli_query($con,$sql);
echo "<table>
<tr>
<th>Firstname</th>
<th>Age</th>
<th>Effective Sleep</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['effective_sleep'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
  
?>
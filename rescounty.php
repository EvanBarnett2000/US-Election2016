<html>
<body>
<?php
    
    require_once('data.php');
    echo"&nbsp";
    $colour="";


   
?>
<h1> results by Country</h1>
<br>
&nbsp;
<table border='1'>
    <tr>
        <th>FIPS</th>
        <th>Name</th>
        <th>State</th>
        <th>Total Votes</th>
        <th>Clinton</th>
        <th>Trump</th>
        <th>Clinton %</th>
        <th>Trump %</th>
    </tr>

<?php
$connection = mysqli_connect("localhost","root","");
mysqli_select_db($connection,"uselection2016");

$result = mysqli_query($connection,"SELECT votes.fips,county,state,total_votes_2016,votes_dem_2016,votes_gop_2016,Clinton,Trump FROM votes,counties WHERE votes.fips=counties.fips ORDER BY county");

while($row=mysqli_fetch_array($result))
{
    print("<tr>");
    if($row['votes_dem_2016'] > $row['votes_gop_2016'])
    {
        $colour="#2196F3";
    }
    else
    {
        $colour="#f44336";
    }
    print("<td>" . $row['fips'] . "</td>");
    print("<td style=\"color:   #ffffff\" bgcolor=\"$colour\"" . ">" .    $row['county'] . "</td>");
    print("<td>" . $row['state'] . "</td>");
    print("<td>" . $row['total_votes_2016'] . "</td>");
    print("<td>" . $row['votes_dem_2016'] . "</td>");
    print("<td>" . $row['votes_gop_2016'] . "</td>");
    print("<td>" . round($row['Clinton']*100) . "</td>");
    print("<td>" . round($row['Trump']*100) . "</td>");
   
}
print("</tr>");
print("</table>");
print("<br>");
mysqli_close($connection);

?>

<?php include 'footer.php';?>
</body>
</html>

<html>
<body> 
<?php
    require_once('data.php');
    echo"&nbsp";
    $colour="";
?>
<h1>Results by State</h1>
<br>
&nbsp;
<table border='1'>
    <tr>
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

$result = mysqli_query($connection,"SELECT states.name,total_votes_2016,votes_dem_2016,votes_gop_2016,Clinton,Trump FROM states,votes ORDER BY name");
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
    
    print("<td style=\"color:   #ffffff\" bgcolor=\"$colour\"" . ">" .    $row['name'] . "</td>");
    print("<td>" . $row['total_votes_2016'] . "</td>");
    print("<td>" . $row['votes_dem_2016'] . "</td>");
    print("<td>" . $row['votes_gop_2016'] . "</td>");
    print("<td>" . round($row['Clinton']*100) . "</td>");
    print("<td>" . round($row['Trump']*100) . "</td>");
    print("</tr>");
    print("</table");
}
?>
</body>
</html>

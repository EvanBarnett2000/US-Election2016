<html>
<head>
    <style>
        .light-grey { background-color: lightgrey}
        .blue { background-color: blue}
        .red { background-color: red}
    </style>
</head>
<body> 
<?php
    require_once('data.php');
    echo"&nbsp";
    $colour="";
?>
<h1>Results by County</h1>
<br>
&nbsp;
<table border='1'>
    <tr>
        <th>Name</th>
        <th>State</th>
        <th>Trump %</th>
        <th>Clinton %</th>
        <th>Visual</th>
    </tr>

<?php
$connection = mysqli_connect("localhost","root","");
mysqli_select_db($connection,"uselection2016");

$result=mysqli_query($connection,"SELECT votes.fips, county, state, total_votes_2016, votes_dem_2016,votes_gop_2016,clinton,trump FROM votes,counties WHERE votes.fips=counties.fips ORDER BY county");
while($row=mysqli_fetch_array($result))
{
    print("<tr>");
    print("<td>" . $row['county'] . "</td>");
    print("<td>" . $row['state']. "</td>");
    print("<td>" . round($row['trump']*100) . "</td>");
    print("<td>" . round($row['clinton']*100) . "</td>");
    print("<td height=\"30px\" width=\"400px\"><div align=\"left\" class=\"light-grey\" style=\"height:30px;width:400px\">
    <div class=\"blue\" style=\"margin-right:\"1px\"height:30px;width:" . round($row['clinton']*400) . "\">
    <div class=\"red\" style=\"height:30px;width:" . round($row['trump']*400) .     "\">");

    print("</tr>");
    print("</tr>");
    print("</table");
}
?>

</body>
<?php include 'footer.php';?>
</html>

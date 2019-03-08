<html>
<body> 
<?php
    require_once('data.php');
    echo"&nbsp";
?>
<h1> States </h1>
<br>
&nbsp;
    <table border ='1'>
        <tr>
            <th>State</th>
            <th>Abbrev.</th>
        </tr>
<?php
$connection = mysqli_connect("localhost","root","");
mysqli_select_db($connection,"uselection2016");
$result = mysqli_query($connection,"SELECT * FROM states ORDER BY name");
while($row=mysqli_fetch_array($result))
{
    print("<tr>");
    print("<td><a href=counties.php?state=" . $row['state_abbr'] . "&name=" . $row['name'] . ">" . $row['name'] . "</td>");
    print("<td>" . $row['state_abbr'] . "</td>");
    print("</tr>");
    
}
print("</table>");
print("<br>");

?>
</body>
<?php include 'footer.php';?>
</html>

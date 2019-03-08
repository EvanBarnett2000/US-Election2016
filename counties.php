  

<html>
<body> 
<?php
//if($row has state name (from url) then print the row.(how to print out the counties page
    require_once('data.php');
    echo"&nbsp";
    //using GET to read data from the url of states.php
   $state=$_GET['state'];
   $name=$_GET['name'];
   print("<h1>Counties of $name</h1>");
?>

<br>




&nbsp;
<?php
print("<table border='1'>");
	print("<tr>");
        print("<th>FIPS</th>");
        print("<th><a href=counties.php?state=" . $state . "&name=" . $name . "&sort=" . "county" . ">" . "Name" . "</a></td>"); 
		print("<th><a href=counties.php?state=" . $state . "&name=" . $name . "&sort=" . "population2014" . ">" . "Population 2014" . "</a></td>");   
		print("<th><a href=counties.php?state=" . $state . "&name=" . $name . "&sort=" . "population2010" . ">" . "Population 2010" . "</a></td>");  
    print("</tr>");
?>
<?php
$connection = mysqli_connect("localhost","root","");
mysqli_select_db($connection,"uselection2016");
//checking if a value has been assigned to "sort" in the url and if true will remake the data in table based on population 2014/2010
if (isset($_GET['sort']))
{
    $sort = $_GET['sort'];
    $result = mysqli_query($connection,"SELECT * from counties WHERE state_abbr='$state' ORDER BY $sort DESC ");
    
}
else 
{
    $result = mysqli_query($connection,"SELECT * FROM counties");

}
	
while($row=mysqli_fetch_array($result))
{
    //if($row['state']==$state)
    {
        print("<tr>");
        print("<td>" . $row['fips'] . "</td>");
        print("<td>" . $row['county'] . "</td>");
        print("<td>" . $row['population2014'] . "</td>");
        print("<td>" . $row['population2010'] . "</td>");
        print("</tr>");
    }
        

        
}
    mysqli_close($connection);

print("</table>");
print("<br>");
?>

</body>
<?php include 'footer.php';?>
</html>

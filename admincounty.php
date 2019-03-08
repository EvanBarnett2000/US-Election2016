<html>
<?php
    
    require_once('data.php');
    echo"&nbsp";
    
    $state1;

   
?>
<body>
<h1>Admin By County</h1>
<br>
&nbsp;
<table border='1'>
    <tr>
        <th>FIPS</th>
        <th>County</th>
        <th>State</th>
        <th>Total Votes</th>
        <th>Clinton</th>
        <th>Trump</th>
        <th></th>
    </tr>
    <br>
    <?php
    $connection = mysqli_connect("localhost","root","");
    mysqli_select_db($connection,"uselection2016");
    $result = mysqli_query($connection,"SELECT votes.fips,county,state,total_votes_2016,votes_dem_2016,votes_gop_2016,Clinton,Trump FROM votes,counties WHERE votes.fips=counties.fips ORDER BY state");
    print("<form method=\"POST\" action=\"admincounty.php\">");
    print("State:");
    print("<select name=\"states\">");
    print("<option value=\"all\">All</option>");
    while($row=mysqli_fetch_array($result))
    {
        print("<option value=\"" . $row['state'] . "\">" . $row['state']. "</option>");
    }
    print("</select>");
    print("<input type=\"submit\" value=\"submit\">");
    print("</form>");
    //$statepost=$_POST['states'];
    //print("<select name=\"states\">");
    //while($row=mysqli_fetch_array($result))
    //{
    //    $state1=$row['state'];
        
      //  print("<option value=" . $row['state'] . ">");
    //}
   
    ?>
<?php
 $connection = mysqli_connect("localhost","root","");
 mysqli_select_db($connection,"uselection2016");
 $result = mysqli_query($connection,"SELECT votes.fips,county,state,total_votes_2016,votes_dem_2016,votes_gop_2016,Clinton,Trump FROM votes,counties WHERE votes.fips=counties.fips ORDER BY state");


while($row=mysqli_fetch_array($result))
{
    
        print("<tr>");   
        print("<td>" . $row['fips'] . "</td>");
        print("<td>" . $row['county'] . "</td>");
        print("<td>" . $row['state'] . "</td>");
        print("<td>" . $row['total_votes_2016'] . "</td>");
        print("<td>" . $row['votes_dem_2016'] . "</td>");
        print("<td>" . $row['votes_gop_2016'] . "</td>");
        print("<td>Update</td>");
        print("</tr>");
        
        print("</table");  
    
    
}

?>

  
</body>
<?php include 'footer.php';?>
</html>

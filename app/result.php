<?php
//fetch.php
$conn = mysqli_connect("localhost", "root", "123456", "search");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
 SELECT * FROM city WHERE city_name LIKE '%".$search."%'";
}
else
{
 $query = "
  SELECT * FROM city
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
   <table>
    <tr>
     <th>ID</th>
     <th>City Name</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["city_name"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
<?php
//Connect DB
$conn = mysqli_connect("localhost", "root", "123456", "search");
$output = '';

// Check if isset request
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
  $arr = [];
  $inc = 0;
 while($row = mysqli_fetch_assoc($result))
 {
  $data = array(
    'id'=>$row["id"],
    'city'=>$row["city_name"]);
  
  $arr[$inc] = $data;
  $inc++;
 }
 echo json_encode($arr);
} 

else
{
 echo '<p style="text-align:center;">Data Not Found</p>';
}
?>
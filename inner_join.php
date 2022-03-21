<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "join";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT P.*, cat AS Category, subcat AS Subcategory from product P INNER join cat C on P.cat_id = C.id INNER join subcat S on S.id = P.subcat_id;";
$result = $conn->query($sql);
$html = "<table border='1' style='text-align: center;margin-left: 43%;margin-top: 5%;' border='2'><thead><tr><td>Category</td><td>Sub Category</td><td>Product</td></tr></thead><tbody>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $html .="<tr>";
            //echo "id: " . $row["id"]. " - Name: " . $row["title"]. "<br>";
     $html .="<td>". $row["Category"]."</td>";   
     $html .="<td>". $row["Subcategory"]."</td>";   
     $html .="<td>". $row["title"]."</td>";       
     $html .="</tr>";

    $html .="</tr>";
  }
} else {
  echo "0 results";
}
echo $html.="</tbody></table>";
$conn->close();
?>
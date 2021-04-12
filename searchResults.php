<html>
<head>
	<title> seacrhResults </title>
</head>
<body>

<?php
if (isset($_GET['submit']) && isset($_GET['search'])) {
	include "db_conn.php";

    $search = $_GET['search'];
    $submit = $_GET['submit'];
   
    
    $sql = "SELECT id FROM services where id = ".$search;
    $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]."<br>";
      }
    } else {
      echo "0 results";
    }
}else{
    echo "Error!";
}
    
  ?>

</body>
</html>
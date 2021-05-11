<?php
    session_start();
    include 'generalprofile.php'; 
?>
    <div class="title"><h1>Detalhes de envio e cobrança</h1></div>
    <img class="pi-img" src="images/location.png" alt="">

    <div class="info-container">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      include "db_conn.php";
      $user_name = $_SESSION['user_name'];
      $query = "SELECT userID FROM user WHERE userName = '".$user_name."'"; 
      $result = mysqli_query($conn,  $query);
      $userID = mysqli_fetch_row($result);
      $userID = $userID[0];
      #echo $userID;
      $sql = "SELECT addresss, city, postal_code 
      FROM userlocation
      WHERE userID = ".$userID;
      $result = $conn->query($sql);     
      if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {  
        echo "<h3> Morada: " . $row["addresss"]. " </p>
        <p>Cidade: " . $row["city"]. "</p>
        <p> Código Postal: " . $row["postal_code"]. "</p>";
        
        }
      }
      else {
        echo "Error: ".$sql0. "<br> ".mysqli_error($conn);;
      }
      
    }else {
      echo "Please log in first to see this page.";
  }
              
    ?>     
    </div>

<?php
    session_start();
    include 'generalprofile.php'; 
?>

    <div class="title"><h1>Informação de pagamento</h1></div>
    <img class="pi-img" src="images/payment.png" alt="">

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
      $sql = "SELECT creditCard, billingAddress, cardExp 
      FROM `Restricted Info`
      WHERE userID = ".$userID;
      $result = $conn->query($sql);     
      if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {  
        echo "<h3> Número de Cartão de Crédito: " . $row["creditCard"]. " </p>
        <p>Morada: " . $row["billingAddress"]. "</p>
        <p> Validade do Cartão de Crédito: " . $row["cardExp"]. "</p>";
        
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



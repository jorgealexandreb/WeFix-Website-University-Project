<?php
    session_start();
    include 'generalprofile.php'; 
?>
  <div class="title"><h1>Informação pessoal</h1></div>
  <img class="pi-img" src="images/personalinfo.png" alt="">

  <div class="info-container"><h1></h1>
  
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      include "db_conn.php";

      $user_name = $_SESSION['user_name'];
      $query = "SELECT userType FROM user WHERE userName = '".$user_name."'"; 
      $result = mysqli_query($conn,  $query);
      $userType = mysqli_fetch_row($result);
      $userType = $userType[0];
      #echo $userID;
      
      echo "<h2>Welcome to the member's area, " . $user_name . "!<h2><br>";
    
      if($userType==0){
          $sql = "SELECT firstName, lastName, phone, email, personalNIF 
          FROM user
          WHERE userName = '".$user_name."'";
          $result = $conn->query($sql);     
          if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {  
            echo "<h3> Nome: " . $row["firstName"]. " </p>
            <p>Sobrenome: " . $row["lastName"]. "</p>
            <p> Número de telemovel: " . $row["phone"]. "</p>
            <p> E-mail: " . $row["email"]. "</p>
            <p> NIF Pessoal: " . $row["personalNIF"]. "</p>";
            }
          }
          else {
            echo "Error: ".$sql. "<br> ".mysqli_error($conn);
          }
      }else{
        $query2 = "SELECT userID FROM user WHERE userName = '".$user_name."'"; 
        $result = mysqli_query($conn,  $query2);
        $userID = mysqli_fetch_row($result);
        $userID = $userID[0];
        $sql = "SELECT user.firstName, user.lastName, user.phone, user.email, user.personalNIF, `Service Provider`.companyName, `Service Provider`.companyNIF FROM user INNER JOIN `Service Provider` ON user.userID=`Service Provider`.`userID` where user.userID= ".$userID;
        $result = $conn->query($sql);     
        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {  
          echo "<h3> Nome: " . $row["firstName"]. " </p>
          <p>Sobrenome: " . $row["lastName"]. "</p>
          <p> Número de telemovel: " . $row["phone"]. "</p>
          <p> E-mail: " . $row["email"]. "</p>
          <p> Nome da empresa: " . $row["companyName"]. "</p>
          <p> NIF da Empresa: " . $row["companyNIF"]. "</p>";
          }
        }
        else {
          echo "Error: ".$sql. "<br> ".mysqli_error($conn);
        }
      }   
    }else {
      echo "Please log in first to see this page.";
    }
              
    ?>
  
  
  </div>


<?php
    session_start();
?>

<!DOCTYPE html>
<!--
        NEED TO FIX ERROR line 23
        ADD querry for category filter - This must disappear whith 0 results?
        ADD Location category filter and query
-->
<html>
<title>Search Results</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="serviceResults.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  .myLink {display: none}  
</style>

<body>
<div class="navigation">    
  <img class="logo-container" src="images/weFixLogo.png"> </img>  
  <?php
        if(!$_SESSION['user_name']){
            echo '<label class="top-phrase">Já é utilizador? <a href="">Entrar </a>ou<a href=""> Registrar</a></label>';
        } else{
           echo '<label class="top-phrase">Olá '.$_SESSION['user_name'] .'! <a href="">Conta </a>ou<a href="logout.php"> Logout</a></label>';
        }
    ?>
</div> 

<br>
<br>
<br>

<div class="bar">
                <br> 
                <form action="SearchResults.php" method="GET" enctype="multipart/form-data">
                    <input class="searchBox" name="search" type="text" placeholder="Digite aqui..."> </input>  
                    <input class="button" name="submit" type="submit" value="Buscar"></input>
                </form>  
<?php

    
    
    if (isset($_GET['submit']) && isset($_GET['search'])) {
        include "db_conn.php";

        $search = $_GET['search'];
        $submit = $_GET['submit'];
        $sql = "SELECT services.name, services.description, price.pricePerHr
        FROM services
        INNER JOIN price ON services.id=price.id WHERE services.name LIKE '%".$search."%'";
        $result = $conn->query($sql);        
        $temp=0;              
        
        
        if ($result->num_rows > 0) {
            echo '            
                <h3 class="qtResults">' .$result->num_rows. ' Results were found!</h3>                
            </div>';
        }else{
            echo '            
                <h3 class="qtResults"> 0 Results were found!</h3>                
            </div>';
        }
        // output data of each row

        $sql2 = "SELECT description FROM category WHERE 1";
        $result2 = $conn->query($sql2);
        echo '
        <div class=filterRes>';

        if ($result2->num_rows > 0) {  
            echo '

            <div class="custom-select">
            <label class="catText">Choose a Category:</label>
            <br>
            <select multiple="multiple">';     
        // output data of each row
        while($row = $result2->fetch_assoc()) {  
            echo'<option value="">'. $row["description"].'</option>';
        }
        echo '</select>
        <br>
        <input class="button" name="" type="" value="Buscar"></input>
        </div>';
        } else {
        echo "0 categories";
        }     

        while($row = $result->fetch_assoc()) {  
            echo '<div class="searchHome">';
            if($temp == 0)
            {
                echo '<img class="photo" src="images/p0.jpg"> </img>';
            }
            else{
                echo '<img class="photo" src="images/p1.jpg"> </img>';
            }
            echo "<h3>Name: " . $row["name"]. "</h3> Description: " . $row["description"]. " <br><br><b>Price $" . $row["pricePerHr"]. "</b>";
            echo "</div><br>";
            $temp++;
        }

    }else{
        echo "Error!";
    }        
    ?>

<div class="footer">
    <p>&copy;WeFix 2021. All rights reserved. </p>
    <p>Find us on</p>
    <div class="media ">
      <i class="fa fa-facebook-official "></i>
      <i class="fa fa-instagram"></i>
      <i class="fa fa-snapchat "></i>
      <i class="fa fa-pinterest-p"></i>
      <i class="fa fa-twitter "></i>
      <i class="fa fa-linkedin "></i>
      </div>
  </div>


</body>
</html>


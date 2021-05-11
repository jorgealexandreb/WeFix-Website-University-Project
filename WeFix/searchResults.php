
<!DOCTYPE html>
<html>
<title>Search Results</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/serviceResults.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  .myLink {display: none}  
</style>

<body>
<?php
include "menu.php";
?>


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
        $sql = "SELECT service.serviceID, service.name, service.description, price.pricePerHr, `Service Provider`.`serviceProviderID` FROM (service JOIN price ON price.serviceID=service.serviceID) JOIN `Service Provider` ON service.serviceproviderID=`Service Provider`.`serviceProviderID` WHERE service.name LIKE '%".$search."%'";
        $result = $conn->query($sql);        
        $temp=0;              
        
        
        if ($result->num_rows > 0) {
            echo '            
                <h3 class="qtResults">' .$result->num_rows. ' Results were found!</h3>                
            </div>';
        }else{
            echo '            
                <h3 class="qtResults"> 0 Results were found!</h3>  
                Error: '.$sql. "<br> ".mysqli_error($conn).'              
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
            $GLOBALS = $row["serviceID"];  
            echo '<div class="searchHome">';
            if($temp == 0)
            {
                echo '<img class="photo" src="images/p0.jpg"> </img>';
            }
            else{
                echo '<img class="photo" src="images/p1.jpg"> </img>';
            }
            echo '<h3>' . $row["name"]. '</h3> ' . $row["description"]. '<br><br><b>Price $' . $row["pricePerHr"]. '</b><br>
                        
            <form action="confirmpage.php" method="post">
            <button type="submit" class="button" name="btnComp" >Comprar</button>
            <button type="submit" class="button" name="btnChat" >Chat</button>
            <input type="hidden" name="varname" value="'.$row["serviceID"].'">   
            </form></div><br>';
            $temp++;
            #https://www.pastiebin.com/5d1da8d6643ec
        }

    }else{
        echo "Por favor indique um serviço!";
    }        
    ?>

<?php
include "footer.php";
?>

</body>
</html>


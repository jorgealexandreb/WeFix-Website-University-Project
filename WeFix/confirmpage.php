<?php     
    include 'randomnr.php';
    include 'connection.php';    
    $var_value = $_POST['varname'];    
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirme o seu pedido.</title>
        <link rel="stylesheet" href="css/confirm.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    
    <?php
      include "menu.php";
    ?>
    </div> 
        <h3 class="big-title">Confirme o seu pedido:</h3>
        
        <div class="cont-one">
           <div class="cont-three">
           <?php    
                $sqlthree = "SELECT companyName from `Service Provider` INNER JOIN `Service` on `Service Provider`.serviceProviderID=`Service`.serviceproviderID where `Service`.serviceID='".$var_value."';";
                $resultsthree = $conn->query($sqlthree); 
                ?>
                <h3 class="hthree">Provedor do serviço - Empresa: <?php
                    if ($resultsthree->rowCount() > 0) {
                        // output data of each row
                        while($row = $resultsthree->fetch(PDO::FETCH_ASSOC))  {
                        echo  $row["companyName"];
                        }
                    } else {
                        echo "Error: ".$sqlthree. "<br> ";
                    } ?></h3>

            <?php
                $sqltwo = 'SELECT `name` FROM `Service` WHERE `Service`.serviceID= '.$var_value.';';
                $resultstwo = $conn->query($sqltwo); 
                ?>

                <h3 class="hthree">Serviço:      <?php
                    if ($resultstwo->rowCount() > 0) {
                        // output data of each row
                        while($row = $resultstwo->fetch(PDO::FETCH_ASSOC))  {
                        echo  $row["name"];
                        }
                    } else {
                        echo "Error: ".$sqltwo. "<br> ";
                    } ?></h3>
                    

                <h3 class="hthree">
                <?php
                $sql = 'SELECT `Price`.pricePerHr FROM `Price` INNER JOIN Service ON `Price`.serviceID = `Service`.serviceID WHERE `Price`.serviceID = '.$var_value.';';
                $resultone =  $conn->query($sql); 
                ?>
                <h3 class="hthree">Preço p/ hora:      <?php
                    if ($resultone->rowCount() > 0){
                        while ($row = $resultone->fetch(PDO::FETCH_ASSOC)) {
                            echo  $price = $row["pricePerHr"];
                        }
                    }else {
                        echo "Error: ".$sql. "<br> ";
                    } ?> €</h3>                    
                    
                            
                <?php  
                $sqlfour = "SELECT locomotionPrice FROM `Service` WHERE serviceID='".$var_value."';";
                $resultstfour = $conn->query($sqlfour);
                ?>
                <h3 class="hthree">Preço de deslocação: <?php
                    if ($resultstfour->rowCount() > 0) {
                        // output data of each row
                        while($row = $resultstfour->fetch(PDO::FETCH_ASSOC))  {
                        echo  $loc = $row["locomotionPrice"];
                        }
                    } else {
                        echo "Error: ".$sqlfour. "<br> ";
                    } ?></h3>

                <h3 class="hthree">Total: <?php echo $result = $loc + $price ;?></h3>

                

                
                
            </div>
        </div>

        <div class="cont-two">
            <br><br><br><br><br>
          
            <p> <b>O número do seu pedido será: </b><br> </p>
            <p> <?php randomgenerator(); ?> </p>
        </div>
        <button class="btn bttwo"><a href="ordercompleted.php">Confirmar pedido</a></button>
        <button class="btn btone"><a href="home.php">Cancele o pedido</a></button>
        
          

        <?php
      include "footer.php";
    ?>

      
    </body>

</html>
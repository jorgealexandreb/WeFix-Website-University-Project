<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <title>Formulário de Serviço de Emergência</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/registration.css">

    <style>
    textarea {
       width: 500px;;
       height:300px; 
    }


    </style>
</head>


<?php
include "menu.php";
?>
<body>


    <div class="main-container">
        <h2>Serviço Urgente</h2>

        <form action="ordercompleted.php" method="post">
        <p>Descreva o tipo de serviço que necessita:</p>
        <div class="form-floating">
            <textarea input type="text" class="textarea" name="Descrição" placeholder="Serviço" required> </textarea>
            <label for="floatingInput"></label>
        </div>
        <br>
        <p>Indique onde será realizado o serviço: </p>
        <div class="form-floating">
            <input type="text" class="form" name="localização" placeholder="Localização" required><br>
            <label for="floatingInput">(Seja o mais específico possível).</label>
           
            </div>
        <br>
        <p>Daqui a quanto tempo necessita do serviço?</p>
        <div class="form-floating">
            <select id="time" required>
            <option value="0h">O mais rápido possível.</option>
            <option value="1h">Daqui a 1 hora</option>
            <option value="2h">Daqui a 2 horas</option>
            <option value="3h">Daqui a 3 horas</option>
            <label for="4+h">Daqui a 4 horas ou mais</label>
            </select>

        </div>
        <br>
        <p>Indique um contacto telefónico:</p>
        <div class="form-floating">
            <input type="password" class="form" name="password" placeholder="Contacto" required>
            <label for="floatingInput"></label>
        </div>

        
        <button class="btn" name="bttn" type="submit">Submeter Pedido</button>
        </form>

        <br>
        <br>
        <div class="copyright-claim">
            <p>&copy;WeFix 2021. All rights reserved.</p>
        </div>

        
    </div>

</body>

<?php
#include "footer.php";
?>
</html>
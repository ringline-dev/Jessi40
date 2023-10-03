<?php 
ini_set('display_errors', '1');
    
    $con = new mysqli("rdbms.strato.de", "dbu617947", "Nautilus0=", "dbs8124222");
    if($con->connect_errno){
        echo mysqli_connect_error();
        exit();
    }


    if(ISSET($_POST["gefragt"])){
        echo "Frage gefragt";
        foreach ($_POST["fragen"] as $f){
            if ($f <> ""){
                $stmt = $con->prepare("INSERT INTO fragen(frage) VALUES(?)");
                $stmt->bind_param("s", $f);
                if($stmt->execute() === true){
                    $nachricht = "Jessi hat eine neue Frage gestellt: \r\n \r\n" . $f;
                    mail("lars@ringline.info", "Jessi hat Fragen", $nachricht);
                };
            }
        };
    }

    $result = $con->query("SELECT frage FROM fragen;");
    $anzahl = $result->num_rows;
    $fragen = array();
    while($fragen[] = $result->fetch_array());
    $result->close();
    $con->close();
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Jessi wird alt</title>
    </head>
    <body>
        <div class="lama"></div>
        <main>
            <div class="hl">Gutscheinblock für 10 blöde Fragen</div>
            <h5>Gestellte Fragen: <?php echo $anzahl; ?></h5>
            <form class="block" action="gutscheinblock.php" method="post">
                <ul>
                    <?php
                    for($i=0;$i<10;$i++){
                        echo "<li><input type='text' name='fragen[]'";
                        if (isset($fragen[$i])){
                            echo "value = '" . htmlspecialchars($fragen[$i][0], ENT_QUOTES) . "' disabled>";
                        }
                        echo "</li>";
                    }
                    ?>
                </ul>
                <ul class="special">
                <?php
                    for($i=10;$i<20;$i++){
                        echo "<li><input type='text' name='fragen[]'";
                        if (isset($fragen[$i])){
                            echo "value = '" . htmlspecialchars($fragen[$i][0], ENT_QUOTES) . "' disabled>";
                        }
                        echo "</li>";
                    }
                    ?>
                    <a href="easter3.html"><li id="easterquestion"><input type="text"></li></a>
                </ul>
                <ul class="einundvierzig">
                <?php
                    for($i=20;$i<30;$i++){
                        echo "<li><input type='text' name='fragen[]'";
                        if (isset($fragen[$i])){
                            echo "value = '" . htmlspecialchars($fragen[$i][0], ENT_QUOTES) . "' disabled>";
                        }
                        echo "</li>";
                    }
                    ?>
                </ul>
                <input type="submit" value="Frage fragen" name="gefragt">
        </form>
        </main>
        <div class="lama"></div>
    </body>
</html>
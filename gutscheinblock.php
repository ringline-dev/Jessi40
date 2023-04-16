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
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[0])) echo "value = '" . $fragen[0][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[1])) echo "value = '" . $fragen[1][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[2])) echo "value = '" . $fragen[2][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[3])) echo "value = '" . $fragen[3][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[4])) echo "value = '" . $fragen[4][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[5])) echo "value = '" . $fragen[5][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[6])) echo "value = '" . $fragen[6][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[7])) echo "value = '" . $fragen[7][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[8])) echo "value = '" . $fragen[8][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[9])) echo "value = '" . $fragen[9][0] . "' disabled"; ?>></li>
                </ul>
                <ul class="special">
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[10])) echo "value = '" . $fragen[10][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[11])) echo "value = '" . $fragen[11][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[12])) echo "value = '" . $fragen[12][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[13])) echo "value = '" . $fragen[13][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[14])) echo "value = '" . $fragen[14][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[15])) echo "value = '" . $fragen[15][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[16])) echo "value = '" . $fragen[16][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[17])) echo "value = '" . $fragen[17][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[18])) echo "value = '" . $fragen[18][0] . "' disabled"; ?>></li>
                    <li><input type="text" name="fragen[]" <?php if (isset($fragen[19])) echo "value = '" . $fragen[19][0] . "' disabled"; ?>></li>
                    <a href="easter3.html"><li id="easterquestion"><input type="text"></li></a>
                </ul>
                <input type="submit" value="Frage fragen" name="gefragt">
        </form>
        </main>
        <div class="lama"></div>
    </body>
</html>
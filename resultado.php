<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$txtBuscador = isset($_POST['txtBuscador']) ? $_POST['txtBuscador'] : '';


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Credencial</title>
</head>
<body>

    <?php
        $con = new SQLite3("base.db") or die("Problemas para conectar");
        $cs = $con -> query("SELECT * FROM vDataAlumnos WHERE comodin LIKE '%$txtBuscador%'");

        while ($resul = $cs -> fetchArray()) {
            $matricula = $resul['matriData'];
            $aPaterno = $resul['aPaternoData'];
            $aMaterno = $resul['aMaternoData'];
            $nombres = $resul['nombreData'];
            $carrera = $resul['carreraData'];
            $grupo = $resul['grupoData'];
            $cuat = $resul['cuatriData'];


            echo '

            <div class="credenF">
                <div class="caja">
                    <p>'.$nombres.'</p>
                    <p>'.$aPaterno.' '.$aMaterno.'</p>
                </div>
                <div class="caja1">
                    <p>'.$matricula.'</p>
                </div>
                <div class="caja2">
                    
                    <p>'.$carrera.'</p>
                </div>
                <div class="fotoAlumno">
                    <img src="imgAlumnos/'.$matricula.'.jpg" style="width: 150px;">
                </div>
            </div>
            <div class="credenV">
                <div class="vigencia">
                    <p>
                        2019-1/2021-1
                    </p>
                </div>
                <div class="codigoBarras">
                    <div class="otraCodigoBarras">
                        *'.$matricula.'*
                    </div>
                </div>
                <!--  <div class="codigoBarras">
                     <img src="barcode.php?text=testing" class="barras"/>
                 </div> -->
                <div class="matricula">
                    <p>'.$matricula.'</p>
                </div>
                <div class="firmaTitular">
                    <img src="img/firma.svg" style="width: 100px;">
                </div>
            </div>
            
            
            ';

        }
        $con -> close();

    ?>
    
</body>
</html>
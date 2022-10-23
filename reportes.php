<?php

ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
    <h1>Material en existencia</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php
                require("./PHP/connection.php");
                $query = "SELECT ID_PRODUCTO, NOMBRE, CANTIDAD, FECHA FROM inventario ";
                ?>
                <?php
                if ($result = mysqli_query($connection, $query)) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?> <tr> <?php
                                for ($j = 0; $j < 4; $j++) {
                            ?> <th scope="row" id="Table_ID"> <?php echo $row[$j]; ?></th>
                        <?php } ?>
                         </tr>
                         <?php } 
                 } ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php

$html = ob_get_clean();
// echo $html;

require_once './libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('latter');
$dompdf->render();
$dompdf->stream("MaterialEnExistencia.pdf", array('Attachment' => false));


?>
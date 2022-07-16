<?php
    require_once("import.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<section class="content w-100">
    <div class="container mt-5">
        <form action="index.php" method="post" enctype="multipart/form-data" class="mx-auto">
            <div class="form-group">
                <label for="csvfile">Выберите CSV файл</label>
                <br>
                <input  type="file"  name="csvfile" id="csvfile" required="required" accept=".csv">
            </div>
            <br>
            <input type="submit" class="btn btn-dark btn-sm" value="Загрузить" name="btnSubmit">
        </form>
        <?php
        if (isset($result)){
            $type = array_key_first($result);
            echo '<div class="mt-1 alert alert-'.$type.'" role="alert">'.$result[$type].'</div>';
        }
        ?>
        </div>
    </div>
</section>


</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $uploadDir = 'upload/';
    $allowedFormats = ['image/gif', 'image/jpg', 'image/png',];
    $maxSize = 1000000;
    $files=[];
    var_dump($_FILES);
    if (count($_FILES['upload']['name']) > 0) {
        //Loop through each file
        for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
            $shortNameFile = $_FILES['upload']['name'][$i];
            if (!in_array($_FILES['upload']['type'][$i], $allowedFormats)) {
                $files[] = [
                    'fileName' => $shortNameFile,
                    'fileSize' => $_FILES['upload']['size'][$i],
                    'fileType' => $_FILES['upload']['type'][$i],
                    'uploaded' => false,
                    'uploadederror' => 'Format non supporté.',
                ];
            } else if ($_FILES['fichier']['size'][$i] > $maxSize) {
                $files[] = [
                    'fileName' => $shortNameFile,
                    'fileSize' => $_FILES['upload']['size'][$i],
                    'fileType' => $_FILES['upload']['type'][$i],
                    'uploaded' => false,
                    'uploadederror' => 'Taille de fichier > à 1Mo.',
                ];
            } else {
                //Get the temp file path
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                //Make sure we have a filepath
                if (!empty($tmpFilePath)) {
                    // on récupère l'extension, par exemple "pdf"
                    $extension = pathinfo($shortNameFile, PATHINFO_EXTENSION);

                    // on concatène le nom de fichier unique avec l'extension récupérée
                    $uploadFileName = 'image' . uniqid();

                    //Ajout de l'extension si elle existe
                    if (!empty($extension)) {
                        $uploadFileName .= '.' . $extension;
                    }

                    //save the url and the file
                    $uploadFile = $uploadDir . $uploadFileName;
                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $uploadFile)) {
                        $files[] = [
                            'fileName' => $shortNameFile,
                            'fileSize' => $_FILES['upload']['size'][$i],
                            'fileType' => $_FILES['upload']['type'][$i],
                            'uploaded' => true,
                        ];
                    }
                }
            }
        }
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css"
          crossorigin="anonymous">
    <!-- <link rel="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css">-->
    <title>Ma bibliothèque</title>
</head>
<body>
<header>
    <div class="jumbotron p-1 text-center">
        <h1 class="display-3 text-center px-5"> Résultats de l'import de fichier !</h1>
        <p class="lead">As tu réussi ? </p>
        <hr class="my-4">
    </div>
</header>
<section class="container">
    <?php if (is_array($files)) : ?>
        <ul class="list-group">
            <?php foreach($files as $file) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php if ( $file['uploaded'] == true) : ?>
                <div class="card border-success mb-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 px-0">
                    <div class="card-header text-center"><?= $file['fileName'] ?><span class=" mx-2 badge badge-pill badge-success">Ok</span></div>
                    <div class="card-body">
                        <p class="card-text">Taille du fichier : <?= $file['fileSize'] ?> octets</p>
                        <p class="card-text">Type de fichier : <?= $file['fileType'] ?></p>
                        <h5 class="card-text text-center text-success">Bravo!!</h5>
                    </div>
                    <?php else : ?>
                    <div class="card border-danger mb-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 px-0">
                        <div class="card-header text-center"><?= $file['fileName'] ?><span class="mx-2 badge badge-pill badge-danger">Error</span></div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $file['uploaded'] ?></h4>
                            <p class="card-text text-center text-danger"><?= $file['uploadederror'] ?></p>
                            <p class="card-text">Taille du fichier : <?= $file['fileSize'] ?> octets</p>
                            <p class="card-text">Type de fichier : <?= $file['fileType'] ?></p>
                            <h5 class="card-text text-center text-danger">Non uploadé!!</h5>
                        </div>
                    <?php endif ?>

            </li>
            <?php endforeach ?>
        </ul>
    <?php else : ?>
        <div class="alert alert-dismissible alert-danger">
            < <h4 class="alert-heading">Aucun fichier n'ont été sélectionnés!</h4>
        </div>
    <?php endif; ?>
</section>
<section >
    <div  class="lead m-5 text-center">
        <a  class="btn btn-success btn-lg"href="index.php" role="button">Retour à ta bibliothèque ...</a>
    </div
</section>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
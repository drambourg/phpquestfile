<?php
require_once('src/download.php');

$dirPathUpload = "./upload/";
$itFiles = new FilesystemIterator($dirPathUpload);
$fileExist = false;
$countfiles = 0;
foreach ($itFiles as $file) {
    $countfiles++;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['fileToDelete'])) {
        $fileExist = false;
        foreach ($itFiles as $file) {
            if ($file == $_POST['fileToDelete']) {
                $fileExist = true;
                break;
            }
        }
        echo $fileExist;
        if ($fileExist) {
            unlink($file);
        }
    }
    if (isset($_POST['fileToDownload'])) {
        $fileExist = false;
        foreach ($itFiles as $file) {
            if ($file == $_POST['fileToDownload']) {
                $fileExist = true;
                break;
            }
        }
        if ($fileExist) {
            downloadfile($file);
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
    <div class="jumbotron p-1">
        <h1 class="display-3 text-center px-5">Bienvenue dans ta bibliothèque !</h1>
        <p class="lead">Je te présente ta bibliothèque personnelle de fichiers</p>
        <hr class="my-4">
        <p>Tu vas pouvoir visualiser tes fichiers déjà chargé, ainsiqu'en rajouter des nouveaux... Magique !!!</p>
        <div class="lead m-5 text-center">
            <a class="btn btn-success btn-lg" href="uploadform.php" role="button">Charges de nouveaux fichiers ...</a>
        </div
    </div>
</header>
<div class="container-fluid justify-content-center">
    <div class="jumbotron text-center">
        <h4 class="text-success">Nombre de fichiers dans ta bibliothèque</h4>
        <p class="lead"><?= $countfiles ?> Fichier(s)</p>
        <hr class="my-4">
        </p>
    </div>
    <?php if ($fileExist == true) : ?>
        <section>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Bien joué : </strong> <a href="#" class="alert-link">Fichier <?= $_POST['fileToDelete'] ?>
                    supprimé</a>
            </div>
        </section>
    <?php endif ?>

    <section>

        <div class="row justify-content-center">
            <?php foreach ($itFiles as $file) : ?>
                <div class="card border-info m-1 col-lg-3 col-md-4 col-sm-6 col-xs-12 px-0">
                    <div class="card-header text-center"><h5 class="card-title"><?= $itFiles ?></h5></div>
                    <div class="card-body">
                        <img src="<?= $file ?>" alt="<?= $itFiles ?>" class="img-thumbnail">

                        <form method="post" action="">
                            <div class="m-1 text-center">
                                <div class="m-1 text-center">
                                    <button type="submit"class="btn btn-info" name="fileToDownload" value="<?= $file ?>">Télécharger ...</button>
                                </div>
                                <button type="submit" class="btn btn-warning" name="fileToDelete" value="<?= $file ?>">Supprimer le fichier</button>

                            </div>
                        </form>
                    </div>
                </div>

            <?php endforeach ?>


        </div>
    </section>
</div>
</body>
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
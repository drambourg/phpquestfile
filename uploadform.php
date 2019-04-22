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
        <h1 class="display-3 text-center px-5">Gères ta bibliothèque !</h1>
        <p class="lead">Tu vas pouvoir ici ajouter de nouveaux fichier</p>
        <hr class="my-4">
    </div>
</header>
<section class="container">
    <div class="jumbotron p-1 text-center">
        <form action="upload.php" enctype="multipart/form-data" method="post">
            <div>
                <label for='upload'>Choisis tes fichiers :</label>
                <input id='upload' name="upload[]" type="file" multiple="multiple"/>
            </div>
            <div class="my-3">
                <input class="btn btn-lg btn-info w-50" type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
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
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css" crossorigin="anonymous">
   <!-- <link rel="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css">-->
    <title>Ma bibliothèque</title>
</head>
<body>
<h1>Bienvenue dans votre bibliothèque !</h1>
<div class="container justify-content-center">


<div class="m-5 text-center">
    <button type="button" class="btn btn-primary btn-lg">Charger de nouveaux fichiers ...</button>
</div>

        <div class="card-deck">
            <div class="card border-dark px-0 mb-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h4 class="card-title">Dark card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <form action="" enctype="multipart/form-data" method="post">

            <div>
                <label for='upload'>Add Attachments:</label>
                <input id='upload' name="upload[]" type="file" multiple="multiple" />
            </div>

            <p><input type="submit" name="submit" value="Submit"></p>

        </form>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
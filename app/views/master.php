<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Teste TecnoFit<?php echo isset($title) ? ": {$title}" : "" ?></title>
    <link rel="stylesheet" href="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/mystyle.css">
</head>
<body>
    <nav class="navbar-style navbar bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-text">
            <h1 class="text-title bd-title mb-3 mt-3">Teste Tecnofit: Guilherme Arduino Barlatti</h1>
        </span>
    </div>
    </nav>
    <div class="container-sm">
        <h2 class="bd-title mb-3 mt-3">Ranking</h2>
        <?php require VIEWS.$view ?>
    </div>

<!-- jQuery, Popper.js, e Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
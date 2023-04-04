<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Test ">
    <meta name="author" content="pacificsoftdev@gmail.com">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo RootREL; ?>media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo RootREL; ?>media/css/main.css" rel="stylesheet">
    <?php echo html_helpers::cssHeader(); ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand p-0" href="<?php echo RootREL; ?>">
                    <img class="w-100 h-100" src="<?php echo RootREL; ?>media/img/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="<?php echo html_helpers::url('/'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo html_helpers::url(['ctl'=>'products']); ?>">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo html_helpers::url(['ctl'=>'categories']); ?>">Categories</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
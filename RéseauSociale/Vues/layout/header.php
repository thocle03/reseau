<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./all.css">
    <link rel="text/javascript" href="../../script.js">
    <script type="text/javascript" src="../../script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Reseau</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">Tocy Sport</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./createPost.php">New Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="./login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white"  href="./logout.php">Logout</a>
                        </li>
                        <?php If(isset($_SESSION["username"])){}; ?>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-3" type="search" placeholder="Rechercher une publication" aria-label="Search">
                        <button class="btn btn-warning" type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <?php

    function loadClass(string $class)
    {
        if (strpos($class, "Controller")) {

            require "./Controller/$class.php";
        } else {
            require "./Entity/$class.php";
        }
    }

    spl_autoload_register("loadClass");

    $postController = new PostController();
    $commentController = new CommentController();
    $userController = new UserController();

    ?>

    <main class="container">
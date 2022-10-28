<?php
require "./Vues/layout/header.php";

$posts = $postController->readAll();

?>

<style>body{background-image: url("https://img.freepik.com/premium-vector/hand-painted-background-violet-orange-colours_23-2148427578.jpg?w=2000")}</style>
<br>
<div class="d-flex flex-wrap justify-content-around">

    <?php
    session_start();
    var_export(session_status() == PHP_SESSION_ACTIVE);
    var_dump($_SESSION);

    if ($_POST) {
        $datas = [
            // "id" => $_GET["id"], 
            "title" => $_POST["title"],
        ];
        foreach ($posts as $post) {
            if ($post->getTitle() == $datas['title']) {
                // var_dump($post->getTitle());
    ?>
                <div class="card m-5" style="width: 18rem;" style="display: flex;">
                    <img src="<?= $post->getUrl() ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->getTitle() ?></h5>
                        <p class="card-text"><?= $post->getContent() ?> </p>
                        <?= $post->getCreate_at() ?>
                        <p><?= $post->getAuthor() ?> </p>
                        <br>
                        <div class="d-flex justify-content-center">
                            <a href="read.php?id=<?= $post->getId() ?>" class="btn btn-success" style="width: 50px"><i class="fa-solid fa-book-open-cover"></i></a>
                            <a onclick="del()" class="btn btn-danger" style="width: 50px"><i class="fa-solid fa-trash"></i></a>
                            <a href="update.php?id=<?= $post->getId() ?>" class="btn btn-warning" style="width: 50px"> <i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="" onclick="" class="btn btn-primary" style="width: 50px"> <i class="fa-solid fa-thumbs-up"></i></a>
                        </div>
                    </div>
                </div>
            <?php  } ?>
        <?php   } ?>
    <?php } ?>

    <?php foreach ($posts as $post) { ?>

        <div class="card m-5" style="width: 18rem;" style="display: flex;">
            <img src="<?= $post->getUrl() ?>" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title"><?= $post->getTitle() ?></h5>
                <p class="card-text"><?= $post->getContent() ?> </p>
                <?= $post->getCreate_at() ?>
                <p><?= $post->getAuthor() ?> </p>
                <br>
                <div class="d-flex justify-content-center">
                    <a href="read.php?id=<?= $post->getId() ?>" class="btn btn-success" style="width: 50px"> <i class="fa-solid fa-book-open-cover"></i></a>
                    <a href="deletee.php?id=<?= $post->getId() ?>" class="btn btn-danger" style="width: 50px"><i class="fa-solid fa-trash"></i> </a>
                    <a href="update.php?id=<?= $post->getId() ?>" class="btn btn-warning" style="width: 50px"> <i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="" onclick="" class="btn btn-primary" style="width: 50px"> <i class="fa-solid fa-thumbs-up"></i></a>
                </div>
                <div id="commentaire-<?= $post->getId() ?>" style="display: none;">
                    <br>
                    <textarea></textarea>
                </div>
                <script src="script.js"></script>
            </div>
        </div>
    <?php } ?>
</div>

<?php require "./Vues/layout/footer.php"; ?>
<?php
require "./Vues/layout/header.php";


if ($_GET) {
   $post = $postController->read($_GET['id']);
}

if ($_POST) { 
    $donnees = [
        "id" => $_GET["id"],
        "title" => $_POST["title"],
        "content" => $_POST["content"],
        "author" => $_POST["author"],
        "url" => $_POST["url"]
    ];

    $postController->update(new Post($donnees));
    header("Location: ./index.php?id={$_GET["id"]}");
}


?>
<style>body{background-image: url("https://img.freepik.com/premium-vector/hand-painted-background-violet-orange-colours_23-2148427578.jpg?w=2000")}</style>
<br>
<h3>Modifier la publication</h3>
<form method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="" value="<?= $post->getTitle(); ?>">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content :</label>
        <textarea type="text" name="content" id="content" class="form-control"><?= $post->getContent(); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="url" class="form-label">URL de l'image</label>
        <input type="text" name="url" class="form-control" id="url" placeholder="" value="<?= $post->getUrl(); ?>">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label" >username</label>
        <-- mettre l'usernme de celui connecté automatiquement-->
            <input type="text" name="author" class="form-control" id="author" placeholder="" value="<?= $post->getAuthor(); ?>">
    </div>
    <input type="submit" value="Ajouter" class="btn btn-success">

</form>
<br><br>
<?php
require "./Vues/layout/footer.php";

?>
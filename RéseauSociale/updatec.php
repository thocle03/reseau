<?php
require "./Vues/layout/header.php";

$manager = new CommentController();

if ($_GET) {
    $comment = $commentController->get($_GET['id']);
}

if ($_POST) {
    $donnees = [
        "id" => $_GET["id"],
        "title" => $_POST["title"],
        "content" => $_POST["content"],
        "author" => $_POST["author"]
    ];

    $post_id = $comment->getPost_id();

    $commentController->update(new Comment($donnees));
    echo "<script>window.location.href='read.php?id=$post_id'</script>";

    //header("Location: ./read.php?id={$_GET["id"]}");
}


?>

<form method="POST" class="container">
    <h2>Update comment</h2>
    <label>Title :</label>
    <input type="text" name="title" id="title" class="form-control" value="<?= $comment->getTitle(); ?>">
    <label>Content :</label>
    <textarea type="text" name="content" id="content" class="form-control"><?= $comment->getContent(); ?></textarea>
    <label>Author :</label>
    <input type="text" name="author" id="author" class="form-control" value="<?= $comment->getAuthor(); ?>">
    <input type="submit" value="Publier" class="btn btn-primary">
</form>
</body>

</html>
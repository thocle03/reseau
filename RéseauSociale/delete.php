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

$manager = new CommentController();

if ($_GET) {
	$comment = $manager->get($_GET['id']);
	$post_id = $comment->getPost_id();
	$manager->delete($_GET['id']);
	echo "<script>window.location.href='read.php?id=$post_id'</script>";
}
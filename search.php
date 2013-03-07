<!DOCTYPE html>
<html lang="en">
<head>
    <title>Accio - Bring me the data bitch!</title>
    <?php include 'html_head.php'; ?>
</head>

<body>

<?php include 'top_menu.php'; ?>

<div class="container">

    <?php include 'searchBar.php';?>
    <?php

    $search=$_POST["search"];
//echo $search;

    $request_url="http://graph.facebook.com/search?q=".$search."&type=post";
    $request=file_get_contents($request_url);
    $fb_response=json_decode($request);

    foreach ($fb_response -> data as $item) {
        echo  "<br>";
        echo "<div class=\"row_fluid\">";
        echo "<div class=\"span12\"><p>";
        echo $item->message;
        echo "</p></div>";
        echo "</div>";
        echo "<br>";
    }

    ?>
</div> <!-- /container -->

<?php include 'body_endScripts.php';?>

</body>
</html>


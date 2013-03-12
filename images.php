<!DOCTYPE html>
<html lang="en">
<head>
    <title>Accio - Bring me the data bitch!</title>
    <?php include 'html_head.php'; ?>
</head>

<body>

<?php


$image_href = "/accio/images.php?search=".$_GET["search"];
$search_href= "/accio/search.php?search=".$_GET["search"];
$image_menu="<li class=\"active\"><a href=\"".$image_href."\">Images</a></li>";
$search_menu="<li class=\"\"><a href=\"".$search_href."\">Search</a></li>";
include 'top_menu.php';

?>

<div class="container">


    <?php

    $page=substr($_SERVER['SCRIPT_NAME'],1);
    include 'searchBar.php';

    $search=$_GET["search"];
//echo $search;

    $request_url="http://graph.facebook.com/search?q=".$search."&limit=5000";
    $request=file_get_contents($request_url);
    $fb_response=json_decode($request);
    echo  "<br>";
    echo "<div class=\"row_fluid\">";
    echo "<div class=\"span12\"><p>";
    foreach ($fb_response -> data as $item) {

       $href=$item->picture;
        echo "<img src='".$href."' height=auto width=auto/>";

    }
    echo "</p></div>";
    echo "</div>";
    echo "<br>";
    ?>
</div> <!-- /container -->

<?php include 'body_endScripts.php';?>

</body>
</html>
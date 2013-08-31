<!DOCTYPE html>
<html lang="en">
<head>
    <title>Accio - Bring me the data bitch!</title>
    <?php include 'html_head.php'; ?>
</head>

<body>

<?php

$accessToken = "";
$image_href = "/accio/images.php?search=".$_GET["search"];
$search_href= "/accio/ssearch.php?search=".$_GET["search"];
$image_menu="<li class=\"\"><a href=\"".$image_href."\">Images</a></li>";
$search_menu="<li class=\"active\"><a href=\"".$search_href."\">Search</a></li>";
include 'top_menu.php';

?>

<div class="container">


    <?php

    //$page=substr($_SERVER['SCRIPT_NAME'],1);
    $page = basename($_SERVER['PHP_SELF'], ".php");
    include 'searchBar.php';

    $search=$_GET["search"];
//echo $search;

    $request_url="http://graph.facebook.com/search?q=".$search."&limit=5000&access_token=".$accessToken;
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


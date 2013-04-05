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

 <!--<div class="container">-->

    <?php

    $page=substr($_SERVER['SCRIPT_NAME'],1);
    include 'searchBar.php';

        ?>
<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade" tabindex="-1">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">
        <a class="btn btn-primary modal-next">Next <i class="icon-arrow-right icon-white"></i></a>
        <a class="btn btn-info modal-prev"><i class="icon-arrow-left icon-white"></i> Previous</a>
        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000"><i class="icon-play icon-white"></i> Slideshow</a>
        <a class="btn modal-download" target="_blank"><i class="icon-download"></i> Download</a>
    </div>
</div>
<div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery">




<?php
    $search=$_GET["search"];
//echo $search;

    $request_url="http://graph.facebook.com/search?q=".$search."&limit=5000";
    $request=file_get_contents($request_url);
    $fb_response=json_decode($request);
    //echo  "<br>";
    //echo "<div class=\"row_fluid\">";
    //echo "<div class=\"span12\"><p>";
    foreach ($fb_response -> data as $item) {

       $href=$item->picture;
        if($href != NULL){
            $href = substr_replace($href,"o",-5,-4);
            echo "<a href=\"".$href."\" title=\"".rand()."\" data-gallery=\"gallery\"></a>";
            // echo "<img src='".$href."' height=auto width=auto/>";
        }
    }
    //echo "</p></div>";
    //echo "</div>";
   // echo "<br>";
    ?>
    </div>
<!--</div> <!-- /container -->

<?php include 'body_endScripts.php';?>

</body>
</html>
<form class="form-horizontal" method="get" action="/accio/<?php echo $page; ?>.php">
    <?php if(basename($_SERVER['PHP_SELF'], ".php") == "index"){
       echo '<input name="search" type="text" placeholder="Hit ME!" class="input-xxxlarge">';
     }else {
       echo '<input name="search" type="text" value="'.$_GET["search"].'" class="input-xxxlarge">';
    } ?>

    <button class="btn btn-primary" id="submit" type="submit">search </button>
</form>
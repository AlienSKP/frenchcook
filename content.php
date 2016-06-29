<?php
$pageTitle = "French Cook, I cook for you !";
$location ='../';
require_once 'inc/param.inc.php';
if (!isset($_GET['slug'])){
  exit;
}
else {
  $slug=$_GET['slug'];
  if (!in_array($slug, $allSlugs)){
    exit;
  }
}
require_once('inc/header.php');
?>




<?php
$keepLinks=true;
require_once('inc/footer.php');?>

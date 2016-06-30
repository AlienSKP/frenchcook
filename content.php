<?php
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
// load data from the slug

$string = file_get_contents("inc/param/".$slug."/content.json");
$content = json_decode($string, true);
$pageTitle = 'Eat '.$content['title']."in Toronto or learn how to cook it - French Cook Toronto";
$pageBg = "../inc/param/".$slug."/cover.jpg";
require_once('inc/header.php');
?>
<article class="content">
  <header>
    <h1 class="title"><?=$content['title']?></h1>
    <div class="categories"><?php
    foreach ($content['categories'] as $category) {
      echo '<a href="/?cat='.$category.'">'.strtoupper($categories[$category]['name']).'</a>';
    }
    ?></div>
  </header>
</article>



<?php
$keepLinks=true;
require_once('inc/footer.php');?>

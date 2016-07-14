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
function outputContent($var, $htmlWrapBloc, $htmlWrapLine, $title){
  if ($var){
    $html = '<section class="contentSection">';
    if ($title){
      $html .= '<h3>'.$title.'</h3>';
    }
    if ($htmlWrapBloc) {
      $html .='<'.$htmlWrapBloc.'>';
    }
    foreach ($var as $value) {
      if ($htmlWrapLine) {
        $html .='<'.$htmlWrapLine.'>';
      }
      $html .=$value;
      if ($htmlWrapLine) {
        $html .='</'.$htmlWrapLine.'>';
      }
    }
    if ($htmlWrapBloc) {
      $html .='</'.$htmlWrapBloc.'>';
    }
    $html .= '</section>';
    echo $html;
  }
}
?>
<article class="content">
  <header>
    <h1 class="title"><?=$content['title']?></h1>
    <div class="categories"><?php
    foreach ($content['categories'] as $category) {
      echo '<a href="/#'.$category.'">'.strtoupper($categories[$category]['name']).'</a>';
    }
    ?></div>
  </header>

      <?php outputContent($content['description'], false, 'p',false); ?>
      <?php outputContent($content['recipe']['ingredients'], 'ul', 'li',false); ?>
</article>



<?php
//  var_dump($content);
$keepLinks=true;
require_once('inc/footer.php');?>

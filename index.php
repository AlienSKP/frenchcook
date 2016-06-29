<?php
/*
*  FRENCHCOOK.CA
* RUN http://frenchcook.ca/?build TO UPDATE THE WEBSITE
* add new page in /inc/param/page_name/
* must contain :
* - content.json
* - cover.jpg
* - thumb.jpg
* may contain other illustrations as JPG or jpg
*/
$pageTitle = "French Cook, I cook for you !";
require_once 'inc/param.inc.php';
require_once('inc/header.php'); ?>
<ul id="plats">
<?php
  $projects = json_decode($projects, true);
  function sortByDate($a, $b) {
    $t1 = strtotime($a['content']['date']);
    $t2 = strtotime($b['content']['date']);
    return $t2 - $t1;
  }
  usort($projects, 'sortByDate');
  $cpt=0;
  foreach ( $projects as $key=>$project){
  	$cpt++;
  	echo '<li class="mix';
    foreach ($project['content']['categories'] as $value) {
      echo ' '.$value;
    }
    echo '" data-myorder="'.$cpt.'"><a href="/more_about/'.$project['url'].'"';
  	if (is_file($project['thumbnail'])){
  		echo ' style="background-image:url(\''.$project['thumbnail'].'\')"';
  	}
  	echo '>
  	<span class="name">'.ucwords($project['content']['title']).'</span>
    <div class="iconBar">';

    foreach ($project['content']['categories'] as $value) {
      if (in_array($value, $haveIcons)) {echo '<span class="icon-'.$value.'"></span>';}
    }
    echo '</div>
  		</a>
    </li>';
  }
  ?>
</ul>
<?php require_once('inc/footer.php');?>

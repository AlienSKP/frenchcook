<?php
/*
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
*/
$directoryToScan='inc/param/';
if ($build){
  $dirs = glob($directoryToScan."*");
  /*
  // sort by last modified date
  usort($dirs, function ($a, $b) {
    $a.=(is_dir($a))?'/.':'';
    $b.=(is_dir($b))?'/.':'';
    return filemtime($b) - filemtime($a);
  });
  array_reverse($dirs);
  */
  $cpt=0;
  $arrayProj = array();
  foreach($dirs as $dir){
    if(is_dir($dir)){
      // load the json file of the folder
      $string = file_get_contents($dir."/content.json");

      $jpgs = glob($dir.'/*.{jpg,JPG}', GLOB_BRACE);
      //print each file name
      $thumbnail = '';
      $cover = '';
      $illustrations=array();
      foreach($jpgs as $jpg){
        if (strpos(strtolower($jpg), 'thumb.jpg') !== false){
          $thumbnail = $jpg;
        }
        else if (strpos(strtolower($jpg), 'cover.jpg') !== false){
          $cover = $jpg;
        }
        else {
          array_push($illustrations,$jpg);
        }
      }
      // build the array
      $arrayProj[$cpt]=array(
        'thumbnail'=>$thumbnail,
        'cover'=>$cover,
        'url'=> str_replace($directoryToScan, '',$dir),
        'illustrations'=>$illustrations,
        'content'=> json_decode($string, true)
      );
      $cpt++;
    }
  }
  //  var_dump($arrayProj);
  //echo json_encode($arrayProj);
  $projects = $arrayProj;
  $fp = fopen('inc/param/data.json', 'w');
  fwrite($fp, json_encode($projects));
  fclose($fp);
  $projects=json_encode($projects);
}
else {
  $projects = file_get_contents("inc/param/data.json");
}
$decode = json_decode($projects, true);
$allSlugs=array();
foreach ($decode as $val){
  array_push($allSlugs,$val['url']);
}
?>

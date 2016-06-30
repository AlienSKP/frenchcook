<?php
$apiKey       = 'AIzaSyCzGfEfzwK-NI8BW0cExeiEVEq8XqmYAoA';
$build=(isset($_GET['build']))?true:false;
include ('inc/param/plats.php');
$absolutePath = '/home/alienskp/frenchcook.ca/';

$categories = [
  "french" => array(
    'name'=>'French'
    ,'slug'=>'french'
    , 'background'=>'img/flag_fr.png'
    , 'mainbar'=>true
  )
  ,"italian" => array(
    'name'=>'Italian'
    ,'slug'=>'italian'
    , 'background'=>'img/flag_it.png'
  )
  ,"catering" => array(
    'name'=>'Order for pick up or delivery'
    ,'slug'=>'catering'
    ,'icon' => 'e9b0'
    ,'mainbar'=>true
  )
  ,"clando" => array(
    'name'=>'Supper Club'
    ,'slug'=>'clando'
    ,'icon'=>'e9a3'
    , 'mainbar'=>true
  )
  ,"recipe" => array(
    'name'=>'DIY'
    ,'slug'=>'recipe'
    ,'icon' =>'e9b8'
    , 'mainbar'=>true
  )
  ,"teach" => array(
    'name'=>'Meet & Teach'
    ,'slug'=>'teach'
    ,'icon' => 'e970'
  )
  ,
  "beer" => array(
    'name' => 'Beer'
    ,'slug' => 'beer'
    ,'icon'=>'e9a2'
   )
];
// set an array of all categories
$allCategories = array();
// set an array of all categories with Icons
$haveIcons = array();
foreach ($categories as $category) {
  array_push($allCategories,$category['slug']);
  if ($category['icon']){
    array_push($haveIcons,$category['slug']);
  }
}
?>

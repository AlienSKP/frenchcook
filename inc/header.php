<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $pageTitle ?></title>
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href="/css/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <style>
  <?php
  foreach ( $categories as $category){
    if (isset($category['icon'])){
      echo '.icon-'.$category['slug'].':before {content: "\\'.$category['icon'].'";}';
    }
  }
  ?>
</style>
</head>
<body>
<header class="header">
  <h1><a href="/">French Cook</a></h1>
<?php
$mainBar='';
$extendedBar='';
foreach ( $categories as $key=>$category){
  $bar=($category['mainbar'])?'mainBar':'extendedBar';
  $$bar.= '<li>';
  $$bar.='<a href="/?cat='.$category['slug'].'" class="filter" data-filter=".'.$category['slug'].'"';
  if (isset($category['background'])){
   $$bar.=' style="background-image:url(/'.$category['background'].');width: 100px;border-radius: 50%;background-size: 100% 100%;"';
  }
  $$bar.='><span class="name">'.$category['name'].'</span>';
  if (isset($category['icon'])){
   $$bar.='<span class="icon-'.$category['slug'].'"></span>';
  }
  $$bar.='</a></li>';
};
?>
  <nav>
    <ul class="primary clearfix">
      <li class="filterTitle">Filter : </li>
      <?=$mainBar?>
      <li class="settings"><a class="filter" data-filter="all"><span class="name">Reset</span></a>
      <a class="moreFiltersLink"><span class="name">More Filters</span></a></li>
    </ul>
    <ul class="secondary clearfix"><?=$extendedBar?></ul>
  </nav>

</header>
<main rel="main">

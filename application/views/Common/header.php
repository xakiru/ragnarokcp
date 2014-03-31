<html>
<head>
<link rel="stylesheet" href="<?=site_url()?>css/styles.css" />
<script type="text/javascript" src="<?=site_url()?>js/jquery.js"></script>
<script type="text/javascript" src="<?=site_url()?>js/reborn.js"></script>

</head>
<body>
<div id="container">
  <div class="wrapper">
     <div class="bg" id="header"><i><h2 style="padding-top:30px;" align="center">"<?=$this->config->item('header_title')?>"</h2></i></div>
  </div>
  <div class="wrapper">
     <div>
	 <ul class="menu">
	 <?php
	 foreach($navi as $menu){
	 echo '<li><a href="'.$menu['link'].'">'.$menu['name'].'</a></li>';
	 }
	 ?>  
	 </ul>
	 </div>
  </div>
  
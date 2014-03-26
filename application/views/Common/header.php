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
	   <li><a href="<?=$this->config->item('home')?>">Home</a></li>
	   <li><a href="<?=$this->config->item('forum')?>">Forum</a></li>
	   <li><a href="<?=$this->config->item('downloads')?>">Downloads</a></li>
	   <li><a href="<?=$this->config->item('login')?>">Login</a></li>
	   <li><a href="<?=$this->config->item('register')?>">Register</li>
	   <li><a href="<?=$this->config->item('i')?>">Item DB</a></li>
	   <li id="server"><a href="<?=$this->config->item('server_info')?>">Server Info</a></li>   
	 </ul>
	 </div>
  </div>
  
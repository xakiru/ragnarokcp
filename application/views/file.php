<html>
<head>
<style>
body{margin:0px auto;padding:0px;color:#fff;background:#21180f;}
::selection { background-color: #ba5409; color: white; }
#container{width::100%;height:100%;}
.wrapper{width:1000px;margin:auto;}
.bg{background:#4f3f26;}
#header{width:100%;height:100px;}
.menu{margin: 0px;padding: 0px;list-style-type: none;background:#ba5409;}
.menu li{color: #fff;width: 141.85px;float: left;text-align: center;background:#ba5409;padding: 9px 0px;border-left: 1px solid #000;}
.menu li:hover{background:#fd862f;}
.content{background:#333;width:100%;height:400px;}
#menu2{position: absolute;top: 139;left: 889;width:150px;display:none;}
#menu2 div{background:#ba5409;padding: 9px 1px;border-bottom: 1px solid #000;color: #fff;text-align:center;}
#menu2 div:hover{background:#fd862f;}
.content{padding-top:100px;}
</style>
<script src="jquery.js">
</script>
<script>
$(document).ready(function(){
  $('#server').mouseenter(function(){
  $('#menu2').slideDown(100);
    });
	 $('#menu2').mouseleave(function(){
  $('#menu2').slideUp(100);
    });

});
</script>
</head>
<body>
<div id="container">
  <div class="wrapper">
     <div class="bg" id="header"></div>
  </div>
  <div class="wrapper">
     <div>
	 <ul class="menu">
	   <li>Home</li>
	   <li>Forum</li>
	   <li>Downloads</li>
	   <li>Login</li>
	   <li>Register</li>
	   <li id="server">Server Info
	       <div id="menu2">
		    <div>Server Staus</div>
			<div>Who's Online</div>
			<div>Server Information</div>
		   </div></li>   
	   <li>Item DB</li>
	 </ul>
	 </div>
  </div>
  <div class="wrapper">
      <div class="content" align="center">
	  <form action="#">
	  <table>
	    <tr><td>Username</td>
	   <td> <input type="text" /></td></tr>
		<tr><td>Password</td><td><input type="password"/></td></tr>
		<tr><td></td><td><input type="submit" value="login"/></td></tr>
		</table>
		</form>
	  </div>
  </div>
  
  
</div>
</body>
</html>
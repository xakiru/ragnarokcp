
<div class="wrapper" >
      <div class="content" align="center">
	  <div><a href="<?=site_url().'change_password'?>" >Change Password</a></div>
<strong>My Account Info</strong><br/>
<table cellpadding="0" cellspacing="0" border="1">
<tr>
<th>Username</th><td><?=$username;?></td><th>Account ID</th><td><?=$account_id;?></td>
</tr>
<tr>
<th>E-mail</th><td><?=$email;?></td><th>Account Type</th><td><?=$acc_type;?></td>
</tr>
</tr>
<tr>
<th>Gender</th><td><?=$gender;?></td><th>Account State</th><td>NA</td>
</tr>
<tr>
<th>Login Count</th><td><?=$logincount;?></td><th>Vote Balance</th><td>NA</td>
</tr>
<tr>
<th>Last Login Date (CP)</th><td>NA</td><th>Last Login Date (IG)</th><td><?=$lastlogin;?></td>
</tr>
<tr>
<th>Last Used IP</th><td><?=$last_ip?></td><th>Voting Cooldown</th><td>NA</td>
</tr>
</table>
</div>
</div>
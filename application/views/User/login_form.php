<div class="wrapper">
      <div class="content" align="center">
	  <?=form_open('login')?>
	  <table>
	  <tr><td colspan="2"><?=validation_errors()?></td></tr>
	    <tr><td>Username</td>
	   <td> <?=form_input(array('name'=>'username', 'id'=>'username', 'class'=>'text_input_class'))?></td></tr>
		<tr><td>Password</td><td><?=form_password(array('name'=>'password', 'id'=>'password', 'class'=>'text_input_class'))?></td></tr>
		<tr><td></td><td><?=form_submit('login', 'Log In')?></td></tr>
		</table>
		</form>
	  </div>
  </div>
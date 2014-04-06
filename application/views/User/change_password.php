<div class="wrapper">
      <div class="content" align="center">
	  <?=form_open('change_password')?>
	  <table>
	  <tr><td colspan="2"><?=validation_errors()?></td></tr>
	    <tr><td>Old Password</td>
	   <td> <?=form_password(array('name'=>'old_password', 'id'=>'old_password', 'class'=>'text_input_class'))?></td></tr>
		<tr><td>New Password</td><td><?=form_password(array('name'=>'new_password', 'id'=>'new_password', 'class'=>'text_input_class'))?></td></tr>
		<tr><td>Confirm New Password</td><td><?=form_password(array('name'=>'c_new_password', 'id'=>'c_new_password', 'class'=>'text_input_class'))?></td></tr>
		<tr><td></td><td><?=form_submit('change_pass', 'Change Password')?></td></tr>
		</table>
		</form>
	  </div>
  </div>
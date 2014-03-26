
<div class="wrapper">
      <div class="content" align="center">
	  <?=form_open('register')?>
	  <table>
	  <tr><td colspan="2"><?=validation_errors()?></td></tr>
	    <tr><td>Username</td>
	   <td> <?=form_input(array('name'=>'username', 'id'=>'username_id', 'class'=>'text_input_class', 'value'=>$this->input->post('username')))?></td></tr>
	   <tr><td>Email</td><td><?=form_input(array('name'=>'email', 'id'=>'email_id', 'class'=>'text_input_class', 'value'=>$this->input->post('email')))?></td></tr>
		<tr><td>Password</td><td><?=form_password(array('name'=>'password', 'id'=>'password_id', 'class'=>'text_input_class'))?></td></tr>
		<tr><td>Confirm Password</td><td><?=form_password(array('name'=>'confirm_password', 'id'=>'conf_password_id', 'class'=>'text_input_class'))?></td></tr>
		<tr><td>Select Gender</td><td> :<?=form_radio(array('name'=>'gender','value'=>'M', 'id'=>'g_male', 'class'=>'gender_radio')).' Male '.form_radio(array('name'=>'gender','value'=>'F', 'id'=>'g_female', 'class'=>'gender_radio')).' Female '?></td></tr>
		<tr><td></td><td><?=form_submit('register', 'Register Now')?></td></tr>
		</table>
	  </div>
  </div>
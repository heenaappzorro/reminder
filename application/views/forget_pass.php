

<div class="login-wrap-body">
  <div class="login-wrap">
	<div class="login-html center">
		
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Forget Password</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<?php 
					$fattr = array('class' => 'form-signin');
					echo form_open('', $fattr); 
				 ?>
					<div class="group">
						<label for="user" class="label">Email</label>
						<input id="email" type="email" class="input">
					</div>
					
					<div class="group">
						<input type="button" class="button" value="Send" onclick="forget_pass()">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
</div>  







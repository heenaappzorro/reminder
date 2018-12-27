

<div class="login-wrap-body">
  <div class="login-wrap">
	<div class="login-html center">
		
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<?php 
					$fattr = array('class' => 'form-signin');
					echo form_open('', $fattr); 
				 ?>
					<div class="group">
						<label for="user" class="label">Username</label>
						<input id="username" type="text" class="input">
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="password" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label class="check_btns" for="check"><span class="icon"></span> Keep me Signed in</label>
					</div>
					<!-- <div class="group">
						<label class="" for="check"><a href="<?php echo site_url('/Login/forget_pass');?>">Forget Password</a></label>
					</div> -->
					<div class="group">
						<input type="button" class="button" value="Sign In" onclick="login()">
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







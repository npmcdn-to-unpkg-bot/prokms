<!--EXTRA CSS-->
<link href="<?= base_url()?>templates/march/css/pages/signin.css" rel="stylesheet" type="text/css">
<div class="account-container">
	<div class="content clearfix">
		<form action="" method="post">
			<h1>Member Login</h1>		
			<div class="login-fields">
				<p>Isikan username dan password</p>
				<div class="field">
					<label for="username">Email</label>
                                        <input type="text" id="USM" name="USM" value="" placeholder="Email" class="login username-field" autocomplete="off"/>
				</div> <!-- /field -->
				<div class="field">
					<label for="password">Password</label>
					<input type="password" id="CRD" name="CRD" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
			</div> <!-- /login-fields -->
			<div class="login-actions">									
				<button class="button btn btn-success btn-large">Sign In</button>
			</div> <!-- .actions -->
		</form>
            
            <? if(!empty($loginerror))
            {
                ?>
                <div class="row">
                    <div class="span3 alert alert-error"><?= $loginerror  ?>
                    </div>
                </div>
            <?}?>
	</div> <!-- /content -->
</div> <!-- /account-container -->
</div>
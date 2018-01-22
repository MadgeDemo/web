<script type="text/javascript">
	//Login code section
	$(function() {
	    $('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
	 		$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
			$("#register-form").delay(100).fadeIn(100);
	 		$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});

		$('#partLogin2').hide();
		$('#partLogin3').hide();
		$('#partLogin4').hide();
		$('#part1LoginBtn').click(function(e){
			e.preventDefault();
			$('#part1LoginErr').attr('class', 'loader');
			authData = {
				"email" : $.trim($('#email').val()),
				"password" : $.trim($('#password').val())
			}
			$.post("<?= @base_url('auth/authenticate'); ?>",authData,function(data){
				obj = JSON.parse(data);
				// console.log(obj);
				$('#part1LoginErr').removeAttr('class');
				if (obj['status'] == 2) {
					$('#part1LoginErr').attr('class', 'alert alert-warning');
					$('#part1LoginErr').html(obj['message']);
					setTimeout(function(){
						$('#part1LoginErr').removeAttr('class');
						$('#part1LoginErr').html('');
						$('#email2').attr('disabled','true');
						$('#No').val(obj['data']['No']);
						$('#email2').val(obj['data']['email']);
						$('#type').val(obj['data']['type']);
						$('#partLogin1').hide();
						$('#partLogin3').hide();
						$('#partLogin4').hide();
						$('#partLogin2').show();
					},6000);
				}else if (obj['status'] == 1) {
					$('#part1LoginErr').attr('class', 'alert alert-success');
					$('#part1LoginErr').html("Logging in ...");
					window.location.replace("<?= @base_url('items'); ?>");
				} else {
					$('#part1LoginErr').attr('class', 'alert alert-danger');
					$('#part1LoginErr').html(obj['message']);
					setTimeout(function(){
						$('#part1LoginErr').removeAttr('class');
						$('#part1LoginErr').html('');
					},3000);
				}
			});
		});

		$('#part2LoginBtn').click(function(e){
			e.preventDefault();
			$('#part2LoginErr').attr('class', 'loader');
			no = $('#No').val();
			type = $('#type').val();
			email = $.trim($('#email2').val());
			code = $.trim($('#code').val());

			if (email == null || email == 'null' || email == undefined) {

			} else {
				activateData = {
						'No' : no,
						'type' : type,
						'email' : email,
						'code' : code
				};
				$.post("<?= @base_url('auth/activate'); ?>",activateData,function(data){
					obj = JSON.parse(data);
					$('#part2LoginErr').removeAttr('class');
					console.log(obj);
					if (obj['status'] == 1) {
						$('#part2LoginErr').attr('class', 'alert alert-success');
						$('#part2LoginErr').html(obj['message']);
						setTimeout(function(){
							$('#part2LoginErr').removeAttr('class');
							$('#part2LoginErr').html('');
							window.location.replace("<?= @base_url('items'); ?>");
						},2000);
					} else {
						$('#part2LoginErr').attr('class', 'alert alert-danger');
						$('#part2LoginErr').html(obj['message']);
						setTimeout(function(){
							$('#part2LoginErr').removeAttr('class');
							$('#part2LoginErr').html('');
						},5000);
					}
				});
			}
		});

		$('#forgot').click(function(e){
			e.preventDefault();
			$('#partLogin1').hide();
			$('#partLogin2').hide();
			$('#partLogin4').hide();
			$('#partLogin3').show();
			$('#login-form-link').html('Forgot Password');
		});

		$('#forgotBtn').click(function(e){
			$('#part3LoginErr').attr('class', 'loader');
			e.preventDefault();
			email = $.trim($("#forgot-email").val());
			number = $.trim($("#forgot-number").val());

			if (email == null || email == undefined || number == null || number == undefined) {
				$('#part3LoginErr').removeAttr('class');
				$('#part3LoginErr').attr('class', 'alert alert-danger');
				$('#part3LoginErr').html('Please fill in the fields below');
				setTimeout(function(){
					$('#part3LoginErr').removeAttr('class');
					$('#part3LoginErr').html('');
				},3000);
			} else {
				$data = {
					"email" : email,
					"number" : number
				};

				$.post("<?= @base_url('auth/forgot');?>",$data, function(data){
					obj = JSON.parse(data);
					console.log(obj);
					$('#part3LoginErr').removeAttr('class');
					if(obj['status'] == 1){
						$('#part3LoginErr').attr('class', 'alert alert-success');
						$('#part3LoginErr').html(obj['message']);
						setTimeout(function(){
							$('#part3LoginErr').removeAttr('class');
							$('#part3LoginErr').html('');
							$('#partLogin3').hide();
							$('#partLogin4').show();
						},3000);
					}else if (obj['status'] == 2) {
						$('#part3LoginErr').attr('class', 'alert alert-warning');
						$('#part3LoginErr').html(obj['message']);
						setTimeout(function(){
							$('#part3LoginErr').removeAttr('class');
							$('#part3LoginErr').html('');
							$('#partLogin3').hide();
							$('#partLogin4').show();
						},3000);
					}else {
						$('#part3LoginErr').attr('class', 'alert alert-danger');
						$('#part3LoginErr').html(obj['message']);
						setTimeout(function(){
							$('#part3LoginErr').removeAttr('class');
							$('#part3LoginErr').html('');
						},3000);
					}
				});
			}
		});

		$('#resetBtn').click(function(e){
			$('#part4LoginErr').attr('class', 'loader');
			e.preventDefault();
			resetCode = $.trim($('#reset-code').val());
			$password = $.trim($('#reset-password').val());
			$confirm = $.trim($('#reset-confirm').val());

			if ($password === $confirm) {
				if (resetCode) {
					$.post("<?= @base_url('auth/reset');?>",{"reset":resetCode,"password":+$password}, function(data){
						$('#part4LoginErr').removeAttr('class');
						window.location.replace('<?= @base_url('items');?>');
					});
				}
			} else {
				$('#part4LoginErr').removeAttr('class');
				$('#part4LoginErr').attr('class', 'alert alert-danger');
				$('#part4LoginErr').html(obj['message']);
				setTimeout(function(){
					$('#part4LoginErr').removeAttr('class');
					$('#part4LoginErr').html('');
				},3000);
			}
		});
		//Login code section

		//Registration code section
		$('#part-2').hide();
		$('#part-3').hide();

		$('#part1Btn').click(function(e){
			$('#part1Err').attr('class', 'loader')
			e.preventDefault();
			RegNo = $.trim($('#RegNo').val());
			type = $.trim($('#Rtype').val());
			if (RegNo == null || RegNo == '' || RegNo == undefined) 
			{
				$('#part1Err').removeAttr('class');
				$('#part1Err').attr('class', 'alert alert-danger');
				$('#part1Err').html('Please enter a valid Customer Number!');
				setTimeout(function(){
					$('#part1Err').removeAttr('class');
					$('#part1Err').html('');
				},3000);
			}else{
				$.post("<?= @base_url('auth/findUser'); ?>",{RegNo:RegNo,role:type},function(data){
					obj = JSON.parse(data);
					console.log(obj);
					$('#part1Err').removeAttr('class');
					if (obj.length == 0) {
						$('#part1Err').attr('class', 'alert alert-danger');
						$('#part1Err').html('User could not be identified!');
						setTimeout(function(){
							$('#part1Err').removeAttr('class');
							$('#part1Err').html('');
						},3000);
					} else {
						$('#RegistrationNo').val(obj['RegNo']);
						$('#roletype').val(obj['role']);
						$('#fName').val(obj['fName']);
						$('#lName').val(obj['lName']);
						$('#mName').val(obj['mName']);
						if (obj['email']!=''||obj['email']!=null||obj['email']!='null'||obj['email']!=undefined) {
							$('#email1').val(obj['email']);
							//$('#email1').attr('disabled','true');
						}
						$('#part-1').hide();
						$('#part-3').hide();
						$('#part-2').show();
					}
				});
			}
		});

		$('#part2Btn').click(function(e){
			e.preventDefault();
			$('#part2Err').attr('class', 'loader');
			pass = $.trim($('#password1').val());
			conpass = $.trim($('#confirm_password').val());
			
			if (pass == null || pass == '' || pass == undefined || conpass == null || conpass == '' || conpass == undefined) 
			{
				$('#part2Err').removeAttr('class');
				$('#part2Err').attr('class', 'alert alert-danger');
				$('#part2Err').html('Please provid your password!');
				setTimeout(function(){
					$('#part2Err').removeAttr('class');
					$('#part2Err').html('');
				},3000);
			}else {
				if (pass == conpass) {
					registrationData = {
								"user" 	: $('#RegistrationNo').val(),
								"fname" 	: $('#fName').val(),
								"lname" 	: $('#lName').val(),
								"mname" 	: $('#mName').val(),
								"email" 	: $('#email1').val(),
								"pass" 		: $.trim($('#password1').val()),
								"type" 		: $('#roletype').val()
							};
					$.post("<?= @base_url('auth/register'); ?>",registrationData,function(data){
						obj = JSON.parse(data);
						$('#part2Err').removeAttr('class');
						// console.log(obj);
						if(obj['status'] == 1)
						{
							$('#part2Err').attr('class', 'alert alert-success');
							$('#part2Err').html(obj['message']);
							setTimeout(function(){
								$('#part2Err').removeAttr('class');
								$('#part2Err').html('');
								$('#part-1').hide();
								$('#part-2').hide();
								$('#email2Conf').attr('disabled','true');
								$('#NoConf').val(obj['data']['No']);
								$('#email2Conf').val(obj['data']['email']);
								$('#typeR').val(obj['data']['type']);
								$('#part-3').show();
							},10000);
						}else{
							$('#part2Err').attr('class', 'alert alert-danger');
							$('#part2Err').html(obj['message']);
							setTimeout(function(){
								$('#part2Err').removeAttr('class');
								$('#part2Err').html('');
							},3000);
						}console.log(data);
					});
				} else {
					$('#part2Err').attr('class', 'alert alert-danger');
					$('#part2Err').html('Paasword provided do not match!');
					setTimeout(function(){
						$('#part2Err').removeAttr('class');
						$('#part2Err').html('');
					},3000);
				}
			}
		});

		$('#part3Btn').click(function(e){
			e.preventDefault();
			$('#part3Err').attr('class', 'loader');
			no = $('#NoConf').val();
			type = $('#typeR').val();
			email = $.trim($('#email2Conf').val());
			code = $.trim($('#codeConf').val());

			if (email == null || email == 'null' || email == undefined) {

			} else {
				activateData = {
						'No' : no,
						'type' : type,
						'email' : email,
						'code' : code
				};
				$.post("<?= @base_url('auth/activate'); ?>",activateData,function(data){
					obj = JSON.parse(data);
					$('#part3Err').removeAttr('class');
					// console.log(obj);
					if (obj['status'] == 1) {
						$('#part3Err').attr('class', 'alert alert-success');
						$('#part3Err').html(obj['message']);
						setTimeout(function(){
							$('#part3Err').removeAttr('class');
							$('#part3Err').html('');
							window.location.replace("<?= @base_url('items'); ?>");
						},2000);
					} else {
						$('#part3Err').attr('class', 'alert alert-danger');
						$('#part3Err').html(obj['message']);
						setTimeout(function(){
							$('#part3Err').removeAttr('class');
							$('#part3Err').html('');
						},5000);
					}
				});
			}
		});

		$('#Rtype').change(function(){
			val = $(this).val();
			if (val == 1) {
				$('#RegNo').attr('placeholder','Sales person Code');
			} else if (val == 2) {
				$('#RegNo').attr('placeholder','Customer Number');
			}
		});
	});
</script>
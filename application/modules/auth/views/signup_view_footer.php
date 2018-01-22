<script type="text/javascript">
	$(document).ready(function(){
		$('#part-2').hide();
		$('#part-3').hide();

		$('#part1Btn').click(function(e){
			e.preventDefault();
			RegNo = $.trim($('#RegNo').val());
			type = $.trim($('#type').val());
			if (RegNo == null || RegNo == '' || RegNo == undefined) 
			{
				$('#part1Err').attr('class', 'alert alert-danger');
				$('#part1Err').html('Please enter a valid Customer Number!');
				setTimeout(function(){
					$('#part1Err').removeAttr('class');
					$('#part1Err').html('');
				},3000);
			}else{
				$.post("<?= @base_url('auth/findUser'); ?>",{RegNo:RegNo,role:type},function(data){
					obj = JSON.parse(data);
					if (obj == null) {
						$('#part1Err').attr('class', 'alert alert-danger');
						$('#part1Err').html('Customer could not be identified!');
						setTimeout(function(){
							$('#part1Err').removeAttr('class');
							$('#part1Err').html('');
						},3000);
					} else {
						$('#RegistrationNo').val(obj['RegNo']);
						$('#roletype').val(obj['role']);
						$('#fName').val(obj['fName']);
						$('#lName').val(obj['lName']);
						$('#email1').val(obj['email']);
						$('#email1').attr('disabled','true');

						$('#part-1').hide();
						$('#part-3').hide();
						$('#part-2').show();
					}
				});
			}
		});

		$('#part2Btn').click(function(e){
			e.preventDefault();
			pass = $.trim($('#password').val());
			conpass = $.trim($('#confirm_password').val());

			if (pass == null || pass == '' || pass == undefined || conpass == null || conpass == '' || conpass == undefined) 
			{
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
								"email" 	: $('#email1').val(),
								"pass" 		: "<?= @$this->config->item('salt_phrase');?>"+$.trim($('#password1').val()),
								"type" 		: $('#roletype').val()
							};
					$.post("<?= @base_url('auth/register'); ?>",registrationData,function(data){
						obj = JSON.parse(data);
						if(obj['status'] == 1)
						{
							$('#part2Err').attr('class', 'alert alert-success');
							$('#part2Err').html(obj['message']);
							setTimeout(function(){
								$('#part2Err').removeAttr('class');
								$('#part2Err').html('');
								$('#part-1').hide();
								$('#part-2').hide();
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
	});
</script>
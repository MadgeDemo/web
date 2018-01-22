<div class="container-fluid">
	<div class="row">
		<div class="col-md-5" id="part-1">
			<div id="part1Err"></div>
			<form class="form-group">
				<div class="row">
					<div class="col-sm-3"><label>Customer No.:</label></div>
					<div class="col-sm-9"><input class="form-control" type="text" name="RegNo" id="RegNo" required></div>
					<div class="col-sm-3"><label>User Type.:</label></div>
					<div class="col-sm-9">
						<select name="type" id="type" class="form-control" required>
							<option selected="true" disabled="true" value="0">Select a Role</option>
							<option value="1">Employee</option>
							<option value="2">Customer</option>
						</select>
					</div>
				</div>
				<button class="btn btn-primary" type="submit" id="part1Btn" name="submit">Next</button>
			</form>
		</div>
		<div class="col-md-5" id="part-2">
			<div id="part2Err"></div>
			<form class="form-group">
				<input type="hidden" name="RegistrationNo" id="RegistrationNo">
				<input type="hidden" name="roletype" id="roletype">
				<input type="hidden" name="fName" id="fName">
				<input type="hidden" name="lName" id="lName">
				<div class="row">
					<div class="col-sm-3"><label>Email:</label></div>
					<div class="col-sm-9"><input class="form-control" type="email" name="email1" id="email1" required></div>
				</div>
				<div class="row">
					<div class="col-sm-3"><label>Password:</label></div>
					<div class="col-sm-9"><input class="form-control" type="password" name="password1" id="password1" required></div>
				</div>
				<div class="row">
					<div class="col-sm-3"><label>Confirm Password:</label></div>
					<div class="col-sm-9"><input class="form-control" type="password" name="confirm_password" id="confirm_password" required></div>
				</div>
				<button class="btn btn-primary" type="submit" id="part2Btn" name="submit">Sign Up</button>
			</form>
		</div>
		<div class="col-md-5" id="part-3">
			<div id="part3Err"></div>
			<form class="form-group">
				<div class="row">
					<div class="col-sm-3"><label>Email:</label></div>
					<div class="col-sm-9"><input class="form-control" type="email" name="email2" id="email2" required></div>
				</div>
				<div class="row">
					<div class="col-sm-3"><label>Reset Code:</label></div>
					<div class="col-sm-9"><input class="form-control" type="text" name="code" id="code" required></div>
				</div>
				<div class="row">
					<div class="col-sm-3"><label>Password:</label></div>
					<div class="col-sm-9"><input class="form-control" type="password" name="password2" id="password2" required></div>
				</div>
				<button class="btn btn-primary" type="submit" id="part3Btn" name="submit">Sign Up</button>
			</form>
		</div>
		<div class="col-md-7">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vulputate rhoncus ex, sagittis tempor neque faucibus at. Vivamus ipsum justo, posuere sed mi in, volutpat varius erat. Duis varius purus et sapien luctus, non placerat metus porttitor. Mauris mollis enim neque, sit amet efficitur metus egestas eget. Donec at mi est. Vivamus aliquam tempor euismod. Proin nec porttitor nunc. Ut scelerisque, ex id gravida porttitor, ex arcu accumsan quam, in mollis orci augue sed lacus. Sed tincidunt nisi felis, eget dapibus nisl viverra at.</p>
		</div>
	</div>
</div>
<?= $this->load->view('signup_view_footer'); ?>
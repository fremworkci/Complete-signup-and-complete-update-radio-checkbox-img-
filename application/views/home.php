<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include("css.php"); ?>
	<style>
		#modal
		{
			background-color: rgba(0,0,0,0.7);
			height: 100%;
			width: 100%;
			position: fixed;
			top: 0px;
			left: 0px;
			display: none;
		}
		#modal-form
		{
			background-color: white;
			width: 30%;
			height: auto;
			margin-left: 30%;
			margin-top: 100px;
			border-radius: 8px;
			padding: 10px;
			position: absolute;
		}
		#close-btn
		{
			background-color: red;
			color: white;
			width: 30px;
			height: 30px;
			position: absolute;
			top: -15px;
			right: -15px;
			text-align: center;
			border-radius: 8px;
			cursor: pointer;
		}
	</style>
</head>
<body>
<div class="container">
	<div id="msg"></div>
	<form id="signup_form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xl-4">
				<div class="form-group">
					<label>Name : </label>
					<input type="text" name="name" id="name" class="form-control">
					<span class="text-denger" id="name_err"></span>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="form-group">
					<label>Email : </label>
					<input type="text" name="email" id="email" class="form-control">
					<span class="text-denger" id="email_err"></span>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="form-group">
					<label>Password : </label>
					<input type="text" name="password" id="password" class="form-control">
					<span class="text-denger" id="password_err"></span>
				</div>
			</div>
		</div> <!-- first row end -->
		<div class="row">
			<div class="col-xl-4">
				<div class="form-group">
					<label>Mobile : </label>
					<input type="text" name="mobile" id="mobile" class="form-control">
					<span class="text-denger" id="name_err"></span>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="form-group">
					<label>Gender : </label><br>
					<input type="radio" name="gender" id="gender"  value="Male"> Male
					<input type="radio" name="gender" id="gender"  value="Female"> Female
					<span class="text-denger" id="gender_err"></span>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="form-group">
					<label>Qualification : </label><br>
					<input type="checkbox" name="qualification[]" id="qualification" value="MCA"> MCA
					<input type="checkbox" name="qualification[]" id="qualification" value="BCA"> BCA
					<input type="checkbox" name="qualification[]" id="qualification" value="B.Tech"> B.Tech
					<span class="text-denger" id="qualification_err"></span>
				</div>
			</div>
		</div> <!-- second row end -->
		<div class="row">
			<div class="col-xl-4">
				<div class="form-group">
					<label>Image : </label>
					<input type="file" name="pic" id="pic" class="form-control">
					<span class="text-denger" id="pic_err"></span>
				</div>
			</div>
			<div class="col-xl-4"><br><br>
				<input type="submit" name="" value="Signup" id="signup" class="btn btn-info">
			</div>
		</div>
	</form>



	<table class="table" id="mytable">
		
	</table>
</div>


<!-- edit model -->
<div id="modal">
	<div id="modal-form">
		<h2>Edit Form...</h2>
		<form id="edit_form">
			<input type="hidden" name="id" id="e_id">
			<div class="form-group">
				<label>Name : </label>
				<input type="text" name="name" id="e_name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email : </label>
				<input type="text" name="email" id="e_email" class="form-control">
			</div>
			<div class="form-group">
				<label>Mobile : </label>
				<input type="text" name="mobile" id="e_mobile" class="form-control">
			</div>
			<div class="form-group">
				<label>Gender : </label><br>
				<input type="radio" name="gender" id="e_gender1" value="Male"> Male
				<input type="radio" name="gender" id="e_gender2" value="Female"> Female
			</div>
			<div class="form-group">
				<label>Qualification : </label><br>
				<input type="checkbox" name="qualification[]" id="e_q1" value="MCA"> MCA
				<input type="checkbox" name="qualification[]" id="e_q2" value="BCA"> BCA
				<input type="checkbox" name="qualification[]" id="e_q3" value="B.Tech"> B.Tech
			</div>
			<div class="form-group">
				<label>Image : </label>
				<input type="file" name="new_pic" id="e_newpic" class="form-control">
				<input type="hidden" name="old_pic" id="e_oldpic">
				<div id="oldpic"></div>
			</div>

			<input type="submit" name="" value="Update" class="btn btn-success">
		</form>
	</div>
</div>


</body>
</html>
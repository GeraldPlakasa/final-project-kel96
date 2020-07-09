<!DOCTYPE html>
<html>
<head>
	<title>SanberBook</title>
</head>
<body>
	<h1>Buat Account Baru!</h1>
	<h3>Sign Up Form</h3>
	<form action="/welcome" method="post">
		@csrf
		<label>First name:</label><br>
		<br>
		<input type="text" name="fname"><br>
		<br>
		<label>Last name:</label><br>
		<br>
		<input type="text" name="lname"><br>
		<br>

		<label>Gender:</label><br>
		<br>
		<input type="radio" id="male" name="gender">
		<label for="male">Male</label><br>
		<input type="radio" id="female" name="gender">
		<label for="female">Female</label><br>
		<input type="radio" id="other" name="gender">
		<label for="other">Other</label><br>
		<br>
		<label>Nationality:</label><br>
		<br>
		<select>
			<option>Indonesian</option>
			<option>Malaysia</option>
			<option>Singapura</option>
		</select>
		<br><br>
		<label>Language Spoken:</label><br>
		<br>
		<input type="checkbox" name="Bindo">
		<label>Bahasa Indonesia</label><br>
		<input type="checkbox" name="English">
		<label>English</label><br>
		<input type="checkbox" name="Other">
		<label>Other</label><br>
		<br>
		<label>Bio:</label><br>
		<br>
		<textarea cols="40" rows="10"></textarea><br>
		<input type="submit" name="submit" value="Sign Up" >
	</form>
</body>
</html>
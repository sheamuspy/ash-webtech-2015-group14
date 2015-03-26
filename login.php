<html>
	<head>
	<script src="jquery-2.1.3.js"></script>
	<script>
	
		function sendRequest(requestURL){
			var request = $.ajax({url:requestURL, async:true});
		}
		
		function login(username, password){
			var request = sendRequest("user_methods.php?cmd=1&username="+username+"&password="+password);
		
		}
		
		function validate(){
			var valid = validatePassword();
		}
		
		function validatePassword(){
			var password = loginPassword.value;
			var username = loginUsername.value;
			var passErr=false;
			var unameErr=false;
			var r = new RegExp("[a-z]{1,}");
			if(r.test(password)){
				loginPassword.style.backgroundColor="red";
			}
		}
	</script>
		
	</head>
	<body>
		<table align="center">
			<tr>
				<td>Username</td><td><input type="text" placeholder="Username" id="loginUsername"></td>
			</tr>
			<tr>
				<td>Password</td><td><input type="password" placeholder="Password" id="loginPassword"></td>
			</tr>
			<tr>
			
				<td></td><td><button type="button" onclick="validate()">Login</button></td>
			</tr>
		</table>
	</body>

</html>
<div class='login-header'>
<style>
.login-header{
	height:50px;
	width:100%;
	background-image:url('index.jpg');
}

#login{
	color:rgb(25, 9, 4);;
	margin-left: 170px;
	padding:15px;
	font-size:20px;

}
#login input
{
	color:red;
	background:white;
	border-radius:10px;
	font-size:20px;
}

.register{
	margin-left:800px;
	padding:50px;
	background-image:url('register.jpg');
	background-repeat: no-repeat 50px;
	border-style:dashed;
	border-radius:10px;
	font-size:20px;

}

.register input{

	border-radius:5px;
	font-size:20px; 
}
h1{
	font-size: 30px;
    color:black;
  
}

</style>






<div id='login'>
<form method='post'>
username<input type='text' name='username'>
password<input type="password" name='password'>
<input type='submit' name='submit'>
</form>
</div>
</div>
<div class='register'>
<h1>Register a new account </h1>
				<form method="post" >
					firstname:</br>
						<input type="text" name='fname' autocomplete='off' placeholder='your firstname'/></br>
					lastname:</br>
						<input type="text" name='lname' autocomplete='off' placeholder='lastname'/></br>
					Email id:<br/>
					<input type ="email" name="email" autocomplete='off' placeholder='your email'/></br>
						username:</br>
							<input type="text" name='username' autocomplete='off' placeholder='your username' />
								<br/> <br/>
						password:<br/>
						<input type="password" name="password1" placeholder='password' /></br>

						

							<br/><br/>
							
						<input type="submit" name="submit" value="register" />
									</form>
</div>
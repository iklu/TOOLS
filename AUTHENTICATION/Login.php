<html>
<title> Login </title>
<body>
<form name=login action ="submit.php" method=post>
Username: <input type="text" name="name"><br>
Password: <input type="password" name="password"><br>
<input type="hidden" name="originating_uri" value="<?php  $_REQUEST['originating_uri'] ?>">
<input type=submit name="submitted" value="Login">
</form>
</body>
</html>

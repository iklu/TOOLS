<?php

// Problem
// You need to safely avoid cross-site scripting (XSS) attacks in your PHP applications.
// Solution
// Escape all HTML output with htmlentities(), being sure to indicate the correct character
// encoding:

if(isset($_POST["username"])) {

    echo $_POST["username"];
/* Note the character encoding. */
header('Content-Type: text/html; charset=UTF-8');
/* Initialize an array for escaped data. */
$html = array();
/* Escape the filtered data. */
$html['username'] = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
echo "<p>Welcome back, {$html['username']}.</p>";

}

?>

<form action="" method="POST">
<p>Username : <input type="text" name="username" /></p>
<p><input type="submit" value="The username" /></p>
</form>

The htmlentities() function replaces each character with its HTML entity, if it has
one. For example, > is replaced with &gt;. Although the immediate effect is that the data
is modified, the purpose of the escaping is to preserve the data in a different context.
Whenever a browser renders &gt; as HTML, it appears on the screen as >.
XSS attacks try to take advantage of a situation where data provided by a third party is
included in the HTML without being escaped properly. A clever attacker can provide
code that can be very dangerous to your users when interpreted by their browsers. By
using htmlentities(), you can be sure that such third-party data is displayed properly
and not interpreted.
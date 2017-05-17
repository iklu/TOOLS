<?php

// Problem
// You want to be sure that a form submission is valid and intentional.
// Solution
// Add a hidden form field with a one-time token, and store this token in the user’s session:

session_start();

$_SESSION['token'] = md5(uniqid(mt_rand(), true));
?>


<form action="submit.php" method="POST">
<input type="hidden" name="token" value="5<?php echo $_SESSION['token']; ?>" />
<p>Stock Symbol: <input type="text" name="symbol" /></p>
<p>Quantity: <input type="text" name="quantity" /></p>
<p><input type="submit" value="Buy Stocks" /></p>
</form>
<!--When you receive a request that represents a form submission, check the tokens to be
sure they match:
session_start();-->
<br>

This technique protects against a group of attacks known as cross-site request forgeries
(CSRF). These attacks all cause a victim to send requests to a target site without the
victim’s knowledge. Typically, the victim has an established level of privilege with the
target site, so these attacks allow an attacker to perform actions that the attacker cannot
otherwise perform. For example, imagine Alice is logged in via cookies to a social networking
website, then visits another website. That second website could display a form
to Alice that looks harmless, but really submits itself to a URL on that social networking
website. Because Alice’s browser would send login cookies along with the form submission,
the social networking website wouldn’t be able to distinguish this malicious
form submission from a good one without CSRF protection.
Adding a token to your forms in this way does not prevent a user from forging his own
request from himself, but this is not something you can prevent, nor is it something to
be concerned with. If you filter input as discussed in Recipe 18.3, you force requests to
abide by your rules. The technique shown in this recipe helps to make sure the request
is intentional.

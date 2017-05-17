<?php

// Problem
// You need to ensure that a user’s session identifier cannot be provided by a third party,
// such as an attacker who seeks to hijack the user’s session.
// Solution
// Regenerate the session identifier with session_regenerate_id() whenever there is a
// change in the user’s privilege, such as after a successful login:

session_regenerate_id();
$_SESSION['logged_in'] = true;

/*
Sessions allow you to create variables that persist between requests. For sessions to work,
each of the users’ requests must include a session identifier that uniquely identifies a
session.
By default, PHP accepts a session identifier sent in a cookie, but if session.use_on
ly_cookies is set to 1, it will accept a session identifier in the URL. An attacker can trick
a victim into following a link to your application that includes an embedded session
identifier:
<a href="http://example.org/login.php?PHPSESSID=1234">Click Here!</a>
A user who follows this link will resume the session identified as 1234. Therefore, the
attacker now knows the user’s session identifier and can attempt to hijack the user’s
session by presenting the same session identifier.
If the user never logs in or performs any action that differentiates the user from among
the other users of your application, the attacker gains nothing by hijacking the session.
Therefore, by ensuring that the session identifier is regenerated whenever there is a
change in privilege level, you effectively eliminate session fixation attacks. PHP takes
care of updating the session data store and propagating the new session identifier, so
you must only call this one function as appropriate.
As of PHP 5.5.2, a new configuration setting, session.use_strict_mode helps prevent
session hijacking. When this is enabled, PHP accepts only already initialized session
IDs. If a browser sends a new session ID, PHP rejects it and generates a new one.
*/
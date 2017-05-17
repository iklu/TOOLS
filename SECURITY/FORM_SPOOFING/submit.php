<?php

session_start();
if ($_POST['token'] != $_SESSION['token']) {
/* Prompt user for password. */
echo "not valids";

} else {
/* Continue. */

echo "valid";
}
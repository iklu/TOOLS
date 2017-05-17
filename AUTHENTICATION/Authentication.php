
<?php

class Authentication
{
    public function check_auth()
    {
        try {
            $cookie = new Cookie();
            $cookie->validate();
        } catch (AuthException $e) {
            header("Location: /login.php?originating_uri=".$_SERVER['REQUEST_URI']);
            exit;
        }
    }

    public static function check_credentials($name, $password)
    {
        // $dbh = new DB_Mysql_Prod();
        // $cur = $dbh->prepare("
        // SELECT
        // userid
        // FROM
        // users
        // WHERE
        // username = :1
        // and password = :2")->execute($name, md5($password));
        // $row = $cur->fetch_assoc();
        // if ($row) {
        //         $userid = $row[‘userid’];
        // } else {
        //         throw new AuthException("user is not authorized");
        // }

        $userid = 1255554;
        return $userid;
    }
}

<?php

class AuthException extends \Exception
{

}

class Cookie
{

    private $created;
    private $userid;
    private $version;
    // our mcrypt handle
    private $td;
    // mcrypt information
    static $cypher = 'blowfish';
    static $mode = 'cfb';
    static $key = 'choose a better key';
    // cookie format information
    static $cookiename = 'USERAUTH';
    static $myversion = '1';
    // when to expire the cookie
    static $expiration = '600';
    // when to reissue the cookie
    static $warning = '300';
    static $glue = '|';

    /**
     * Undocumented function
     *
     * @param boolean $userid
     */
    public function __construct($userid = false)
    {
        
        $this->td = mcrypt_module_open ($cypher, '', $mode, '');
        
        if ($userid) {
            $this->userid = $userid;
            return;
        } else {
            if (array_key_exists(self::$cookiename, $_COOKIE)) {
                $buffer = $this->_unpackage($_COOKIE[self::$cookiename]);
            } else {
                throw new AuthException("No Cookie");
            }
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function set()
    {
        $cookie = $this->_package();
        setcookie(self::$cookiename, $cookie);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function validate()
    {
        if (!$this->version || !$this->created || !$this->userid) {
                throw new AuthException('Malformed cookie');
        }
        if ($this->version != self::$myversion) {
                throw new AuthException('Version mismatch');
        }
        if (time() - $this->created > self::$expiration) {
                throw new AuthException('Cookie expired');
        } elseif (time() - $this->created > self::$resettime) {
                $this->set();
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function logout()
    {
        setcookie(self::$cookiename, “”, 0);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function _package()
    {
        $parts = array(self::$myversion, time(), $this->userid);
        $cookie = implode($glue, $parts);
        return $this->_encrypt($cookie);
    }

    /**
     * Undocumented function
     *
     * @param  $cookie
     * @return void
     */
    private function _unpackage($cookie)
    {
        $buffer = $this->_decrypt($cookie);
        list($this->version, $this->created, $this->userid) =
        explode($glue, $buffer);
        if ($this->version != self::$myversion ||
        !$this->created ||
        !$this->userid) {
            throw new AuthException();
        }
    }

    /**
     * Undocumented function
     *
     * @param  $plaintext
     * @return void
     */
    private function _encrypt($plaintext)
    {
        $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);
        mcrypt_generic_init ($this->td, $this->key, $iv);
        $crypttext = mcrypt_generic ($this->td, $plaintext);
        mcrypt_generic_deinit ($this->td);
        return $iv.$crypttext;
    }

    /**
     * Undocumented function
     *
     * @param  $cryptext
     * @return void
     */
    private function _decrypt($cryptext){
        $ivsize = mcrypt_get_iv_size($this->td);
        $iv = substr($crypttext, 0, $ivsize);
        $crypttext = substr($crypttext, $ivsize);
        mcrypt_generic_init ($this->td, $this->key, $iv);
        $plaintext = mdecrypt_generic ($this->td, $crypttext);
        mcrypt_generic_deinit ($this->td);
        return $plaintext;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function _reissue() {
        $this->created = time();
    }
}

<?php
/* creating instances for the user class */
class User {
    private $username;
    private $password;
    private $fullname;
    private $emailaddress;
    
    /* A function open for access plus constructors */
    public function __construct($u, $p, $fn, $ea) {
        $this->username = $u;
        $this->password = $p;
        $this->fullname = $fn;
        $this->emailaddress = $ea;
    }
    
    /* A function open for access for the username */
    public function getUsername() {
        return $this->username;
    }
    
    /* A function open for access for the username*/
    public function getPassword() {
        return $this->password;
    }
    
    /* A function open for access for the fullname*/
    public function getFullname() {
        return $this->fullname;
    }
    
    /* A function open for access for the emailaddress*/
    public function getEmailaddress() {
        return $this->emailaddress;
    }  
}

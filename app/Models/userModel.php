<?php
namespace App\Models;


class userModel implements \JsonSerializable 
{
    
    private $id;
    private $username;
    private $password;
    
    //best practice: Use non-default constructor for Object models
    function __construct($id, $username, $password) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    
   
    //Best Practice: Just implement getter (read-only) accessors for Object Models
    public function getUsername()
    {
        return $this->username;
    }
 
    //Best Practice: Just implement getter (read-only) accessors for Object Models
    public function getPassword()
    {
        return $this->password;
    }
}
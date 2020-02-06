<?php
namespace App\Services\Data;

use \PDO;
use PDOException;
use App\Models\userModel;
use Illuminate\Support\Facades\Log;
use App\Services\Utility\DatabaseException;

class SecurityDAO
{
    private $db = NULL;
    
    //BEST PRACTICE: Do not create the data service (so you can support Atomic)
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function findByUser(userModel $user)
    {
        Log::info("Entering SecurityDAO.findByUser()");
        try
        {
            //Select username and password and see if this row exists
            $name = $user->getUsername();
            $pw = $user->getPassword();
            $stmt = $this->db->prepare('SELECT ID, USERNAME, PASSWORD FROM users WHERE USERNAME = :username AND PASSWORD = :password');
            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $pw);
            $stmt->execute();
            
            //See if user existed and return true if found else return false if not found
            //BAD PRACTICE: This is a business rules in our DAO!
            if($stmt->rowCount() == 1)
            {
                Log::info("Exit SecurityDAO.findByUser() with true");
                return true;
            }
            else 
            {
                Log::info("Exit SecurityDAO.findByUser() with false");
                return false;
            }
        }
        catch (PDOException $e)
        {
            //BEST PRACTICE: Catch all exceptions (do not swallow exceptions)
            //log the exception, do not throw technology specific exceptions, and throw a custom exception
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}
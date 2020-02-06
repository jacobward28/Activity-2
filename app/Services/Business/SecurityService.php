<?php

namespace App\Services\Business;

use \PDO;
use Illuminate\Support\Facades\Log;
use App\Models\userModel;
use App\Services\Data\SecurityDAO;

Class SecurityService
{
    //REFACTOR: This should be renamed to authenticate
    public function login(UserModel $user)
    {
        Log::info("Entering SecurityService.login()");
        
        //BEST PRACTICE: Externalize your application configuration
        //Get credentials for accessing the database
        //REFACTOR: the initialization code is repeated in all the business methods
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        $port = config("database.connections.mysql.port");
        
        
        // BEST PRACTICE: Dp mpt create Database connections in a DAO
        // So you can support Atomic Database transactions
        // Create connection:
        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Create a security service DAO with this connection and try to find the password in User.
        $service = new SecurityDAO($db);
        $flag = $service->findbyUser($user);
        
        //in PDO you "close" the database connection by setting the PDO object to null
        $db = null;
        
        //Return the finder results
        Log::info("Exit SecurityService.login() with " . $flag);
        return $flag;
    }
}

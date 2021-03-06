<?php

class UserGateway
{
    private PDO $conn;
    
    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }
    
    // public function getUserAPIKey(string $key): array | false php8
    public function getUserAPIKey(string $key)
    {
        $sql = "SELECT *
                FROM user
                WHERE api_key = :api_key";
                
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindValue(":api_key", $key, PDO::PARAM_STR);
        
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByUsername(string $username)
    {
        $sql = "SELECT *
                FROM user
                WHERE username = :username";
                
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}









<?php

namespace App\Models;

use PDO;

class MDiscussion extends \Core\Model
{
  public static function postComment($params)
  {
    $errorMessage = [];
    foreach($params as $key => $value ) {
      
      if(!$value) {
        $errorMessage[] = $key . ' is required.';
      }

      if($key === 'email') {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
          $errorMessage[] = 'Invalidate Email.';
        }
      }
    }

    if(count($errorMessage)) {
      return array(
        "status" => false, 
        "message" => $errorMessage
      );
    }

    try {
    //   foreach($params as $param) {
    //     var_dump($param);
    //   }
      $db = static::getDB();
      $stmt = $db->prepare('
        INSERT INTO comments (name, email, comment) 
        VALUES (:name, :email, :comment)
      ');
      $stmt->bindParam(':name', $params['name']);
      $stmt->bindParam(':email', trim($params['email']));
      $stmt->bindParam(':comment', $params['comment']);
      $stmt->execute();
      
      return array(
        "status" => true    
      );
    } catch (PDOException $e) {
      return array(
        "status" => false, 
        "message" => $e->getMessage()
      );
    }
  }


  public static function getAll()
  {
  
    try {

        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }
}

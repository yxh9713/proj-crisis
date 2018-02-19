<?php

namespace App\Models;

use PDO;

class Pin extends \Core\Model
{
  public static function getPins()
  {    
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT pins.id, pins.country_id, pins.top_position, pins.left_position, country_name.name
        FROM pins INNER JOIN country_name 
        ON country_name.id = pins.country_id 
      ');
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function postPin($params)
  {
    $pin = self::getRecord($params['country-id']);
    if($pin) {
      return 'The pin is existed';
    }
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        INSERT INTO pins (country_id, top_position, left_position) 
        VALUES (:category_id, :top_position, :left_position)
      ');
      $stmt->bindParam(':category_id', $params['country-id']);
      $stmt->bindParam(':top_position', $params['top-position']);
      $stmt->bindParam(':left_position', $params['left-position']);

      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function getRecord($id) 
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT id FROM pins WHERE country_id = :id
      ');
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function deletePin($id)
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        DELETE FROM pins
        WHERE id = :id
      ');
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }




}

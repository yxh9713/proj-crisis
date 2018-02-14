<?php

namespace App\Models;

use PDO;

class Event extends \Core\Model
{
  
  public static function postEvent($params)
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        INSERT INTO events (country_id, subhead, date, description) 
        VALUES (:country_id, :subhead, :date, :description)
      ');
      $stmt->bindParam(':country_id', $params['country']);
      $stmt->bindParam(':subhead', trim($params['subhead']));
      $stmt->bindParam(':date', $params['date']);
      $stmt->bindParam(':description', trim($params['description']));

      return $stmt->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function getEventsByCountry($country)
  {    
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT events.id, events.subhead, events.date, events.description 
        FROM events 
        WHERE country_id = :country
        ORDER BY events.date DESC
      ');
      $stmt->bindParam(':country', $country);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function deleteEvent($id)
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        DELETE FROM events
        WHERE id = :id
      ');
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function updateEvent($params)
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        UPDATE events
        SET subhead = :subhead,
            date = :date,
            description = :description
        WHERE id = :id
      ');
      $stmt->bindParam(':id', $params['id']);
      $stmt->bindParam(':subhead', trim($params['subhead']));
      $stmt->bindParam(':date', $params['date']);
      $stmt->bindParam(':description', trim($params['description']));
      // $stmt->bindParam(':country_id', $params['country']);

      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }



}

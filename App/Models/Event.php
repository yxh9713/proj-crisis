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
        INSERT INTO events (country_id, subhead, date, description, on_menu) 
        VALUES (:country_id, :subhead, :date, :description, :on_menu)
      ');
      $on_menu = (isset($params['on_menu'])) ? 1 : 0;
      $stmt->bindParam(':country_id', $params['country']);
      $stmt->bindParam(':subhead', trim($params['subhead']));
      $stmt->bindParam(':date', $params['date']);
      $stmt->bindParam(':description', trim($params['description']));
      $stmt->bindParam(':on_menu', $on_menu);

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
        SELECT events.id, events.subhead, events.date, events.description, events.on_menu 
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

  public static function updateOnMenuStatus($params)
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        UPDATE events
        SET on_menu = :status
        WHERE id = :id
      ');
      $stmt->bindParam(':id', $params['id']);
      $stmt->bindParam(':status', $params['status']);

      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function getEligibleSubheads()
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT id, country_id, subhead, date 
        FROM `events` 
        WHERE on_menu = 1 AND subhead <> ""
      ');

      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }



}

<?php

namespace App\Models;

use PDO;

class Country extends \Core\Model
{
  public static function getAllCountries()
  {    
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT * FROM country_name ORDER BY name
      ');
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  
  public static function getAllCategories()
  {    
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT a.* FROM country_category a 
        INNER JOIN (SELECT DISTINCT country_name.country_category_id FROM country_name) b 
        ON a.id = b.country_category_id ORDER BY a.id
      ');

      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function getCountriesByCategory($category)
  {    
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT country_name.id, country_name.name 
        FROM country_name 
        INNER JOIN country_category 
        ON country_category.id = country_name.country_category_id
        WHERE country_category.category = :category
        ORDER BY name
      ');
      $stmt->bindParam(':category', $category);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function getCountryById($id)
  {    
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT country_name.id, country_name.name 
        FROM country_name 
        WHERE country_name.id = :id
      ');
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function getAll()
  {    
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT country_name.id, country_category.category, country_name.name 
        FROM country_name INNER JOIN country_category 
        ON country_category.id = country_name.country_category_id 
        ORDER BY country_category.category;
      ');
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function postCountry($country)
  {
    $country = ucwords(strtolower($country));
    $first_letter = substr($country, 0, 1);
    $result = self::getCategory($first_letter);
    $category_id = $result['id'];
    
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        INSERT INTO country_name 
            (country_category_id, name) 
        VALUES 
            (:category_id, :name)
      ');
      $stmt->bindParam(':category_id', $category_id);
      $stmt->bindParam(':name', $country);

      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function updateCountry($params)
  {
    $country = ucwords(strtolower($params['country']));
    $first_letter = substr($country, 0, 1);
    $result = self::getCategory($first_letter);
    $category_id = $result['id'];

    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        UPDATE country_name
        SET name = :name,
            country_category_id = :category_id 
        WHERE id = :id
      ');
      $stmt->bindParam(':id', $params['id']);
      $stmt->bindParam(':name', $country);
      $stmt->bindParam(':category_id', $category_id);

      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function deleteCountry($id)
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        DELETE FROM country_name
        WHERE id = :id
      ');
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function getCategory($category)
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT id FROM country_category WHERE category = :category
      ');
      $stmt->bindParam(':category', $category);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function getNav()
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT country_category.category, country_name.id, country_name.name, country_name.country_category_id 
        FROM country_name 
        LEFT JOIN country_category 
        ON country_name.country_category_id = country_category.id
        ORDER BY country_name.country_category_id, country_name.name
      ');
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }



}

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

    // $secret="6LcRFEcUAAAAAPIi95CVn-xeuMvCbGmZQPhhL4Rt";
    // $response = $params["captcha"];
    // $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    // $captcha_success = json_decode($verify);
    // if ($captcha_success->success==false) {
    //   $errorMessage[] = 'Please reload the page to identify You are Not a Robot.';
    // }

    if(count($errorMessage)) {
      return array(
        "status" => false, 
        "message" => $errorMessage
      );
    }

    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        INSERT INTO comments (name, email, comment) 
        VALUES (:name, :email, :comment)
      ');
      $stmt->bindParam(':name', trim($params['comment_author']));
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

  public static function getComments($page)
  {
    try {
      $begin = (isset($page) ? $page : 1);
      $per_page = 5;
      $limit = ($begin - 1) * $per_page;

      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT * FROM comments
        WHERE `approve` = 1 AND `delete` = 0
        ORDER BY create_at DESC
        LIMIT :limit, :offset;
      ');
      $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
      $stmt->bindValue(':offset', (int) $per_page, PDO::PARAM_INT);
      $stmt->execute();

      $results = array(
        "data" => $stmt->fetchAll(PDO::FETCH_ASSOC),
        "total" => ceil($db->query('SELECT count(*) FROM comments WHERE approve = 1')->fetchColumn() / $per_page),
      );

      return $results;
    } catch (PDOException $e) {
      return array(
        "data" => null
      );
    }
  }

  public static function getNotApprovedComments()
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        SELECT * FROM comments
        WHERE `approve` = 0 AND `delete` = 0
        ORDER BY create_at DESC
      ');
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function updateCommentPermission($id)
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        UPDATE comments
        SET approve = 1
        WHERE id = :id
      ');
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function deleteComment($id)
  {
    try {
      $db = static::getDB();
      $stmt = $db->prepare('
        UPDATE comments
        SET `delete` = 1
        WHERE id = :id
      ');
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


}

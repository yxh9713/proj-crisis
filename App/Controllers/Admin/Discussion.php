<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\MDiscussion;

class Discussion extends \Core\Controller
{
  private $id;
  
  public function __construct ( $params ) {
    $this->id = (isset($params['id']) ? strtoupper($params['id']) : '');
  }

  protected function before()
  {
      // Make sure an admin user is logged in for example
      // return false;
  }

  /**
   * Show the index page
   *
   * @return void
   */
  public function indexAction()
  {
    echo 'Discussion index';
  }


  public function editAction()
  {
    $comments = MDiscussion::getNotApprovedComments();

    View::render('Admin/editDiscussion.php', [
      'comments' => $comments
    ]);
  }

  public function updateAction()
  {
    $result = MDiscussion::updateCommentPermission($_POST['id']);
    echo ($result) ? $this->json_response('success', 200) : $this->json_response('fail', 400);
  }

  public function deleteAction()
  {
    $result = MDiscussion::deleteComment($_POST['id']);
    echo ($result) ? $this->json_response('success', 200) : $this->json_response('fail', 400);
  }


}

<?php

namespace App\Controllers;

use \Core\View;
use App\Models\MDiscussion;

class Discussion extends \Core\Controller
{
  protected function before()
  {
    // return false;
  }

  public function postAction()
  {
    $result = MDiscussion::postComment($_POST);
    echo ($result['status']) ? $this->json_response('success', 200) : $this->json_response($result['message'], 400);
  }

  public function editAction()
  {

  }
}

<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Country;
use App\Models\Pin;

class Pins extends \Core\Controller
{
  private $country;
  
  public function __construct ( $params ) {
    $this->country = isset($params['id']) ? $params['id'] : '1';
  }

  /**
   * Before filter
   *
   * @return void
   */
  protected function before()
  {
      // Make sure an admin user is logged in for example
      // return false;
  }

  public function addAction()
  {
    $countries = Country::getAllCountries();

    View::render('Admin/newPin.php', [
      'countries' => $countries
    ]);
  }

  public function editAction()
  {
    $pins = Pin::getPins();
    
    View::render('Admin/editPin.php', [
      'pins' => $pins
    ]);
  }

  public function postAction()
  {
    $result = Pin::postPin($_POST);
    echo ($result === true) ? $this->json_response('success', 200) : $this->json_response($result, 400);
  }

  public function deleteAction()
  {
    $result = Pin::deletePin($_POST['id']);
    echo ($result === true) ? $this->json_response('success', 200) : $this->json_response($result, 400);
  }

}

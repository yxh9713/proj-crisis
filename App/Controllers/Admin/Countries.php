<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Country;

class Countries extends \Core\Controller
{
  private $category;
  
  public function __construct ( $params ) {
    $this->category = (isset($params['id']) ? strtoupper($params['id']) : '');
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

  /**
   * Show the index page
   *
   * @return void
   */
  public function indexAction()
  {
      echo 'User admin index';
  }


  public function addAction()
  {
    View::render('Admin/newCountry.php', [
      'title'    =>  htmlspecialchars('<Dave>')
    ]);
  }

  public function postAction()
  {
    if(!isset($_POST['country-name'])) {
      die('Country name is required.');
    }
    
    $result = Country::postCountry($_POST['country-name']);
    echo ($result) ? $this->json_response('success', 200) : $this->json_response('fail', 400);
  }

  public function editAction()
  {
    $countries = Country::getCountriesByCategory($this->category);
    $categories = Country::getAllCategories();

    View::render('Admin/editCountry.php', [
      'countries' => $countries,
      'categories' => $categories,
      'categoryId' => $this->category
    ]);
  }

  public function updateAction()
  {
    // if(!isset($_POST['country-name'])) {
    //   die('Country name is required.');
    // }
    
    $result = Country::updateCountry($_POST);
    echo ($result) ? $this->json_response('success', 200) : $this->json_response('fail', 400);
  }

  public function deleteAction()
  {
    $result = Country::deleteCountry($_POST['id']);
    echo ($result) ? $this->json_response('success', 200) : $this->json_response('fail', 400);
  }


}

<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Country;
use App\Models\Event;

class Events extends \Core\Controller
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

  public function indexAction()
  {
      echo 'User admin index';
  }

  public function addAction()
  {
    $countries = Country::getAllCountries();

    View::render('Admin/newEvent.php', [
      'countries' => $countries
    ]);
  }

  public function editAction()
  {
    $countries = Country::getAllCountries();
    $events = Event::getEventsByCountry($this->country);
    
    View::render('Admin/editEvent.php', [
      'countries' => $countries,
      'events' => $events,
      'countryId' => $this->country
    ]);
  }

  public function postAction()
  {
    $result = Event::postEvent($_POST);
    echo ($result) ? $this->json_response('success', 200) : $this->json_response('fail', 400);
  }

  public function updateAction()
  {
    $result = Event::updateEvent($_POST);
    echo ($result) ? $this->json_response('success', 200) : $this->json_response('fail', 400);
  }

  public function deleteAction()
  {
    $result = Event::deleteEvent($_POST['id']);
    echo ($result) ? $this->json_response('success', 200) : $this->json_response('fail', 400);
  }

  public function updateonmenuAction()
  {
    $result = Event::updateOnMenuStatus($_POST);
    echo ($result) ? $this->json_response('success', 200) : $this->json_response('fail', 400);
  }

}

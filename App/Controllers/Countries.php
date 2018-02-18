<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Country;
use App\Models\Event;

class Countries extends \Core\Controller
{
    private $country_id;
  
    public function __construct ( $params ) {
        $this->country_id = isset($params['id']) ? strtoupper($params['id']) : 1;
    }

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        $this->renderData['navNames'] = Country::getNav();
        $this->renderData['navCategories']= Country::getAllCategories();
        $this->renderData['navSubheads']= Event::getEligibleSubheads();
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
    }

    public function postAction()
    {        
        echo 'post';
    }

    public function eventAction()
    {
        $this->renderData['country'] = Country::getCountryById($this->country_id);
        $this->renderData['events'] = Event::getEventsByCountry($this->country_id);
        $this->renderData['id'] = $this->country_id;
        View::render('Home/events.php', $this->renderData);
        // View::renderTemplate('Home/index.html', [
        //     'name'    => 'Dave',
        //     'colours' => ['red', 'green', 'blue']
        // ]);
    }
}

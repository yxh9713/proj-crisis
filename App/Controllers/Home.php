<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Country;
use App\Models\Event;
use App\Models\MDiscussion;
/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{
    protected $renderData = [];
    protected $params;

    public function __construct ( $params ) {
        $this->params = $params;
    }

    protected function before()
    {
        $this->renderData['navNames'] = Country::getNav();
        $this->renderData['navCategories']= Country::getAllCategories();
        $this->renderData['navSubheads']= Event::getEligibleSubheads();
        //echo "(before) ";
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
        View::render('Home/index.php', $this->renderData);
    }

    public function aboutAction()
    {
        View::render('Home/about.php', $this->renderData);
    }

    public function discussionAction()
    {
        $this->renderData['title'] = 'Discussion';
        $this->renderData['page'] = $this->params['page'];
        $this->renderData['comments'] = MDiscussion::getComments($this->params['page']);
        View::render('Home/discussion.php', $this->renderData);
    }

    public function contactAction()
    {
        $this->renderData['title'] = 'Contact';
        View::render('Home/contact.php', $this->renderData);
    }

    public function postAction()
    {
        $cs = Country::getAllCountries();

        foreach($cs as $c) {
            $n =  strtolower($c['name']);
            $n = preg_replace("/\([^)]+\)/","",$n);
            echo $c['id'] .'-'. $n . '<br />';
        }
        
        // View::renderTemplate('Home/index.html', [
        //     'name'    => 'Dave',
        //     'colours' => ['red', 'green', 'blue']
        // ]);
    }

}

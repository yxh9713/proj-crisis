<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Country;
/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{
    protected $renderData = [];
    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        $this->renderData['navNames'] = Country::getNav();
        $this->renderData['navCategories']= Country::getAllCategories();
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
        View::render('Home/discussion.php', $this->renderData);
    }

    public function contactAction()
    {
        View::render('Home/about.php', $this->renderData);
    }

    public function postAction()
    {        
        echo 'post';

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

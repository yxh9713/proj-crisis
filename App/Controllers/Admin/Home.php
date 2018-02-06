<?php

namespace App\Controllers\Admin;

use \Core\View;
use \Core\Helper;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{
  private $helper;

  public function __construct ( $params ) {
    $this->helper = new Helper();
  }
    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
      $this->helper->redirectTo('/admin/countries/add');
        // echo "(before) ";
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
      echo 1;
    }
}

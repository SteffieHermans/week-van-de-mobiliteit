<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';

class PagesController extends Controller {

  public function index() {
    $this->set('title', 'Home');
    $this->set('currentPage', 'home');
  }

  public function overDeWeek() {
    $this->set('title', 'Over de Week');
    $this->set('currentPage', 'overDeWeek');
  }

  public function overDeActies() {
    $this->set('title', 'Over de Acties');
    $this->set('currentPage', 'overDeActies');
  }

  public function nieuws() {
    $this->set('title', 'Nieuws');
    $this->set('currentPage', 'nieuws');
  }

}

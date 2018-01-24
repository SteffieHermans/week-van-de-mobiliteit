<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';
require_once WWW_ROOT . 'dao' . DS . 'TagDAO.php';

class EventsController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
    $this->tagDAO = new TagDAO();
  }

  public function index() {
    $conditions = array();

    if (!empty($_POST)) {
      if($_POST['action'] = 'filter'){
        if(!empty($_POST['tag'])){
          $conditions[] = array(
            'field' => 'tag',
            'comparator' => 'like',
            'value' => $_POST['tag']
          );
        }
        if(!empty($_POST['day'])){
          $conditions[] = array(
            'field' => 'start',
            'comparator' => '<=',
            'value' => $_POST['day'] . ' 23:59:59'
          );
          $conditions[] = array(
            'field' => 'end',
            'comparator' => '>=',
            'value' => $_POST['day'] . ' 00:00:00'
          );
        }
        if(!empty($_POST['city'])){
          $conditions[] = array(
            'field' => 'city',
            'comparator' => 'like',
            'value' => $_POST['city']
          );
        }
      }
    }

    $events = $this->eventDAO->search($conditions);
    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      header('Content-Type: application/json');
      echo json_encode($events);
      exit();
    }

    $tags = $this->tagDAO->selectAll();

    $this->set('events', $events);
    $this->set('tags', $tags);
    $this->set('title', 'Programma');
    $this->set('currentPage', 'programma');
  }

}

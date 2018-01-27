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

  public function detail(){
    if (!empty($_GET['id'])) {
      $event = $this->eventDAO->selectById($_GET['id']);
    }
    if (empty($event)) {
      header('Location: index.php');
      exit();
    }

    $conditions = array();
    $conditionList = '';

    if($event['postal'] == '8500' || $event['postal'] == '8000' || $event['postal'] == '8900' || $event['postal'] == '9100') {
      $conditionList = '8000, 8500, 8900, 9100';
    } else if($event['postal'] == '1170' || $event['postal'] == '1020' || $event['postal'] == '1210' || $event['postal'] == '1050'){
      $conditionList = '1020, 1050, 1170, 1210, 1000';
    } else if(empty($event['postal'])){
      $conditions[] = array(
        'field' => 'postal',
        'comparator' => '=',
        'value' => '1000'
      );
    } else {
      $conditions[] = array(
        'field' => 'postal',
        'comparator' => '=',
        'value' => $event['postal']
      );
    }

    $conditions[] = array(
      'field' => 'code',
      'comparator' => '!=',
      'value' => $event['code']
    );

    if(!empty($conditionList)){
      $similars = $this->eventDAO->searchUpToThree($conditions, $conditionList);
    } else {
      $similars = $this->eventDAO->searchUpToThree($conditions);
    }

    $this->set('event', $event);
    $this->set('similars', $similars);
    $this->set('title', $event['title']);
    $this->set('currentPage', 'event-detail');
  }

}

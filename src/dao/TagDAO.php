<?php
require_once __DIR__ . '/DAO.php';
class TagDAO extends DAO {

  public function selectAll() {
    $sql = "SELECT * FROM `ma3_auto_tags`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}

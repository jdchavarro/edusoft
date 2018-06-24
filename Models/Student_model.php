<?php
class Student_model
{
  private $db;

  function __construct() {
    require_once CTR.'QueryManager.php';
    $this->db = new QueryManager("localhost", "root", "", "edusoft");
  }

  public function getActividades($attr, $where) {
    return $this->db->selectWhere($attr, 'activities', $where);
  }
}
?>
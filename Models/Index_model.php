<?php
class Index_model
{
  private $db;

  function __construct()
  {
    require_once CTR.'QueryManager.php';
    $this->db = new QueryManager("localhost", "root", "", "edusoft");
  }

  public function userInformation($attributes, $where)
  {
    return $this->db->selectWhere($attributes, "users", $where)[0];
  }
}
?>
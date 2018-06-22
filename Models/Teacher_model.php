<?php
class Teacher_model
{
  private $db;

  function __construct()
  {
    require_once CTR.'QueryManager.php';
    $this->db = new QueryManager("localhost", "root", "", "edusoft");
  }

  public function studentsInformationOrder($attributes, $where, $order)
  {
    return $this->db->selectWhereOrder($attributes, "users", $where, $order);
  }

  public function studentInformation($attributes, $where)
  {
    return $this->db->selectWhere($attributes, "users", $where)[0];
  }

  public function userRegister($array) {
    return $this->db->insert('users', $array);
  }

  public function userUpdate($array, $where) {
    return $this->db->update('users', $array, $where);
  }

  public function userDelete($where) {
    return $this->db->delete('users', $where);
  }

  public function conceptosInformationOrder($attributes, $order) {
    return $this->db->selectOrder($attributes, "conceptos", $order);
  }

  public function conceptoInformation($attributes, $where) {
    return $this->db->selectWhere($attributes, "conceptos", $where)[0];
  }

  public function conceptoRegister($array) {
    return $this->db->insert('conceptos', $array);
  }

  public function conceptoUpdate($array, $where) {
    return $this->db->update('conceptos', $array, $where);
  }

  public function conceptoDelete($where) {
    return $this->db->delete('conceptos', $where);
  }

  public function exerciseInformation($attributes, $where)
  {
    return $this->db->selectWhere($attributes, "exercises", $where)[0];
  }

  public function responsesInformation($attributes, $where)
  {
    return $this->db->selectWhere($attributes, "responses", $where);
  }

  public function exercisesInformationOrder($attributes, $order) {
    return $this->db->selectOrder($attributes, "exercises", $order);
  }

  public function exerciseRegister($array) {
    return $this->db->insert('exercises', $array);
  }

  public function responsesRegister($array) {
    return $this->db->insert('responses', $array);
  }

  public function exerciseUpdate($array, $where) {
    return $this->db->update('exercises', $array, $where);
  }

  public function responsesDelete($where){
    return $this->db->delete('responses', $where);
  }

  public function exerciseDelete($where) {
    return $this->db->delete('exercises', $where);
  }
}
?>
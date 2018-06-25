<?php
class Student_model
{
  private $db;

  function __construct() {
    require_once CTR.'QueryManager.php';
    $this->db = new QueryManager("localhost", "root", "", "edusoft");
  }

  public function getActivities($attr, $where) {
    return $this->db->selectWhere($attr, 'activities', $where);
  }

  public function getActivitiesStudent($attr, $where) {
    return $this->db->selectWhere($attr, 'student_activities', $where);
  }

  public function getExercisesActivity($attr, $where){
    return $this->db->selectWhere($attr, 'activity_has_exercises', $where);
  }

  public function getExercises($attr){
    return $this->db->select($attr, 'exercises');
  }

  public function getResponses($attr){
    return $this->db->select($attr, 'responses');
  }

  public function getConceptos($attr){
    return $this->db->select($attr, 'conceptos');
  }

  public function getStudents($attr){
    return $this->db->selectWhere($attr, 'users', "rol='student'");
  }

  public function getStudentActivities($attr){
    return $this->db->select($attr, 'student_activities');
  }

  public function responseRegister($array) {
    return $this->db->insert('student_responses', $array);
  }
}
?>
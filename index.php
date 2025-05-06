<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Students.controller.php");

$students = new StudentsController();

if(!empty($_GET['id_hapus'])) {
  $id = $_GET['id_hapus'];
  $students->delete($id);
}
else {
  $students->index();
}
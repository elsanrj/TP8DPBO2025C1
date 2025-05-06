<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Students.controller.php");

$students = new StudentsController();

if (isset($_POST['add'])) {
  $data = $_POST;
  $students->add($data);
}
else if (isset($_POST['update'])) {
  $data = $_POST;
  $students->edit($data);
}
else if(!empty($_GET['id_edit'])) {
  $id = $_GET['id_edit'];
  $students->form_edit($id);
}
else {
  $students->form_add();
}
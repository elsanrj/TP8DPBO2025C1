<?php
include_once("connection.php");
include_once("models/Students.class.php");
include_once("views/Index.view.php");
include_once("views/Form.view.php");

class StudentsController
{
  // Properti kontroller
  private $students;

  // Konstruktor
  function __construct()
  {
    $this->students = new Students(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
  }

  // Method umum
  public function index()
  {
    // Membuka jalur ke database
    $this->students->open();

    // Meneruskan request dari view
    $this->students->getStudents();

    // Inisiasi variabel berbentuk array untuk menyimpan kedua data table
    $data = array(
      'students' => array()
    );

    // Push 1 per 1 data yang berbentuk objek dan diteruskan ke variabel yg telah dibuat sebelumnya
    while ($row = $this->students->getResult()) {

      array_push($data['students'], $row);
    }

    // Menutup jalur
    $this->students->close();

    // Inisiasi variable untuk memanggil kelas views dan meneruskan datanya
    $view = new IndexView();
    $view->render($data);
  }
  
  public function form_add() {
    // Inisiasi variable untuk memanggil kelas views dan meneruskan datanya
    $data = NULL;
    $view = new FormView();
    $view->render($data);
  }

  public function form_edit($id) {
    
    // Membuka jalur ke database
    $this->students->open();

    // Meneruskan request dari view
    $this->students->findStudents($id);

    // Inisiasi variabel berbentuk array untuk menyimpan kedua data table
    $data = array(
      'students' => array()
    );

    // Push 1 per 1 data yang berbentuk objek dan diteruskan ke variabel yg telah dibuat sebelumnya
    while ($row = $this->students->getResult()) {

      array_push($data['students'], $row);
    }

    // Menutup jalur
    $this->students->close();
  
    $view = new FormView();
    $view->render($data);
  }

  function add($data)
  {
    // Lengkapin controller untuk melakukan add data
    $this->students->open();
    $this->students->add($data);
    $this->students->close();

    header("location:index.php");
  }

  function edit($data)
  {
    // Lengkapin controller untuk melakukan edit data
    $this->students->open();
    $this->students->update($data);
    $this->students->close();

    header("location:index.php");
  }

  function delete($id)
  {
    // Lengkapin controller untuk melakukan delete data
    $this->students->open();
    $this->students->delete($id);
    $this->students->close();

    header("location:index.php");
  }
}

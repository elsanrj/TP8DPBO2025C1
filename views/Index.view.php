<?php

class IndexView
{
  public function render($data)
  {
    $no = 1;
    $dataStudents = null;
    foreach ($data['students'] as $val) {
      list($id, $name, $nim, $phone, $join_date) = $val;
      $dataStudents .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $nim . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>";
      $dataStudents .= "
                <td>
                  <a href='form.php?id_edit=" . $id .  "' class='btn btn-warning mb-2 mb-md-0 mb-lg-0 mb-xl-0' '>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";
      $dataStudents .= "</tr>";
    }

    $tpl = new Template("templates/index.html");

    $tpl->replace("DATA_TABEL", $dataStudents);
    $tpl->write();
  }
}

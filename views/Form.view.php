<?php

class FormView
{
  public function render($data)
  {
    $tpl = new Template("templates/form.html");
    
    $header = NULL;
    $judul = NULL;
    $submit_name = NULL;
    $s_id = "";
    $s_name = "";
    $s_nim = "";
    $s_phone = "";
    $s_join = "";
    
    if(isset($data)) 
    {
        $header = '<div class="card-header bg-warning">
          <h1 class="text-white text-center"> Update Student </h1>
        </div><br>';
        $judul = "Edit";
        $submit_name = "update";
        foreach ($data['students'] as $val) {
            list($id, $name, $nim, $phone, $join_date) = $val;
            $s_id = $id;
            $s_name = $name;
            $s_nim = $nim;
            $s_phone = $phone;
            $s_join = $join_date;
        }
    }
    else
    {
        $header = '<div class="card-header bg-primary">
          <h1 class="text-white text-center"> Create Student</h1>
        </div><br>';
        $judul = "Tambah";
        $submit_name = "add";
    }
    
    $tpl->replace("HEADER_FORM", $header);
    $tpl->replace("JUDUL", $judul);
    $tpl->replace("SUBMIT_NAME", $submit_name);
    $tpl->replace("PH_ID", $s_id);
    $tpl->replace("PH_NAME", $s_name);
    $tpl->replace("PH_NIM", $s_nim);
    $tpl->replace("PH_PHONE", $s_phone);
    $tpl->replace("PH_JOIN", $s_join);

    $tpl->write();
  }
}

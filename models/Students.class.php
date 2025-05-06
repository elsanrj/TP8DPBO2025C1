<?php

class Students extends DB
{
    function getStudents()
    {
        $query = "SELECT * FROM students";
        return $this->execute($query);
    }
    function findStudents($id)
    {
        $query = "SELECT * FROM students WHERE id = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        // Lengkapi Query
        $students_name = $data['name'];
        $students_nim = $data['nim'];
        $students_phone = $data['phone'];
        $students_join_date = $data['join_date'];

        $query = "INSERT INTO students values ('', '$students_name', '$students_nim', '$students_phone', '$students_join_date')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {
        // Lengkapi Query
        $students_id = $data['id'];;
        $students_name = $data['name'];
        $students_nim = $data['nim'];
        $students_phone = $data['phone'];
        $students_join_date = $data['join_date'];

        $query = "UPDATE students SET name = '$students_name', nim = '$students_nim', phone = '$students_phone', join_date = '$students_join_date' WHERE id = $students_id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        // Lengkapi Query
        $query = "DELETE from students WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

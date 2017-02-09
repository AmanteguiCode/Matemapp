<?php

class Classroom
{
    private $id;
    private $name;
    private $code;
    private $teacher;
    private $students;
    private $description;

    public function __construct($id, $name, $code, $teacher, $students, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->teacher = $teacher;
        $this->fillStudents($students);
        $this->description = $description;
    }

    private function insertIntoDb()
    {
        $result = insertQuery("classroom", "name, code, description, teacher", "{$this->name},{$this->code},{$this->description},{$this->teacher}", connect());

        $this->id = setQuery("id", "classroom", "code='{$this->code}'", connect())[0]['id'];

        return $result;
    }

    function fillStudents($query)
    {
        if ($query != false)
            for ($i = 0; $i < count($query); $i++)
                $this->students[$i] = new Student($query[$i]['username'], true);
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function setCode($code)
    {
        if (updateQuery("code", $code, "classroom", "code='{$this->code()}'", connect()) != false) {
            $this->code = $code;
        }
    }

    public function getStudent($username)
    {
        foreach ($this->students as $student)
            if ($student->username() == $username) return $student;
        return false;
    }

    public function code()
    {
        return $this->code;
    }

    public function teacher()
    {
        return $this->teacher;
    }

    public function students()
    {
        return $this->students;
    }

    public function studentsNumber()
    {
        return count($this->students);
    }

    public function description()
    {
        return $this->description;
    }

    public function newStudent($username)
    {
        insertQuery("student_classroom", "username, id_classroom", "{$username}, {$this->id}", connect());
        $query = setQuery("unit_id, SUM(visible)", "classroom_didactic", "classroom_id={$this->id} GROUP BY unit_id" , connect());
        for ($i = 0; $query != false && $i < count($query); $i++) {
            $isVisible = $query[$i]['SUM(visible)'] > 0 ? 1 : 0;
            insertQuery("classroom_didactic", "classroom_id, username, unit_id, visible", "{$this->id}, {$username}, {$query[$i]['unit_id']}, {$isVisible}" , connect());
        }
    }

    public static function create($name, $code, $teacher, $description)
    {
        $classroom = new Classroom(null, $name, $code, $teacher, null, $description);
        $classroom->insertIntoDb();

        return $classroom;
    }

    public static function exists($code)
    {
        return !(setQuery("*", "classroom", "code='{$code}'", connect()) == false);
    }

    public static function hasStudent($username, $id)
    {
        return !(setQuery("*", "student_classroom", "id_classroom='{$id}' AND username='{$username}'", connect()) == false);
    }

    public static function getClassroom($code)
    {
        $gdb = connect();

        $query = setQuery("*", "classroom", "code='{$code}'", $gdb);
        $queryStudents = setQuery("username", "student_classroom", "id_classroom={$query[0]['id']}", $gdb);

        if ($query != false)
            return new Classroom($query[0]['id'], $query[0]['name'], $query[0]['code'], $query[0]['teacher'], $queryStudents, $query[0]['plan'], $query[0]['description']);
        else
            return false;
    }

}

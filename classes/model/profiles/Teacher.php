<?php

class Teacher extends User
{

    private $classrooms = null;

    private $actualClassroom = null;

    public function __construct($username)
    {
        parent::__construct($username);
        $this->buildClassrooms();
    }

    private function buildClassrooms()
    {
        $classroom = null;
        $queryClassroom = setQuery("*", "classroom", "teacher='{$this->username()}'", connect());
        for ($i = 0; $queryClassroom != false && $i < count($queryClassroom); $i++) {
            $queryStudents = setQuery("user.*", "student_classroom, user", "id_classroom={$queryClassroom[$i]['id']} AND student_classroom.username=user.username", connect());
            $classroom[$i] = new Classroom($queryClassroom[$i]['id'], $queryClassroom[$i]['name'], $queryClassroom[$i]['code'], $queryClassroom[$i]['teacher'], ($queryStudents == false ? null : $queryStudents), $queryClassroom[$i]['description']);
        }
        $this->classrooms = $classroom;
    }

    public function classroom($classroom)
    {
        foreach ($this->classrooms as $class) {
            if ($classroom == $class) return $class;
        }
    }

    public function classroomId($id)
    {
        foreach ($this->classrooms as $classroom) {
            if ($classroom->id() == $id) return $classroom;
        }
        return false;
    }

    public function actualClassroom($id = -1)
    {
        if ($id == -1) return $this->actualClassroom;

        $this->actualClassroom = $this->classroomId($id);
    }

    public function classrooms()
    {
        return $this->classrooms;
    }

    public function addClassroom($classroom)
    {
        $this->classrooms[] = $classroom;
    }

    public static function create($name, $username, $email, $password)
    {
        if (insertQuery("user", "name, username, email, password, isTeacher", "{$name}, {$username}, {$email}, {$password}, 1", connect()) != false) {
            return new Teacher($username);
        } else {
            return false;
        }
    }

    public function drawNavigation()
    {
        if (strpos(getCurrentPage(), "classroom_detail.php") != false)
            return $this->drawClassroomNavigation();

        $drawer = new Drawer();

        $drawer->newLineWithGoogleIcon("../init/index.php", "home", "Inicio");

        $drawer->startPresentation("../classroom/classroom.php");
        $drawer->html("Mis aulas");
        $drawer->finishA();


        $drawer->startUL(2);

        if (count($this->classrooms) != 0) {
            foreach ($this->classrooms as $classroom) {
                $drawer->newLine("../classroom/classroom_detail.php?id={$classroom->id()}", $classroom->name());
            }
        } else {
            $drawer->newLine("#", "No tienes aulas.");
        }

        $drawer->finishUL();

        $drawer->finishPresentation();

        $drawer->newLineWithGoogleIcon("../profile/profile.php", "assignment_ind", "Perfil");

        $drawer->newLineWithHTML5Icon("../login/login.php", "sign-out", "Salir");

        return $drawer->draw();

    }

    public function drawClassroomNavigation()
    {

        $drawer = new Drawer();

        $drawer->newLineWithGoogleIcon("../init/index.php", "home", "Inicio");

        $drawer->newLineWithGoogleIcon("#equations", "videogame_asset", "Ecuaciones");

        $drawer->newLineWithGoogleIcon("#didactics-units", "library_books", "Unidades didácticas");

        $drawer->newLineWithGoogleIcon("#classroom", "info", "Detalles");
        $drawer->newLineWithHTML5Icon("#students", "users", "Alumnos");
        $drawer->newLineWithGoogleIcon("#preferences", "settings", "Preferencias");
        $drawer->newLineWithGoogleIcon("#code", "lock", "Código");


        return $drawer->draw();
    }

    public function sync()
    {
        $this->buildClassrooms();
        if ($this->actualClassroom != null){
            $this->actualClassroom($this->actualClassroom->id());
        }
        parent::syncCommonData();
    }


}
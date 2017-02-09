<?php


class Student extends User{
    private $classroom = null;

    private $actualClassroom = null;

    public function __construct($username, $fromClassroom = false)
    {
        parent::__construct($username);
        if (!$fromClassroom)
            $this->buildClassroom();
    }

    private function buildClassroom()
    {
        $queryClassroom = setQuery("classroom.*", "classroom, student_classroom", "student_classroom.username='{$this->username()}' AND classroom.id=student_classroom.id_classroom", connect());
        $classroom = null;
        if ($queryClassroom != false) {
            $queryStudents = setQuery("user.*", "student_classroom, user", "id_classroom={$queryClassroom[0]['id']} AND student_classroom.username=user.username", connect());
            $classroom = new Classroom($queryClassroom[0]['id'], $queryClassroom[0]['name'], $queryClassroom[0]['code'], $queryClassroom[0]['teacher'], ($queryStudents == false ? null : $queryStudents), $queryClassroom[0]['description']);
        }
        $this->classroom = $classroom;
    }

    public function classroom($classroom = null)
    {
        if ($classroom == null) return $this->classroom;

        $this->sync();
    }

    public function setName($name)
    {
        parent::setName($name);
        $this->sync();
    }

    function actualClassroom($id = -1)
    {
        if ($id == -1) return $this->actualClassroom;

        $this->actualClassroom = $this->classroom;
    }

    public function drawNavigation(){
        if (strpos(getCurrentPage(), "classroom_detail.php") != false)
            return $this->drawClassroomNavigation();
        if (strpos(getCurrentPage(), "play.php") != false)
            return $this->drawPlayNavigation();
        if (strpos(getCurrentPage(), "game.php") != false)
            return $this->drawGameNavigation();

        $drawer = new Drawer();

        $drawer->newLineWithGoogleIcon("../init/index.php", "home", "Inicio");

        $drawer->newLineWithGoogleIcon("../play/play.php", "videogame_asset", "Jugar");

        $classroomURL = $this->classroom() != null ? "'../classroom/classroom_detail.php?id={$this->classroom()->id()}" : "\"data-toggle=\"modal\" data-target=\"#class";

        $drawer->newLineWithGoogleIcon($classroomURL, "school", "Mi aula");

        $drawer->newLineWithHTML5Icon("../profile/profile.php", "trophy", "Perfil");

        $drawer->newLineWithHTML5Icon("../login/login.php", "sign-out", "Salir");

        return $drawer->draw();

    }

    private function drawClassroomNavigation(){
        $drawer = new Drawer();

        $drawer->newLineWithGoogleIcon("../init/index.php", "home", "Inicio");

        $drawer->newLineWithGoogleIcon("#equations", "videogame_asset" , "Ecuaciones");

        $drawer->newLineWithGoogleIcon("#didactics-units", "library_books", "Unidades didácticas");


        $drawer->newLineWithHTML5Icon("#students", "users" , "Compañeros");
        $drawer->newLineWithGoogleIcon("#ranking-competitivo", "assignment" , "Ranking de duelos");
        $drawer->newLineWithGoogleIcon("#ranking-cooperativo", "assignment" , "Ranking en equipo");

        return $drawer->draw();
    }

    private function drawPlayNavigation()
    {
        $drawer = new Drawer();

        $drawer->newLineWithGoogleIcon("../init/index.php", "home", "Inicio");


        $drawer->startPresentation("#");
        $drawer->html("Individual");
        $drawer->finishA();
        $drawer->startUL(2);


        $drawer->newLineWithGoogleIcon("#", "filter_1" , "Fácil", "submitForm(0," . rand(2, 4) . ")");
        $drawer->newLineWithGoogleIcon("#", "filter_2" , "Normal", "submitForm(1," . rand(2, 4) . ")");
        $drawer->newLineWithGoogleIcon("#", "filter_3" , "Medio", "submitForm(2," . rand(2, 5) . ")");
        $drawer->newLineWithGoogleIcon("#", "filter_4" , "Difícil", "submitForm(3," . rand(2, 5) . ")");
        $drawer->newLineWithGoogleIcon("#", "filter_5" , "Muy Difícil", "submitForm(4," . rand(2, 6) . ")");
        $drawer->newLineWithHTML5Icon("#", "random", "Aleatorio", "submitForm(" . rand(0, 4) . "," . rand(2, 6) . ")");

        $drawer->finishUL();

        $drawer->newLineWithGoogleIcon("#cooperative-modal", "group_work" , "Cooperativo", "$(\"#cooperative-modal\").modal()");


        return $drawer->draw();
    }


    private function drawGameNavigation()
    {
        $drawer = new Drawer();

        $function = isset($_SESSION['duel']) ? "location.reload()" : "submitForm({$_POST['mode']}, {$_POST['terms']})";

        $drawer->newLineWithGoogleIcon("#", "restore" , "Empezar de nuevo", $function);
        $drawer->newLineWithGoogleIcon("play.php", "delete_sweep" , "Terminar");

        return $drawer->draw();

    }

    public function sync()
    {
        $this->buildClassroom();
        parent::syncCommonData();
    }
}
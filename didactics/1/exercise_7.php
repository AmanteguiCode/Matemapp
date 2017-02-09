<link rel="stylesheet" href="1/css/exercise_7.css">
<script src="1/js/exercise_7.js"></script>
<div id="text" class="text-center">
    <h1>Ayuda a los niños</h1>

    <h3>Cuando te acercas escuchas a 2 niños, Borja y Alba, "revoloteando" en la casita de madera, están discutiendo porque tienen una sabrosa comida y no saben cómo
        repartirla para que ambos coman la misma cantidad.</h3>
    <h3>Tienen 60 gramos de esa rica comida, Alba ya tiene 30 gramos y quedan bolsas de comida de 5 gramos cada una, </h3>
    <h3>¿Cuántas bolsas tienes que darle a Borja para
        repartir la comida de forma equitativa?</h3>
    <div class="question-1">
        <h3>¡Fíjate!</h3>
        <h3>X es el número de bolsas que tienes que darle a Borja.</h3>
        <h3>Los 60 gramos es el total de la comida de la cuál Alba ya tiene 30 gramos.</h3>
        <h3>¿Qué ecuación representa esta situación?</h3>
    </div>
    <div hidden class="question-2">
        <h3>¡Muy bien!</h3>
        <h3>Ahora que ya tienes la ecuación que representa el reparto equitativo de la cantidad de comida entre Borja y Alba, y sabes que tienen 60 gramos en total de esa rica comida, Alba ya tiene 30 gramos y quedan bolsas de comida de 5 gramos cada una.</h3>
        <h3>
            ¿Cuántas bolsas tienes que darle a Borja para repartir la comida de forma equitativa?
        </h3>
        <h3>
            Ahora debes encontrar la cantidad de bolsas que hay que darle a Borja.
        </h3>
    </div>
</div>
<div class="breather"></div>
<div class="text-center">
    <ul class="question-1 list-group col-xs-offset-4 col-xs-4">
        <li onclick="question_1(false)" class="list-group-item"><?php echo SpriteParser::EquationToSprite(Equation::parseEquation("30=60-2x")->toString()) ?></li>
        <li onclick="question_1(true)" class="list-group-item"><?php echo SpriteParser::EquationToSprite(Equation::parseEquation("60=30+5x")->toString()) ?></li>
        <li onclick="question_1(false)" class="list-group-item"><?php echo SpriteParser::EquationToSprite(Equation::parseEquation("30=60+5x")->toString()) ?></li>
        <li onclick="question_1(false)" class="list-group-item"><?php echo SpriteParser::EquationToSprite(Equation::parseEquation("60=30-2x")->toString()) ?></li>
    </ul>

    <div hidden class="question-2">
        <div class="text-center">
            <span onclick="question_1(true)"><?php echo SpriteParser::EquationToSprite(Equation::parseEquation("60=30+5x")->toString()) ?></span>
        </div>
        <div class="breather-lg"></div>
        <ul class="list-group col-xs-offset-4 col-xs-4">
            <li onclick="question_2(false)" class="list-group-item">4</li>
            <li onclick="question_2(false)" class="list-group-item">2</li>
            <li onclick="question_2(true)" class="list-group-item">6</li>
            <li onclick="question_2(false)" class="list-group-item">7</li>
        </ul>
    </div>

    <div class="breather-lg"></div>
    <div class="text-center">
        <button id="reset-button" class="btn btn-primary" onclick="reset()">Volver a empezar</button>
    </div>

    <div hidden>
        <?php include "controls.php"?>
    </div>

    <div hidden id="dialog" class="text-center">
        <h1>¡Bien!</h1>
        <h3>Ahora Borja tendrá 6 bolsas de 5 gramos cada una y podrá satisfacer su hambre.</h3>
        <h3>¡Qué bien sienta ayudar a los demás!</h3>
        <h3>¡Tras un trabajo bien hecho vuelves a casa sin ningún percance y muy alegre!</h3>
        <button class="btn btn-primary" onclick="finishUnit()">Volver a casa</button>
    </div>

    <div hidden id="finish-unit" class="text-center">
        <h1>¡Enhorabuena!</h1>
        <h3>Has completado la primera unidad didáctica, ¡Felicidades!</h3>
        <h3>Te esperan muchos más viajes. ¡Mucha suerte!</h3>

        <div class="breather"></div>

        <i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>

        <div class="breather"></div>

        <h1>Volviendo al aula...</h1>
    </div>
</div>

<script>
    function redirect() {
        sendData();
    }
</script>

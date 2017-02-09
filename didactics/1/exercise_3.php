<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="1/css/exercise_3.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="//rawgithub.com/briangonzalez/jquery.pep.js/master/src/jquery.pep.js"></script>
<script src="1/js/exercise_3.js"></script>
<style>
    .sprite-equation img{
        height: 30pt;
    }
</style>
<div class="text-center">
    <h1>¡Llena el condensador de flujo!</h1>
    <h4>Para poder encender la máquina necesitas llenar el depósito con 15cl.</h4>
    <h4>Tienes 7 tubos de 3cl. ¿Cuántos necesitas?</h4>
</div>
<div id="droppable-left" class="bg-blue drop-target text-center border-right elevated-3 col-xs-12 col-md-offset-4 col-md-4">
    <img style="height: 200px;" class="center-block" id="empty-pipe" src="1/img/pipe0.png" alt="15">
</div>
<div class="breather-lg"></div>
<div id="pipes" class="text-center">
    <img id="7" class="pipe" src="1/img/pipe3.png" alt="3">
    <img id="6" class="pipe" src="1/img/pipe3.png" alt="3">
    <img id="5" class="pipe" src="1/img/pipe3.png" alt="3">
    <img id="4" class="pipe" src="1/img/pipe3.png" alt="3">
    <img id="3" class="pipe" src="1/img/pipe3.png" alt="3">
    <img id="2" class="pipe" src="1/img/pipe3.png" alt="3">
    <img id="1" class="pipe" src="1/img/pipe3.png" alt="3">
</div>

<div class="breather-lg"></div>

<button class="btn btn-primary" onclick="checkAnswer()">Confirma tu respuesta</button>
<button class="btn btn-primary" onclick="reset()">Volver a empezar</button>

<div class="modal fade in" id="next-exercise" tabindex="-1" role="dialog" aria-labelledby="next-exerciseLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>¡Estupendo!</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h1>¡En marcha!</h1>
                    <h3>¡Oye!, ¿te has dado cuenta que sin querer hemos resuelto una ecuación?</h3>
                    <h3>Observa que en total necesitabas 15cl. y has colocado 5 tubos de 3cl. cada uno.</h3>
                    <h3>Según las tablas de multiplicar sabemos que 3 · 5 = 15</h3>
                    <h3>En un principio no sabiamos la cantidad de tubos que necesitabamos por lo que la ecuación sería:</h3>
                    <div class="sprite-equation">
                        <?php echo SpriteParser::EquationToSprite(Equation::parseEquation("3x=15")->toString()) ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer center-block">
                <?php
                include 'controls.php';
                ?>
            </div>
        </div>
    </div>
</div>

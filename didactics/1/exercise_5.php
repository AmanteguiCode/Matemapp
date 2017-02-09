<link rel="stylesheet" href="1/css/exercise_5.css">
<script src="1/js/exercise_5.js"></script>
<div class="text-center">
    <h1>¡Haz los deberes!</h1>
    <h3>La semana pasada en "Matemáticas gravitacionales" te propusieron un problema.</h3>
    <h3>Una nave tiene peso de sobra y necesita equilibrarse. </h3>
    <h3>Si la ecuación que describe el problema es la siguiente, ¿cuántas cajas tiene que soltar?</h3>
</div>

<div class="breather-lg"></div>

<div id="question-1" class="text-center">
    <div class="text-center sprite-equation">
        <?php echo SpriteParser::EquationToSprite(Equation::parseEquation("25=13+3x")->toString()) ?>
    </div>

    <br>

    <div class="breather-lg"></div>

    <button onclick="wrongAnswer(1)" class="btn btn-primary center-block">Pasar el 25 a la derecha restando</button>
    <br>
    <div class="breather"></div>
    <button onclick="rightAnswer(1)" class="btn btn-primary center-block">Pasar el 13 a la izquierda restando</button>
</div>

<div hidden id="question-2" class="text-center">
    <div class="text-center sprite-equation">
        <?php echo SpriteParser::EquationToSprite(Equation::parseEquation("25-13=3x")->toString()) ?>
    </div>
    <br>
    <img id="arrow" src="../img/arrow_down.png" alt="" class="img-responsive text-center center-block">
    <br>
    <div class="text-center sprite-equation">
        <?php echo SpriteParser::EquationToSprite(Equation::parseEquation("12=3x")->toString()) ?>
    </div>
    <div class="breather-lg"></div>
    <br>
    <button onclick="wrongAnswer(2)" class="btn btn-primary">Pasar el 12 a la derecha restando</button>
    <br>
    <div class="breather"></div>
    <button onclick="$('#next-exercise').modal()" class="btn btn-primary">Pasar el 3 a la izquierda dividiendo</button>
</div>

<div class="breather-lg"></div>

<div class="text-center">
    <button class="btn btn-primary" onclick="reset()">Volver a empezar</button>
</div>
<div class="modal fade in" id="wrong-1" tabindex="-1" role="dialog" aria-labelledby="wrong-1Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>¿Estás seguro?</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3>Si pasas el 25 a la derecha quedaría de la siguiente forma.</h3>
                    <div class="breather"></div>
                    <div class="text-center">
                        <h1 id="equation">0=13+3x-25</h1>
                    </div>
                    <h3>¿No crees que pasar el 13 al lado izquierdo junto con el 25 sería mejor idea?</h3>
                    <h3>Así, quedarían los términos sin "x" a la izquierda y con "x" a la derecha.</h3>
                </div>
            </div>
            <div class="modal-footer center-block">
                <a href="#" class="btn btn-primary" onclick="$('#wrong-1').modal('toggle')">Vaaale</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade in" id="wrong-2" tabindex="-1" role="dialog" aria-labelledby="wrong-2Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>¿Estás seguro?</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3>¡Si pasas el 12 a la derecha nos quedaremos como en el paso anterior!</h3>
                    <div class="breather"></div>
                    <div class="text-center">
                        <h1 id="equation">0=3x-12</h1>
                    </div>
                </div>
            </div>
            <div class="modal-footer center-block">
                <a href="#" class="btn btn-primary" onclick="$('#wrong-2').modal('toggle')">Vaaale</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade in" id="next-exercise" tabindex="-1" role="dialog" aria-labelledby="next-exerciseLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>¡Bieeen!</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="breather"></div>

                    <div class="text-center">
                        <h1 id="equation">12/3=x</h1>
                    </div>

                    <div class="breather"></div>

                    <h3>Si dividimos 12 entre 3 nos queda...</h3>

                    <div class="text-center">
                        <h1 id="equation">4=x</h1>
                    </div>

                    <div class="breather"></div>

                    <h3>Al pasar el 3 dividiendo a la izquierda podemos ver que a la nave le sobran 4 cajas</h3>
                    <h3>¡Ahora estamos listos para ir a clase de "Matematicas gravitacionales"!</h3>
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
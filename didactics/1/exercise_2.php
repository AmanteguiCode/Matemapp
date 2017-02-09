<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="1/css/exercise_2.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="//rawgithub.com/briangonzalez/jquery.pep.js/master/src/jquery.pep.js"></script>
<script src="1/js/exercise_2.js"></script>
<div class="text-center">
    <h1>¡Movamos la roca!</h1>
    <h4>La roca que bloquea la puerta tiene un peso 29</h4>
    <h4>La roca que hace contrapeso pesa 21</h4>
    <h4>¿Cuántas rocas, cuyo peso es 1, tienes que colocar para desbloquear la puerta?</h4>
</div>
<div id="droppable-left" class="col-xs-6 col-md-offset-3 col-md-3 bg-blue drop-target text-center border-right elevated-3">
    <h1>21</h1>
    <img style="height: 100px;" class="center-block" src="1/img/rock.png" alt="">
</div>
<div id="droppable-right" class="col-xs-6 col-md-3 bg-blue text-center border-left elevated-3" style="margin-top: 80px">
    <img style="height: 100px;" class="center-block" id="machine-rock" src="1/img/machine-rock4.png" alt="">
</div>

<div class="breather-lg"></div>
<div id="rocks" class="text-center">
    <img id="8" class="rock" src="1/img/rock.png" alt="1">
    <img id="7" class="rock" src="1/img/rock.png" alt="1">
    <img id="6" class="rock" src="1/img/rock.png" alt="1">
    <img id="5" class="rock" src="1/img/rock.png" alt="1">
    <img id="4" class="rock" src="1/img/rock.png" alt="1">
    <img id="3" class="rock" src="1/img/rock.png" alt="1">
    <img id="2" class="rock" src="1/img/rock.png" alt="1">
    <img id="1" class="rock" src="1/img/rock.png" alt="1">
</div>

<div class="breather-lg"></div>

<button class="btn btn-primary" onclick="checkAnswer()">Confirma tu respuesta</button>
<button class="btn btn-primary" onclick="reset()">Volver a empezar</button>

<div class="modal fade in" id="next-exercise" tabindex="-1" role="dialog" aria-labelledby="next-exerciseLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>¡Muy bien!</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h1>¡Has desbloqueado la puerta de la maquina del tiempo!</h1>
                    <img style="height: 226px;" src="1/img/machine_rock0.png" alt="">
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

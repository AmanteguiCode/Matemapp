<link rel="stylesheet" href="1/css/exercise_6.css">
<script src="1/js/exercise_6.js"></script>
<div class="text-center">
    <h1>¡Pon en marcha la máquina!</h1>
    <h3>Resuelve la siguiente ecuación para encender los motores.</h3>
</div>

<div class="breather-lg"></div>

<div id="equation" class="text-center">
    <div id="equation-data" class="text-center">
        <h1><span id="left-side">40</span>=<span id="right-side-0">30</span><span id="right-side-1">+5</span><span id="x">x</span></h1>
    </div>

    <div class="breather-lg"></div>

</div>
<div id="40-controller" class="col-xs-4 text-center">
    <h1>40</h1>
    <a onclick="moveLeft(40)" href="javascript:void(0)" class="btn btn-fab btn-sm bg-light-blue"><i class="icon material-icons">keyboard_arrow_left</i></a>
    <a onclick="moveRight(40)" href="javascript:void(0)" class="btn btn-fab btn-sm bg-light-blue"><i class="icon material-icons">keyboard_arrow_right</i></a>
</div>

<div id="30-controller" class="col-xs-4 text-center">
    <h1>30</h1>
    <a onclick="moveLeft(30)" href="javascript:void(0)" class="btn btn-fab btn-sm bg-light-blue"><i class="icon material-icons">keyboard_arrow_left</i></a>
    <a onclick="moveRight(30)" href="javascript:void(0)" class="btn btn-fab btn-sm bg-light-blue"><i class="icon material-icons">keyboard_arrow_right</i></a>
</div>

<div class="col-xs-4 text-center">
    <h1>5</h1>
    <a onclick="moveLeft(5)" href="javascript:void(0)" class="btn btn-fab btn-sm bg-light-blue"><i class="icon material-icons">keyboard_arrow_left</i></a>
    <a onclick="moveRight(5)" href="javascript:void(0)" class="btn btn-fab btn-sm bg-light-blue"><i class="icon material-icons">keyboard_arrow_right</i></a>
</div>

<div class="breather-lg"></div>

<div class="text-center">
    <button class="btn btn-primary" onclick="checkAnswer()">Confirma tu respuesta</button>
    <button class="btn btn-primary" onclick="reset()">Volver a empezar</button>
</div>

<div class="modal fade in" id="next-exercise" tabindex="-1" role="dialog" aria-labelledby="next-exerciseLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>¡Motor encendido!</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h1>Si dividimos 10 entre 5 nos queda...</h1>

                    <div class="text-center">
                        <h1>¡¡x=2!!</h1>
                    </div>

                    <div class="breather"></div>

                    <h1>¿A qué año quieres viajar?</h1>

                    <input style="background-color: #00BCD4" placeholder="<?php echo date("d/m/Y")?>" class="form-control" onchange="changeInput(0)" type="datetime" name="datetime" id="datetime">
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
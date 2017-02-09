<h1 class="text-center">¡¡¿¿1969??!!</h1>
<div class="text-center "><img src="<?php echo $_SESSION['user']->avatarURL(); ?>" alt=""></div>
<div class="breather"></div>
<h3>
    Tras obtener el periódico miras atentamente la portada, cuenta, que <a onclick="$('#explanation').modal()" href="#">Neil Alden Armstrong, Michael Collins y Buzz Aldrin</a> han llegado a la Luna...
    Espera... ¿A la Luna?, miras la fecha rápidamente y ¡te das cuenta de que estás en 1969!
</h3>

<h3>
    De repente recuerdas que llegaste tras chocar con tu máquina del tiempo y el espacio, por lo que vas en su búsqueda.
</h3>

<h3>
    Tras varias horas buscando por el lugar la encuentras en un descampado.
</h3>

<div>
    <img style="height: 200px;" class="img-responsive center-block" src="1/img/machine_rock4.png" alt="">
</div>

<div class="breather-lg"></div>
<h3 class="text-center">¡Vas a intentar mover la roca utilizando el método de la palanca!</h3>


<div class="modal fade in" id="explanation" tabindex="-1" role="dialog" aria-labelledby="explanationLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>Viaje a la luna, Apolo 11</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3>
                        Apolo 11 fue una misión espacial tripulada de Estados Unidos cuyo objetivo fue lograr que un ser humano caminara en la superficie de la Luna.
                        La misión se envió al espacio el 16 de julio de 1969, llegó a la superficie de la Luna el 20 de julio de ese mismo año.
                    </h3>
                    <h3>
                        El comandante Neil Armstrong fue el primer ser humano que pisó la superficie de nuestro satélite, el 21 de julio de 1969
                        seis horas y media después de haber alunizado.
                    </h3>
                    <h3>
                        El 24 de julio, los tres astronautas lograron un perfecto amerizaje en aguas del Océano Pacífico, poniendo fin a la misión.
                    </h3>
                </div>
            </div>
            <div class="modal-footer center-block">
                <a href="#" class="btn btn-primary" onclick="$('#explanation').modal('toggle')">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<h1 class="text-center">El Instituto del Tiempo</h1>
<div class="text-center "><img src="<?php echo $_SESSION['user']->avatarURL(); ?>" alt=""></div>
<div class="breather"></div>
<h3>
    Suena el despertador... son las 7 de la mañana, te levantas y te preparas para ir un nuevo día al Instituto
    del Tiempo donde aprendes sobre los viajes espacio-temporales.
</h3>

<h3>
    Como bien sabes, en el Instituto del Tiempo, las clases se componen de 6 horas en total, hoy el horario es el siguiente:
</h3>

<div class="text-center">
    <h3>Las dos primeras horas son de "Condensación astral"</h3>
    <h3>Las dos siguientes son de "El tiempo y su longitud"</h3>
    <h3>Las dos últimas son de "Matemáticas gravitacionales"</h3>
</div>

<h3>
    En "Condensación astral" te hablan acerca de las estrellas y su vida en el espacio. Nacen, brillan y mueren. Pero a lo largo de toda su vida
    ayudan a la creación de especies y a que estas <a onclick="$('#explanation').modal()" href="#">evolucionen.</a>
</h3>

<h3>
    En "El tiempo y su longitud" te enseñan que el tiempo es tan viejo como el mismo Universo, y que, cuando el Universo acabe, también estará ahí.
</h3>

<h3>
    Antes de que acabe la clase recuerdas una cosa... ¡¡No has acabado los deberes de "Matemáticas gravitacionales"!!
</h3>

<h3>
    Claro... con el viaje tan épico por 1969 se te había olvidado completamente el ejercicio, ¡hazlo antes de que empiece la clase!
</h3>

<div class="breather-lg"></div>

<div class="modal fade in" id="explanation" tabindex="-1" role="dialog" aria-labelledby="explanationLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>¡Charles Darwin!</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3><b>Charles Darwin</b> fue el fundador de la teoría de la evolución.</h3>
                    <h3>
                        También fue un naturalista inglés, reconocido por ser el científico más influyente
                        de los que plantearon la idea de la evolución biológica a través de la selección natural,
                        justificándola en su obra de 1859 El origen de las especies con numerosos ejemplos extraídos
                        de la observación de la naturaleza. Dijo que todas las especies de seres vivos han evolucionado
                        con el tiempo a partir de un antepasado común mediante un proceso denominado selección natural.
                    </h3>
                </div>
            </div>
            <div class="modal-footer center-block">
                <a href="#" class="btn btn-primary" onclick="$('#explanation').modal('toggle')">Cerrar</a>
            </div>
        </div>
    </div>
</div>
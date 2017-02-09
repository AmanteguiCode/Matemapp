<?php
$date = isset($_POST['additional-input-0']) && strlen($_POST['additional-input-0']) > 0 ? $_POST['additional-input-0'] : date("d/m") . "/41789";

$day = explode("/", $date)[0];
$month = explode("/", $date)[1];
$year = explode("/", $date)[2];
?>

    <h1 class="text-center">¡Viaje al <?php echo $year ?>!</h1>
    <div class="text-center "><img src="<?php echo $_SESSION['user']->avatarURL(); ?>" alt=""></div>
    <div class="breather"></div>

    <h3>¡Madre mía, qué aterrizaje tan brusco! Tendrás que practicar un poco más las ecuaciones de control de la
        máquina del tiempo.</h3>
<?php
if (intval($year) > 2147) {
    ?>

    <h3>¡Wooooow! ¿Qué lugar es este? El césped es de un rojo intenso y el cielo está teñido con un verde
        poco común.</h3>
    <h3>¿Qué son esas especies? ¡Te parece que estás en un videojuego! Hay hombres-gato, perros con alas, y otras muchas
        más especies muy extrañas y fascinantes.</h3>

    <?php
} else {
    ?>
    <h3>¡Wooooow! ¿Qué lugar es este? Hay unos árboles a los que le caen flores de color rosa, ¡preciosos!.
        También hay rocas enormes con formas muy extrañas, me pregunto si tendrán algún significado.</h3>
    <h3>¿Qué llevan esas personas en la cabeza? Son como una especie de gorros, no me extraña, ¡que calor hace aquí!</h3>
    <?php
}
?>
<h3>Todo es nuevo y no sabes exactamente a dónde ir, por lo que decides ponerte a caminar para explorar el terreno.</h3>
<h3>Te encuentras con un llano en el que hay varios árboles, te tumbas y disfrutas de la brisa y el sol del lugar.</h3>
<h3>Oyes algo a lo lejos, levantas la cabeza y divisas una casita de madera en lo alto de un árbol, decides ir a explorar ese árbol.</h3>
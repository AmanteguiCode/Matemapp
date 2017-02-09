<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Jugar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <link rel="stylesheet" href="../css/bootstrap/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="../css/bootstrap/material-bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript"
            src="https://cdn.rawgit.com/band-x-media/SASS-Material-Design-for-Bootstrap/master/dist/material-bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js"></script>
    <script>
        $(window).load(function () {
            $('head').append('<link rel="shortcut icon" type="image/png" href="../img/favicon.png">');
        });
    </script>
    <script src="../js/drawer.js"></script>
</head>
<body class="text-center">
<?php
$average = 0;
brecho("<h1>Generando con dificultad baja</h1>");
for ($i = 0; $i < 5; $i++) {
    $equation = (new EquationGenerator(4))->generate();
//    echo $equation->toString();
//    brecho("");
//    echo $equation->solution();
//    brecho("");
    $average += $equation->heuristic();
}
brecho($average / 5);
$average = 0;
brecho("<h1>Generando con dificultad normal</h1>");
for ($i = 0; $i < 5; $i++) {
    $equation = (new EquationGenerator(4, 1))->generate();
//    echo $equation->toString();
//    brecho("");
//    echo $equation->solution();
//    brecho("");
    $average += $equation->heuristic();
}
brecho($average / 5);
$average = 0;
brecho("<h1>Generando con dificultad media</h1>");
for ($i = 0; $i < 5; $i++) {
    $equation = (new EquationGenerator(4, 2))->generate();
//    echo $equation->toString();
//    brecho("");
//    echo $equation->solution();
//    brecho("");
    $average += $equation->heuristic();
}
brecho($average / 5);
$average = 0;
brecho("<h1>Generando con dificultad alta</h1>");
for ($i = 0; $i < 5; $i++) {
    $equation = (new EquationGenerator(4, 3))->generate();
//    echo $equation->toString();
//    brecho("");
//    echo $equation->solution();
//    brecho("");
    $average += $equation->heuristic();
}
brecho($average / 5);
$average = 0;
brecho("<h1>Generando con dificultad muy alta</h1>");
for ($i = 0; $i < 5; $i++) {
    $equation = (new EquationGenerator(4, 4))->generate();
//    echo $equation->toString();
//    brecho("");
//    echo $equation->solution();
//    brecho("");
    $average += $equation->heuristic();
}
brecho($average / 5);
$average = 0;
?>
</body>
</html>
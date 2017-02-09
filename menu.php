<?php
checkSession("../login/login.php");
include '../libs/head.php';
include '../modals.php';
$_SESSION['user']->sync();
?>
<script src="../js/drawer.js"></script>

<div id="overlay" class="navigation-drawer-overlay"></div>
<aside id="navigation-drawer"
       class="navigation-drawer navigation-drawer-fixed-left navigation-drawer-fixedleft navigation-drawer-default"
       role="navigation">
    <div class="wrapper">
        <div style="margin-top: 10px;" class="navigation-drawer-default text-center">
            <img width="140px" src="../img/MatemApp%20Logo.png"/>
            <p><?php echo $_SESSION['user']->name(); ?> </p>
        </div>
        <div class="navigation-drawer-divider"></div>
        <nav class="navigation-drawer-nav">

            <ul class="list-level-1">
                <?php
                echo $_SESSION['user']->drawNavigation();
                ?>
            </ul>

        </nav>

    </div>
</aside>
<nav id="app-bar" class="app-bar elevated-1 app-bar-static bg-red">
    <a class="navigation-drawer-toggle sidebar-toggle" href="#">
        <i class="icon icon-lg material-icons">menu</i>
    </a>

    <h1 class="title move-left"><span id="navbar-title"></span></h1>
    <i style="color: #eae367; position: absolute; right: 130px; top: 5px;" class="fa fa-trophy fa-3x"></i><span style="color: #000; position: absolute; right: <?php echo $_SESSION['user']->level() < 9 ? 145 : 142 ?>px; top: 5px;"><?php echo($_SESSION['user']->level() + 1) ?></span>
    <a href="../profile/profile.php"> <img id="top-avatar" height="50px" style="position: absolute; right: <?php echo($_SESSION['user']->getAvatarPosition()) ?>px; top: -8px;" src="<?php echo $_SESSION['user']->avatarURL() ?>" alt=""></a>
    </div>
    <h4 style="position: absolute; right: 117px; top: 45px;" data-toggle="tooltip" title="Sig. nivel: <?php echo $_SESSION['user']->realNextLevelExp() ?> exp."><?php echo $_SESSION['user']->experience() ?> exp.</h4>
</nav>

<?php
if ($_SESSION['user']->isStudent() && $_SESSION['user']->classroom() == null) {
    ?>
    <div class="modal fade" id="class" tabindex="-1" role="dialog" aria-labelledby="classLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="classLabel">Entra a tu aula</h4>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input class="form-control" type="password" placeholder="Código del aula" name="code">
                    </div>
                    <div class="modal-footer center-block">
                        <input class="btn btn-danger center-block" type="submit" value="Entrar" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    function changeTitle(title) {
        $("#navbar-title").text(title.length > 15 ? title.substr(0, 15).trim() + "..." : title);
    }
    
    setInterval(function () {
        if ($('.avatar').hasClass('img')) {
            $('.avatar').removeClass('img');
        } else {
            $('.avatar').addClass('img');
        }
    }, 500);
    
</script>

<style>
    .img {
        transform: scale(-1, 1);
        -moz-transform: scale(-1, 1);
        -webkit-transform: scale(-1, 1);
        -o-transform: scale(-1, 1);
        -khtml-transform: scale(-1, 1);
        -ms-transform: scale(-1, 1);
    }
</style>

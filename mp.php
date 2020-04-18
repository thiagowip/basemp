<?php
$mainFolder = "/basemp"; // diretorio
$urlFile = "#"; // url arquivos


@session_start();
$_SESSION["tipo"] = 2;


if (!file_exists($_GET['url'] . ".php")) {

    //parametros
    $parametros = explode("/", $_GET['url']);

    //parametros estaticos (Retrocompatibilidade)
    if ($parametros[0] == 'controlplus') {
        $page = !empty($parametros[1]) ? $parametros[1] : NULL;
        $catMP = !empty($parametros[2]) ? $parametros[2] : NULL;
        $idMP = !empty($parametros[3]) ? $parametros[3] : NULL;
        $page = $parametros[0] . "/" . $page;
    } else {
        $page = !empty($parametros[0]) ? $parametros[0] : NULL;
        $idMP = !empty($parametros[1]) ? $parametros[1] : NULL;
        $descMP = !empty($parametros[2]) ? $parametros[2] : NULL;
    }


    if (file_exists($page . ".php")) {

        require($page . ".php");
    } else {

        //error 404 (Pagina nao encontrada)
        if (file_exists('error404.php')) {
            @require("error404.php");
        }
    }
} else {


    $page = $_GET['url'];

    require($_GET['url'] . ".php");
}
?>

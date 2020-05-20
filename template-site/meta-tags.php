<?php
$titulo_site = "Base MP";
$descricao = "";
$imagem = mp_url('site') . "/includes/imgs/logo.png";
$tags = '';

//@require_once("controller/SeoController.class.php");
//$SeoController = new SeoController();
//$seo = $SeoController->listarOnde("pagina = '$page'");
//
//@$titulo_site = $seo[0]->titulo;
//@$descricao = $seo[0]->descricao;
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo html_entity_decode($titulo_site); ?></title>
<meta property="og:title" content="<?php echo html_entity_decode($titulo_site); ?>" />
<meta property="og:description" content="<?php echo html_entity_decode($descricao); ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>" />
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo $urlshare ?>">
<meta property="og:site_name" content="<?php echo html_entity_decode($titulo_site); ?>">
<meta property="og:image:secure_url" content="<?php echo $imagem; ?>">
<meta property="og:image:alt" content="<?php echo html_entity_decode($titulo_site); ?>">
<meta property="og:image:type" content="image/png">
<meta name="title" content="<?php echo html_entity_decode($titulo_site); ?>" />
<meta name="description" content="<?php echo html_entity_decode($descricao); ?>" />
<meta name="format-detection" content="telephone=no">
<link rel="icon" type="image/png" href="<?php echo $mainFolder ?>/favicon-32x32.png?01" sizes="32x32" />
<link rel="icon" type="image/png" href="<?php echo $mainFolder ?>/favicon-16x16.png?01" sizes="16x16" />

<?php //<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, user-scalable=no, maximum-scale=1, minimum-scale=1" /> 
?>
<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, minimum-scale=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
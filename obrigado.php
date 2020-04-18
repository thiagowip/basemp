<?php include "template-site/header.php" ?>
<?php include "template-site/top.php" ?>

<h2 class="obrigado">
    <?php if ($_POST['cadastro'] == 1) { ?>
        Cadastro realizado com sucesso!
    <?php } else { ?>
        E-mail enviado com sucesso!
    <?php } ?>
</h2>

<?php include "template-site/footer.php" ?>
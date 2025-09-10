<?php
$current = basename($_SERVER['PHP_SELF']);
$dir = basename(dirname($_SERVER['PHP_SELF']));
$prefix = ($dir === 'visao') ? '' : 'visao/';
?>
<nav class="topnav">
  <a href="<?= $prefix ?>GuiUsuarios.php"
     class="<?= $current==='GuiUsuarios.php' ? 'active' : '' ?>">
     Listagem
  </a>

  <a href="<?= $prefix ?>GuiCadastroUsuario.php"
     class="<?= $current==='GuiCadastroUsuario.php' ? 'active' : '' ?>">
     Cadastro
  </a>
</nav>

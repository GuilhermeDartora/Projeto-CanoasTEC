<?php
include_once './Header.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

$dao = new UsuarioDAO();
$id  = (int)($_GET['id'] ?? 0);
$u   = $id ? $dao->buscar($id) : null;

if ($id && !$u) {
  header('Location: GuiUsuarios.php?msg=not_found');
  exit;
}

$isEdit = (bool)$u;
$action = "../controle/ControleUsuario.php?op=" . ($isEdit ? "atualizar" : "salvar");

// valores para preencher (vazios no cadastro)
$nm_usuario = $isEdit ? $u->getNmUsuario() : '';
$nr_cpf     = $isEdit ? $u->getNrCpf()     : '';
$ds_email   = $isEdit ? $u->getDsEmail()   : '';
$ds_login   = $isEdit ? $u->getDsLogin()   : '';
$id_perfil  = $isEdit ? (int)$u->getIdPerfil() : 1;
$ao_status  = $isEdit ? (int)$u->getAoStatus() : 1;
?>

<div class="container">
  <h2 class="center-text"><?= $isEdit ? 'Editar Usuário' : 'Novo Usuário' ?></h2>

  <form class="form-horizontal" id="cadUsuario" method="POST" action="<?= e($action) ?>">
    <?php if ($isEdit): ?>
      <input type="hidden" name="id_usuario" value="<?= (int)$id ?>">
    <?php endif; ?>

    <div class="formulario-campos">
      <label for="nm_usuario">Nome</label>
      <input type="text" name="nm_usuario" id="nm_usuario" required value="<?= e($nm_usuario) ?>">

      <label for="nr_cpf">CPF</label>
      <input type="text" name="nr_cpf" id="nr_cpf" required placeholder="000.000.000-00" value="<?= e($nr_cpf) ?>">
    </div>

    <div class="formulario-campos">
      <label for="ds_login">Login</label>
      <input type="text" name="ds_login" id="ds_login" required value="<?= e($ds_login) ?>">

      <label for="pw_senha">Senha <?= $isEdit ? '(deixe em branco para manter)' : '' ?></label>
      <input type="password" name="pw_senha" id="pw_senha" <?= $isEdit ? '' : 'required' ?>>
    </div>

    <div class="formulario-campos">
      <label for="ds_email">Email</label>
      <input type="email" name="ds_email" id="ds_email" required value="<?= e($ds_email) ?>">

      <label for="id_perfil">Perfil</label>
      <select name="id_perfil" id="id_perfil">
        <option value="1" <?= $id_perfil===1?'selected':'' ?>>Administrador</option>
        <option value="2" <?= $id_perfil===2?'selected':'' ?>>Atendente</option>
        <option value="3" <?= $id_perfil===3?'selected':'' ?>>Desenvolvedor</option>
      </select>
    </div>

    <div class="formulario-campos">
      <label for="ao_status">Ativo?</label>
      <input type="checkbox" name="ao_status" id="ao_status" value="1" <?= $ao_status===1?'checked':'' ?>>
    </div>

    <div class="botoes">
      <button type="submit" class="btn btn-editar"><?= $isEdit ? 'Atualizar' : 'Salvar' ?></button>
      <button type="button" class="btn btn-deletar" onclick="history.back()">Voltar</button>
    </div>
  </form>
</div>

<?php include_once 'Footer.php'; ?>

<style>
  .formulario-campos{ margin: 1em 30%; display: grid; grid-template-columns: 1fr 1fr; gap: .75rem 1rem; }
  .formulario-campos label{ grid-column: span 1; }
  .formulario-campos input, .formulario-campos select{ grid-column: span 1; padding: .45rem .55rem; border: 1px solid #ddd; border-radius: 4px; }
  .botoes{ display: flex; gap: .5rem; justify-content: center; margin: 2rem 0; }
</style>

<?php
// controle/ControleUsuario.php
include_once '../base_dir.php';
include_once DIR_UTIL . 'Define.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

// OPCIONAL: ligar erros durante debug
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$op  = $_GET['op'] ?? '';
$dao = new UsuarioDAO();

function backToList(string $code = ''): void {
  $q = $code ? ('?msg='.$code) : '';
  header('Location: ../visao/GuiUsuarios.php'.$q);
  exit;
}

try {
  switch ($op) {

    case 'listar': {
      header('Content-Type: application/json; charset=utf-8');
      echo json_encode($dao->listar());
      exit;
    } break;

    case 'salvar': {
      $dados = [
        'nm_usuario' => trim($_POST['nm_usuario'] ?? ''),
        'nr_cpf'     => preg_replace('/\D+/', '', $_POST['nr_cpf'] ?? ''),
        'ds_email'   => trim($_POST['ds_email'] ?? ''),
        'ds_login'   => trim($_POST['ds_login'] ?? ''),
        'pw_senha'   => trim($_POST['pw_senha'] ?? ''),
        'id_perfil'  => (int)($_POST['id_perfil'] ?? 1),
        'ao_status'  => isset($_POST['ao_status']) ? 1 : 0,
      ];

      $erros = [];
      foreach (['nm_usuario','nr_cpf','ds_email','ds_login','pw_senha'] as $f) {
        if ($dados[$f] === '') $erros[$f] = 'Campo obrigatório';
      }
      if ($dados['nr_cpf'] !== '' && strlen($dados['nr_cpf']) !== 11) {
        $erros['nr_cpf'] = 'CPF inválido (11 dígitos)';
      }
      if ($dados['ds_email'] !== '' && !filter_var($dados['ds_email'], FILTER_VALIDATE_EMAIL)) {
        $erros['ds_email'] = 'E-mail inválido';
      }
      if ($dados['pw_senha'] !== '' && strlen($dados['pw_senha']) < 6) {
        $erros['pw_senha'] = 'Senha deve ter ao menos 6 caracteres';
      }

      if (!empty($erros)) {
        $old = $dados;
        unset($old['pw_senha']);
        // mostra a view de cadastro novamente com $old / $erros
        include '../visao/GuiCadastroUsuario.php';
        exit;
      }

      $vo = new UsuarioVO();
      $vo->setNmUsuario($dados['nm_usuario']);
      $vo->setNrCpf($dados['nr_cpf']);
      $vo->setDsEmail($dados['ds_email']);
      $vo->setDsLogin($dados['ds_login']);
      $vo->setPwSenha($dados['pw_senha']);
      $vo->setIdPerfil($dados['id_perfil']);
      $vo->setAoStatus($dados['ao_status']);
      $vo->setIdUsuarioinclusao(1);
      $vo->setIdUsuarioalteracao(1);
      $vo->setDtCadastro(date('Y-m-d H:i:s'));
      $vo->setDtAlteracao(date('Y-m-d H:i:s'));

      if ($dao->cadastrar($vo)) backToList('add_ok');
      backToList('add_err');
    } break;

    case 'atualizar': {
      $id = (int)($_POST['id_usuario'] ?? 0);
      if ($id <= 0) backToList('upd_err');

      $u = new UsuarioVO();
      $u->setIdUsuario($id);
      $u->setNmUsuario(trim($_POST['nm_usuario'] ?? ''));
      $u->setNrCpf(preg_replace('/\D+/', '', $_POST['nr_cpf'] ?? ''));
      $u->setDsEmail(trim($_POST['ds_email'] ?? ''));
      $u->setDsLogin(trim($_POST['ds_login'] ?? ''));
      $u->setPwSenha(trim($_POST['pw_senha'] ?? '')); // se vier vazia o DAO ignora
      $u->setIdPerfil((int)($_POST['id_perfil'] ?? 1));
      $u->setAoStatus(isset($_POST['ao_status']) ? 1 : 0);
      $u->setIdUsuarioalteracao(1);
      $u->setDtAlteracao(date('Y-m-d H:i:s'));

      if ($dao->atualizar($u)) backToList('upd_ok');
      backToList('upd_err');
    } break;

    case 'deletar': {
      // precisa vir via POST com name="id"
      $id = (int)($_POST['id'] ?? 0);
      if ($id > 0 && $dao->deletar($id)) backToList('del_ok');
      backToList('del_err');
    } break;

    default:
      backToList();
  }
} catch (Throwable $e) {
  // durante debug, você pode var_dump($e->getMessage());
  backToList('err');
}

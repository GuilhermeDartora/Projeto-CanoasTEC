<?php
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

//Função para formatar a data no formato correto
function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function dataBr($dt){
    if (empty($dt) || $dt === '0000-00-00' || $dt === '0000-00-00 00:00:00') return '';
    if ($dt instanceof DateTimeInterface) return $dt->format('d/m/Y');
    $ts = strtotime((string)$dt);
    return $ts ? date('d/m/Y', $ts) : '';
}

// Função para formatar o CPF no formato correto
function cpfBr($cpf){
    $d = preg_replace('/\D+/', '', (string)$cpf);  // só dígitos
    if (strlen($d) !== 11) return '';             
    // 12345678901 -> 123.456.789-01
    return substr($d,0,3).'.'.substr($d,3,3).'.'.substr($d,6,3).'-'.substr($d,9,2);
}


$dao   = new UsuarioDAO();
$campo = $_GET['campo'] ?? 'nome';
$campo = in_array($campo, ['nome','cpf'], true) ? $campo : 'nome';
$q     = trim((string)($_GET['q'] ?? ''));

$usuarios = ($campo === 'cpf') ? $dao->listar('', $q) : $dao->listar($q, '');
?>

<div class="conteudo">

  <!-- Filtro (select + busca, sem botões) -->
  <form class="filtro" method="get" action="">
    <div class="campo">
      <label for="f-campo">Filtrar por</label>
      <select id="f-campo" name="campo">
        <option value="nome" <?= $campo==='nome' ? 'selected' : '' ?>>Nome</option>
        <option value="cpf"  <?= $campo==='cpf'  ? 'selected' : '' ?>>CPF</option>
      </select>
    </div>

    <div class="campo campo-busca">
      <label for="f-q">Buscar</label>
      <input id="f-q" type="text" name="q"
             placeholder="Digite o termo e pressione Enter"
             value="<?= e($q) ?>">
      <!-- sem botões: Enter no input envia o form -->
    </div>
  </form>

  <div class="listagem">
    <table>
      <thead>
        <tr>
          <th width="26%">Nome</th>
          <th width="12%">CPF</th>
          <th width="30%">Email</th>
          <th width="8%">Status</th>
          <th width="12%">Data de Cadastro</th>
          <th width="12%">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($usuarios)): ?>
          <tr><td colspan="6" class="empty-state">nenhum registro encontrado</td></tr>
        <?php else: foreach ($usuarios as $usuario): ?>
          <tr>
            <td><?= e($usuario->getNmUsuario()) ?></td>
            <td><?= e(cpfBr($usuario->getNrCpf())) ?></td>
            <td><?= e($usuario->getDsEmail()) ?></td>
            <td><?= $usuario->getAoStatus() ? 'Ativo' : 'Inativo' ?></td>
            <td><?= e(dataBr($usuario->getDtCadastro())) ?></td>
            <td class="acoes">
              <a class="btn btn-editar" href="GuiCadastroUsuario.php?id=<?= (int)$usuario->getIdUsuario() ?>">Editar</a>
              <form method="post" action="../controle/UsuarioControle.php"
                    onsubmit="return confirm('Confirma a exclusão deste usuário?')">
                <input type="hidden" name="acao" value="deletar">
                <input type="hidden" name="id" value="<?= (int)$usuario->getIdUsuario() ?>">
                <button type="submit" class="btn btn-deletar">Deletar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once 'Footer.php'; ?>

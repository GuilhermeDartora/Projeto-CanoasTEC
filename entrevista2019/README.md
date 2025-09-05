# Instruções

## Parte de Análise
1 - Criar um projeto no trello e me adicionar no seu projeto (eduardosouza_canoastec)

2 - Planejar sprints

3 - Criar Tarefas (listadas abaixo, na Parte de Código) no padrão user history
 
4 - Estimar Tarefas 

5 - Exemplo de user history
```
- **COMO** Usuário
- **QUERO ** ver a data de cadastro no padrão brasileiro
- **PARA ** Melhor visualização e entendimento

**CRITÉRIOS DE ACEITAÇÃO**

**1**
- **DADO** que estou na tela de listagem de usuarios
- **QUANDO ** exibir a data de cadastro do usuario
- **ENTÃO** Exibir a data de cadastro no formato DD/MM/AAAA

**2**
- **DADO** que estou na tela de listagem de usuarios
- **QUANDO ** não um usuario não houver data de cadastro
- **ENTÃO** deixar vazio

```

## Parte de Código

**Configurações antes de codificar**

1 - No arquivo 'DefineCredenciais.php' definir as variaveis de acordo com as configurações do seu banco de dados local.

2 - Criar um banco de dados chamado entrevista.

3 - Importar os dados do arquivo 'entrevista.sql'.

**Modificar Tela de Listagem de Usuários**

1 - Exibir a data de cadastro no formato DD/MM/AAAA

2 - Ter uma coluna de ações, com botões para editar e deletar

3 - Em caso de não trazer registro, ter uma mensagem "nenhum registro encontrado" e não exibir a mensagem

4 - Criar uma area de filtro, que possa buscar por nome e cpf

5 - Exibir CPF no padrão ###.###.###-##

**Modificar Tela de Cadastro de Usuários**

1 - Criar validação para não permitir salvar sem preencher todos os campos

2 - Após salvar redirecionar para tela de listagem, e mostrar mensagem de sucesso.

**Novas Funcionalidades**

1 - Possibilitar deletar registro

2 - Possibilitar edição dos dados.

3 - Criar menu com acesso as telas de cadastro e listagem.

4 - Criar CRUD de perfil e fazer o relacionamento com usuário

**Melhorias não obrigatórias - Pontos Extras**

1 - Exibir na listagem o perfil do usuário

2 - Incluir e usar a biblioteca Bootstrap 

3 - Incluir e usar Vue JS

4 - Nesta tela de instruções, criar checkbox para marcar que a tarefa foi concluida e salvar este estado sem usar a session do PHP e nem o banco de dados.

5 - criar este mesmo projeto, só que utilizando o framework laravel

6 - Criar testes unitários

7 - Criar testes de aceitação

8 - Criar container docker

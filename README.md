# Agenda
## Descrição
Este projeto é uma aplicação web simples de agenda desenvolvida em PHP, que permite o gerenciamento de contatos. Com ela, é possível adicionar, editar, listar e excluir contatos, facilitando a organização das informações de pessoas em um formato prático e intuitivo.

### Funcionalidades
- Adicionar novos contatos com informações como nome, telefone, endereço, e-mail, data de nascimento, e mais.
- Editar informações de contatos existentes.
- Listar todos os contatos cadastrados.
- Buscar um contato específico através do ID.
- Validar a existência de e-mail antes de adicionar um novo contato.

### Tecnologias Utilizadas
- PHP: Linguagem de programação utilizada para a lógica do servidor.
- MySQL: Banco de dados para armazenar as informações dos contatos.
- HTML/CSS: Usado para a estruturação e estilização das páginas.
- PDO (PHP Data Objects): Biblioteca utilizada para interagir com o banco de dados MySQL.

### Estrutura do Projeto
O projeto está organizado da seguinte maneira:
- `index.php:` Página inicial, que exibe a listagem de contatos.
- `adicionar.php:` Formulário para adicionar novos contatos.
- `editar.php:` Formulário para editar informações de um contato existente.
- `classes/:` Contém a classe `Contatos` responsável pela interação com o banco de dados e a lógica de manipulação dos contatos.
- `conexao.class.php:` Classe para realizar a conexão com o banco de dados utilizando PDO.

### Como Executar
1. Clone o repositório:
```
git clone https://github.com/seu-usuario/seu-repositorio.git
```

2. Certifique-se de que você possui um servidor local (como XAMPP, WAMP, ou MAMP) rodando com suporte a PHP e MySQL.

3. Configure o banco de dados MySQL:
   - Crie um banco de dados para o projeto.
   - Importe o arquivo database.sql (caso exista) para criar as tabelas necessárias.

4. Altere as credenciais de conexão ao banco de dados no arquivo conexao.class.php, se necessário.

5. Acesse a aplicação através do navegador:
```
http://localhost/nome-do-projeto
```

### Próximos Passos
- Implementar funcionalidades adicionais como a exclusão de contatos.
- Melhorar o layout da aplicação para uma melhor experiência do usuário.
- Adicionar autenticação para proteger o acesso aos contatos.

### Contribuições
Sinta-se à vontade para fazer um fork deste repositório e enviar pull requests com melhorias ou correções. Sugestões são bem-vindas!

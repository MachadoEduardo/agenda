<?php
    include 'classes/contatos.class.php';

    $contato = new Contatos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Senac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1 {
            font-size: 2.5em;
            font-weight: bold;
            color: #343a40;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        hr {
            border: 1px solid #343a40;
            margin-bottom: 2rem;
        }
        .btn a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Agenda Senac (Administrativo)</h1>
        <hr>

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>TELEFONE</th>
                    <th>ENDEREÇO</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>DESCRIÇÃO</th>
                    <th>LINKEDIN</th>
                    <th>EMAIL</th>
                    <th>FOTO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $lista = $contato->listar();
                    foreach ($lista as $item):
                ?>
                <tr>
                    <td><?php echo $item['id']?></td>
                    <td><?php echo $item['nome']?></td>
                    <td><?php echo $item['telefone']?></td>
                    <td><?php echo $item['endereco']?></td>
                    <td><?php echo $item['dt_nasc']?></td>
                    <td><?php echo $item['descricao']?></td>
                    <td><?php echo $item['linkedin']?></td>
                    <td><?php echo $item['email']?></td>
                    <td><?php echo $item['foto']?></td>
                    <td>
                        <button class="btn btn-warning ml-2"><a href="editarContato.php?id=<?php echo $item['id'];?>">EDITAR</a></button>
                        <button class="btn btn-danger"><a href="deletarContato.php?id=<?php echo $item['id'];?>">EXCLUIR</a></button>
                    </td> 
                </tr>
            </tbody>
            <?php
                    endforeach
                ?>
        </table>

        <button class="btn btn-primary"><a href="adicionarContato.php">ADICIONAR</a></button>
    </div>

</body>
</html>

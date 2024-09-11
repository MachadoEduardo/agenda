<?php
include 'classes/contatos.class.php';
$contato = new Contatos();

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $dt_nasc = $_POST['dt_nasc'];
    $descricao = $_POST['descricao'];
    $linkedin = $_POST['linkedin'];
    $email = $_POST['email'];
    $foto = $_POST['foto'];

    if ($contato->atualizar($id, $nome, $telefone, $endereco, $dt_nasc, $descricao, $linkedin, $email, $foto)) {
        header("Location: /agenda/admin.php"); // Redireciona para a página principal após atualizar
        exit;
    } else {
        echo "Erro ao atualizar o contato!";
    }
} else {
    header("Location: /agenda/admin.php"); // Redireciona caso não haja ID
    exit;
}
?>
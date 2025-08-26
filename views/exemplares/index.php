<?php

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Livro';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'Livro':
        include 'controllers/LivroController.php';
        $controller = new LivroController();
        break;
    case 'Exemplar':
        include 'controllers/ExemplarController.php';
        $controller = new ExemplarController();
        break;
    // Adicione outros controllers aqui (ex: Usuarios, Emprestimos, etc.)
    default:
        echo "404 - Controller não encontrado.";
        exit();
}

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    default:
        echo "404 - Ação não encontrada.";
        exit();
}
<?php
// index.php - Roteador principal da aplicação

// Configurações para a exibição de erros (útil durante o desenvolvimento)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mapeamento de rotas simples (URL -> Controlador)
$route = $_GET['route'] ?? 'home'; // Rota padrão é 'home'
$action = $_GET['action'] ?? 'index'; // Ação padrão é 'index'

// Carregar o controlador correspondente
switch ($route) {
    case 'home':
        // Rota para a página inicial
        include __DIR__ . '/views/home.php';
        break;
    case 'livro':
        require_once __DIR__ . '/controllers/LivroController.php';
        $controller = new LivroController();
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            // Ação não encontrada, redirecionar ou mostrar erro
            echo "Ação do controlador 'livro' não encontrada.";
        }
        break;
    case 'usuario':
        require_once __DIR__ . '/controllers/UsuarioController.php';
        $controller = new UsuarioController();
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo "Ação do controlador 'usuario' não encontrada.";
        }
        break;
    case 'emprestimo':
        require_once __DIR__ . '/controllers/EmprestimoController.php';
        $controller = new EmprestimoController();
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo "Ação do controlador 'emprestimo' não encontrada.";
        }
        break;

    // Adicionar outras rotas para as outras funcionalidades aqui
    // Ex: case 'emprestimo': ...
    // Ex: case 'exemplar': ...
    default:
        // Rota não encontrada, mostrar erro 404
        echo "404 - Página não encontrada.";
        break;
}
?>
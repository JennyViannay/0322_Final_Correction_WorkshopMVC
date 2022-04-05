<?php

//require __DIR__.'/controllers/recipe-controller.php';
// Ta nouvelle gestion du controller de ton application, qui va bientôt supplanter la précédente.
require __DIR__.'/controllers/RecipeController.php';

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$recipeController = new RecipeController();

if ('/' === $urlPath) {
    $recipeController->browse();
} elseif ('/show' === $urlPath && isset($_GET['id'])) {
    $recipeController->show($_GET['id']);
} elseif ('/add' === $urlPath) {
    $recipeController->save();
} elseif ('/delete' === $urlPath && isset($_GET['id'])) {
    $recipeController->delete($_GET['id']);
} elseif ('/edit' === $urlPath && isset($_GET['id'])) {
    $recipeController->edit($_GET['id']);
} else {
    header('HTTP/1.1 404 Not Found');
}

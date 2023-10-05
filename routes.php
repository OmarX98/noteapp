<?php
// the "only" method here specifies who can access these routes (authenticated users or guests)

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only("auth");
$router->get('/note', 'notes/show.php')->only("auth");
$router->delete('/note', 'notes/destroy.php');
$router->patch('/note', 'notes/update.php');

$router->get('/notes/create', 'notes/note-create.php');
$router->post('/notes/create', 'notes/store.php');
$router->get('/note/edit', 'notes/edit.php');

$router->get('/register', 'registration/create.php')->only("guest");
$router->post('/register', 'registration/store.php');

$router->get('/login', 'session/create.php')->only("guest");
$router->post('/session', 'session/store.php')->only("guest");
$router->delete('/session', 'session/destroy.php')->only("auth");

//return [
//    '/' => 'controllers/index.php',
//    '/about' => 'controllers/about.php',
//    '/contact' => 'controllers/contact.php',
//    '/notes' => 'controllers/notes/index.php',
//    '/notes/create' => 'controllers/notes/note-create.view.php',
//    '/note' => 'controllers/notes/show.php',
//];


<?php
require_once "bootstrap.php";

$router = Router::loads("routes.php");
require $router->getRoute(Request::uri());

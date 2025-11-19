<?php
// bootstrap.php
require_once "models/Database.php";
require_once "models/User.php";
require_once "models/Router.php";
require_once "models/Request.php";
require_once "controllers/AuthController.php";



// Create instances
$config = require_once "config.php";
$db = new Database();
$userModel = new User($db->getConnection($config['database']));
$auth = new AuthController($userModel);
$router = new Router();

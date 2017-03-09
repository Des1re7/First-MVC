<?php
session_name("sid");
session_start();
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

// Other
require_once 'arduino/class_arduino_uno.php';
require_once 'arduino/class_arduino_mini.php';


Route::start();
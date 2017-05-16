<?php
include 'php/controller-login.php';
session_destroy();
header( "Location: ingresar.php" );

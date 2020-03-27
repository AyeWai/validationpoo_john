<?php

session_start();
session_destroy();

header('Location: /');
//header('Location: /valid_poo/validation-D6');
exit();
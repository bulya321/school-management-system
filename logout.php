<?php
session_start();
session_destroy();
header('Location: new2.php');
exit();

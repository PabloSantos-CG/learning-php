<?php

setcookie(session_name(), '', time() - 1, '/');
header('Location: index.php');

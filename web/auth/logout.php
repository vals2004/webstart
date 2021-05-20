<?php

require('../config.php');

unset($_SESSION[$AUTH_USER['session']]);

header('Location: /auth/login.php');
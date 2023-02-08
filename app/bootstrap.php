<?php

use MVC\Controllers\Countries;

$home = new Countries;
echo $home->listPaginate(20);

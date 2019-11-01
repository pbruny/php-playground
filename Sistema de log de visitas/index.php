<?php
    require 'log.class.php';

    $log = new Log();

    $log->logRegister("Visited homepage");
    $log_count = $log->getVisitCount();

    echo $log_count;
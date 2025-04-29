<?php
    function funcaoExemplo() {
        static $count = 0;
        $count ++;
        return $count;
    }

    echo funcaoExemplo();
    echo funcaoExemplo();
    echo funcaoExemplo();
    echo funcaoExemplo();
?>
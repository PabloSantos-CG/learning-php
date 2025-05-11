<?php


foreach ($_GET as $str) {
    echo "$str" . '<br />';
}
echo '<hr />';

echo "QueryString: " . $_SERVER['QUERY_STRING'] . '<br />';
echo "Servidor: " . $_SERVER['SERVER_NAME'] . '<br />';
echo "IP do Servidor: " . $_SERVER['SERVER_ADDR'] . '<br />';
echo "Porta utilizada: " . $_SERVER['SERVER_PORT'] . '<br />';
echo "Protocolo: " . $_SERVER['SERVER_PROTOCOL'] . '<br />';
echo "Url fornecida: ";
echo "\"" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . "\"" . '<br />';


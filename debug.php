<?php

function dprint($obj) {
    echo '<pre>DEBUG DATA:<br/>';
    echo dstring($obj);
    echo '----------</pre><br/>';
}

function dstring($obj) {
    $str = print_r($obj, true);
    return $str;
}


<?php

function dd(mixed $var)
{
    // die dump
    echo '<pre>';
    var_dump(...$var);

    die();
}
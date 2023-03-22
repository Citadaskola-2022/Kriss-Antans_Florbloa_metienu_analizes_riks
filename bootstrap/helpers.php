<?php

define('ROOT', dirname(__DIR__));

function dd(mixed $var)
{
    // die dump
    echo '<pre>';
    var_dump(...$var);

    die();
}

function view(string $path, array $params = []): void
{
    extract($params);

    require_once ROOT . '/views/' . $path;
}
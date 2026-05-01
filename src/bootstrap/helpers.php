<?php

function h(mixed $val)
{
    return App\Services\Core\h($val);
}

function view(string $name, array $data = [])
{
    return App\Services\Core\view($name, $data);
}

<?php

function h(mixed $val)
{
    return App\Lib\h($val);
}

function view(string $name, array $data = [])
{
    return App\Lib\view($name, $data);
}

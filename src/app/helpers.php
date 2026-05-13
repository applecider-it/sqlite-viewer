<?php

use App\Services\Core\Output;

function h(mixed $val)
{
    return Output::h($val);
}

function view(string $name, array $data = [])
{
    return Output::view($name, $data);
}

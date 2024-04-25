<?php

use Illuminate\Support\Facades\File;

function getData(string $path): mixed
{
    return json_decode(File::get($path), true);
}

<?php


function getCurrentMunicipality(): int
{
    $path = request()->path(); // e.g., "m/1"
    $segments = explode('/', $path);

    return isset($segments[1]) ? (int) $segments[1] : 1; // Return 0 if ID not found
}

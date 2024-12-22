<?php


function getCurrentMunicipality(): int
{
    // Get the second segment after "m"
    $municipalityId = request()->segment(2);

    // Ensure it returns an integer, defaulting to 1 if not found or invalid
    return is_numeric($municipalityId) ? (int) $municipalityId : 1;
}

<?php

/**
* Generate an unique filename
* 
* @param  $path
* @return string
*/
function generateFilename($path, $extension)
{
    $filename = substr(hash('sha256', Illuminate\Support\Str::random(), false), 0, 32) . '.' . $extension;
    if(app('files')->exists($path.$filename)) {
        generateFilename($path, $extension);
    }
    return $filename;
}

/**
* Limit the number of words in a string.
*
* @param  string  $value
* @param  int     $words
* @param  string  $end
* @return string
*/
function str_words($value, $words = 100, $end = '...')
{
    return Illuminate\Support\Str::words($value, $words, $end);
}
<?php

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
* Generate an unique filename
* 
* @param  $path
* @return string
*/
function generateFilename($path, $extension)
{
	$filename = substr(hash('sha256', Str::random(), false), 0, 32) . '.' . $extension;
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
	return Str::words($value, $words, $end);
}

/**
 * Upload file to server
 *
 * @param file   $image
 * @param string $path
 * @param int    $thumb_size
 * @return string
 */
function uploadImage($image, $path, $thumb_size = null)
{
	$extension = $image->getClientOriginalExtension();
	$filename  = generateFilename($path, $extension);

	// Upload Original
	$image = Image::make($image)->save($path . $filename);

	// Upload thumbnail
	if (!is_null($thumb_size)) {
		$thumbimage = Image::make($image)->fit($thumb_size)->save($path . 'thumbs/' . $filename);
	}

	return $filename;
}
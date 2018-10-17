<?php

namespace App\Services\Interfaces;

interface HandleableUploadInterface
{
	public function getExtension($file);
	public function getImageName($extension);
	public function moveFile($file, $path, $imageName);
}

<?php

namespace App\Services\Handlers;

trait HandleImageUpload
{
    /**
     * Get file extension
     *
     * @param string $file
     * @return string
     */
    public function getExtension($file) {
        return $file->getClientOriginalExtension();
    }

    /**
     * Get new image name with current time
     *
     * @param string $extension
     * @return string
     */
    public function getImageName($extension) {
        return time() . '.' . $extension;
    }

    /**
     * Move specified file to specified path
     *
     * @param array $file
     * @param string $path
     * @param string $imageName
     * @return void
     */
    public function moveFile($file, $path, $imageName) {
        $file->move($path, $imageName);
    }

    /**
     * Check if there is uploaded photo
     *
     * @param array  $file
     * @return boolean
     */
    public function hasUploadNewFile($file) {
        return array_key_exists('profile_picture', $file);
    }

}

<?php
namespace PhpSolutions\File;

class Upload {
    protected $destination;
    protected $max = 51200;
    protected $messages = [];
    protected $permitted = [
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/webp'
    ];

    public function __construct($path) {
        if (is_dir($path) && is_writable($path)) {
            $this->destination = rtrim($path, '/\\') . DIRECTORY_SEPARATOR;
        } else {
            throw new \Exception("$path must be a valid, writable directory.");
        }
    }

    public function upload($fieldname, $size = null, array $mime = null) {
        $uploaded = $_FILES[$fieldname];
        if (!is_null($size) && $size > 0) {
            $this->max = (int) $size;
        }
        if (!is_null($mime)) {
            $this->permitted = array_merge($this->permitted, $mime);
        }
        if ($this->checkFile($uploaded)) {
            $this->moveFile($uploaded);
        }
    }

    public function getMessages() {
        return $this->messages;
    }

    public function getMaxSize() {
        return number_format($this->max/1024, 1) . ' KB';
    }

    protected function checkFile($file) {
        $accept = $this->getErrorLevel($file);
        $accept = $this->checkSize($file);
        if (!empty($file['type'])) {
            $accept = $this->checkType($file);
        }
        return $accept;
    }

    protected function getErrorLevel($file) {
        switch($file['error']) {
            case 0:
                return true;
            case 1:
            case 2:
                $this->messages[] = $file['name'] . ' is too big: (max: ' .
                    $this->getMaxSize() . ').';
                break;
            case 3:
                $this->messages[] = $file['name'] . ' was only partially 
                        uploaded.';
                break;
            case 4:
                $this->messages[] = 'No file submitted.';
                break;
            default:
                $this->messages[] = 'Sorry, there was a problem uploading ' .
                    $file['name'];
        }
        return false;
    }

    protected function checkSize($file) {
        if ($file['error'] == 1 || $file['error'] == 2 ) {
            return false;
        } elseif ($file['size'] == 0) {
            $this->messages[] = $file['name'] . ' is an empty file.';
            return false;
        } elseif ($file['size'] > $this->max) {
            $this->messages[] = $file['name'] . ' exceeds the maximum size 
                    for a file (' . $this->getMaxSize() . ').';
            return false;
        }
        return true;
    }

    protected function checkType($file) {
        if (!in_array($file['type'], $this->permitted)) {
            $this->messages[] = $file['name'] . ' is not permitted type of file.';
            return false;
        }
        return true;
    }

    protected function moveFile($file) {
        $success = move_uploaded_file($file['tmp_name'],
            $this->destination . $file['name']);
        if ($success) {
            $result = $file['name'] . ' was uploaded successfully';
            $this->messages[] = $result;
        } else {
            $this->messages[] = 'Could not upload ' . $file['name'];
        }
    }

}
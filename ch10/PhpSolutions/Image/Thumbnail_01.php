<?php
namespace PhpSolutions\Image;

class Thumbnail {
    protected $original;
    protected $originalwidth;
    protected $originalheight;
    protected $basename;
    protected $maxSize = 120;
    protected $imageType;
    protected $destination;
    protected $suffix = '_thb';
    protected $messages = [];

    public function __construct($image) {
        if (is_file($image) && is_readable($image)) {
            $details = getimagesize($image);
        } else {
            throw new \Exception("Cannot open $image.");
        }
        if (!is_array($details)) {
            throw new \Exception("$image doesn't appear to be an image.");
        } else {
            if ($details[0] == 0) {
                throw new \Exception("Cannot determine size of $image.");
            }
            // check the MIME type
            if (!$this->checkType($details['mime'])) {
                throw new \Exception('Cannot process that type of file.');
            }
            $this->original = $image;
            $this->originalwidth = $details[0];
            $this->originalheight = $details[1];
            $this->basename = pathinfo($image, PATHINFO_FILENAME);
        }
    }

    public function test() {
        $details = <<<END
        <pre>
        File: $this->original
        Original width: $this->originalwidth
        Original height: $this->originalheight
        Base name: $this->basename
        Image type: $this->imageType
        </pre>
        END;
        // Remove the indentation of the preceding line in < PHP 7.3
        echo $details;
        if ($this->messages) {
            print_r($this->messages);
        }
    }

    protected function checkType($mime) {
        $mimetypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (in_array($mime, $mimetypes)) {
            // extract the characters after '/'
            $this->imageType = substr($mime, strpos($mime, '/')+1);
            return true;
        }
        return false;
    }

}

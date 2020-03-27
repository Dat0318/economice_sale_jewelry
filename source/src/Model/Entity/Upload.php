<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Upload extends Entity
{
    public function update( ){
        $path = '/uploads/';
        $return = [
            'status' => 0,
            'message' => '',
            'data' => []
        ];

        if (!isset($_FILES['file']['name'])) {
            $return['status'] = 1;
            $return['message'] = 'Bạn chưa lựa chọn đẩy file lên hệ thống';
        }

        if ($return['status'] == 0) {
            $target_dir = WWW_ROOT_UPLOADS;
            $target_file = $target_dir . basename($_FILES['file']['name']);
            $path .= $_FILES['file']['name'];
            $check = getimagesize($_FILES['file']['tmp_name']);
            if (!$check) {
                $return['status'] = 1;
                $return['message'] = 'File is not an image.';
            }
        }

        if ($return['status'] == 0) {
            if (file_exists($target_file)) { // neu ton tai file
                $return['data']['path'] = $path;
                return $return;
            }
        }

        if ($return['status'] == 0) {
            if ($_FILES['file']['size'] > 500000) {
                $return['status'] = 1;
                $return['message'] = 'Sorry, your file is too large.';
            }
        }

        if ($return['status'] == 0) {
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extention = ['jpg', 'png', 'jpeg', 'gif'];
            if (!in_array($imageFileType, $extention)) {
                $return['status'] = 1;
                $return['message'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            }
        }

        if ($return['status'] == 0) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                $return['message'] = "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                $return['data']['path'] = $path;
            } else {
                $return['status'] = 1;
                $return['message'] = 'Sorry, there was an error uploading your file.';
            }
        }

        return $return;
    } 

    public function getImagesFromDir($path) {
        
    }

}

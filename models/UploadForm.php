<?php
    namespace app\models;

    use yii\base\Model;


    class UploadForm extends Model
    {
        public $imageFile;
        public $name;

        public function rules()
        {
            return [
                [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            ];
        }

        public function upload()
        {
            if ($this->validate()) {
                $this->name=$this->imageFile->baseName. '.' . $this->imageFile->extension;
                $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
                return true;
            } else {
                return false;
            }
        }
    }
?>
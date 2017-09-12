<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/12
 * @Time:   14:56
 */

namespace common\models;


use yii\base\Model;

class UploadForm extends Model
{
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * 上传方法
     *
     * 1.文件归档（自动创建归档目录）
     * 2.文件名自动重命名。（确保唯一）
     */
    public function upload()
    {
        if($this->validate())
        {
            // 移动临时文件
            $fileName = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;

            $this->imageFile->saveAs($fileName);
            return true;
        }
        else
        {
            return false;
        }
    }

}
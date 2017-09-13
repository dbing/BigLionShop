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


use yii\base\ErrorException;
use yii\base\Exception;
use yii\base\Model;

class UploadForm extends Model
{
    protected $rootPath = './uploads/'; // 上传跟目录
    protected $filePath;                // 上传后的目录
    public $file;                    // 上传后的文件位置

    public $imageFile;                  // 文件对象

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
        // 上传图片则处理，否则...
        if(is_null($this->imageFile))
        {
            return null;
        }

        if($this->validate())
        {
            // 新建目录
            $this->createPath();

            // 新建文件名称
            $fileName = uniqid() . rand(10000,99999);

            // 移动临时文件
            $file = $this->filePath . $fileName . '.' . $this->imageFile->extension;
            $this->file = $file;

            return $this->imageFile->saveAs($file);

        }
        else
        {
            return false;
        }
    }

    protected function createPath()
    {
        $path = $this->rootPath . date('Y') .'/' . date('m') .'/' . date('d') .'/';

        try
        {
            if(!file_exists($path))
            {
                if(!mkdir($path,0777,true))
                {
                    throw new ErrorException('创建目录失败.');
                }
            }
            $this->filePath = $path;
            return true;

        }
        catch (Exception $e)
        {
            exit($e->getMessage());
        }


    }

}
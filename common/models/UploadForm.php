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


use Qiniu\Auth;
use Qiniu\Config;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\base\Model;

class UploadForm extends Model
{
    protected $rootPath = 'uploads/'; // 上传跟目录
    protected $filePath;                // 上传后的目录
    public $file;                       // 上传后的文件位置

    public $imageFile;                  // 文件对象
    public $qiniuConfig;                // 七牛配置

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->qiniuConfig = \Yii::$app->params['qiniu'];

    }

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg,gif'],
        ];
    }

    /**
     * 删除七牛云资源
     *
     * @param $key
     * @return mixed
     */
    public function deleteFile($key)
    {

        $auth = new Auth($this->qiniuConfig['accessKey'],$this->qiniuConfig['secretKey']);
        $config = new Config();
        $bucketMar = new BucketManager($auth,$config);
        return $bucketMar->delete($this->qiniuConfig['bucket'],$key);
    }

    /**
     * 构造私有空间文件下载地址
     *
     * @param $fileName
     * @return string
     */
    public function getDownloadUrl($fileName)
    {
        $auth = new Auth($this->qiniuConfig['accessKey'],$this->qiniuConfig['secretKey']);
        $baseUrl = $this->qiniuConfig['domain'].$fileName;
        return $auth->privateDownloadUrl($baseUrl);
    }

    /**
     * 图片上传至七牛云
     *
     * @return array
     */
    public function uploadToQiNiu()
    {
        // code 0:上传成功；100:验证失败；200:入库失败；300:删除失败;
        $result = ['code'=>0,'msg'=>'上传成功.','data'=>['src'=>'','url'=>'']];

        if($this->validate())
        {
            $this->createPath();

            $fileName = $this->qiniuConfig['basePath'] . $this->filePath . $this->createFileName() . '.' . $this->imageFile->extension;
//            $fileName = '10000';
            $auth = new Auth($this->qiniuConfig['accessKey'],$this->qiniuConfig['secretKey']);
            $token = $auth->uploadToken($this->qiniuConfig['bucket']);
            list($ret,$err) = (new UploadManager())->putFile($token,$fileName,$this->imageFile->tempName);

            if($err == null)
            {
                // 成功
                $result['data']['src'] = $ret['key'];
                $result['data']['url'] = $this->getDownloadUrl($ret['key']);
            }
            else
            {
                $result['msg'] = $err->message();
                $result['code'] = $err->code();
            }
        }
        else
        {
            // 验证失败
            $result['code'] = 100;
            $result['msg'] = implode("\n",$this->getErrors('imageFile'));
        }
        return $result;
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
            $fileName = $this->createFileName();

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

    protected function createFileName()
    {
        return $fileName = uniqid() . rand(10000,99999);
    }

    protected function createPath()
    {
        $datePath = date('Y') .'/' . date('m') .'/' . date('d') .'/';
        $path = $this->rootPath . $datePath;

        try
        {
            if(!file_exists($path))
            {
                if(!mkdir($path,0777,true))
                {
                    throw new ErrorException('创建目录失败.');
                }
            }
            $this->filePath = $datePath;
            return true;

        }
        catch (Exception $e)
        {
            exit($e->getMessage());
        }


    }

}
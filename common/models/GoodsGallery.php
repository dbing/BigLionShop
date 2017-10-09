<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%goods_gallery}}".
 *
 * @property string $gallery_id
 * @property string $img_desc
 * @property string $original_img
 * @property string $goods_id
 *
 * @property Goods $goods
 */
class GoodsGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_gallery}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id'], 'required'],
            [['goods_id'], 'integer'],
            [['img_desc', 'original_img'], 'string', 'max' => 255],
            [['goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goods_id' => 'goods_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gallery_id' => 'Gallery ID',
            'img_desc' => 'Img Desc',
            'original_img' => 'Original Img',
            'goods_id' => 'Goods ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * 查询该商品的相册图
     *
     * @param $gid
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getGalleries($gid)
    {
        $galleries = GoodsGallery::find()->select('img_desc,original_img')->where(['goods_id'=>$gid])->asArray()->all();

        $upForm = new UploadForm();
        foreach ($galleries as $key=>$value)
        {
            $galleries[$key]['url'] = $upForm->getDownloadUrl($value['original_img']);
            $galleries[$key]['middle'] = $upForm->getDownloadUrl($value['original_img'],'middle');
            $galleries[$key]['mini'] = $upForm->getDownloadUrl($value['original_img'],'mini');
        }
        return $galleries;
    }



    /**
     * 上传图片
     *
     * @param $data
     * @return bool
     */
    public function createGallery($data)
    {
        if($this->load(['GoodsGallery'=>$data]) && $this->validate())
        {
            return $this->save();
        }
        else
        {
            return false;
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: bing
 * Date: 2017/12/16
 * Time: 下午10:30
 */


namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%goods_type}}".
 *
 * @property string $type_id
 * @property string $type_name
 * @property string $attr_group
 *
 * @property Attribute[] $attributes
 * @property Goods[] $goods
 */
class AdminLoginLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_login_log}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'string', 'max' => 255],
            ['login_ip','string', 'max'=>60],
            ['created_at','integer'],

        ];
    }

    /**
     * 写入登录日志
     *
     * @param $name
     * @return bool
     */
    public function write($name)
    {

        $this->username = $name;
        $this->login_ip = Yii::$app->request->userIP;
        $this->created_at = time();

        return $this->save();

    }
}
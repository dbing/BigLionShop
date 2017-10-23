<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%user_address}}".
 *
 * @property string $address_id
 * @property string $address_name
 * @property string $consignee
 * @property string $email
 * @property integer $country
 * @property string $province
 * @property string $city
 * @property string $district
 * @property string $address
 * @property string $zipcode
 * @property string $mobile
 * @property string $user_id
 *
 * @property User $user
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address_name', 'consignee', 'country', 'user_id'], 'required'],
            [['country', 'user_id'], 'integer'],
            [['address_name', 'province', 'city', 'district', 'zipcode'], 'string', 'max' => 45],
            [['consignee'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 60],
            [['address'], 'string', 'max' => 120],
            [['mobile'], 'string', 'max' => 20],
            [['consignee'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'address_name' => '名称',
            'consignee' => '收货人名字',
            'email' => '收货人EMAIL',
            'country' => '收货人的国家',
            'province' => '收货人的省份',
            'city' => '收货人的城市',
            'district' => '收货人地区',
            'address' => '收货人的详细地址',
            'zipcode' => '收货人的邮编',
            'mobile' => '收货人手机',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * 查询收获地址
     *
     * @param $uid
     * @return array|null
     */
    static public function getAddress($uid)
    {
        $address = self::findAll(['user_id'=>$uid]);
        if(is_null($address))
        {
            return null;
        }
        else
        {

            $result = yii\helpers\ArrayHelper::toArray($address);
            foreach ($result as $key=>$value)
            {
                $result[$key]['region_name'] = Region::getRegionName([$value['country'],$value['province'],$value['district'],$value['city']]);
            }
            return $result;
        }
    }


}

<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property integer $region_id
 * @property integer $parent_id
 * @property string $region_name
 * @property integer $region_type
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'region_type'], 'integer'],
            [['region_name'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region_id' => 'Region ID',
            'parent_id' => 'Parent ID',
            'region_name' => 'Region Name',
            'region_type' => 'Region Type',
        ];
    }

    /**
     * 查询下级地区
     *
     * @param int $rid
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getDropDownRegion($rid=0)
    {
        $region = self::find()->where('parent_id=:rid',[':rid'=>$rid])->asArray()->all();
        if(is_null($region))
        {
            return null;
        }
        else
        {
            $result = [];
            foreach ($region as $key=>$value)
            {
                $result[$value['region_id']] = $value['region_name'];
            }
            return $result;
        }
    }

    /**
     * 查询地区名
     *
     * @param $rid
     * @return mixed|string
     */
    static public function getRegionName($rid)
    {
        if(is_array($rid))
        {
            $region = self::find()
                ->select('region_name')
                ->where(['in','region_id',$rid])
                ->asArray()
                ->all();
            return implode('&nbsp;',ArrayHelper::getColumn($region,'region_name'));
        }
        else
        {
            $region = self::find()
                ->select('region_name')
                ->where(['region_id'=>$rid])
                ->asArray()
                ->one();
            return $region['region_name'];
        }
    }
}

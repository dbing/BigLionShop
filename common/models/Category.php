<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property string $cat_id
 * @property string $cat_name
 * @property integer $sort
 * @property integer $is_show
 * @property string $parent_id
 *
 * @property Goods[] $goods
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort', 'is_show', 'parent_id'], 'integer'],
            [['cat_name'], 'string', 'max' => 45],
            ['parent_id','default','value'=>0]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_name' => '栏目名称',
            'sort' => '排序',
            'is_show' => '前台是否显示',
            'parent_id' => '父级栏目',
        ];
    }

    public function loadDefaultValues($skipIfSet = true)
    {
        $this->is_show = 1;
        $this->sort = 50;
        return $this;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['cat_id' => 'cat_id']);
    }

    /**
     * 分类下拉菜单数据
     *
     * @param array $categories
     * @return array
     */
    public function dropDownList($categories=[])
    {

        $result = [];
        if(is_array($categories))
        {
            foreach ($categories as $value)
            {
                $result[$value['cat_id']] = str_repeat('|----',$value['level']).$value['cat_name'];
            }
        }
        return $result;
    }

    /**
     * 处理无限极分类
     *
     * @param array $categories
     * @param int $parentId
     * @param int $level
     * @return array
     */
    static public function getLevelCategories($categories=[],$parentId=0,$level=0)
    {
        static $result = [];
        if(is_array($categories))
        {
            foreach ($categories as $key=>$value)
            {
                if($value['parent_id'] == $parentId)
                {
                    $value['level'] = $level;
                    $result[] = $value;
                    self::getLevelCategories($categories,$value['cat_id'],$level+1);
                }
            }
        }

        return $result;
    }
}

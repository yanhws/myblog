<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%metas}}".
 *
 * @property string $mid
 * @property string $name
 * @property string $slug
 * @property string $type
 * @property string $description
 * @property string $count
 * @property string $order
 * @property string $parent
 */
class Meta extends \yii\db\ActiveRecord
{

    const TYPE_CATEGORY = 'category';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%metas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['count', 'order', 'parent'], 'integer'],
            [['name', 'slug', 'description'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mid' => 'Mid',
            'name' => 'Name',
            'slug' => 'Slug',
            'type' => 'Type',
            'description' => 'Description',
            'count' => 'Count',
            'order' => 'Order',
            'parent' => 'Parent',
        ];
    }

    /**
     * @inheritdoc
     * @return MetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MetaQuery(get_called_class());
    }

    //对应关系

    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['mid' => 'mid']);
    }

    public function getContents()
    {
        return $this->hasMany(Content::className(), ['cid' => 'cid'])->via('relationships');
    }

}

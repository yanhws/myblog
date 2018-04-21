<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%relationships}}".
 *
 * @property string $cid
 * @property string $mid
 */
class Relationship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%relationships}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'mid'], 'required'],
            [['cid', 'mid'], 'integer'],
            [['cid', 'mid'], 'unique', 'targetAttribute' => ['cid', 'mid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'Cid',
            'mid' => 'Mid',
        ];
    }

    /**
     * @inheritdoc
     * @return RelationshipQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RelationshipQuery(get_called_class());
    }


}

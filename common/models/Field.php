<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%fields}}".
 *
 * @property string $cid
 * @property string $name
 * @property string $type
 * @property string $str_value
 * @property int $int_value
 * @property double $float_value
 */
class Field extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fields}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'name'], 'required'],
            [['cid', 'int_value'], 'integer'],
            [['str_value'], 'string'],
            [['float_value'], 'number'],
            [['name'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 8],
            [['cid', 'name'], 'unique', 'targetAttribute' => ['cid', 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'Cid',
            'name' => 'Name',
            'type' => 'Type',
            'str_value' => 'Str Value',
            'int_value' => 'Int Value',
            'float_value' => 'Float Value',
        ];
    }

    /**
     * @inheritdoc
     * @return FieldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FieldQuery(get_called_class());
    }
}

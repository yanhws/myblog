<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%comments}}".
 *
 * @property string $coid
 * @property string $cid
 * @property string $created
 * @property string $author
 * @property string $authorId
 * @property string $ownerId
 * @property string $mail
 * @property string $url
 * @property string $ip
 * @property string $agent
 * @property string $text
 * @property string $type
 * @property string $status
 * @property string $parent
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'created', 'authorId', 'ownerId', 'parent'], 'integer'],
            [['text'], 'string'],
            [['author', 'mail', 'url', 'agent'], 'string', 'max' => 200],
            [['ip'], 'string', 'max' => 64],
            [['type', 'status'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'coid' => 'Coid',
            'cid' => 'Cid',
            'created' => 'Created',
            'author' => 'Author',
            'authorId' => 'Author ID',
            'ownerId' => 'Owner ID',
            'mail' => 'Mail',
            'url' => 'Url',
            'ip' => 'Ip',
            'agent' => 'Agent',
            'text' => 'Text',
            'type' => 'Type',
            'status' => 'Status',
            'parent' => 'Parent',
        ];
    }

    /**
     * @inheritdoc
     * @return CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentQuery(get_called_class());
    }
}

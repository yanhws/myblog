<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%contents}}".
 *
 * @property string $cid
 * @property string $title
 * @property string $slug
 * @property string $created
 * @property string $modified
 * @property string $text
 * @property string $order
 * @property string $authorId
 * @property string $template
 * @property string $type
 * @property string $status
 * @property string $password
 * @property string $commentsNum
 * @property string $allowComment
 * @property string $allowPing
 * @property string $allowFeed
 * @property string $parent
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contents}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created', 'modified', 'order', 'authorId', 'commentsNum', 'parent'], 'integer'],
            [['text'], 'string'],
            [['title', 'slug'], 'string', 'max' => 200],
            [['template', 'password'], 'string', 'max' => 32],
            [['type', 'status'], 'string', 'max' => 16],
            [['allowComment', 'allowPing', 'allowFeed'], 'string', 'max' => 1],
            [['slug'], 'unique'],
            [['metas'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'Cid',
            'title' => '标题',
            'slug' => '缩略名',
            'created' => '生成时间',
            'modified' => '修改时间',
            'text' => '内容文字',
            'order' => '排序',
            'authorId' => '用户ID',
            'template' => '模板',
            'type' => '类别',
            'status' => '状态',
            'password' => '密码',
            'commentsNum' => '评论数',
            'allowComment' => '是否允许评论',
            'allowPing' => '是否允许ping',
            'allowFeed' => '允许出现在聚合中',
            'parent' => 'Parent',
        ];
    }

    /**
     * @inheritdoc
     * @return ContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContentQuery(get_called_class());
    }

    //对应关系

    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['cid' => 'cid']);
    }

    public function getMetas()
    {
        return $this->hasMany(Meta::className(), ['mid' => 'mid'])->via('relationships');
    }

    /*
     * 设置关联关系
     */
    public function setMetas($metas = [])
    {
        $this->unlinkAll('metas', true);
        foreach ((array)$metas as $m) {
            $metas_model = Meta::findOne($m);
            if ($metas_model) {
                $this->link('metas', $metas_model);
            }

        }
    }
}

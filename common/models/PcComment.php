<?php

namespace common\models;

use common\utils\DateTimeHelper;
use Yii;

/**
 * This is the model class for table "pc_comment".
 *
 * @property integer $comment_id
 * @property integer $travel_id
 * @property integer $owner_user_id
 * @property string $content
 * @property integer $likeCount
 * @property integer $parent_id
 * @property string $created_at
 */
class PcComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pc_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['travel_id', 'owner_user_id', 'content'], 'required'],
            [['travel_id', 'owner_user_id', 'likeCount', 'parent_id'], 'integer'],
            [['created_at'], 'safe'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'travel_id' => 'Travel ID',
            'owner_user_id' => 'Owner User ID',
            'content' => 'Content',
            'likeCount' => 'Like Count',
            'parent_id' => 'Parent ID',
            'created_at' => 'Created At',
        ];
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if ($insert) {
            $this->created_at = DateTimeHelper::now();
        }
        return true;
    }
}

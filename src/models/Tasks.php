<?php

namespace burakilhnn\crud\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $task_id
 * @property string $title
 * @property string $items
 * @property string $date
 * @property int $user_id
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'items', 'date', 'user_id'], 'required'],
            [['items'], 'string'],
            [['date'], 'safe'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'title' => 'Title',
            'items' => 'Items',
            'date' => 'Date',
            'user_id' => 'User ID',
        ];
    }
}

<?php

namespace burakilhnn\crud\models;

use Yii;

/**
 * This is the model class for table "clubs".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $country
 * @property string $created_at
 *
 * @property Branches[] $branches
 */
class Clubs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clubs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'country', 'created_at'], 'required'],
            [['created_at'], 'safe'],
            [['name', 'email', 'country'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            'country' => 'Country',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Branches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['club_id' => 'id']);
    }
}

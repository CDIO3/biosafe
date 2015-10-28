<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "yritys".
 *
 * @property integer $id
 * @property string $yritysnimi
 * @property string $tuotantopaikka
 *
 * @property Tuote[] $tuotes
 */
class Yritys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yritys';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['yritysnimi', 'tuotantopaikka'], 'required'],
            [['yritysnimi', 'tuotantopaikka'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'yritysnimi' => 'Yritysnimi',
            'tuotantopaikka' => 'Tuotantopaikka',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTuotes()
    {
        return $this->hasMany(Tuote::className(), ['yritys_id' => 'id']);
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asiakas".
 *
 * @property integer $id
 * @property string $nimi
 *
 * @property Tuote[] $tuotes
 */
class Asiakas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asiakas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nimi'], 'required'],
            [['nimi'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nimi' => 'Nimi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTuotes()
    {
        return $this->hasMany(Tuote::className(), ['asiakas_id' => 'id']);
    }
}

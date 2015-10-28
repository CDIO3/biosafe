<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bakteeri".
 *
 * @property integer $id
 * @property string $nimi
 * @property string $Tietoja
 *
 * @property Nos[] $nos
 */
class Bakteeri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bakteeri';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nimi', 'Tietoja'], 'required'],
            [['Tietoja'], 'string'],
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
            'Tietoja' => 'Tietoja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNos()
    {
        return $this->hasMany(Nos::className(), ['bakteeri_id' => 'id']);
    }
}

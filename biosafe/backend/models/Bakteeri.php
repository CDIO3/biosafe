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
            [['nimi', 'tietoja', 'm_oletusarvo1', 'M_oletusarvo2'], 'required'],
            [['Tietoja'], 'string'],
            [['m_oletusarvo1', 'M_oletusarvo2'], 'integer'],
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
            'tietoja' => 'Tietoja',
            'm_oletusarvo1' => 'Oletusarvo m', 
            'M_oletusarvo2' => 'Oletusarvo M',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNos()
    {
        return $this->hasMany(nos_analysoitavat::className(), ['bakteeri_id' => 'id']);
    }
}

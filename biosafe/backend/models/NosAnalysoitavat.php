<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nos_bakteerit".
 *
 * @property integer $nos_id
 * @property integer $bakteeri_id
 *
 * @property Nos $nos
 * @property Bakteeri $bakteeri
 */
class NosAnalysoitavat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nos_analysoitavat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['osanaytteita_n', 'osanaytteita_c','m_arvo1','M_arvo2'], 'required'],
            [['nos_id', 'bakteeri_id', 'osanaytteita_n', 'osanaytteita_c','m_arvo1','M_arvo2'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nos_id' => 'Näytteenottosuunnitelman ID',
            'bakteeri_id' => 'Bakteeri ID',
            'osanaytteita_n' => 'Osanaytteita (kpl)',
            'osanaytteita_c' => 'Virhemarginaali',
            'm_arvo1' => 'm arvo',
            'M_arvo2' => 'M arvo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNos()
    {
        return $this->hasOne(Nos::className(), ['id' => 'nos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBakteeri()
    {
        return $this->hasMany(Bakteeri::className(), ['id' => 'bakteeri_id']);
    }

    public function getnos_tulokset()
    {
        return $this->hasMany(Bakteeri::className(), ['bakteeri_id' => 'bakteeri_id']);
    }
}

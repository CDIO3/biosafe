<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nos".
 *
 * @property integer $id
 * @property string $luontipvm
 * @property string $naytteenottopvm
 * @property integer $tuote_id
 * @property integer $bakteeri_id
 * @property integer $henkilo_id
 * @property string $Raja-arvo1 (m)
 * @property string $Raja-arvo2 (M)
 * @property integer $Osanaytteita (n)
 * @property integer $Osanaytteidenmaara (c)
 *
 * @property Henkilo $henkilo
 * @property Tuote $tuote
 * @property Bakteeri $bakteeri
 */
class Nos extends \yii\db\ActiveRecord
{
    public $array;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['luontipvm', 'naytteenottopvm','nayte_lahetetty','analyysi_tehty','array','date'], 'safe'],
            [['tuote_id', 'Raja_arvo1_m', 'Raja_arvo2_M', 'Osanaytteita_n', 'Osanaytteidenmaara_c'], 'required'],
            [[  'Osanaytteita_n', 'Osanaytteidenmaara_c'], 'integer'],
            [['naytteenottopvm'],'date', 'format' => 'Y-m-d'],
            [['Raja_arvo1_m', 'Raja_arvo2_M'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'luontipvm' => 'Luontipvm',
            'naytteenottopvm' => 'Naytteenottopvm',
            'tuote_id' => 'Tuote',
            //'bakteeri_id' => 'Bakteeri',
            'henkilo_id' => 'Henkilo ID',        
            'Raja_arvo1_m' => 'Raja Arvo m',
            'Raja_arvo2_M' => 'Raja Arvo M',
            'Osanaytteita_n' => 'Osanaytteita n',
            'Osanaytteidenmaara_c' => 'Osanaytteidenmaara c',
            'analyysi_tehty' => 'Analyysi tehty',
            'nayte_lahetetty' => 'Näyte lähetetty',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHenkilo()
    {
        return $this->hasOne(Henkilo::className(), ['id' => 'henkilo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTuote()
    {
        return $this->hasOne(Tuote::className(), ['id' => 'tuote_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBakteeri()
    {
        return $this->hasOne(Bakteeri::className(), ['id' => 'bakteeri_id']);
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getNos_bakteerit() 
    {
        return $this->hasMany(Nos_bakteerit::className(), ['nos_id' => 'id']);
    }
}

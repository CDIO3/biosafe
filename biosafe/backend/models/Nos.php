<?php

namespace backend\models;

use Yii;
use backend\models\Send;

/**
 * This is the model class for table "nos".
 *
 * @property integer $id
 * @property string $luontipvm
 * @property string $naytteenottopvm
 * @property integer $tuote_id
 * @property integer $bakteeri_id
 * @property integer $henkilo_id
 * @property Henkilo $henkilo
 * @property Tuote $tuote
 * @property Bakteeri $bakteeri
 */
class Nos extends \yii\db\ActiveRecord
{
    public $array;
    public $Raja_arvo1_m;
    public $Raja_arvo2_M;
    public $Osanaytteita_n;
    public $Osanaytteidenmaara_c;
    public $arraBakteeri;

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
            [['luontipvm', 'naytteenottopvm','nayte_lahetetty','analyysi_tehty','array','arraBakteeri','id','henkilo_id'], 'safe'],
            [[ 'naytteenottopvm','tuote_id'], 'required'],
            //[[  'Osanaytteita_n', 'Osanaytteidenmaara_c'], 'integer'],
            [['naytteenottopvm'],'date', 'format' => 'Y-m-d'],
            //[['luontipvm'],'datetime', 'format' => 'd-m-Y'],
            //[['Raja_arvo1_m', 'Raja_arvo2_M'], 'string', 'max' => 32]
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
            'array' => 'Valitse analysoitavat bakteerit',
            'arraBakteeri' => 'Kohteet',
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
    public function getNos_analysoitavat() 
    {
        return $this->hasMany(Nos_analysoitavat::className(), ['nos_id' => 'id']);
    }
}

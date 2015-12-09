<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "nos_tulokset".
 *
 * @property string $m_tulos1
 * @property string $M_tulos2
 * @property integer $nos_id
 * @property integer $bakteeri_id
 *
 * @property Send $nos
 * @property NosAnalysoitavat $bakteeri
 */
class Tulokset extends \yii\db\ActiveRecord
{
    public $lkm;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nos_tulokset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['m_tulos1', 'M_tulos2', 'nos_id'], 'required'],
            [['nos_id', 'bakteeri_id'], 'integer'],
            [['m_tulos1', 'M_tulos2'], 'string', 'max' => 32],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'm_tulos1' => 'Tulos m',
            'M_tulos2' => 'Tulos M',
            'nos_id' => 'Nos ID',
            'bakteeri_id' => 'Bakteeri ID',
            'array' => 'array',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNos()
    {
        return $this->hasOne(Send::className(), ['nos_id' => 'nos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBakteeri()
    {
        return $this->hasOne(NosAnalysoitavat::className(), ['bakteeri_id' => 'bakteeri_id']);
    }
}

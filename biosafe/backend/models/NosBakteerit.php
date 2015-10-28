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
class NosBakteerit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nos_bakteerit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nos_id', 'bakteeri_id'], 'required'],
            [['nos_id', 'bakteeri_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nos_id' => 'Nos ID',
            'bakteeri_id' => 'Bakteeri ID',
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
        return $this->hasOne(Bakteeri::className(), ['id' => 'bakteeri_id']);
    }
}

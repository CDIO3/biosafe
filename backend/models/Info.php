<?php

namespace backend\models;

use Yii;


class Info extends \yii\db\ActiveRecord
{

    public static function tableName() {
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
            'nos_id' => 'Lähetettävän näytteenottosuunnitelman id',
            'bakteeri_id' => 'Bakteerin ID',
           
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

    /**
     * @return \yii\db\ActiveQuery
     */
}

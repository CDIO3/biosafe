<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "send".
 *
 * @property integer $nos_id
 * @property integer $henkilo_id
 * @property integer $labra_id
 * @property string $lisatietoja
 * @property string $lahetyspvm
 *
 * @property Nos $nos
 * @property Henkilo $henkilo
 * @property Laboratoriot $labra
 */
class Send extends \yii\db\ActiveRecord
{
    //public $nos_id = $model->id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'send';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nos_id', 'henkilo_id', 'labra_id', 'lisatietoja', 'lahetyspvm'], 'required'],
            [['nos_id', 'labra_id'], 'integer'],
            [['lisatietoja'], 'string'],
            [['lahetyspvm','henkilo_id','nos_id'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nos_id' => 'Lähetettävän näytteenottosuunnitelman id',
            'henkilo_id' => 'Lähettäjän nimi',
            'labra_id' => 'Valitse laboratorio',
            'lisatietoja' => 'Lisätietoja',
            'lahetyspvm' => 'Lähetyspäivämäärä',
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
    public function getHenkilo()
    {
        return $this->hasOne(Henkilo::className(), ['id' => 'henkilo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabra()
    {
        return $this->hasOne(Laboratoriot::className(), ['id' => 'labra_id']);
    }
}

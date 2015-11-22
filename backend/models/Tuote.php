<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tuote".
 *
 * @property integer $id
 * @property string $nimi
 * @property integer $ean
 * @property string $Ravintokoostumus
 * @property string $sisaltaako_porkkanaa
 * @property string $sisaltaako_perunaa
 * @property string $Tuoteryhma
 * @property integer $yritys_id
 * @property integer $asiakas_id
 *
 * @property Nos[] $nos
 * @property Asiakas $asiakas
 * @property Yritys $yritys
 */
class Tuote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tuote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nimi', 'ean', 'Ravintokoostumus', 'sisaltaako_porkkanaa', 'sisaltaako_perunaa', 'Tuoteryhma', 'yritys_id', 'asiakas_id'], 'required'],
            [['ean', 'yritys_id', 'asiakas_id'], 'integer'],
            [['Ravintokoostumus', 'sisaltaako_porkkanaa', 'sisaltaako_perunaa', 'Tuoteryhma'], 'string'],
            [['nimi'], 'string', 'max' => 100]
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
            'ean' => 'Ean',
            'Ravintokoostumus' => 'Ravintokoostumus',
            'sisaltaako_porkkanaa' => 'Sisaltaako Porkkanaa',
            'sisaltaako_perunaa' => 'Sisaltaako Perunaa',
            'Tuoteryhma' => 'Tuoteryhma',
            'yritys_id' => 'Yritys',
            'asiakas_id' => 'Asiakas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNos()
    {
        return $this->hasMany(Nos::className(), ['tuote_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsiakas()
    {
        return $this->hasOne(Asiakas::className(), ['id' => 'asiakas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYritys()
    {
        return $this->hasOne(Yritys::className(), ['id' => 'yritys_id']);
    }
}

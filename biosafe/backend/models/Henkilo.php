<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "henkilo".
 *
 * @property integer $id
 * @property string $username
 * @property string $etunimi
 * @property string $sukunimi
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $puhnro
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $yritys_id
 * @property integer $asiakas_id
 *
 * @property Nos[] $nos
 */
class Henkilo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'henkilo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'etunimi', 'sukunimi', 'auth_key', 'password_hash', 'email', 'puhnro', 'created_at', 'updated_at', 'yritys_id', 'asiakas_id'], 'required'],
            [['status', 'created_at', 'updated_at', 'yritys_id', 'asiakas_id'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['etunimi', 'sukunimi'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['puhnro'], 'string', 'max' => 20],
            [['etunimi'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'etunimi' => 'Etunimi',
            'sukunimi' => 'Sukunimi',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'puhnro' => 'Puhnro',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'yritys_id' => 'Yritys ID',
            'asiakas_id' => 'Asiakas ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNos()
    {
        return $this->hasMany(Nos::className(), ['henkilo_id' => 'id']);
    }
}

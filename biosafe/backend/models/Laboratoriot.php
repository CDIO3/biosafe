<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "laboratoriot".
 *
 * @property integer $id
 * @property string $laboratio_nimi
 * @property string $osoite
 * @property integer $postinro
 * @property string $postitoimipaikka
 * @property string $puhnro
 * @property string $sposti
 *
 * @property Send[] $sends
 */
class Laboratoriot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laboratoriot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['laboratio_nimi', 'osoite', 'postinro', 'postitoimipaikka', 'puhnro', 'sposti'], 'required'],
            [['postinro'], 'integer'],
            [['laboratio_nimi', 'postitoimipaikka', 'puhnro', 'sposti'], 'string', 'max' => 32],
            [['osoite'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'laboratio_nimi' => 'Laboratio Nimi',
            'osoite' => 'Osoite',
            'postinro' => 'Postinro',
            'postitoimipaikka' => 'Postitoimipaikka',
            'puhnro' => 'Puhnro',
            'sposti' => 'Sposti',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSends()
    {
        return $this->hasMany(Send::className(), ['labra_id' => 'id']);
    }
}

<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $etunimi;
    public $sukunimi;
    public $puhnro;
    public $passwordConfirm;
    public $yritys_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [       
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Käyttäjänimi on jo käytössä!'],
            ['username', 'string', 'min' => 4, 'max' => 50, 'tooShort' => 'Käyttäjänimen oltava vähintään 4 merkkiä', 'tooLong' => "Käyttäjänimen oltava enintään 20 merkkiä"],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message'=>'Syötä Sähköpostiosoite.'],
            ['email', 'email', 'message'=>'Virheellinen Sähköpostiosoite.'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Sähköposti on jo käytössä!'],

            ['password', 'required', 'message'=>'Syötä salasana.'],
            ['password', 'string', 'min' => 6, 'tooShort'=>'Salasanan oltava vähintään 6 merkkiä pitkä.'],

            ['passwordConfirm', 'required', 'message'=>'Uudelleen syötä salasana.'],
            ['passwordConfirm', 'string', 'min' => 6, 'tooShort'=>'Salasanan oltava vähintään 6 merkkiä pitkä.'],
            [['passwordConfirm'], 'compare', 'compareAttribute' => 'password', 'message'=>'Salasanat eivät täsmää.'],
            

            ['etunimi', 'required', 'message'=>'Syötä etunimi.'],
            ['sukunimi', 'required', 'message'=>'Syötä sukunimi.'],
            ['puhnro', 'required', 'message'=>'Syötä Puhelinnumero.'],
            ['yritys_id','required','message'=>'Valitse yrityksesi'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->email;
            $user->email = $this->email;
            $user->etunimi = $this->etunimi;
            $user->sukunimi = $this->sukunimi;
            $user->puhnro = $this->puhnro;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->yritys_id = $this->yritys_id;
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}

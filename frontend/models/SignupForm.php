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
//    public $firstName;
//    public $lastName;
//    public $country;
//    public $address;
//    public $zipcode;
  

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username','required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
//            
//            ['firstName', 'filter', 'filter' => 'trim'],
//            ['firstName','required'],
//            ['firstName', 'string', 'min' => 2, 'max' => 255],
//
//            ['lastName', 'filter', 'filter' => 'trim'],
//            ['lastName','required'],
//            ['lastName', 'string', 'min' => 2, 'max' => 255],
//            
//            ['country', 'filter', 'filter' => 'trim'],
//            ['country','required'],
//            ['country', 'string', 'min' => 2, 'max' => 255],
//
//            ['address', 'filter', 'filter' => 'trim'],
//            ['address','required'],
//            ['address', 'string', 'min' => 2, 'max' => 255],
//            
//            ['zipcode', 'filter', 'filter' => 'trim'],
//            ['zipcode','required'],
//            ['zipcode', 'integer', 'min' => 2, 'max' => 255],
           
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
//            $this->performAjaxValidation($user);
            
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->activation_key=sha1(mt_rand(10000, 99999).time().$user->email);
            $user->generateAuthKey();
//            $user->firstName=$this->firstName;
//            $user->lastName=$this->lastName;
//            $user->country=$this->country;
//            $user->address=$this->address;
//            $user->zipcode=$this->zipcode;
        $user->status = 0; 
        $subject="confirmation link";
if ($user->save()) {
return Yii::$app->mailer->compose()
->setTo($user->email)
->setFrom("kushwahapratibha.786@gmailcom")
->setSubject($subject)
->setTextBody('"pls click on following activation link"'.'" "'.$user->activation_key)
->send();
        }
        }

        return null;
    }

     
      
}

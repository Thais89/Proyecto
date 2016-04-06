<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [            
            // Name
            ['name', 'required', 'message' => 'Nombre no puede estar vacio'],
            [['name'], 'match', 'pattern' =>  "/^[a-zA-Z]+$/i",'message' => 'Sólo se aceptan letras'],
            // Email
            ['email', 'required', 'message' => 'Email no puede estar vacio'],
            ['email', 'email'],
            // Subject
            ['subject', 'required', 'message' => 'Asunto de puede estar vacio'],
            // Body
            ['body', 'required', 'message' => 'Mensaje no puede estar vacio'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
}

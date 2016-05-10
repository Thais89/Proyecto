<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Usuarios;
use app\models\TransaccionUsuario;
use app\models\Transacciones;
use app\models\Depositos;
use yii\db\Expression;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function definirLayout()
    {
        if (!\Yii::$app->user->isGuest) 
        {
            if(User::isUserAdmin(Yii::$app->user->identity->usuarioID))
            {
                $this->layout="_admin";
            }
            elseif(User::isUserSimple(Yii::$app->user->identity->usuarioID))
            {
                $this->layout="_usuario";
            }
            else
            {
                $this->layout="main";
            }
        }
    }
    public function actionIndex()
    {
        $this->definirLayout();
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->definirLayout();
        
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {            
            
            $model->password = SHA1($model->password);            
            if ($model->login()) {    
                $this->redirect('usuarios/home');
            } else {
                // Aqui se debe poner pagina de error de login
                echo 'No hace login';
            }

            
        }else{
            return $this->render('login', ['model' => $model]);
        }
    }

    /**
     * Registro de Usuario
     */
    
    public function actionRegistroUsuario ()
    {        
        $model = new Usuarios();
        $model->saldo=(float)0;
        $model->estado=0;
        $model->fechaRegistro= new Expression('NOW()');
        $model->role=4;

        if ($model->load(Yii::$app->request->post())  ) {
            echo 'Entra';
            // Se pasa el password que recibe a SHA1
            $model->password = SHA1($model->password);
            
            // Crea un authkey para confirmar registro usuario
            $model->authKey = SHA1(date('Y-m-d h:i:s') . $model->email);

            // Guarda Usuario
            if ($model->save()) {
                
                $table = new Usuarios;
                $usuario = $table->find()->where(["email"=>$model->email])->one();
                    
                /**
                 * Crea el correo para la confirmación                 
                 */
                $subject    = 'Confirmar Registro de Usuario';
                $body       = '<h1> Haga click en el registro para confirmar';
                $body      .= '<a href="http://localhost/deliverysc/web/confirmar-usuario/' . $model->authKey . '">Confirmar</a>';
                Yii::$app->mailer->compose()
                    ->setTo($usuario->email)
                    ->setFrom([Yii::$app->params["adminEmail"]=>Yii::$app->params["title"]])
                    ->setSubject($subject)
                    ->setHtmlBody($body)
                    ->send();

                return $this->redirect('login');

            } else {
                return $this->redirect('registro-usuario');
            }
            
        } else {
            return $this->render('registro-usuario', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Confirmar Registro de Usuario
     */

    public function actionConfirmarUsuario ($authKey = 'null') 
    {
        
        $table = new Usuarios();

        $usuario = $table
                    ->find('usuarioID')
                    ->where(['authKey'=>$authKey])
                    ->one();

        if (isset($usuario)) {
            $usuario->estado = 1;
            $usuario->update();
            $mensaje = 'Usuario activado satisfactoriamente';
            $estado = true;
        } else{
            $mensaje = 'No se pudo activar el usuario';
            $estado = false;
        }

        return $this->render('confirmar-usuario', ['mensaje' => $mensaje, 'estado' => $estado]);
        

    }

    public function actionLogout()
    {
        $this->definirLayout();
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $this->definirLayout();
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {

            /**
            * Crea el correo para la confirmación 
            */
           
            $subject    = $model->subject;
            $body       = '<p>Usuario: ' . $model->name . '</p>';
            $body       .= $model->body;
                        
            Yii::$app->mailer->compose()
                ->setTo(Yii::$app->params['adminEmail'])                
                ->setFrom([Yii::$app->params["adminEmail"]=>Yii::$app->params["title"]])
                ->setSubject($subject)
                ->setHtmlBody($body)
                ->send();

            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        $this->definirLayout();
        return $this->render('about');
    }

    public function actionExito()
    {
        $this->definirLayout();
        return $this->render('exito');
    }


    public function actionFallido()
    {
        $this->definirLayout();
        return $this->render('fallido');
    }

    public function actionCargarMercado()
    {
        $this->definirLayout();
        $model = new TransaccionUsuario();
        $modelUsuarios = new Usuarios();
        $modelDepositos = new Depositos();

        $model->usuarioID = Yii::$app->user->identity->Id;
        
        if ($model->load(Yii::$app->request->post()) && $model->transaccionID == 1  && $model->validate()) {
            
            $model->fecha = date('Y-m-d');
            $modelUsuarios = Usuarios::find()->where(['UsuarioID' => $model->usuarioID])->one();
            $modelUsuarios->saldo = $modelUsuarios->saldo + $model->monto;

            $model->save();
            $modelUsuarios->save();
        
            return $this->render('exito');
        
             
        } else {

            return $this->render('cargarmercado');
        }
    }    


    public function actionCargar()
    {
        $this->definirLayout();
        $model = new TransaccionUsuario();
        $modelUsuarios = new Usuarios();
        $modelDepositos = new Depositos();

        $model->usuarioID = Yii::$app->user->identity->Id;
        $model->transaccionID = 2;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $modelUsuarios = Usuarios::find()
                        ->where(['UsuarioID' => $model->usuarioID])
                        ->one();
            $modelDepositos = Depositos::find()
                        ->where(['numero' => $model->numeroReferencia,'estado'=>'0','banco'=>$model->origenBanco])
                        ->one();
            
            if ($modelDepositos && $modelUsuarios) {
                
                $modelDepositos->estado = 1;
                $valor = $modelDepositos->monto;
                $modelUsuarios->saldo = $modelUsuarios->saldo + $valor;

                $model->monto = $valor;
                $model->save();
                $modelUsuarios->save();
                $modelDepositos->save();

                return $this->render('exito', [
                    'model' => $modelUsuarios,
                    'model1'=> $modelDepositos,
                ]);
            }
            
            return $this->render('fallido', [
                'model' => $model,
            ]);        
        } else {

            return $this->render('cargar', [
                'model' => $model,
            ]);
        }
    }    

    // Pagina Como enviar
    public function actionComoEnviar()
    {
        $this->definirLayout();
        return $this->render('como-enviar');
    }

    // Pagina Servicios
    public function actionServicios()
    {
        $this->definirLayout();
        return $this->render('servicios');
    }

    public function actionUser()
    {
        $this->definirLayout();
        return $this->render("contact");
    }

    public function actionAdmin()
    {
        $this->definirLayout();
        return $this->render("/usuarios/create");
    }
}

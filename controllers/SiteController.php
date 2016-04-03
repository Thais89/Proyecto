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
            if(User::isUserAdmin(Yii::$app->user->identity->UsuarioID))
            {
                $this->layout="_admin";
            }
            elseif(User::isUserSimple(Yii::$app->user->identity->UsuarioID))
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
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect(['/site/index']);
        }else{
        return $this->render('login', [
            'model' => $model,
        ]);
        }
    }

    public function actionCreate()
    {
        $this->definirLayout();
        $this->definirLayout();
        $model = new Usuarios();
        $model->Saldo=(float)0;
        $model->estado=1;
        $model->fechaRegistro=date('d-m-Y');
        $model->role=4;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/site/login']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

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


    public function actionfallido()
    {
        $this->definirLayout();
        return $this->render('fallido');
    }

    public function actionCargar()
    {
        $this->definirLayout();
        $model = new TransaccionUsuario();
        $modelUsuarios = new Usuarios();
        $modelDepositos = new Depositos();

        $model->usuarioID = Yii::$app->user->identity->Id;
        
        if ($model->load(Yii::$app->request->post()) && $model->transaccionID == 1  && $model->validate()) {
            
            $model->fecha = date('Y-m-d');
            $modelUsuarios = Usuarios::find()->where(['UsuarioID' => $model->usuarioID])->one();
            $modelUsuarios->Saldo = $modelUsuarios->Saldo + $model->monto;

            $model->save();
            $modelUsuarios->save();
        
            return $this->render('exito');
        
        }elseif ($model->load(Yii::$app->request->post()) && $model->transaccionID == 2  && $model->validate()) {
            
            $modelUsuarios = Usuarios::find()->where(['UsuarioID' => $model->usuarioID])->one();
            $modelUsuarios->Saldo = $modelUsuarios->Saldo + $model->monto;

            $modelDepositos = Depositos::find()->where(['Numero' => $model->NumeroReferencia])->one();
            if ($modelDepositos) {
                $valor = $modelDepositos->monto;
                $modelUsuarios->Saldo = $modelUsuarios->Saldo + $valor;

                $model->monto = $valor;
                $model->save();
                $modelUsuarios->save();

                return $this->render('exito');
            }
            
            return $this->render('fallido');        
        } else {

            return $this->render('cargar');
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

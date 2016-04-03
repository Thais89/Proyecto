<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{

    public function actionUser()
    {
        return $this->render("contact");
    }

    public function actionAdmin()
    {
        return $this->render("/usuarios/create");
    }
    

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','user','admin'],
                'rules' => [
                    [
                        'actions' => ['logout','admin'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule,$action){

                            return User::isUserAdmin(Yii::$app->user->identity->UsuarioID);
                        }
                    ],
                    [
                        'actions' => ['logout','user'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule,$action){

                            return User::isUserSimple(Yii::$app->user->identity->UsuarioID);
                        }
                    ],
                ],
            ],
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            
            if(User::isUserAdmin(Yii::$app->user->identity->UsuarioID))
            {
                return $this->redirect(["/usuarios/create"]);
            }else{
                return $this->redirect(["site/contact"]);
            }
        
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if(User::isUserAdmin(Yii::$app->user->identity->UsuarioID))
            {
                return $this->redirect(["/usuarios/create"]);
            }else{
                return $this->redirect(["site/contact"]);
            }
        }else{
        return $this->render('login', [
            'model' => $model,
        ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
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
        return $this->render('about');
    }

    // Pagina Como enviar
    public function actionComoEnviar()
    {
        return $this->render('como-enviar');
    }

    // Pagina Servicios
    public function actionServicios()
    {
        return $this->render('servicios');
    }
}

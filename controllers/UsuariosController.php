<?php

namespace app\controllers;

use Yii;
use app\models\Usuarios;
use app\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use app\models\Encomiendas;



/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update'],
                'rules' => [
                    [
                        'actions' => ['index','create','update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule,$action){

                            return User::isUserAdmin(Yii::$app->user->identity->usuarioID);
                        }
                    ],
                    [
                        'actions' => ['index','update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule,$action){

                            return User::isUserSimple(Yii::$app->user->identity->usuarioID);
                        }
                    ],
                    [
                        'actions' => ['index','update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule,$action){

                            return User::isUserOperador(Yii::$app->user->identity->usuarioID);
                        }
                    ],
                    [
                        'actions' => ['index','update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule,$action){

                            return User::isUserRepartidor(Yii::$app->user->identity->usuarioID);
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

    public function definirLayout()
    {
        if (!\Yii::$app->user->isGuest) 
        {
            if(User::isUserAdmin(Yii::$app->user->identity->usuarioID))
            {
                $this->layout="_admin";
            }
            elseif (User::isUserSimple(Yii::$app->user->identity->usuarioID))
            {
                $this->layout="_usuario";
            }
            elseif (User::isUserRepartidor(Yii::$app->user->identity->usuarioID))
            {                
                $this->layout="_repartidor";
            }
            elseif (User::isUserOperador(Yii::$app->user->identity->usuarioID))
            {
                $this->layout="_operador";
            }
            else
            {
                $this->layout="main";
            }
        }
    }
    /**
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->definirLayout();        
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionInhabilitar()
    {
        $this->definirLayout();        
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('inhabilitar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Usuarios model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id = null)
    {
        $this->definirLayout();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->definirLayout();
        $model = new Usuarios();
        $model->saldo=(float)0;
        $model->estado=1;
        $model->fechaRegistro=date('Y-m-d');
        $model->role=$id;

        if ($model->load(Yii::$app->request->post())  ) {            
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

                return $this->redirect(['view', 'id' => $model->usuarioID]);

            } else {
               return $this->render('create', [
                'model' => $model,
                ]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->definirLayout();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                $model->password = SHA1($model->password);
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->usuarioID]);    
                }
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->definirLayout();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionListado ($id=NULL) {
        $this->definirLayout();
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listado', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAsignada(){
        
        $var = Encomiendas::find()->join('INNER JOIN','repartidor_encomienda','repartidor_encomienda.encomiendaID=encomiendas.encomiendaID')->where(['repartidor_encomienda.usuarioID'=>Yii::$app->user->identity->usuarioID])->andWhere(['encomiendas.estadoEncomiendaID'=>'2']);
        
       $resul = new ActiveDataProvider (['query'=>$var]); 
        //echo "<pre>";
        //var_dump($var);
        //echo "</pre>";
        return $this->render('asignada',['dataProvider'=> $resul]);
    }
}

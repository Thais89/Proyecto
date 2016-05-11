<?php

namespace app\controllers;

use Yii;
use app\models\Encomiendas;
use app\models\EncomiendasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use yii\filters\AccessControl;

/**
 * EncomiendasController implements the CRUD actions for Encomiendas model.
 */
class EncomiendasController extends Controller
{
    /**
     * @inheritdoc
     */
    public $onloadFunction='initialize();';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update'],
                'rules' => [
                    [
                        'actions' => ['index','create','update','calculate'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule,$action){

                            return User::isUserAdmin(Yii::$app->user->identity->usuarioID);
                        }
                    ],
                    [
                        'actions' => ['index','create','update','calculate'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule,$action){

                            return User::isUserOperador(Yii::$app->user->identity->usuarioID);
                        }
                    ],
                    [
                        'actions' => ['index','create','update','calculate'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule,$action){

                            return User::isUserSimple(Yii::$app->user->identity->usuarioID);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Encomiendas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EncomiendasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Encomiendas models.
     * @return mixed
     */
    public function actionAsignar()
    {
        $searchModel = new EncomiendasSearch();
        $dataProvider = $searchModel->pendientes(Yii::$app->request->queryParams);

        return $this->render('asignar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Encomiendas model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Encomiendas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCalculate()
    {
        return $this->render('calculate');
    }
    public function actionCreate()
    {
        Yii::$app->controller->enableCsrfValidation = false;
        $model = new Encomiendas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->encomiendaID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    

    /**
     * Updates an existing Encomiendas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->encomiendaID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Encomiendas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Encomiendas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Encomiendas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Encomiendas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

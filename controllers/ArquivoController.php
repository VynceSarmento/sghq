<?php

namespace app\controllers;

use Yii;
use app\models\Arquivo;
use app\models\ArquivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArquivoController implements the CRUD actions for Arquivo model.
 */
class ArquivoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Arquivo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArquivoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Arquivo model.
     * @param integer $id
     * @param integer $idTitulo
     * @param integer $idCategoria
     * @return mixed
     */
    public function actionView($id, $idTitulo, $idCategoria)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $idTitulo, $idCategoria),
        ]);
    }

    /**
     * Creates a new Arquivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Arquivo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'idTitulo' => $model->idTitulo, 'idCategoria' => $model->idCategoria]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Arquivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $idTitulo
     * @param integer $idCategoria
     * @return mixed
     */
    public function actionUpdate($id, $idTitulo, $idCategoria)
    {
        $model = $this->findModel($id, $idTitulo, $idCategoria);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'idTitulo' => $model->idTitulo, 'idCategoria' => $model->idCategoria]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Arquivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $idTitulo
     * @param integer $idCategoria
     * @return mixed
     */
    public function actionDelete($id, $idTitulo, $idCategoria)
    {
        $this->findModel($id, $idTitulo, $idCategoria)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Arquivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $idTitulo
     * @param integer $idCategoria
     * @return Arquivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $idTitulo, $idCategoria)
    {
        if (($model = Arquivo::findOne(['id' => $id, 'idTitulo' => $idTitulo, 'idCategoria' => $idCategoria])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

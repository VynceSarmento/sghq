<?php

namespace app\controllers;

use Yii;
use app\models\Titulo;
use app\models\TituloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TituloController implements the CRUD actions for Titulo model.
 */
class TituloController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Titulo models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TituloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Titulo model.
     * @param integer $id
     * @param integer $idCategoria
     * @return mixed
     */
    public function actionView($id, $idCategoria) {
        return $this->render('view', [
                    'model' => $this->findModel($id, $idCategoria),
        ]);
    }

    /**
     * Creates a new Titulo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Titulo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id, 'idCategoria' => $model->idCategoria]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Titulo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $idCategoria
     * @return mixed
     */
    public function actionUpdate($id, $idCategoria) {
        $model = $this->findModel($id, $idCategoria);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'idCategoria' => $model->idCategoria]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Titulo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $idCategoria
     * @return mixed
     */
    public function actionDelete($id, $idCategoria) {
        $this->findModel($id, $idCategoria)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Titulo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $idCategoria
     * @return Titulo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $idCategoria) {
        if (($model = Titulo::findOne(['id' => $id, 'idCategoria' => $idCategoria])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

<?php

namespace app\controllers;

use Yii;
use app\models\VwRealisasiDetail;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Realisasi;
use yii\base\DynamicModel;

/**
 * VwRealisasiDetailController implements the CRUD actions for VwRealisasiDetail model.
 */
class LaporanRealisasiController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all VwRealisasiDetail models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $idRab = null;

        if (Yii::$app->request->post()) {
            $idRab = Yii::$app->request->post('id_rab', null);
        }
        $searchModel = Realisasi::find()->where(['id_rab' => $idRab])->all();
        $model = new DynamicModel([
          'id_rab',
        ]);
        $model->addRule(['id_rab'], 'required');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single VwRealisasiDetail model.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new VwRealisasiDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VwRealisasiDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']); // 'id' => $model->id_d_rab]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing VwRealisasiDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']); // 'id' => $model->id_d_rab]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing VwRealisasiDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        try {
            $this->findModel($id)->delete();
        } catch (\yii\db\IntegrityException  $e) {
            Yii::$app->session->setFlash('error', 'Data Tidak Dapat Dihapus Karena Dipakai Modul Lain');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the VwRealisasiDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return VwRealisasiDetail the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VwRealisasiDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

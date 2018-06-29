<?php

namespace app\controllers;

use app\models\VwRealisasiDetail;
use yii\web\Controller;
use app\models\Realisasi;
use yii\base\DynamicModel;
use yii\db\Expression;
use yii\web\Response;
use yii\helpers\Json;

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
            [
                'class' => 'yii\filters\ContentNegotiator',
                'only' => ['data'],  // in a controller
            // if in a module, use the following IDs for user actions
            // 'only' => ['user/view', 'user/index']
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
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
        $model = new DynamicModel([
          'id_rab',
        ]);
        $model->addRule(['id_rab'], 'required');

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionData($id_rab)
    {
        $datediff = new Expression('DATEDIFF(day,tgl_aw_realisasi,tgl_ak_realisasi)');
        $searchModel = Realisasi::find()
                                ->select(['id_realisasi' => 'id_realisasi', 'no_realisasi' => 'no_realisasi', 'tgl_aw_realisasi' => 'tgl_aw_realisasi', 'duration' => $datediff])
                                ->where(['id_rab' => $id_rab])->all();

        $datax = '';
        $link = '';
        foreach ($searchModel as $model) {
            $datax .= Json::encode([
                'id' => $model->id_realisasi,
                'start_date' => $model->tgl_aw_realisasi,
                'text' => $model->no_realisasi,
                'duration' => $model->duration,
            ]);
            $link .= Json::encode([
                    'id' => $model->id_realisasi,
                    'source' => $model->id_realisasi,
                    'target' => $model->id_realisasi,
                    'type' => 0,
            ]);
        }
        $data = ['data' => $datax, 'link' => $link];

        return $data;
    }
}

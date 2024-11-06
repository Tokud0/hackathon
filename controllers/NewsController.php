<?php

namespace app\controllers;

use Yii;
use app\models\News;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $news = News::find()->all();

        return $this->render('index', ['news' => $news]);
    }

    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = Yii::$app->request->post('News')['image'];

            if (!empty($model->image)) {
                if ($model->save()) {
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('error', 'Не удалось сохранить новость.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Пожалуйста, загрузите изображение.');
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $news = $this->findModel($id);

        if (Yii::$app->user->identity->mail === 'danilchaikin@mail.ru') {
            $news->delete();
        }

        return $this->redirect(['index']);
    }
    protected function findModel($id): ?News
    {
        if (($model = News::findOne(['_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

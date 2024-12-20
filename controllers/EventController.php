<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class EventController extends Controller
{
    public function actionIndex()
    {
        $events = Event::find()->all();

        return $this->render('index', ['events' => $events]);
    }

    public function actionCreate()
    {
        $model = new Event();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = Yii::$app->request->post('Event')['image'];

            if (!empty($model->image)) {
                if ($model->save()) {
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('error', 'Не удалось сохранить событие.');
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
        $event = $this->findModel($id);

        if (Yii::$app->user->identity->mail === 'danilchaikin@mail.ru') {
            $event->delete();
        }

        return $this->redirect(['index']);
    }
    protected function findModel($id): ?Event
    {
        if (($model = Event::findOne(['_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

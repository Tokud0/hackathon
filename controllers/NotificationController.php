<?php

namespace app\controllers;
use app\models\User;
use Yii;
use yii\web\Controller;
use app\models\Notification;

class NotificationController extends Controller
{
    public function actionIndex()
    {
        $notificationModel = new Notification();
        $notifications = $notificationModel->getAllNotifications();

        return $this->render('index', [
            'notifications' => $notifications,
        ]);
    }

    public function actionCreate()
    {
        $user = Yii::$app->user->identity;
        $notificationModel = new Notification();

        if (Yii::$app->request->isPost && $notificationModel->addNotification(Yii::$app->request->post())) {
            if ($user instanceof User && $user->rewardForNot()) {
                Yii::$app->session->setFlash('success', 'Вы получили награду за создание метки!');
            } else {
                Yii::$app->session->setFlash('info', 'Сегодня вы уже получили награду за создание метки.');
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $notificationModel,
        ]);
    }
    public function actionDelete($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $notification = Notification::findOne(['_id' => $id]);

        if ($notification !== null && $notification->delete()) {
            return ['success' => true];
        } else {
            return ['success' => false];
        }
    }
}
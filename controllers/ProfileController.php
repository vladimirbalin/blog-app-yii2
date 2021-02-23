<?php


namespace app\controllers;


use app\models\User;

class ProfileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = \Yii::$app->user->getIdentity();
        return $this->render('index', ['model' => $model]);
    }

    public function actionEdit()
    {
        /** @var User $model */
        $model = \Yii::$app->user->getIdentity();
        $model->setScenario(User::SCENARIO_EDIT_PROFILE);
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            \Yii::$app->session->setFlash('success', 'Profile saved');
            return $this->redirect('/profile');
        }
        return $this->render('edit', ['model' => $model]);
    }
}
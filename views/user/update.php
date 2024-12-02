<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserApi $model */

$this->title = 'Update User Api: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Apis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-api-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

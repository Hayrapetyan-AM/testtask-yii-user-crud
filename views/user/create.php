<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserApi $model */

$this->title = 'Create User Api';
$this->params['breadcrumbs'][] = ['label' => 'User Apis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-api-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

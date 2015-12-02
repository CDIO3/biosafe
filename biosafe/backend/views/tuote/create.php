<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tuote */

$this->title = 'Create Tuote';
$this->params['breadcrumbs'][] = ['label' => 'Tuotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tuote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

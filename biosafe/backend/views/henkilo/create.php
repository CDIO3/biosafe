<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Henkilo */

$this->title = 'Create Henkilo';
$this->params['breadcrumbs'][] = ['label' => 'Henkilos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="henkilo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nos */

$this->title = 'Luo uusi näyttöönottosuunnitelma';
$this->params['breadcrumbs'][] = ['label' => 'Nos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

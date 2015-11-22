<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nos */

$this->title = 'Luo näytteenottosuunnitelma';
$this->params['breadcrumbs'][] = ['label' => 'Nos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_form', [
        'model' => $model,
        'modelsBakteeri' => $modelsBakteeri,
    ]) ?>

</div>

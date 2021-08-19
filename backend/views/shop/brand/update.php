<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model core\entities\Shop\Brand */

$this->title = 'Update Brand: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
//TODO: Getting unknown property: core\forms\manage\Shop\BrandForm::id
$this->params['breadcrumbs'][] = ['label' => $model->name/*, 'url' => ['view', 'id' => $model->id]*/];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model core\forms\manage\Shop\TagForm */
/* @var $tag core\entities\Shop\Tag */

$this->title = 'Update Tag: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tag->name, 'url' => ['view', 'id' => $tag->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tag-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

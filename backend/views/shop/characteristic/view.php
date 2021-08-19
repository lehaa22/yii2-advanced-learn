<?php

use core\helpers\CharacteristicHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $characteristic  core\entities\Shop\Characteristic */

$this->title = $characteristic->name;
$this->params['breadcrumbs'][] = ['label' => 'Characteristics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="characteristic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $characteristic->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $characteristic->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $characteristic,
                'attributes' => [
                    'id',
                    'name',
                    [
                        'attribute' => 'type',
                        'value' => CharacteristicHelper::typeName($characteristic->type),
                    ],
                    'sort',
                    'required:boolean',
                    'default',
                    [
                        'attribute' => 'variants',
                        'value' => implode(PHP_EOL, $characteristic->variants),
                        'format' => 'ntext',
                    ],
                ],
            ]) ?>
        </div>
    </div>

</div>

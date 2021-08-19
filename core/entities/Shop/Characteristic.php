<?php

namespace core\entities\Shop;

use yii\helpers\Json;

/**
 * This is the model class for table "shop_characteristics".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $required
 * @property string|null $default
 * @property array  $variants
 * @property int $sort
 */
class Characteristic extends \yii\db\ActiveRecord
{
    const TYPE_STRING = 'string';
    const TYPE_INTEGER = 'integer';
    const TYPE_FLOAT = 'float';

    public $variants;

    public static function create($name, $type, $required, $default, array $variants, $sort): self
    {
        $object = new static();
        $object->name = $name;
        $object->type = $type;
        $object->required = $required;
        $object->default = $default;
        $object->variants = $variants;
        $object->sort = $sort;
        return $object;
    }

    public function edit($name, $type, $required, $default, array $variants, $sort): void
    {
        $this->name = $name;
        $this->type = $type;
        $this->required = $required;
        $this->default = $default;
        $this->variants = $variants;
        $this->sort = $sort;
    }

    public function isSelect(): bool
    {
        return count($this->variants) > 0;
    }

    public function isString(): bool
    {
        return $this->type === self::TYPE_STRING;
    }

    public function isInteger(): bool
    {
        return $this->type === self::TYPE_INTEGER;
    }

    public function isFloat(): bool
    {
        return $this->type === self::TYPE_FLOAT;
    }

    public static function tableName(): string
    {
        return '{{%shop_characteristics}}';
    }

    public function afterFind(): void
    {
        $this->variants = Json::decode($this->getAttribute('variants_json'));
        parent::afterFind();
    }

    public function beforeSave($insert): bool
    {
        $this->setAttribute('variants_json', Json::encode($this->variants));
        return parent::beforeSave($insert);
    }
}

<?php

namespace core\forms\manage\Shop\Product;

use core\entities\Shop\Characteristic;
use core\entities\Shop\Product\Product;
use core\forms\manage\MetaForm;
use elisdn\compositeForm\CompositeForm;

/**
 * @property PriceForm $price
 * @property MetaForm $meta
 * @property CategoriesForm $categories
 * @property PhotosForm $photos
 * @property TagsForm $tags
 * @property ValueForm[] $values
 */
class ProductCreateForm extends CompositeForm
{
    public $brandId;
    public $code;
    public $name;

    public function __construct($config = [])
    {
        $this->price = new PriceForm();
        $this->meta = new MetaForm();
        $this->categories = new CategoriesForm();
        $this->photos = new PhotosForm();
        $this->tags = new TagsForm();
        $this->values = array_map(function (Characteristic $characteristic) {
            return new ValueForm($characteristic);
        }, Characteristic::find()->orderBy('sort')->all());
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['brandId', 'code', 'name'], 'required'],
            [['code', 'name'], 'string', 'max' => 255],
            [['brandId'], 'integer'],
            [['code'], 'unique', 'targetClass' => Product::class],
        ];
    }

    protected function internalForms(): array
    {
        return ['price', 'meta','photos', 'categories', 'tags', 'values'];
    }
}
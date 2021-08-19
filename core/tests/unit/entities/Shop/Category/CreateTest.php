<?php

namespace core\tests\unit\entities\Shop\Category;

use Codeception\Test\Unit;
use core\entities\Shop\Category;
use core\entities\Meta;

class CreateTest extends Unit
{
    public function testSuccess()
    {
        $category = Category::create(
            $name = 'Name',
            $slug = 'slug',
            $title = 'Full header',
            $description = 'Description',
            $meta = new Meta('Title', 'Description', 'Keywords')
        );

        $this->assertEquals($name, $category->name);
        $this->assertEquals($slug, $category->slug);
        $this->assertEquals($title, $category->title);
        $this->assertEquals($description, $category->description);
        $this->assertEquals($meta, $category->meta);
    }
}
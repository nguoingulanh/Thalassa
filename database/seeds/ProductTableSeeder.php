<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //Data Type
        $dataType = $this->dataType('name', 'product');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'product',
                'display_name_singular' => 'Product',
                'display_name_plural'   => 'Products',
                'icon'                  => 'voyager-wallet',
                'model_name'            => 'App\Models\Product',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
                'details'               =>'{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}'
            ])->save();
        }
        //Data Rows
        $product = DataType::where('slug', 'product')->firstOrFail();
        $dataRow = $this->dataRow($product, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Id',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }
        $dataRow = $this->dataRow($product, 'id_sub_category');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Category',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'relationship' => [
                        'key'   => 'id',
                        'label' => 'name',
                    ],
                ],
                'order'        => 2,
            ])->save();
        }
        $dataRow = $this->dataRow($product, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Name',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }
        $dataRow = $this->dataRow($product, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Slug',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'slugify' => [
                        'origin' => 'name',
                    ],
                ],
                'order' => 4,
            ])->save();
        }
        $dataRow = $this->dataRow($product, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'multiple_images',
                'display_name' => 'Image',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order' => 5,
            ])->save();
        }
        $dataRow = $this->dataRow($product, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => 'Description',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($product, 'content');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => 'Content',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 7,
            ])->save();
        }
        $dataRow = $this->dataRow($product, 'price');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => 'Price',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($product, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Created At',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 0,
                'delete'       => 1,
                'order'        => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($product, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Updated At',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 10,
            ])->save();
        }

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Products',
            'url'     => '',
            'route'   => 'voyager.product.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-wallet',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 16,
            ])->save();
        }

        Permission::generateFor('product');

        Product::create([
            'id_sub_category'   => 6,
            'name'              => 'NEW CBD Bath Treatment',
            'slug'              => 'new-cbd-bath-treatment',
            'image'             => '["product/item1.jpg","product/item2.jpg","product/item3.jpg","product/item1.jpg"]',
            'description'       => 'The products used in this bath treatment have been specially selected for their pain relief and anti…',
            'content'           => 'Enjoy the full benefits of Sundara’s signature products which draw ingredients indigenous to the area. This treatment begins with exfoliation of the skin, followed by a luxurious bath soak and then full body hydration to conclude the service.',
            'price'             =>  200
        ]);

        Product::create([
            'id_sub_category'   => 6,
            'name'              => 'Signature Salt Bath Treatment',
            'slug'              => 'signature-salt-bath-treatment',
            'image'             => '["product/item1.jpg","product/item2.jpg","product/item3.jpg","product/item1.jpg"]',
            'description'       => 'The products used in this bath treatment have been specially selected for their pain relief and anti…',
            'content'           => 'Enjoy the full benefits of Sundara’s signature products which draw ingredients indigenous to the area. This treatment begins with exfoliation of the skin, followed by a luxurious bath soak and then full body hydration to conclude the service.',
            'price'             =>  200
        ]);

        Product::create([
            'id_sub_category'   => 6,
            'name'              => 'NEW CBD Bath Treatment1',
            'slug'              => 'new-cbd-bath-treatment1',
            'image'             => '["product/item1.jpg","product/item2.jpg","product/item3.jpg","product/item1.jpg"]',
            'description'       => 'The products used in this bath treatment have been specially selected for their pain relief and anti…',
            'content'           => 'Enjoy the full benefits of Sundara’s signature products which draw ingredients indigenous to the area. This treatment begins with exfoliation of the skin, followed by a luxurious bath soak and then full body hydration to conclude the service.',
            'price'             =>  200
        ]);

        Product::create([
            'id_sub_category'   => 6,
            'name'              => 'NEW CBD Bath Treatment2',
            'slug'              => 'new-cbd-bath-treatment2',
            'image'             => '["product/item1.jpg","product/item2.jpg","product/item3.jpg","product/item1.jpg"]',
            'description'       => 'The products used in this bath treatment have been specially selected for their pain relief and anti…',
            'content'           => 'Enjoy the full benefits of Sundara’s signature products which draw ingredients indigenous to the area. This treatment begins with exfoliation of the skin, followed by a luxurious bath soak and then full body hydration to conclude the service.',
            'price'             =>  200
        ]);
    }


    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }

    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}

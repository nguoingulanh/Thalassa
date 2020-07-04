<?php

use Illuminate\Database\Seeder;
use App\Models\CategoryProduct;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;


class CategoryProductTableSeeder extends Seeder
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
        $dataType = $this->dataType('name', 'category_product');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'category-product',
                'display_name_singular' => 'Category Product',
                'display_name_plural'   => 'Category Products',
                'icon'                  => 'voyager-categories',
                'model_name'            => 'App\Models\CategoryProduct',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
                'details'               =>'{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}'
            ])->save();
        }

        //Data Rows
        $category = DataType::where('slug', 'category-product')->firstOrFail();
        $dataRow = $this->dataRow($category, 'id');
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

        $dataRow = $this->dataRow($category, 'parent_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Parent',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => '',
                    'null'    => '',
                    'options' => [
                        '' => '-- None --',
                    ],
                    'relationship' => [
                        'key'   => 'id',
                        'label' => 'name',
                    ],
                ],
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($category, 'name');
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

        $dataRow = $this->dataRow($category, 'slug');
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

        $dataRow = $this->dataRow($category, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
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

        $dataRow = $this->dataRow($category, 'created_at');
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
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($category, 'updated_at');
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
                'order'        => 7,
            ])->save();
        }
        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Category Products',
            'url'     => '',
            'route'   => 'voyager.category-product.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-categories',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 15,
            ])->save();
        }

        //Permissions
        Permission::generateFor('category_product');


        CategoryProduct::create([
            'name'              => 'Hydrotherapy',
            'slug'              => 'hydrotherapy',
            'image'             => 'category-product\cat1.jpg',
        ]);

        CategoryProduct::create([
            'name'              => 'Algotherapy',
            'slug'              => 'algotherapy',
            'image'             => 'category-product\cat2.jpg',
        ]);

        CategoryProduct::create([
            'name'              => 'Physiotherapy',
            'slug'              => 'physiotherapy',
            'image'             => 'category-product\cat3.jpg',
        ]);

        CategoryProduct::create([
            'name'              => 'Aqua Exercise',
            'slug'              => 'aqua-exercise',
            'image'             => 'category-product\cat4.jpg',
        ]);

        CategoryProduct::create([
            'name'              => 'Underwater Massage',
            'slug'              => 'underwater-massage',
            'image'             => 'category-product\cat5.jpg',
        ]);

        CategoryProduct::create([
            'parent_id'         => '1',
            'name'              => 'Spa Bath',
            'slug'              => 'spa-bath',
            'image'             => 'category-product\sub1.png',
        ]);

        CategoryProduct::create([
            'parent_id'         => '1',
            'name'              => 'Icon sub 2',
            'slug'              => 'icon-sub-2',
            'image'             => 'category-product\sub2.png',
        ]);

        CategoryProduct::create([
            'parent_id'         => '1',
            'name'              => 'Icon sub 3',
            'slug'              => 'icon-sub-3',
            'image'             => 'category-product\sub3.png',
        ]);

        CategoryProduct::create([
            'parent_id'         => '1',
            'name'              => 'Icon sub 4',
            'slug'              => 'icon-sub-4',
            'image'             => 'category-product\sub4.png',
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

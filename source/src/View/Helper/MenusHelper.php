<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;

/**
 * Menus helper
 */
class MenusHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function get(){
    	$this->Categories= TableRegistry::get('Categories');
    	$categories_banner=$this->Categories->find('all');
    	$categories_banner=$categories_banner->toArray();
        $categories_banner=$this->showCategories($categories_banner,$parent_id = null,$char = '');
    }
    public function showCategories($categories, $parent_id = null, $char = '')
    {
        
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $cate_child = array();
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id)
            {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
         
        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child)
        {
            echo '<ul>';
            foreach ($cate_child as $key => $item)
            {
                // Hiển thị tiêu đề chuyên mục
              echo '<li class="parent-menu"><a href="/categories/'.$item['id'].'">'.$char.$item['name'].'</a>';
                // dd($html);
                 
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $this->showCategories($categories, $item['id'], $char.'|---');


                echo '</li>';
            }
            echo '</ul>';
            // dd($html);
        }
    }

}

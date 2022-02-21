<?php


namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Brand;
use App\Models\ProductPrimaryCategory;
use App\Models\Blog;
use App\Models\Setting;
use Illuminate\Support\Str;

class SensitiveComposer
{
    public function compose(View $view){

        $topNav           = Menu::where('location',1)->first();
        $footerMenu       = Menu::where('location',2)->get();
        $productBrand     = Brand::with('series')->get();
        $productPrimary   = ProductPrimaryCategory::with('secondary')->get();
        $topNavItems      = json_decode(@$topNav->content);
        $topNavItems      = @$topNavItems[0];
        $footerMenuItems  = @$footerMenuItems[0];

        if(!empty(@$topNavItems)){
            foreach($topNavItems as $menu){
                $menu->title = MenuItem::where('id',$menu->id)->value('title');
                $menu->name = MenuItem::where('id',$menu->id)->value('name');
                $menu->slug = MenuItem::where('id',$menu->id)->value('slug');
                $menu->target = MenuItem::where('id',$menu->id)->value('target');
                $menu->type = MenuItem::where('id',$menu->id)->value('type');
                if(!empty($menu->children[0])){
                    foreach ($menu->children[0] as $child) {
                        $child->title = MenuItem::where('id',$child->id)->value('title');
                        $child->name = MenuItem::where('id',$child->id)->value('name');
                        $child->slug = MenuItem::where('id',$child->id)->value('slug');
                        $child->target = MenuItem::where('id',$child->id)->value('target');
                        $child->type = MenuItem::where('id',$child->id)->value('type');
                    }
                }
            }

        }
        foreach($footerMenu as $fmenu){
            $footerMenuItems[]  = json_decode(@$fmenu->content);

        

            // if(count(@$footerMenuItems) > 0){
            //     foreach($footerMenuItems as $menu){
            //         $menu->title = MenuItem::where('id',$menu->id)->value('title');
            //         $menu->name = MenuItem::where('id',$menu->id)->value('name');
            //         $menu->slug = MenuItem::where('id',$menu->id)->value('slug');
            //         $menu->target = MenuItem::where('id',$menu->id)->value('target');
            //         $menu->type = MenuItem::where('id',$menu->id)->value('type');
            //     }
    
            // }
        }

        foreach($footerMenuItems as $m[0]){
            foreach($m[0] as $menu){
              print_r($menu);
            }
        }


        $latestPostsfooter = Blog::orderBy('created_at', 'DESC')->where('status','publish')->take(2)->get();


        $theme_data = Setting::first();
        $view
            ->with('setting_data', $theme_data)
            ->with('latestPostsfooter', $latestPostsfooter)
            ->with('footer_nav_data', $footerMenuItems)
            ->with('product_brand_data', $productBrand)
            ->with('product_primary_data', $productPrimary)
            ->with('top_nav_data', $topNavItems);


    }
}

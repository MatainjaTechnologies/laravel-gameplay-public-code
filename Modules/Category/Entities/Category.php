<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\Game\Entities\Game;

class Category extends Model
{

    protected $table = 'categories';
    protected $fillable = ['id','name', 'uuid', 'slug', 'type', 'status'];

    public function games(){
        return $this->hasMany('Modules\Game\Entities\Game');
    }
    public function post(){
        return $this->hasMany('Modules\Content\Entities\Post');
    }


    public  function  scopeCategoryActive($query, $limit=null)
    {
        return $query->where('status', 1);
    }

    public  function  scopeGameActive($query,$category_type)
    {
        return $query->where("type",$category_type);
    }

    public function scopeGetOneCategory($query,$uuid)
    {
        return $query->where("uuid",$uuid);
    }
    
    public function scopeGetOneCategoryById($query,$id)
    {
        return $query->where("id",$id);
    }

    public function scopeCompetitionCategory($query,$cat_id)
    {
        return $query->where('status', 1)->where("id",$cat_id);
    }	

    public static function getAllCat()
    {
        $categories = Category::with(['post' => function ($q) {

        }])->get();

       return $categories;
    }

    public static function scopeGetWallpaperCategory()
    {
        $categoryQuery= Category::join('post', 'post.category_id', '=', 'categories.id')
            ->select('categories.id', 'categories.name');

        $category =  $categoryQuery->where('categories.status', 1)
                                    ->where('categories.type', 'wallpaper')
                                    ->distinct('categories.id')
                                    ->get()
                                    ->toArray();
        return $category;
    }

    public static function scopeGetVideoCategory()
    {
        $categoryQuery= Category::join('post', 'post.category_id', '=', 'categories.id')
            ->select('categories.id', 'categories.name');

        $category =  $categoryQuery->where('categories.status', 1)
                                    ->where('categories.type', 'video')
                                    ->distinct('categories.id')
                                    ->get()
                                    ->toArray();
        return $category;
    }

    public static function scopeGetApplicationGameCategory()
    {
        $categoryQuery= Category::join('post', 'post.category_id', '=', 'categories.id')
            ->select('categories.id', 'categories.name');
        $category =  $categoryQuery->where('categories.status', 1)->where('categories.type', 'app')->where('post.application_type', 'game')->distinct('categories.id')->get()->toArray();
        return $category;
    }

    public static function scopeGetApplicationAppsCategory()
    {
        $categoryQuery= Category::join('post', 'post.category_id', '=', 'categories.id')->select('categories.id', 'categories.name');
        $category =  $categoryQuery->where('categories.status', 1)->where('categories.type', 'app')->where('post.application_type', 'software')->distinct('categories.id')->get()->toArray();
        return $category;
    }

    public function scopeGetCategories($query)
    {
        return $query->orderBy('id', 'desc');
    }
    
    public static function getActiveCategories()
    {
        $query = Category::query();
        $category = [];
        $data = $query->categoryActive()->orderBy('id', 'desc')->get();

        foreach ($data as $key => $cat) {
            $status = count(Game::getByCategory($cat->id)->get());

            if ($status > 0) {
                $category[] = $cat;
            }
        }
        return $category;
    }

    public static function getCategory($id)
    {

        $query = Category::query();
        $categories= $query->CategoryActive()->GetOneCategory($id)->get();

        return $categories;
    }


}

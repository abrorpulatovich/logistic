<?php

namespace App\Services;

use App\Category;
use App\Partner;
use App\Slider;
use App\Page;
use App\Post;

class Slug
{
    /**
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
    public function create($title, $id = 0, $type)
    {
        // Normalize the title
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id, $type);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0, $type)
    {
        $query = Category::select('slug');
        
        if($type == "post") {
            $query = Post::select('slug');
        } elseif($type == "page") {
            $query = Page::select('slug');
        } elseif($type == "slider") {
            $query = Slider::select('slug');
        } elseif($type == "partner") {
            $query = Partner::select('slug');
        }
        return $query->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
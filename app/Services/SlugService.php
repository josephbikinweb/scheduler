<?php
namespace App\Services;

use Illuminate\Support\Str;

class SlugService
{
    public function createSlug(string $model, string $name, string $slugColumn = 'slug')
    {
        $baseSlug = Str::slug($name);

        $allSlugs = $model::where($slugColumn, 'like', $baseSlug . '%')
            ->pluck($slugColumn)
            ->toArray();

        if (! in_array($baseSlug, $allSlugs)) {
            return $baseSlug;
        }

        $counter = 1;

        while (in_array($baseSlug . '-' . $counter, $allSlugs)) {
            $counter++;
        }

        return $baseSlug . '-' . $counter;
    }
}

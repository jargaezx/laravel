<?php
namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BankFilter extends QueryFilter
{

    public function code(string $code)
    {
        return $this->builder->where('code', 'like', "%$code%");
    }

    /**
     * @param string $name
     */
    public function name(string $name)
    {
        return $this->builder->where('name', 'like', "%$name%");
    }

    /**
     * @param string $title
     */
    public function title(string $title)
    {
        $words = array_filter(explode(' ', $title));

        return $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('post_title', 'like', "%$word%");
            }
        });
    }
}
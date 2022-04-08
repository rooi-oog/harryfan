<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $with = ['authors', 'series', 'category', 'section', 'heading'];

    private function mb_ucfirst($string, $encoding = null) : string
    {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, null, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['contextSearch'] ?? false, function ($query, $search) {

            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%'. $this->mb_ucfirst($search) . '%')
                ->orWhereIn('id', function ($query) use ($search) {
                    $query->select('book_id')->from('author_book')
                        ->whereIn('author_id', function ($query) use ($search) {
                            $query->select('id')->from('authors')->where('full_name', 'like', '%' . $search . '%');
                        });
                })
                ->orWhereIn ('series_id', function ($query) use ($search) {
                    $query->select('id')->from('series')->where('title', 'like', '%' . $search . '%');
                });
        });

        $query->when ($filters['author'] ?? false, function ($query, $author) {
            $query->whereIn('id', function ($query) use ($author) {
                $query->select('book_id')->from('author_book')->where('author_id', $author);
            });
        });

        $query->when ($filters['series'] ?? false, function ($query, $series) {
            $query->where('series_id', $series);
        });

        $query->when ($filters['category'] ?? false, function ($query, $category) {
            $query->where('category_id', $category);
        });

        $query->when ($filters['section'] ?? false, function ($query, $section) {
            $query->where('section_id', $section);
        });
    }

    public function authors ()
    {
        return $this->belongsToMany(Author::class);
    }

        public function series ()
    {
        return $this->belongsTo(Series::class);
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function section ()
    {
        return $this->belongsTo(Section::class);
    }

    public function heading ()
    {
        return $this->belongsTo(Heading::class);
    }

    public function file ()
    {
        return $this->belongsTo(File::class);
    }
}


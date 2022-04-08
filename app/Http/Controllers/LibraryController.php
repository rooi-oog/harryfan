<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Heading;
use App\Models\Series;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    const pageCount  = 6;

    private static function checkIfLinkIsImage(Book $book)
    {
        return !strpos($book->file->path, "bz2");
    }

    private static function getContent (Book $book, $excerpt = true): string
    {
        $path = "books/" . $book->file->path;
        $content = "";

        if (self::checkIfLinkIsImage($book))
        {
            return "../" . $path;
        }

        if (file_exists($path)) {
            $bz = bzopen ($path, 'r');
            if ($bz) {
                while (!feof ($bz)) {
                    $content .= bzread($bz, 1024);
                    if ($excerpt)
                        break;
                }
                bzclose($bz);
            }
        }

        return $content;
    }

    public function index (Request $request)
    {
        $navType = array_keys(\request()->query())[0] ?? 'heading';
        $navList = match ($navType) {
            'author' => Author::orderBy('full_name')->get(),
            'series' => Series::orderBy('title')->get(),
            default => Heading::all(),
        };

        return view ('books', [
            'navType' => $navType,
            'navList' => $navList,
            'books' => Book::latest()
                ->filter(\request(['category', 'section', 'author', 'series', 'contextSearch']))
                ->paginate(self::pageCount)
        ]);
    }

    public function show ($book_id)
    {
        $book = Book::findOrFail ($book_id);

        return view('book', [
            'book' => $book,
            'content' => $this->getContent ($book, false),
            'pageIsImage' => self::checkIfLinkIsImage($book)
        ]);

    }
}

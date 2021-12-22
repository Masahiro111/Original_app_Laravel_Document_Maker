<?php

namespace App\Http\Controllers;

use App\Models\FileContent;
use Illuminate\Http\Request;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class BookController extends Controller
{

    public function index()
    {

        $converter = new GithubFlavoredMarkdownConverter();
        // echo $converter->convertToHtml('# Hello World!');
        // $md_data = file_get_contents('https://raw.githubusercontent.com/laravel-ja/ja-docs-8.x/master/translation-ja/installation.md');

        $books =  FileContent::all();

        foreach ($books as $book) {
            // dd($book->contents_url);
            $book->contents_article =  $converter->convertToHtml(file_get_contents($book->contents_url));
        }
        return view('books.index', compact('books'));
    }
}

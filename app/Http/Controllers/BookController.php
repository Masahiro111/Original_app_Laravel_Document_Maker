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

        $books =  FileContent::all();

        foreach ($books as $book) {
            $book->contents_article =  $converter->convertToHtml($book->contents_article);
        }

        return view('books.index', compact('books'));
    }
}

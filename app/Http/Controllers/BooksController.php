<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    //
    public function getCategory() 
    {
        $book = Book::find(1)->category;
        dd($book->toArray());
    }
}

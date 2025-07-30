<?php
namespace App\Controllers;

use App\Models\Book;
use CodeIgniter\Controller;

class Books extends Controller
{
    public function index()
    {
        $model = new Book();
        $data['books'] = $model->findAll();

        return view('index', $data);
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $model = new Book();
        $model->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'publication_year' => $this->request->getPost('publication_year'),
        ]);

        return redirect()->to('/books')->with('message', 'Book added!');
    }
}
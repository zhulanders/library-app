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
        $file = $this->request->getFile('cover_image');
        $imagePath = null; 
        $imagePath = 'images/placeholder.png'; 
        if ($file && $file->getTempName() !== '' && $file->isValid()) {
            $newName = $file->getRandomName();
            $file->move('uploads/covers', $newName);
            $imagePath = 'uploads/covers/' . $newName;
        }


        $model = new Book();
        $model->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'publication_year' => $this->request->getPost('publication_year'),
            'cover_image' => $imagePath,
        ]);

        return redirect()->to('/books')->with('message', 'Book added!');
    }
    public function edit($id){
        $model = new Book();
        $book = $model->find($id);
        if (!$book){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Book with ID $id not found");
        }
        return view('edit', ['book' => $book]);
    }
    public function update($id){
        $file = $this->request->getFile('cover_image');
        $oldImage = $this->request->getPost('old_cover_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/covers', $newName);
            $imagePath = 'uploads/covers/' . $newName;
        } else {
            $imagePath = $oldImage; 
        }
        $model = new Book();
            $model->save([
            'id' => $id,  
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'publication_year' => $this->request->getPost('publication_year'),
            'cover_image' => $imagePath,
        ]);

        return redirect()->to('/books')->with('message', 'Book updated!');
    }
    public function delete($id){
        $model = new Book();

        $model->delete($id);

        return redirect()->to('/books')->with('message', 'Book deleted!');

    }
}
<?php

namespace Project\App\Controllers;

use Project\App\Models\Blog as BlogModel;
use Project\Core\Model as MainModel;

class Blog
{
    private $ids;

    protected $mainModel;
    protected $blogModel;

    public function __construct()
    {
        if (empty($_SESSION)) {
            @session_start();
        }

        $this->mainModel = new MainModel();

        $this->mainModel->getModel('Blog');
        $this->blogModel = new BlogModel();

        $this->ids = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }

    public function index()
    {
        $this->mainModel->posts = $this->blogModel->get(0, 5);
        $this->mainModel->getView('index');
    }

    public function post()
    {
        $this->mainModel->post = $this->blogModel->getById($this->ids);
        $this->mainModel->getView('post');
    }

    public function notFound()
    {
        $this->mainModel->getView('404');
    }


    public function all()
    {
        $this->mainModel->posts = $this->blogModel->getAll();
        $this->mainModel->getView('index');
    }

    public function add()
    {
        if (!empty($_POST['add_submit']))
        {
            if (isset($_POST['title'], $_POST['body'], $_FILES['image']) && mb_strlen($_POST['title']) <= 50)
            {
                $uploaddir = WWW_PATH . '/assets/img/posts/';
                $uploadfile = $uploaddir . basename($_FILES['image']['name']);

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "File was successfully loaded.\n";
                }

                $data = ['title' => $_POST['title'], 'body' => $_POST['body'], 'image' => $_FILES['image']['name'], 'created_date' => date('Y-m-d H:i:s')];

                if ($this->blogModel->add($data)) {
                    $this->mainModel->successMessage = 'Post has been added.';
                } else {
                    $this->mainModel->errorMessage = 'There is an error while adding new entity.';
                }
            } else {
                $this->mainModel->errorMessage = 'Input is not correct, please fill all fields.';
            }
        }

        $this->mainModel->getView('posts/add');
    }

    public function edit()
    {
        if (!empty($_POST['edit_submit']))
        {
            if (isset($_POST['title'], $_POST['body']))
            {
                $data = ['post_id' => $this->ids, 'title' => $_POST['title'], 'body' => $_POST['body']];

                if ($this->blogModel->update($data)) {
                    header('Location: ' . URL);
                } else {
                    $this->mainModel->errorMessage = 'There was an error .';
                }
            } else {
                $this->mainModel->errorMessage = 'Input is not correct, please fill all fields.';
            }
        }
        $this->mainModel->post = $this->blogModel->getById($this->ids);
        $this->mainModel->getView('posts/edit');
    }

    public function delete()
    {
        if (!empty($_POST['delete']) && $this->blogModel->delete($this->ids)) {
            header('Location: ' . URL);
        }
        else {
            exit('Can not remove post.');
        }
    }
}
<?php

namespace App\Controllers\Admin;

use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use ReflectionException;

/**
 * Class PostController
 *
 * @package App\Controllers\Admin
 */
class PostController extends ModuleController
{
    /**
     * @var PostModel $model
     */
    public $model;

    /**
     * Create model object on boot controller
     */
    public function boot()
    {
        parent::boot();
        $this->model = new PostModel();
    }

    /**
     * Show posts list
     *
     * @return string
     */
    public function index(): string
    {
        $data['items'] = $this->model
            ->orderBy('id', 'DESC')->findAll();
        return view('Templates/Admin/Post/index', $data);
    }

    /**
     * Create post form
     *
     * @return string
     */
    public function new(): string
    {
        return view('Templates/Admin/Post/create', [
            'users' => (new UserModel())->getListOptions(),
            'categories' => (new CategoryModel())->getListOptions()
        ]);
    }

    /**
     * Insert post model
     *
     * @return mixed
     * @throws ReflectionException
     */
    public function create()
    {
        $rules = [
            'author_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->to(base_url('admin/post/new'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        $this->model->insert([
            'author_id' => $this->request->getVar('author_id'),
            'category_id' => $this->request->getVar('category_id'),
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content')
        ]);
        return $this->response->redirect(base_url('admin/post'));
    }
}

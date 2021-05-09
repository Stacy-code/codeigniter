<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;
use ReflectionException;

/**
 * Class CategoryController
 *
 * @package App\Controllers\Admin
 */
class CategoryController extends ModuleController
{
    /**
     * @var CategoryModel $model
     */
    public $model;

    /**
     * Create model object on boot controller
     */
    public function boot()
    {
        parent::boot();
        $this->model = new CategoryModel();
    }

    /**
     * Show category list
     *
     * @return string
     */
    public function index(): string
    {
        $data['items'] = $this->model
            ->orderBy('id', 'DESC')->findAll();
        return view('Templates/Admin/Category/index', $data);
    }

    /**
     * Create category form
     *
     * @return string
     */
    public function create(): string
    {
        return view('Templates/Admin/Category/create');
    }

    /**
     * Insert category model
     *
     * @return mixed
     * @throws ReflectionException
     */
    public function store()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'parent_id' => $this->request->getVar('parent_id'),
            'description' => $this->request->getVar('description'),
        ];
        $this->model->insert($data);
        return $this->response->redirect('admin/category');
    }

    /**
     * Edit category form
     *
     * @param string|null $id
     *
     * @return string
     */
    public function edit(string $id = null): string
    {
        $data['model'] = $this->model->where('id', $id)
            ->first();
        return view('Templates/Admin/Category/update', $data);
    }

    /**
     * Update category model
     *
     * @return mixed
     * @throws ReflectionException
     */
    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'parent_id' => $this->request->getVar('parent_id'),
            'description' => $this->request->getVar('description'),
        ];
        $this->model->update($id, $data);
        return $this->response->redirect('admin/category');
    }

    /**
     * @param string|null $id
     *
     * @return mixed
     */
    public function delete(string $id = null)
    {
        $this->model->where('id', $id)->delete($id);
        return $this->response->redirect('admin/category');
    }
}

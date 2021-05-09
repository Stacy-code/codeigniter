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
    public function new(): string
    {
        return view('Templates/Admin/Category/create', [
            'parents' => $this->model->getListOptions()
        ]);
    }

    /**
     * Insert category model
     *
     * @return mixed
     * @throws ReflectionException
     */
    public function create()
    {
        $rules = [
            'name' => 'required',
            'parent_id' => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->to(base_url('admin/category/new'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        $this->model->insert([
            'name' => $this->request->getVar('name'),
            'parent_id' => $this->request->getVar('parent_id'),
            'description' => $this->request->getVar('description'),
        ]);
        return $this->response->redirect(base_url('admin/category'));
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
        $data['parents'] = $this->model
            ->getListOptions((int)$id);
        return view('Templates/Admin/Category/update', $data);
    }

    /**
     * Update category model
     *
     * @param string|null $id
     *
     * @return mixed
     * @throws ReflectionException
     */
    public function update(string $id = null)
    {
        $rules = [
            'name' => 'required',
            'parent_id' => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->to(base_url('admin/category/edit'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        $data = [
            'name' => $this->request->getVar('name'),
            'parent_id' => $this->request->getVar('parent_id'),
            'description' => $this->request->getVar('description'),
        ];


        $this->model->update($id, $data);
        return $this->response->redirect(base_url('admin/category'));
    }

    /**
     * @param string|null $id
     *
     * @return mixed
     */
    public function delete(string $id = null)
    {
        $this->model->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('admin/category'));
    }
}

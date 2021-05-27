<?php

namespace App\Controllers\Frontend;

use App\Models\QuestionModel;
use CodeIgniter\Model;
use ReflectionException;
use App\Controllers\BaseController;
/**
 * Class QuestionController
 *
 * @package App\Controllers\Frontend
 */
class QuestionController extends BaseController
{
    /**
     * @var QuestionModel $model
     */
    public $model;

    /**
     * Create model object on boot controller
     */
    public function boot()
    {
        parent::boot();
        $this->model = new QuestionModel();
    }

    /**
     * Show questions list
     *
     * @return string
     */
    public function index(): string
    {
        $data['items'] = $this->model
            ->orderBy('created_at', 'DESC')->findAll();
        return view('/home-page', $data);
    }

    /**
     * Create question form
     *
     * @return string
     */
    public function new(): string
    {
        return view('Templates/Site/Question/create-question');
    }

    /**
     * Insert question model
     *
     * @return mixed
     * @throws ReflectionException
     */
    public function create()
    {

        $rules = [
            'author' => 'required|min_length[2]|max_length[32]',
            'email' => 'required|max_length[128]|valid_email',
            'title' => 'required|min_length[10]|max_length[255]',
            'content' => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->to(base_url('/create'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        $this->model->insert([
            'author' => $this->request->getVar('author'),
            'email' => $this->request->getVar('email'),
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
        ]);


        return $this->response->redirect(base_url('/home'));
    }
}

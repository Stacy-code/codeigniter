<?php

namespace App\Controllers\Frontend;

use App\Models\AnswerModel;
use CodeIgniter\Model;
use ReflectionException;
use App\Controllers\BaseController;
/**
 * Class QuestionController
 *
 * @package App\Controllers\Frontend
 */
class AnswerController extends BaseController
{
    /**
     * @var AnswerModel $model
     */
    public $model;

    /**
     * Create model object on boot controller
     */
    public function boot()
    {
        parent::boot();
        $this->model = new AnswerModel();
    }

    /**
     * Show questions list
     *
     * @return string
     */
    public function index(): string
    {
        $data['answers'] = $this->model
            ->orderBy('date_create', 'DESC')->findAll();
        return view('/home-page', $data);
    }

    /**
     * Create question form
     *
     * @return string
     */
    public function new(): string
    {
        return view('Templates/Site/Answer/create-answer');
    }

    /**
     * Insert question model
     *
     * @return mixed
     * @throws ReflectionException
     */
    public function create(string $id)
    {

        $rules = [
            'author' => 'required|min_length[2]|max_length[32]',
            'content' => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->to(base_url('/question/view/'.$id))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        $this->model->insert([
            'author' => $this->request->getVar('author'),
            'content' => $this->request->getVar('content'),
            'question_id' => $id
        ]);


        return $this->response->redirect(base_url('/question/view/'.$id));
    }
}

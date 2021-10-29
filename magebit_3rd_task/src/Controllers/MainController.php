<?php

namespace App\Controllers;

class MainController extends Controller
{
    protected $verResult = null;
    public function indexAction()
    {
        if (isset($_POST['email'])) {
            $this->verResult = $this->model->verifyEmail($_POST['email']);
        }
        $this->view->render($this->verResult);
    }
}

<?php

namespace App\Controllers;

class DatabaseController extends Controller
{
    public function listAction()
    {
        $result = $this->model->getDatabaseinfo();
        $this->view->render($result);
    }
    public function printAction()
    {
        $post = $_POST;
        $this->model->printFile($post);
    }
}

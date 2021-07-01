<?php

class Pages extends Controller
{

    public function __construct()
    {
      $this->pageModel = $this->model('Page'); 
    }

    public function index()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",  
        ];
        redirect("users/index");
      } 
      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report'];

      $this->view('pages/index', $data);
    }
}    
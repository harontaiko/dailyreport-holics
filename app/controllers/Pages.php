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
        $data = ['title'=>'Daily Report'];

        $this->view('pages/index', $data);
    }

    public function add()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",
        ];
        redirect("users/index");
      }

      date_default_timezone_set('Africa/Nairobi');
      $currentdate = date('Y-m-d h:i:s A', time());
      //add store record
      $data = ['title' => 'Add record', 'date'=>$currentdate];

      $this->view('pages/add',$data);
      
    }

}
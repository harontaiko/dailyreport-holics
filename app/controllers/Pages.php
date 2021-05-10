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

    public function movieShop()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",
        ];
        redirect("users/index");
      }

      date_default_timezone_set('Africa/Nairobi');
      $currentdate = date('M/Y/d h:i:s A', time());

      $data = ['title'=>'Daily Report', 'date'=>$currentdate];

      $this->view('pages/movieShop', $data);
    }

    public function cyber()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",
        ];
        redirect("users/index");
      }

      date_default_timezone_set('Africa/Nairobi');
      $currentdate = date('M/Y/d h:i:s A', time());

      $data = ['title'=>'Daily Report', 'date'=>$currentdate];

      $this->view('pages/cyber', $data);
    }

    public function playstation()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",
        ];
        redirect("users/index");
      }

      date_default_timezone_set('Africa/Nairobi');
      $currentdate = date('M/Y/d h:i:s A', time());

      $data = ['title'=>'Daily Report', 'date'=>$currentdate];

      $this->view('pages/playstation', $data);
    }

    public function filterReport()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",
        ];
        redirect("users/index");
      }

      date_default_timezone_set('Africa/Nairobi');
      $currentdate = date('M/Y/d h:i:s A', time());

      $data = ['title'=>'Daily Report', 'date'=>$currentdate];

      $this->view('pages/filterReport', $data);
    }

    public function addItem()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",
        ];
        redirect("users/index");
      }

      date_default_timezone_set('Africa/Nairobi');
      $currentdate = date('M/Y/d h:i:s A', time());

      $data = ['title'=>'Daily Report', 'date'=>$currentdate];

      $this->view('pages/addItem', $data);
    }

    public function sales()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",
        ];
        redirect("users/index");
      }

      date_default_timezone_set('Africa/Nairobi');
      $currentdate = date('M/Y/d h:i:s A', time());

      $data = ['title'=>'Daily Report', 'date'=>$currentdate];

      $this->view('pages/sales', $data);
    }

    public function expenses()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",
        ];
        redirect("users/index");
      }

      date_default_timezone_set('Africa/Nairobi');
      $currentdate = date('M/Y/d h:i:s A', time());

      $data = ['title'=>'Daily Report', 'date'=>$currentdate];

      $this->view('pages/expenses', $data);
    }

    public function total()
    {
      if (!isset($_SESSION["user_id"])) {
        $data = [
          "title" => "Daily Report",
        ];
        redirect("users/index");
      }

      date_default_timezone_set('Africa/Nairobi');
      $currentdate = date('M/Y/d h:i:s A', time());

      $data = ['title'=>'Daily Report', 'date'=>$currentdate];

      $this->view('pages/total', $data);
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


    //handle ajax POST & GET submission
    public function saveInventory()
    {  
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      echo json_encode(array("statusCode"=>200));
      
    }else{
      //throw not found
      http_response_code(404);
      include('../app/404.php');
      die();
    }    
    }
}    
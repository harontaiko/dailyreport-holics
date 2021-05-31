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
        $inventoryData = $this->pageModel->getInventoryData();

        $db = $this->pageModel->getDatabaseConnection();

        $data = ['title'=>'Daily Report', "inventory" => $inventoryData, 'db'=>$db];

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

      $inventoryData = $this->pageModel->getInventoryData();

      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate,"inventory" => $inventoryData, 'db'=>$db];

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

      $inventoryData = $this->pageModel->getInventoryData();

      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db];

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

      $inventoryData = $this->pageModel->getInventoryData();

      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db];

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

      $inventoryData = $this->pageModel->getInventoryData();

      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db];

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

      $inventoryData = $this->pageModel->getInventoryData();

      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db];

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

      $inventoryData = $this->pageModel->getInventoryData();

      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db];

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

      $inventoryData = $this->pageModel->getInventoryData();

      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db];

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

      $inventoryData = $this->pageModel->getInventoryData();

      $db = $this->pageModel->getDatabaseConnection();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db];

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

      $inventoryData = $this->pageModel->getInventoryData();
      
      $inventoryDataAdd = $this->pageModel->getInventoryData();

      $db = $this->pageModel->getDatabaseConnection();

      $dbAdd = $this->pageModel->getDatabaseConnection();

      //add store record
      $data = ['title' => 'Add Sale Record', 'date'=>$currentdate, "inventoryAdd" => $inventoryDataAdd, "inventory" => $inventoryData, 'db'=>$db, 'db2' => $dbAdd];

      $this->view('pages/add',$data);
      
    }

    public function saveSaleCash()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $data = [
          'name' =>$_POST['bought-item'],
          'bought'=>$_POST['bought-price'],
          'cash'=>$_POST['sales-cash'], 
          'till'=>$_POST['sales-till'], 
          'profit'=>$_POST['sales-profit'],
          'date'=>date('Y-m-d', time()), 
          'time'=>date('H:i:s T', time()), 
          'ip'=>get_ip_address(), 
          'creator'=>$_SESSION['user_name']
        ];

        $inventoryData = $this->pageModel->getItemInventoryCount($data['name']);
        $sold = getItemSoldCountInventory($data['name'],$this->pageModel->getDatabaseConnection());

        while($state = $inventoryData->fetch_assoc()){
          $instock = $state['item_quantity'];
        }

        if(($instock - $sold) >= 1){
          if($this->pageModel->saveToSales($data)){
          echo json_encode(array("statusCode"=>200, "name"=>$data['name']));
          }else{
            echo json_encode(array("statusCode"=>317));
          }
        }
        else
        {
          echo json_encode(array("statusCode"=>318));
        }
      
      }
      else{
        http_response_code(404);
        include('../app/404.php');
        die();
      }
      
    }



    //handle ajax POST & GET submission
    public function saveInventory()
    {  

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
      $file = $_FILES['product-image'];
      $fileName = $file['name'];
      $fileTmpName = $file['tmp_name'];
      $fileSize = $file['size'];
      $fileError = $file['error'];
      $fileType = $file['type'];
      $fileExtension = explode('.', $fileName);
      $fileActualExtension = strtolower(end($fileExtension));
      $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'psd', 'svg');
      //saved in the users route
      $fileDestination = '../app/uploads/' . preg_replace('/[^A-Za-z0-9. -]/', '', $fileName);
      $photo = preg_replace('/[^A-Za-z0-9. -]/', '', $fileName);
      
      if ($file) {
        if (in_array($fileActualExtension, $allowedExtensions)) {
          
          $itemName = $_POST['item-name'];
          $itemquantity = $_POST['item-quantity'];
          $itemBp = $_POST['item-bp'];
          $itemModel = $_POST['item-model'];

          if($this->pageModel->getItemByName($itemName) || $this->pageModel->getImageByName($photo)){
            echo json_encode(array("statusCode"=>317));
          }else{
        

          $inventory = [
            'date' => date('Y-m-d', time()),
            'time' => date('H:i:s T', time()),
            'ip' => get_ip_address(),
            'itemName' => $itemName,
            'itemquantity' => $itemquantity,
            'bp' => $itemBp,
            'model' => $itemModel,
            'imagename' => $photo,
            'creator' => $_SESSION['user_name'],
            'destination' => $fileDestination,
            'tempname' => $fileTmpName,
          ];

          move_uploaded_file($fileTmpName, $fileDestination);
        
          $save = $this->pageModel->saveToInventory($inventory);
          
          if($save)
          {
            echo json_encode(array("statusCode"=>200));
          }
          else{
            echo json_encode(array("statusCode"=>417));
          }
        }
        }
        else
        {
          $itemName = $_POST['item-name'];
          $itemquantity = $_POST['item-quantity'];
          $itemBp = $_POST['item-bp'];
          $itemModel = $_POST['item-model'];
  
          $date = date('Y-m-d', time());
            
          $time = date('H:i:s T', time());
  
          $ip = get_ip_address();

          $inventory = [
            'date' => $date,
            'time' => $time,
            'ip' => $ip,
            'itemName' => $itemName,
            'itemquantity' => $itemquantity,
            'bp' => $itemBp,
            'model' => $itemModel,
            'creator' => $_SESSION['user_name'],
          ];
        
  
          $save = $this->pageModel->saveToInventoryNull($inventory);
          if($save)
          {
            echo json_encode(array("statusCode"=>200));
          }
          else{
            echo json_encode(array("statusCode"=>417));
          }
        }
      }
      else{
        
        $itemName = $_POST['item-name'];
        $itemquantity = $_POST['item-quantity'];
        $itemBp = $_POST['item-bp'];
        $itemModel = $_POST['item-model'];

        $date = date('Y-m-d', time());
          
        $time = date('H:i:s T', time());

        $ip = get_ip_address();

        $inventory = [
          'date' => $date,
          'time' => $time,
          'ip' => $ip,
          'itemName' => $itemName,
          'itemquantity' => $itemquantity,
          'bp' => $itemBp,
          'model' => $itemModel,
          'creator' => $_SESSION['user_name'],
        ];

        $save = $this->pageModel->saveToInventoryNull($inventory);
        if($save)
        {
          echo json_encode(array("statusCode"=>200));
        }
        else{
          echo json_encode(array("statusCode"=>417));
        }
      }
      
    }else{
      http_response_code(404);
      include('../app/404.php');
      die();
    }    
  }

    public function loadBuying($id)
    {
      if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($id))
      {
          $itemId = htmlspecialchars($id);

          $bp = $this->pageModel->getBuyingByName($itemId);

          $data = ['bp' => $bp];

          $this->view("pages/loadBuying", $data);
      }
      else
      {
        http_response_code(404);
        include('../app/404.php');
        die();
      }
    }

    public function loadInventoryData()
    {
      if($_SERVER['REQUEST_METHOD'] == 'GET')
      {
        $inventoryData = $this->pageModel->getInventoryData();

        $db = $this->pageModel->getDatabaseConnection();

        $data = ['title'=>'Daily Report', "inventory" => $inventoryData, 'db'=>$db];

        $this->view('pages/loadInventoryData', $data);
      }
      else
      {
        http_response_code(404);
        include('../app/404.php');
        die();
      }
    }

    public function loadLatestSold()
    {
      if($_SERVER['REQUEST_METHOD'] == 'GET')
      {
        $data = ['title'=>'Daily Report', "latest" => $this->pageModel->getSoldToday()];

        $this->view('pages/loadLatestSold', $data);
      }
      else
      {
        http_response_code(404);
        include('../app/404.php');
        die();
      }
    }

    public function DeleteSaleNow($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($id))
      {
          $itemId = htmlspecialchars($id);

          $bp = $this->pageModel->getBuyingByName($itemId);

          $data = ['bp' => $bp];

          $this->view("pages/loadBuying", $data);
      }
      else
      {
        http_response_code(404);
        include('../app/404.php');
        die();
      }
    }
}    
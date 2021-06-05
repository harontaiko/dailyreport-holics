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
      //get all sales data
      $net = $this->pageModel->getNetTotal();
      
      $db = $this->pageModel->getDatabaseConnection();

      $inventoryData = $this->pageModel->getInventoryData();

      $data = ['title'=>'Daily Report', "inventory" => $inventoryData, 'db'=>$db, 'net'=>$net];

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

      $movie = $this->pageModel->getMovieTotal();

      $alltimeshoptotal = $this->pageModel->getCurrentMovieTotal();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate,"inventory" => $inventoryData, 'db'=>$db, 'movie'=>$movie, 'total'=>$alltimeshoptotal];

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

      $cyber = $this->pageModel->getCyberTotal();

      $alltimecybertotal = $this->pageModel->getCurrentCyberTotal();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db, 'cyber'=>$cyber, 'total'=>$alltimecybertotal];

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

      $ps = $this->pageModel->getPsTotal();

      $alltimepstotal = $this->pageModel->getCurrentPsTotal();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db, 'ps'=>$ps, 'total'=>$alltimepstotal];

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

      $sales = $this->pageModel->getAlltimeSales();

      $countsales = $this->pageModel->getAlltimeSaleCount();

      $totalsales = $this->pageModel->getCurrentSaleTotal();

      $totalprofit = $this->pageModel->getCurrentProfitTotal();

      $data = ['title'=>'Daily Report', 'date'=>$currentdate, "inventory" => $inventoryData, 'db'=>$db, 'sale'=>$sales, 'count'=>$countsales, 'totalsales'=>$totalsales, 'totalprofit'=>$totalprofit];

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

    public function loadLatestExpense()
    {
      if($_SERVER['REQUEST_METHOD'] == 'GET')
      {
        $data = ['title'=>'Daily Report', "latest" => $this->pageModel->getExpenseToday()];

        $this->view('pages/loadLatestExpense', $data);
      }
      else
      {
        http_response_code(404);
        include('../app/404.php');
        die();
      }
    }

    public function DeleteSaleNow(){
       if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']))
      {
        $this->pageModel->DeleteSaleById(htmlspecialchars($_POST['id']));
        echo json_encode(array("statusCode"=>200));
      }
      else
      {
        http_response_code(404);
        include('../app/404.php');
        die();
      } 
    }

    public function SaveExpense(){
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['expense']) && isset($_POST['amount']))
      {
        $data = [
          'name'=>htmlspecialchars($_POST['expense']), 
          'amount'=>htmlspecialchars($_POST['amount']),
          'date' => date('Y-m-d', time()),
          'time' => date('H:i:s T', time()),
          'creator'=>$_SESSION['user_name'],
          'ip'=>get_ip_address(),
        ];
        if($this->pageModel->SaveExpenseToday($data)){
          echo json_encode(array("statusCode"=>200));
        }else{
          echo json_encode(array("statusCode"=>317));
        }
      }
      else
      {
        http_response_code(404);
        include('../app/404.php');
        die();
      } 
    }

    public function DeleteExpenseNow(){
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']))
     {
       $this->pageModel->DeleteExpenseById(htmlspecialchars($_POST['id']));
       echo json_encode(array("statusCode"=>200));
     }
     else
     {
       http_response_code(404);
       include('../app/404.php');
       die();
     } 
   }

    public function CheckSaleExpense(){
      if($_SERVER['REQUEST_METHOD'] == 'GET')
     {
       if($this->pageModel->CheckSaleExpenseNow(date('Y-m-d', time())) == 1){
        echo json_encode(array("statusCode"=>200));
       }
       else if($this->pageModel->CheckSaleExpenseNow(date('Y-m-d', time())) == 2){
        echo json_encode(array("statusCode"=>318));
       }
       else if($this->pageModel->CheckSaleExpenseNow(date('Y-m-d', time())) == 3){
        echo json_encode(array("statusCode"=>317));
       }
       else if($this->pageModel->CheckSaleExpenseNow(date('Y-m-d', time())) == 4){
        echo json_encode(array("statusCode"=>319));
       }
     }
     else
     {
       http_response_code(404);
       include('../app/404.php');
       die();
     } 
   }
   
   public function SaveSaleRecord(){
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $cyber = [
        'cash'=>htmlspecialchars($_POST['cybercash']), 
        'till'=>htmlspecialchars($_POST['cybertill']),
        'date' => date('Y-m-d', time()),
        'time' => date('H:i:s T', time()),
        'creator'=>$_SESSION['user_name'],
        'ip'=>get_ip_address(),
      ];

      $ps = [
        'cash'=>htmlspecialchars($_POST['pscash']), 
        'till'=>htmlspecialchars($_POST['pstill']),
        'date' => date('Y-m-d', time()),
        'time' => date('H:i:s T', time()),
        'creator'=>$_SESSION['user_name'],
        'ip'=>get_ip_address(),
      ];

      $movie = [
        'cash'=>htmlspecialchars($_POST['moviecash']), 
        'till'=>htmlspecialchars($_POST['movietill']),
        'date' => date('Y-m-d', time()),
        'time' => date('H:i:s T', time()),
        'creator'=>$_SESSION['user_name'],
        'ip'=>get_ip_address(),
      ];

      if($this->pageModel->saveSaleRecordNow($cyber, $ps, $movie)){
        echo json_encode(array("statusCode"=>200));
      }else{
        echo json_encode(array("statusCode"=>317));
      }
   
    }
    else
    {
      http_response_code(404);
      include('../app/404.php');
      die();
    } 
  }
  
  public function SaveNetTotal(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $data = [
        'date' => date('Y-m-d', time()),
        'time' => date('H:i:s T', time()),
        'creator'=>$_SESSION['user_name'],
        'ip'=>get_ip_address(),
      ];
      if($this->pageModel->saveNetTotalNow($data)){
        echo json_encode(array("statusCode"=>200));
      }else{
        echo json_encode(array("statusCode"=>317));
      }
    }else{
      http_response_code(404);
      include('../app/404.php');
      die();
    }
  }
}    
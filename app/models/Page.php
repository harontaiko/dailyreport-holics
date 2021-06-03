<?php

class Page
{
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    public function getDatabaseConnection()
    {
      return $this->db;
    }

    public function saveNetTotalNow($data)
    {
        
    }

    public function saveSaleRecordNow($cyber, $ps, $shop)
    {
        $fields = array('cash', 'till', 'date_created', 'time_created', 'created_by', 'creator_ip');

        $placeholders = array('?', '?', '?', '?', '?', '?');
  
        $bindersCountNew = "ssssss";
  
        $values = array($cyber['cash'], $cyber['till'], $cyber['date'], $cyber['time'], $cyber['creator'], $cyber['ip']);
  
        $fieldsp = array('cash', 'till', 'date_created', 'time_created', 'created_by', 'creator_ip');

        $placeholdersp = array('?', '?', '?', '?', '?', '?');
  
        $bindersCountNewp = "ssssss";
  
        $valuesp = array($ps['cash'], $ps['till'], $ps['date'], $ps['time'], $ps['creator'], $ps['ip']);

        $fieldsm = array('cash', 'till', 'date_created', 'time_created', 'created_by', 'creator_ip');

        $placeholdersm = array('?', '?', '?', '?', '?', '?');
  
        $bindersCountNewm = "ssssss";
  
        $valuesm = array($shop['cash'], $shop['till'], $shop['date'], $shop['time'], $shop['creator'], $shop['ip']);
  
        
        try {
            Insert(
                $fields,
                $placeholders,
                $bindersCountNew,
                $values,
                'dr_cybershop',
                $this->db
            );      
            Insert(
                $fieldsp,
                $placeholdersp,
                $bindersCountNewp,
                $valuesp,
                'dr_playstation',
                $this->db
            );      
            Insert(
                $fieldsm,
                $placeholdersm,
                $bindersCountNewm,
                $valuesm,
                'dr_movieshop',
                $this->db
            );      
            return true;
        } catch (Error $e) {
            return false;
        }
    }

    public function CheckSaleExpenseNow($date)
    {
        $query = 'SELECT sales_id FROM dr_sales WHERE date_created=?';

        $binders = "s";

        $parameters = array($date);

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        $qE = 'SELECT expense_id FROM dr_expenses WHERE date_created=?';

        $bindersE = 's';

        $parametersE = array($date);

        $resultE = SelectCond($qE, $bindersE, $parametersE, $this->db);

        $rowE = $resultE->get_result();

        if($rowE->num_rows >=1 && $row->num_rows >= 1){
            return 1;
        }elseif($rowE->num_rows <=1 && $row->num_rows >=1){
            return 2;
        }else if($rowE->num_rows >=1 && $row->num_rows <=1){
            return 3;
        }else if($rowE->num_rows <=1 && $row->num_rows <= 1){
            return 4;
        }

    }

    public function DeleteExpenseById($id)
    {
        $query = 'DELETE FROM dr_expenses WHERE expense_id=?';

        $binders ="s";

        $parameters = array($id);

        if(Delete($query, $binders, $parameters, 'dr_expenses', $this->db)){
            return true;
        }
        else{
            return false;
        }

    }

    public function SaveExpenseToday($data)
    {
        $fields = array('expense_item', 'expense_cost', 'date_created', 'time_created', 'created_by', 'creator_ip');

        $placeholders = array('?', '?', '?', '?', '?', '?');
  
        $bindersCountNew = "ssssss";
  
        $values = array($data['name'], $data['amount'], $data['date'], $data['time'], $data['creator'], $data['ip']);
  
        try {
            Insert(
                $fields,
                $placeholders,
                $bindersCountNew,
                $values,
                'dr_expenses',
                $this->db
            );      
            return true;
        } catch (Error $e) {
            return false;
        }
    }

    public function getExpenseToday()
    {
        $query = 'SELECT expense_id, expense_item, expense_cost FROM dr_expenses WHERE date_created=?';

        $binders = "s";

        $parameters = array(date('Y-m-d', time()));

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        try {
            return $row;
        } catch (Error $e) {
            return false;
        }  
    }

    public function DeleteSaleById($id)
    {
        $query = 'DELETE FROM dr_sales WHERE sales_id=?';

        $binders ="s";

        $parameters = array($id);

        if(Delete($query, $binders, $parameters, 'dr_sales', $this->db)){
            return true;
        }
        else{
            return false;
        }

    }

    public function getSoldToday()
    {
        $query = 'SELECT sales_id, sales_item FROM dr_sales WHERE date_created=?';

        $binders = "s";

        $parameters = array(date('Y-m-d', time()));

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        try {
            return $row;
        } catch (Error $e) {
            return false;
        } 
    }

    public function getLatestSold(){
        //get last id to be inserted, cause we can never know the exact id, since its a cosed app this flaw can be ignored but documented

        $query ="SELECT MAX(sales_id) AS id FROM dr_sales";

        $result = SelectCondFree($query, 'dr_sales',$this->db);

        $row = $result->get_result();

        $data = $row->fetch_assoc();

        $q = 'SELECT sales_id, sales_item FROM dr_sales WHERE sales_id=?';

        $b = "s";

        $p = array($data['id']);

        $result2 = SelectCond($q, $b, $p, $this->db);

        $row2 = $result2->get_result();

        try {
            return $row2;
        } catch (Error $e) {
            return false;
        } 
    }

    //get item count in inventory
    public function getItemInventoryCount($name)
    {
        $query = 'SELECT item_quantity FROM dr_inventory WHERE item_name = ?';

        $binders = "s";

        $parameters = array($name);

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        try {
            return $row;
        } catch (Error $e) {
            return false;
        }
    }

    public function saveToSales($data)
    {
      $fields = array('sales_item', 'buying_price', 'selling_price', 'cash', 'till', 'profit', 'date_created', 'time_created', 'created_by', 'creator_ip');

      $placeholders = array('?', '?', '?', '?', '?', '?', '?', '?', '?', '?');

      $bindersCountNew = "ssssssssss";

      $values = array($data['name'], $data['bought'], empty($data['cash']) ? $data['till']: $data['cash'], $data['cash'], $data['till'], $data['profit'], $data['date'], $data['time'], $data['creator'], $data['ip']);

      try {
          Insert(
              $fields,
              $placeholders,
              $bindersCountNew,
              $values,
              'dr_sales',
              $this->db
          );      
          return true;
      } catch (Error $e) {
          return false;
      }
    }



    public function getInventoryItemById($id)
    {
        $query = 'SELECT item_name FROM dr_inventory WHERE item_id = ?';

        $binders = "s";

        $parameters = array($id);

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();
        
        $name = isset($rowItem['item_name']) ? $rowItem['item_name'] : 'id:not found';

        try {
            return $name;
        } catch (Error $e) {
            return false;
        }
    }

    public function getItemSaleByName($name)
    {
        $query = 'SELECT * FROM dr_sales WHERE sales_item = ?';

        $binders = "s";

        $parameters = array($name);

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        $numRows = $row->num_rows;

        if ($numRows > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**get sold item count */
    public function getItemSoldCount($name)
    {
        $query = 'SELECT COUNT(*) AS cnt FROM dr_sales WHERE sales_item = ?';

        $binders = "s";

        $parameters = array($name);

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();
        
        $count = isset($rowItem['cnt']) ? $rowItem['cnt'] : 'id:not found';

        try {
            return $count;
        } catch (Error $e) {
            return false;
        }
    }

    public function getInventoryData()
    {
        $result = SelectAllLatest('item_id', 'dr_inventory', $this->db);

        $row = $result->get_result();

        try {
            return $row;
        } catch (Error $e) {
            return false;
        }
    }

    public function getItemByName($name)
    {
        $query = 'SELECT * FROM dr_inventory WHERE item_name = ?';

        $binders = "s";

        $parameters = array($name);

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        $numRows = $row->num_rows;

        if ($numRows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getImageByName($name)
    {
        $query = 'SELECT * FROM dr_inventory WHERE `image` = ?';

        $binders = "s";

        $parameters = array($name);

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        $numRows = $row->num_rows;

        if ($numRows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getBuyingByName($id)
    {
        $query = 'SELECT item_buying FROM dr_inventory WHERE item_id = ?';

        $binders = "s";

        $parameters = array($id);

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();
        
        $buying = isset($rowItem['item_buying']) ? $rowItem['item_buying'] : 'id:not found';

        try {
            return $buying;
        } catch (Error $e) {
            return false;
        }
    }

    public function saveToInventory($data)
    {
      $fields = array('item_name', 'item_quantity', 'item_buying', 'item_model', 'image', 'date_created', 'time_created', 'created_by', 'creator_ip');

      $placeholders = array('?', '?', '?', '?', '?', '?', '?', '?', '?');

      $bindersCountNew = "sssssssss";

      $values = array($data['itemName'], $data['itemquantity'], $data['bp'], $data['model'], $data['imagename'], $data['date'], $data['time'], $data['creator'], $data['ip']);
      
      try {
          Insert(
              $fields,
              $placeholders,
              $bindersCountNew,
              $values,
              'dr_inventory',
              $this->db
          );
        
          return true;
      } catch (Error $e) {
          return false;
      }
    }

    public function saveToInventoryNull($data)
    {
      $fields = array('item_name', 'item_quantity', 'item_buying', 'item_model', 'date_created', 'time_created', 'created_by', 'creator_ip');

      $placeholders = array('?', '?', '?', '?', '?', '?', '?', '?');

      $bindersCountNew = "ssssssss";

      $values = array($data['itemName'], $data['itemquantity'], $data['bp'], $data['model'], $data['date'], $data['time'], $data['creator'], $data['ip']);

      try {
          Insert(
              $fields,
              $placeholders,
              $bindersCountNew,
              $values,
              'dr_inventory',
              $this->db
          );
          return true;
      } catch (Error $e) {
          return false;
      }
    }

}
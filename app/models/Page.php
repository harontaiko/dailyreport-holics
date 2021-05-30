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
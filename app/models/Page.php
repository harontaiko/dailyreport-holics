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

    /**get sold item count */
    public function getItemSoldCount($name)
    {
        $query = 'SELECT COUNT(*) AS cnt FROM dr_sales WHERE sales_item = ?';

        $binders = "s";

        $parameters = array($name);

        $result = SelectCond($query, $binders, $parameters, $this->db);

        $row = $result->get_result();

        $rowItem = $row->fetch_assoc();
        
        $count = $rowItem['cnt'];

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
        
        $buying = $rowItem['item_buying'];

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
<?php

class Page
{
    private $db;

    public function __construct()
    {
      $this->db = new Database();
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
<?php

class Product_model extends CI_Model
{
    public function get_product()
    {
        $result = $this->db->get('product');
        return $result;
    }

    public function save($product_name, $product_price)
    {
        $data = array(
            'product_name' => $product_name,
            'product_price' => $product_price)
            
            ;

        $this->db->insert('product', $data);
    }

    public function get_product_id($product_code)
    {
        $query = $this->db->get_where('product', array('product_code' => $product_code));
        return $query;
    }

    public function update($product_code, $product_name, $product_price)
    {
        $data = array(
            'product_name' => $product_name,
            'product_price' => $product_price
        
        );

        $this->db->where('product_code', $product_code);
        $this->db->update('product', $data);
    }

    public function delete($product_code)
    {
        $this->db->where('product_code', $product_code);
        $this->db->delete('product');
    }
}

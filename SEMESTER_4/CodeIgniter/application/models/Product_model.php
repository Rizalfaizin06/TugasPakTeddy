<?php

class Product_model extends CI_Model
{
    public function get_product($rowno, $rowperpage, $searchCode = "", $searchName = "", $searchPrice = "")
    {
        $this->db->select('*');
        $this->db->from('product');

        $this->db->like('product_code', $searchCode);
        $this->db->like('product_name', $searchName);
        $this->db->like('product_price', $searchPrice);


        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }

    public function save($product_name, $product_price)
    {
        $data = array(
            'product_name' => $product_name,
            'product_price' => $product_price
        )

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

    //count total record
    public function get_product_count($searchCode = "", $searchName = "", $searchPrice = "")
    {
        $this->db->select('*');
        $this->db->from('product');


        $this->db->like('product_code', $searchCode);
        $this->db->like('product_name', $searchName);
        $this->db->like('product_price', $searchPrice);

        $result = $this->db->count_all_results();

        return $result;
    }
}
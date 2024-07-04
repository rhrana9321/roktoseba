<?php

	class M_join extends CI_Model {
	
		const TABLE	= '';
	
		public function __construct()
		{
			parent::__construct();
		}
		
		
		
		
		
		
		public function subCategory_M()
		{
			
			$this->db->select('subcategory_mange.*, category_mange.category_name');
			$this->db->from('subcategory_mange');
			$this->db->join('category_mange', 'category_mange.catId = subcategory_mange.category_id', 'left');
			$this->db->order_by("subcategory_mange.subcatId", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function prosubCategory_M()
		{
			$this->db->select('webproduct_mange_table.*, category_mange.category_name, subcategory_mange.sub_category_name');
			$this->db->from('webproduct_mange_table');
			$this->db->join('category_mange', 'category_mange.catId = webproduct_mange_table.pro_cat_id', 'left');
			$this->db->join('subcategory_mange', 'subcategory_mange.subcatId = webproduct_mange_table.pro_sub_id', 'left');
			$this->db->order_by("webproduct_mange_table.wproid", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		
		public function orderDetails($where)
			{
				$this->db->select('order_details.*, webproduct_mange_table.*');
				$this->db->from('order_details');
				$this->db->join('webproduct_mange_table', 'webproduct_mange_table.wproid = order_details.product_id', 'left');
				$this->db->where($where);
				$query = $this->db->get();
				return $query->result();
			}
		
		
	
				
	}
?>
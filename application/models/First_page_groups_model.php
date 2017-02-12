<?php

class First_page_groups_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_groups()
	{
		$query = $this->db->get('first_page_groups');
		$groups = $query->result_array();

		$this->load->model('product_model');
		
		for( $i = 0; $i < count($groups); $i++ )
		{
			$this->db->where('group_id', $groups[$i]['id']);
			$query = $this->db->get('first_page_groups_products');
			$result = $query->result_array();

			foreach( $result as $result_row )
			{
				$groups[$i]['products'][] = $this->product_model->get_product( $result_row['product_id'] );
			}

		}

		return $groups;
	}

	

}
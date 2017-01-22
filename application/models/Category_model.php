<?php

class Category_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_category( $category_id )
	{
		$query = $this->db->get_where('categories', array('id' => $category_id));
		$category = $query->row_array();
		$query = $this->db->get_where('slugs', array('entity' => 'category', 'entity_id' => $category_id))->row_array();
		$category['slug'] = $query['slug_value'];
		$query = $this->db->get_where('pictures', ['entity'=>'category','entity_id'=>$category_id])->row_array();
		$category['picture_id'] = $query['id'];
		$category['picture_name'] = $query['name'];

		return $category;
	}

	public function get_categories()
	{
		$query = $this->db->query("SELECT 
									categories.id as id,
									categories.name as name,
									categories.parent_id as parent_id,
									categories_slugs.slug_value as slug,
									categories_pictures.name as picture_name
								 FROM categories LEFT JOIN ( SELECT * FROM slugs WHERE entity = 'category' ) as categories_slugs
								 ON categories.id = categories_slugs.entity_id
								 LEFT JOIN ( SELECT * FROM pictures WHERE entity = 'category' ) as categories_pictures
								 ON categories.id = categories_pictures.entity_id
								 ORDER BY categories.id ASC ");

		return $query->result_array();
	}

	public function create_category()
	{
		//prepare data for categories table
		$data = array(
				'name' => $this->input->post('name'),
				'parent_id' => $this->input->post('parent_id')
			);

		$this->db->insert('categories', $data);
		$category_id = $this->db->insert_id();

		//prepare data for slugs table
		$data = array(
				'slug_value' => url_title($this->input->post('slug'), 'dash', TRUE),
				'entity' => 'category',
				'entity_id' => $category_id
			);

		$this->db->insert('slugs', $data);

		$this->load->model('route_model');
    	$this->route_model->rewrite_routes();

    	return $category_id;
	}

	public function update_category( $category_id )
	{
		//prepare data for categories table
		$data = array( 'name' => $this->input->post('name') );

		$this->db->where('id', $category_id);
		$this->db->update('categories', $data);

		//prepare data for slugs table
		$data = array( 'slug_value' => $this->input->post('slug') );

		$this->db->where([ 'entity' => 'category', 'entity_id' => $category_id ]);
		$this->db->update('slugs', $data);

		$this->load->model('route_model');
    	$this->route_model->rewrite_routes();
	}
}
<?php

class Product_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_product( $product_id )
	{
		$this->db->select('products.*, pictures.name as featured_picture_name, categories.name as category_name');
		$this->db->from('products');
		$this->db->join('categories', 'products.category_id = categories.id', 'left');
		$this->db->join('pictures', 'products.featured_picture_id = pictures.id', 'left');
		$this->db->where('products.id', $product_id);
		$product = $this->db->get()->row_array();

		$this->db->where([
			'entity' => 'product',
			'entity_id' => $product_id
			]);
		$query = $this->db->get('slugs')->row_array();
		$product['slug'] = $query['slug_value'];

		//attach pictures
		$this->db->select('id, name');
		$this->db->where([
			'entity' => 'product',
			'entity_id' => $product_id
			]);
		$pictures = $this->db->get('pictures')->result_array();
		//remove featured picture from pictures array
		$index = 0;
		foreach( $pictures as $picture )
		{
			if( $picture['id'] == $product['featured_picture_id'] )
			{
				unset($pictures[$index]);
				$pictures = array_values($pictures);
				break;
			}
			$index++;
		}

		$product['pictures'] = $pictures;
		
		return $product;
	}

	public function get_products()
	{
		$query = $this->db->query("SELECT 
									products.*, 
									pictures.name as featured_picture_name,
									categories.id as category_id, 
									categories.name as category_name,
									products_slugs.slug_value as slug
								FROM products LEFT JOIN categories ON products.category_id = categories.id
								LEFT JOIN ( SELECT * FROM slugs WHERE entity = 'product' ) as products_slugs
							 	ON products.id = products_slugs.entity_id
							 	LEFT JOIN pictures ON products.featured_picture_id = pictures.id
							 	ORDER BY products.id ASC");
		return $query->result_array();
	}

	public function get_products_by_category( $category_id )
	{
		$query = $this->db->query("SELECT 
										products.*, 
										pictures.name as featured_picture_name,
										categories.id as category_id, 
										categories.name as category_name,
										products_slugs.slug_value as slug
									FROM products LEFT JOIN categories ON products.category_id = categories.id
									LEFT JOIN ( SELECT * FROM slugs WHERE entity = 'product' ) as products_slugs
									ON products.id = products_slugs.entity_id
									LEFT JOIN pictures ON products.featured_picture_id = pictures.id
									WHERE products.category_id = $category_id
									ORDER BY products.id ASC");
		return $query->result_array();
	}

	public function create_product()
	{
		$data = array(
				'sku' => $this->input->post('sku'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price_list' => $this->input->post('price_list'),
				'price' => $this->input->post('price')
			);

		$this->db->insert('products', $data);
		$product_id = $this->db->insert_id();

		$data = array(
				'slug_value' => url_title($this->input->post('slug'), 'dash', TRUE),
				'entity' => 'product',
				'entity_id' => $product_id
			);

		$this->db->insert('slugs', $data);

		$this->load->model('route_model');
    	$this->route_model->rewrite_routes();
	}

	public function update_product( $product_id )
	{
		//update data in products table
		$data = array(
				'sku' => $this->input->post('sku'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price_list' => $this->input->post('price_list'),
				'price' => $this->input->post('price')
			);
		$this->db->where('id', $product_id);
		$this->db->update('products', $data);

		//update data in slugs table
		$this->db->where([
				'entity' => 'product',
				'entity_id' => $product_id
			]);
		$this->db->update('slugs', array('slug_value' => $this->input->post('slug')));

		//rewrite routes
		$this->load->model('route_model');
    	$this->route_model->rewrite_routes();
	}

	public function add_product_to_category( $product_id, $category_id )
	{
		$this->db->where('id', $product_id);
		$this->db->update('products', ['category_id' => $category_id]);
	}
	
	public function set_default_picture( $product_id, $picture_id )
	{
		$this->db->where('id', $product_id);
		$this->db->update('products', ['featured_picture_id' => $picture_id]);
	}
}


















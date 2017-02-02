<?php

class Product extends MY_Controller{


	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('product_model');
		$products = $this->product_model->get_products();

		$this->load->view('products/index', [
			'products' => $products
			]);
	}

	public function visitator_view($product_id = null)
	{
		if( is_null($product_id) or !is_numeric($product_id))
		{
			$this->load->view('errors/custom_error',['error_message'=>'Product id is not set correctly']);
			return null;
		}

		$this->load->model('product_model');
		$product = $this->product_model->get_product( $product_id );

		//making the breadcrumbs
		$this->load->model('category_model');
		//get the product category
		$category = $this->category_model->get_category($product['category_id']);
		$breadcrumbs[] = $category;
		//search for all parent categories
		while( $category['parent_id'] != 0 )
		{
			$category = $this->category_model->get_category($category['parent_id']);
			$breadcrumbs[] = $category;
		}

		//reverse the breadcrumbs
		$breadcrumbs = array_reverse($breadcrumbs);

		$categories = $this->category_model->get_categories();

		$this->load->view('products/visitator_view', [
			'breadcrumbs' => $breadcrumbs,
			'product' => $product,
			'categories' => $categories
			]);
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('sku','SKU','required|is_unique[products.sku]');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('slug','Slug','required|is_unique[slugs.slug_value]');

		if( $this->form_validation->run() === false )
		{
			$this->load->view('products/create');
		}else
		{
			$this->load->model('product_model');
			$this->product_model->create_product();
			redirect('product/index');
		}

		
	}

	public function edit( $product_id = null )
	{
		if( ($product_id == null) or (is_numeric($product_id) == false) )
		{
			redirect('product/index');
			return null;
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('product_model');
		
		$product = $this->product_model->get_product( $product_id );

		if( $this->input->post('sku') != $product['sku'] )
		{
			$this->form_validation->set_rules('sku','SKU','required|is_unique[products.sku]');
		}else
		{
			$this->form_validation->set_rules('sku','SKU','required');
		}
		
		$this->form_validation->set_rules('name','Name','required');

		if( $this->input->post('slug') != $product['slug'] )
		{
			$this->form_validation->set_rules('slug','Slug','required|is_unique[slugs.slug_value]');
		}else
		{
			$this->form_validation->set_rules('slug','Slug','required');
		}

		if( $this->form_validation->run() === false )
		{
			$this->load->view('products/edit', ['product'=>$product]);
		}else
		{
			$this->product_model->update_product( $product_id );
			redirect('product/index');
		}
		
	}

	public function add_to_category( $product_id )
	{
		$this->load->model('category_model');
		$this->load->model('product_model');

		$product = $this->product_model->get_product($product_id);
		$categories = $this->category_model->get_categories();

		$this->load->view('products/add_to_category',[
				'product' => $product,
				'categories' => $categories
			]);
	}

	public function add_to_category_action( $product_id, $category_id )
	{
		$this->load->model('product_model');
		$this->product_model->add_product_to_category($product_id, $category_id);
		redirect('product/index');
	}

	public function upload_pictures( $product_id )
	{
		$this->load->helper('form');
		$this->load->model('product_model');

		$product = $this->product_model->get_product($product_id);
		
		$this->load->view('products/upload_pictures', [
				'product' => $product
			]);
	}

	public function upload_pictures_action()
	{
		$config['upload_path']          = './uploads/products/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 5000;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('picture'))
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('product/upload_pictures/'.$this->input->post('entity_id'));
		}else
		{
			$this->load->model('picture_model');
			$this->picture_model->create_picture();
			redirect('product/upload_pictures/'.$this->input->post('entity_id'));
		}
	}

	public function set_default_picture( $product_id, $picture_id )
	{
		$this->load->model('product_model');
		$this->product_model->set_default_picture($product_id, $picture_id);
		
		redirect('product/upload_pictures/'.$product_id);
	}
	
	public function delete_picture( $product_id, $picture_id )
	{
		$this->load->model('picture_model');
		$this->picture_model->delete_picture($picture_id);
		
		redirect('product/upload_pictures/'.$product_id);
	}



}















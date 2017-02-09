<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {



	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('category_model');
		$categories = $this->category_model->get_categories();

		$this->load->view('categories/index', [
			'categories' => $categories
			]);
	}

	public function visitator_view( $category_id = null )
	{
		if( is_null($category_id) or !is_numeric($category_id))
		{
				$this->session->set_flashdata('error', '<strong>Error:</strong> Category id isn\'t set.');
				redirect('firstpage');
				return null;
		}

		$this->load->model('category_model');
		$this->load->model('product_model');
		$selected_category = $this->category_model->get_category($category_id);
		$categories = $this->category_model->get_categories();
		$products = $this->product_model->get_products_by_category( $category_id );

		//making the breadcrumbs
		$breadcrumbs = array();
		//search for all parent categories
		$index_category = $selected_category;
		while( $index_category['parent_id'] != 0 )
		{
			$index_category = $this->category_model->get_category($index_category['parent_id']);
			$breadcrumbs[] = $index_category;
		}

		//reverse the breadcrumbs
		$breadcrumbs = array_reverse($breadcrumbs);

		$this->load->view('categories/visitator_view',[
				'breadcrumbs' => $breadcrumbs,
		        'selected_category' => $selected_category,
                'categories' => $categories,
                'products' => $products
            ]);


	}



	public function create( $parent_id = null )
	{
		if( is_null($parent_id) or !is_numeric($parent_id) )
		{
            $this->session->set_flashdata('error', '<strong>Error:</strong> Method <i>create</i> doesn\'t have <i>parent_id</i> set.');
			redirect('category/index');
			return null;
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('category_model');

		if( $parent_id == 0 )
		{
			$parent_category['id'] = 0;
			$parent_category['name'] = 'Main category';
		}else
		{
			$parent_category = $this->category_model->get_category($parent_id);
		}

		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[categories.name]', array('required' => 'The name is mandatory!'));
    	$this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[slugs.slug_value]');

    	if ($this->form_validation->run() === FALSE)
    	{
    		$this->load->view('categories/create', [
				'parent_category' => $parent_category
				]);
    	}else
    	{
            $config['upload_path']          = './uploads/categories/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 5000;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('picture'))
            {
                $this->session->set_flashdata('error','Picture is mandatory!');
                redirect('category/create/'.$parent_id);
            }

            $_POST['entity_id'] = $this->category_model->create_category();

            $this->load->model('picture_model');
            $this->picture_model->create_picture();

    		redirect('category/index');
    	}

		
	}

	public function edit( $category_id = null )
	{
		if( is_null($category_id) or !is_numeric($category_id) )
		{
            $this->session->set_flashdata('error', '<strong>Error:</strong> Method <i>edit</i> doesn\'t have <i>category_id</i> set.');
			redirect('category/index');
			return null;
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('category_model');

		$category = $this->category_model->get_category($category_id);

		if( $category['name'] != $this->input->post('name') )
		{
			$this->form_validation->set_rules('name', 'Name', 'required|is_unique[categories.name]');
		}else
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
		}

		if( $category['slug'] != $this->input->post('slug') )
		{
			$this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[slugs.slug_value]');
		}else
		{
			$this->form_validation->set_rules('slug', 'Slug', 'required');
		}

		if ($this->form_validation->run() === FALSE)
    	{
    		$this->load->view('categories/edit', [
				'category' => $category
				]);
    	}else
    	{
    		$this->category_model->update_category($category_id);

            $config['upload_path']          = './uploads/categories/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 5000;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('picture'))
            {
                $this->load->model('picture_model');
                $this->picture_model->create_picture();
                $this->picture_model->delete_picture($this->input->post('picture_id'));
            }

    		redirect('category/index');
    	}
    	
	}
}

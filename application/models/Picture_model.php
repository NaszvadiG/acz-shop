<?php

class Picture_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function create_picture()
	{
		$data = [
			'entity' => $this->input->post('entity'),
			'entity_id' => $this->input->post('entity_id'),
			'name' => $this->upload->data('file_name')
		];

		$this->db->insert('pictures', $data);
	}
	
	public function delete_picture( $picture_id )
	{
		$this->db->select('entity, name');
		$this->db->where('id', $picture_id);
		$result = $this->db->get('pictures')->row_array();


		switch($result['entity'])
        {
            case 'product':
                if( unlink('./uploads/products/'.$result['name']) )
                {
                    $this->db->where('id', $picture_id);
                    $this->db->delete('pictures');
                }
                break;
            case 'category':
                if( unlink('./uploads/categories/'.$result['name']) )
                {
                    $this->db->where('id', $picture_id);
                    $this->db->delete('pictures');
                }
                break;
        }

	}
}





















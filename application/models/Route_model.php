<?php

class Route_model extends CI_Model{

	public function rewrite_routes()
	{
		$this->load->helper('file');

		$query = $this->db->get('slugs');
		$slugs = $query->result_array();

		if ( ! write_file(APPPATH.'cache/routes.php', '<?php'."\n\n"))
		{
			return false;
		}

		

		foreach ( $slugs as $slug )
		{
			$data = '$route[\''.$slug['slug_value'].'\'] = \''.$slug['entity'].'/visitator_view/'.$slug['entity_id'].'\';'."\n";

			if ( ! write_file(APPPATH.'cache/routes.php', $data, 'a'))
			{
				return false;
			}

		}

		return true;
	}
}
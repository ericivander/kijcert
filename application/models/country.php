<?php

class Country extends CI_Model
{
	public function getCountryList()
	{
		//select id_country, country_name from country
		$this->db->select('id_country, country_name');
		$this->db->from('country');
		$data = $this->db->get();
		return $data->result();
	}
}

/* End of file country.php */
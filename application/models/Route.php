<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

	class Route extends CI_Model {

		public function __construct() {
			parent::__construct();
		}
		
		public function fetch_route($idx = null)
		{
			$return = null;
			if(!is_null($idx))
			{

				$column = '`route`.`ruri`';
				if(is_numeric($idx))
				{
					$column = '`route`.`id`';
				}
				
				$this->db
								->select('`route`.`id` AS `route_id`')
								->select('`route`.`ruri` AS `route_ruri`')
								->select('`route`.`secured` AS `route_secured`')
								->select('`route`.`created` AS `route_created`')

								->from('`route`')
								->where($column, $idx);
				

				$query = $this->db->get();
				if($query->num_rows() == 1)
				{
					$row = $query->row();

					$route = new stdClass();
					$route->id = $row->route_id;
					$route->ruri = $row->route_ruri;
					$route->secured = $row->route_secured;
					$route->created = $row->route_created;

					$return = $route;
				}
			}
			return $return;
		}
	
		public function save_route($route_data, $route_idx = null)
		{
			$return = false;
			
			if(is_array($route_data))
			{
				$route = $this->fetch_route($route_idx);
				
				if($route)
				{
					$route_id = $route->id;
					$update = $this->db
									->set($route_data)
									->where('`id`', $route->id)
									->from('`route`')
									->update();

					if($update)
					{
						$return = $route_id;
					}

				}
				else
				{
					$insert = $this->db
									->set($route_data)
									->set('`route`.`created`',date('Y-m-d H:i:s',time()))
									->from('`route`')
									->insert();

					if($insert)
					{
						$return = $this->db->insert_id();
					}
				}
			}

			return $return;
		}
	}
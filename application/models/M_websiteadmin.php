<?php

	class m_websiteadmin extends CI_Model {
	
		const TABLE	= 'website_adminlogin';
	
		public function __construct()
		{
			parent::__construct();
		}
		
		public function save($data)
        {
          
            $this->db->insert(self::TABLE, $data);
       	 }

		
		
		public function findBymanageName($where)
			{	
				
				$this->db->select('*');
				$this->db->from('website_adminlogin');
				$this->db->where($where);
				//$this->db->where('status', 1);
				$query = $this->db->get();
				return $query->row();
			}
			
			
		public function userloginmodel($table, $userName)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->where('userName', $userName);
				//$this->db->where('status', 'Active');
				$query = $this->db->get();
				return $query->row();
			}
			
		public function agentloginmodel($table, $agEmail)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->where('agEmail', $agEmail);
				$this->db->where('status', 'Active');
				$query = $this->db->get();
				return $query->row();
			}
		
		
		
		public function findByadminUserName($username, $password)
			{
			
				$this->db->select('*');
				$this->db->from('usermanage');
				$this->db->where('userloginId', $username);
				$this->db->where('suloginpass', $password);
				$query = $this->db->get();
				return $query->row();
			}
		
		
		
		
		
		public function findAll($where = array())
			{
				$this->db->select('*');
				$this->db->from(self::TABLE);
				$this->db->where($where);
				$this->db->order_by("a_id", "asc");
				$query = $this->db->get();
				return $query->result();
			}
			
			
	
	
		public function update($data, $auid)
			{
				$this->db->update(self::TABLE, $data, array('auid' => $auid));        
			}
		
		
		
		
		
		public function newupdate($confirm_passwordmd5, $id)
		{
			
			$this->db->update(self::TABLE, array('id' => $id, 'admin_pass' => $confirm_passwordmd5));
			
		}
		
		

		
		public function destroy($a_id)
			{
				$this->db->delete(self::TABLE, array('a_id' =>$a_id));        
			}
		
			
	}
?>
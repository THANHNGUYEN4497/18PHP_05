<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manageClerkModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertDB($name,$age,$phone,$avartar,$numberOfOrder,$email){
		    $DB_table = array('Name' => $name,
		    	'Age' => $age,
		    	'PhoneNumber' => $phone,
		    	'Avartar' => $avartar,
		    	'NumberOfOrder' => $numberOfOrder,
		    	'Email' => $email
		    );
		    $this->db->insert('manageclerk', $DB_table);
		 return $this->db->insert_id();
	}
	public function showDataDB(){
         $this->db->select('*');
        $dataGetDB = $this->db->get('manageclerk');
         $dataGetDB = $dataGetDB->result_array();
        /*echo '<pre>';
        var_dump($dataGetDB);*/
        return $dataGetDB;
	}
	public function deleteData($idGetDB){
		$this->db->where('Id', $idGetDB);
         return	$this->db->delete('manageclerk');
	}
	public function editData($idGetDB){
		$this->db->where('Id', $idGetDB);
		$dataGetDB_2 = $this->db->get('manageclerk');
		$dataGetDB_2 = $dataGetDB_2->result_array();
		/*echo '<pre>';
		var_dump($dataGetDB_2);*/
		return $dataGetDB_2;
	}
	public function updateData($id,$Name,$Age,$Phone,$Avartar,$NumberOfOrder,$Email){
		$dataView = array(
        'Id' => $id,
        'Name' => $Name,
        'Age' => $Age,
        'PhoneNumber' => $Phone,
	    'Avartar'  => $Avartar,
	    'NumberOfOrder' => $NumberOfOrder,
	    'Email' => $Email
		);
		$this->db->where('Id', $id);
		$this->db->update('manageclerk', $dataView);
		return $dataView;
	}

}

/* End of file manageClerkModel.php */
/* Location: ./application/models/manageClerkModel.php */
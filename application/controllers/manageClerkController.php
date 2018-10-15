<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'UploadHandler.php';

class manageClerkController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('manageClerkView');
	}
	public function insertData(){
		 // --------------------- Process Avartar upload ---------------------
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["avartar"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["avartar"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["avartar"]["size"] > 5000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["avartar"]["tmp_name"], $target_file)) {
	       // echo "The file ". basename( $_FILES["avartar"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
	 $Name =$this->input->post('name');
     $Avartar = base_url()."uploads/".basename($_FILES["avartar"]["name"]);
	$Age =$this->input->post('age');
	$NumberOfOrder =$this->input->post('numberOfOrder');
	$Phone =$this->input->post('phone');
	$Email =$this->input->post('email');
    $this->load->model('manageClerkModel');
   if ( $this->manageClerkModel->insertDB( $Name,$Age,$Phone,$Avartar,$NumberOfOrder,$Email)) {
   	  $this->load->view('notifySuccess');
   }
    
	 }
	public function showData(){
       $this->load->model('manageClerkModel');
       $result_1 = $this->manageClerkModel->showDataDB();
       $result_1 = array('dataClerk' => $result_1);
       $this->load->view('manageClerkView', $result_1, FALSE);
    }
    public function deleteData($getIdDB){
    	$this->load->model('manageClerkModel');
    	$this->manageClerkModel->deleteData($getIdDB);
    	$this->load->view('notifyDeleteSuccess');
    }
    public function editData($getIdDB){
    	$this->load->model('manageClerkModel');
    	$result_2 = $this->manageClerkModel->editData($getIdDB);
    	$result_2 = array('dataEachClerk' => $result_2);
    	$this->load->view('editInfoClerk', $result_2, FALSE);
    }
    public function updateData(){
    $id = $this->input->post('id');	
    $Name =$this->input->post('name');
 
	$Age =$this->input->post('age');
	$NumberOfOrder =$this->input->post('numberOfOrder');
	$Phone =$this->input->post('phone');
	$Email =$this->input->post('email');
    $this->load->model('manageClerkModel');
   // --------------------- Process Avartar upload again ----------------------------
    $target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["avartar"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["avartar"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["avartar"]["size"] > 5000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["avartar"]["tmp_name"], $target_file)) {
	       // echo "The file ". basename( $_FILES["avartar"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
	$Avartar = basename($_FILES["avartar"]["name"]);
   // uploaded avartar new
      if ($Avartar) {
         $Avartar = base_url()."uploads/".basename($_FILES["avartar"]["name"]);
      }
      else {
      	$Avartar = $this->input->post('avartar2');

      }
     if ($this->manageClerkModel->updateData( $id,$Name,$Age,$Phone,$Avartar,$NumberOfOrder,$Email)) {
  	 $this->load->view('notifyEditSuccess');
       }
    }
 public function insertDataByAjax()
 {
 	 $Name =$this->input->post('name');
     $Avartar = $this->input->post('avartar');
	$Age =$this->input->post('age');
	$NumberOfOrder =$this->input->post('numberOfOrder');
	$Phone =$this->input->post('phone');
	$Email =$this->input->post('email');
    $this->load->model('manageClerkModel');
   $this->manageClerkModel->insertDB( $Name,$Age,$Phone,$Avartar,$NumberOfOrder,$Email);
   	
 }
 public function uploadFilesJquery(){
 	$uploadFiles = new UploadHandler;
 }
}

/* End of file manageClerkController.php */
/* Location: ./application/controllers/manageClerkController.php */
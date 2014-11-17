<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$q = $this->db->Execute("INSERT INTO TBL_USER ('ID', 'USERNAME') VALUES (1, 'USERDB2')");
		$recordSet = $this->db->Execute("select * from TBL_USER");
		if (!$recordSet) 

				 print $conn->ErrorMsg();

		else while (!$recordSet->EOF) {

				 print $recordSet->fields[0]." ".$recordSet->fields[1]." <a href=index.php/welcome/remove/".$recordSet->fields[0]."/>Delete</a> | <a href=index.php/welcome/edit/".$recordSet->fields[0]."/>Edit</a><BR>";

				 $recordSet->MoveNext();

		}		
		$this->load->view('welcome_message');
	}
	public function add(){
	
		$this->load->view('add');
	}
	public function edit($id){
		$rs = $this->db->Execute("select * from TBL_USER WHERE ID='$id'");
		//echo $data['user'];
		 $data['user'] = $rs->GetArray();
		// print_r($user);
		
		 $this->load->view('edit',$data);
	}
	public function save(){
	
		$username=$this->input->post('username');	
		$sql = "insert into TBL_USER (ID,USERNAME)";
		$sql .= "values (TBL_USERSEQ.NEXTVAL,'$username')";
		$status = $this->db->Execute($sql);
		if(!$status){
			 print $conn->ErrorMsg();
		}else {
			echo "Insert Sukses";
			echo " <a href='../../../../'>Home</a>";
		}
	}
	public function remove($id){	
		$sql = "DELETE FROM TBL_USER WHERE ID='$id'";	
	
		$status = $this->db->Execute($sql);
		if(!$status){
			 print $conn->ErrorMsg();
		}else {
			echo "Hapus Sukses";
			echo " <a href='../../../../'>Home</a>";
		}
	}
	public function update(){	
		$id=$this->input->post('id');	
		$username=$this->input->post('username');	
		$sql = "UPDATE TBL_USER SET USERNAME='$username' WHERE ID='$id'";	

		$status = $this->db->Execute($sql);
		if(!$status){
			 print $conn->ErrorMsg();
		}else {
			echo "Update Sukses";
			echo " <a href='../../'>Home</a>";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
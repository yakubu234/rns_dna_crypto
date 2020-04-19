<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class RNS_system extends CI_Controller {

// 	public function __construct() {
// 		parent::__construct();

//         $this->load->database();
// // Load form helper library
// 		$this->load->helper('form');

// // Load form validation library
// 		$this->load->library('form_validation');

// // Load session library
// 		$this->load->library('session');
// 		$this->load->library('datadase');
// 		   $this->load->helper('download');

// // Load database
// 		// $this->load->model('login_database');
// 	}
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('form_validation');
    // $this->load->model('user_model');
		$this->load->library('session');
		$this->load->helper('download');
		$replyto = "securedhms@gmail.com";
	}




	public function index()
	{
		$this->load->view('headers/head');
		$this->load->view('home/index');
	}

	public function Login(){
		$replyto = "securedhms@gmail.com";
		$tag = "Confidential";
		if ($this->input->post()) {
				# code...
			
     //get the input fields from login form
			$name = $this->input->post('email');
			$password = $this->input->post('password');
			// $password = md5($this->input->post('password'));

        //send the email pass to query if the user is present or not
			// $data = $this->user_model->checkLogin($name, $password);
			$this->db->select('*');
			$this->db->from('register');
			$this->db->where('email',$name);
			$this->db->where('password',$password);
			$query=$this->db->get();

			// if($query->num_rows()>0){
			// 	$data = $query->row_array();
			// }else{
			// 	$this->session->set_flashdata('errors', 'Record did not exist.');
			// 	$this->load->view('home/login');
			// }

        //if the result is query result is 1 then valid user
			if($query->num_rows()>0){
				$data = $query->row_array();
				$this->session->set_userdata('email',$data['email']);
				$this->session->set_userdata('name',$data['full_name']);
				// $this->session->set_userdata('type',$data['type']);
				$activate = $data['activate'];
				if ($activate == 0) {
					$this->session->set_userdata('email',$data['email']);
					$this->session->set_userdata('name',$data['full_name']);
					// $this->session->set_userdata('type',$data['type']);
					$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$code = substr(str_shuffle($set), 0, 12);
					$num = substr(str_shuffle($set), 0, 4);
					$subject1 = "Activation Code";
					$message = 	"
					<html>
					<head>
					<title>Verification Code</title>
					</head>
					<body>
					<h2>Activation Link.</h2>
					<p>It has been observed that you have not yet activate your account</p>
					<p>Please click the link below to activate your account.</p>
					<h4> " . base_url() . "RNS_system/activate/" . $num. "/" .$code. " </h4>
					</body>
					</html>
					";
					$tag ="oorporate mails";

					$this->db->where('email', $data['email']);
					
					if ($this->db->update('register', array('code' => $code))) {
						# code...
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
						curl_setopt($ch, CURLOPT_USERPWD, 'api:key-e415d6a58ae45d0b8a389d17600555ee');
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
						curl_setopt($ch, CURLOPT_URL, 
							'https://api.mailgun.net/v2/www.esoftchurch.com/messages');
						curl_setopt($ch, CURLOPT_POSTFIELDS, 
							array('from' => 'Residue Numbers System <admin@softchurch.com>',
								'to' =>$data['full_name'].' <'. $data['email'].'>',
								'subject' => $subject1,
								'html' => $message,
								'text' => $message,
								'o:tracking'=>'yes',
								'o:tracking-clicks'=>'yes',
								'o:tracking-opens'=>'yes',
								'o:tag'=>$tag,
								'h:Reply-To'=>$replyto));
						$result = curl_exec($ch);
						curl_close($ch);
					}
					
					$this->session->set_flashdata('errors', 'It appears youve not activate your account kindly check your mail for confirmation link . sometimes you check spam message');
					$this->load->view('home/login');
				}else{
					$this->session->set_flashdata('success', 'Record did not exist.');
					$this->load->view('headers/head_log');
					$this->load->view('home/dashboard');
				}
      // redirect(base_url('logon'));
			}
			else{

				$this->session->set_flashdata('errors', 'Record did not exist.');
				$this->load->view('home/login');
			}
		}
		else{$this->load->view('home/login');
	}

}

public function logon(){
	$this->load->view('headers/head_log');
	$this->load->view('home/dashboard');
}


// logout statement 
public function logout()
{
      // $this->session->session_unset();
	$user_data = $this->session->all_userdata();
	foreach ($user_data as $key => $value) {
		if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
			$this->session->unset_userdata($key);
		}
	}
	$this->session->sess_destroy();
	$this->session->set_flashdata('errors', 'You have to login first');
	redirect(base_url('RNS_system/index'));
}
// end of logout statement 

public function mustactivate(){

}

public function Upload_to_table(){  
	if(!empty($_FILES['file']['name'])){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		
      // $config['file_name'] = $_FILES['file']['name'];

                //Load upload library and initialize configuration
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('file')){
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 6);
			$code1 = substr(str_shuffle($set), 0, 12);
			$uploadData = $this->upload->data();
        // $picture = $uploadData['file_name'];
			$tmp_name = 'uploads/' . $uploadData['file_name'];
			// encryption begins 

			// the information to be converted to binary 
			$text = $uploadData['file_name'];
			$text = $text % 5 ;
			$bin = array();
			for($i=0; strlen($text)>$i; $i++)
				$bin[] = str_pad(decbin(ord($text[$i])),8,'0',STR_PAD_LEFT);
$bin = implode(' ',$bin);#convert text to binary here at the top 


$key= $code1;
$keynow = array();
for($i=0; strlen($key)>$i; $i++)
	$keynow[] = str_pad(decbin(ord($key[$i])),8,'0',STR_PAD_LEFT);
$key = implode(' ',$keynow); #the key converted to ascii


    	// add exclusive or to the converted text and its key
for($i=0; $i<strlen($bin); $i++){
	$text[$i] = intval($bin[$i])^intval($key[$i]);
}
$text; #variable holding already xored text

$splited_text = substr(chunk_split($text, 2," "), 0, -1); #split the xored bit to two bits each

$rep = str_replace("00","A",str_replace("11","G",str_replace("10","C",str_replace("01","T",$splited_text))));#convert xor to dna

$final_dna = str_replace(' ', '', $rep);# remove the white space of the converted dna

// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($encryption, $ciphering,  
	$decryption_key, $options, $decryption_iv);
$data['message'] =  $final_dna; #dna strings
$data['email'] = $this->input->post('email');
$data['pubkey'] =  $code1; #key to encrypt with xor
$data['privkey'] =  $text;#xored text
$data['user'] =  $this->input->post('user_email');
$data['code'] =  $code;
$data['subject'] =  $this->input->post('subject');
$insert = $this->db->insert('messages', $data);
}
if ($insert) {
	$num = substr(str_shuffle($set), 0, 12);
	$subject1 = "Decryption Code";
	$message = 	"
	<html>
	<head>
	<title>RSN System</title>
	</head>
	<body>
	<h2>You have been invited by ". $this->input->post('email') ." to view some file </h2>
	<p>below is the link to the file and its decryption key :</p>
	<p>Please click the link below to view the file.</p>
	<h4> <a href='". base_url() . "RNS_system/Info/" . $num. "/" .$code. "'>" . base_url() . "RNS_system/Info/" . $num. "/" .$code. "</a> </h4>
	<p>decryption key : &nbsp; ".$code1."</p>
	</body>
	</html>
	";
	$tag ="Coorporate mails";$replyto = "securedhms@gmail.com";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, 'api:key-e415d6a58ae45d0b8a389d17600555ee');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_URL, 
		'https://api.mailgun.net/v2/www.esoftchurch.com/messages');
	curl_setopt($ch, CURLOPT_POSTFIELDS, 
		array('from' => 'Residue Numbers System <admin@softchurch.com>',
			'to' =>$this->input->post('user_email').' <'. $this->input->post('user_email').'>',
			'subject' => $subject1,
			'html' => $message,
			'text' => $message,
			'o:tracking'=>'yes',
			'o:tracking-clicks'=>'yes',
			'o:tracking-opens'=>'yes',
			'o:tag'=>$tag,
			'h:Reply-To'=>$replyto));
	$result = curl_exec($ch);
	curl_close($ch);

	$this->session->set_flashdata('success', 'uploaded successfully . a mail has been sent to the recipient');
	redirect(base_url('RNS_system/drag_drop'));
              # code...
}
               // $data['response'] = 'successfully uploaded '.$uploadData; 
}
}

public function Info(){
	

	if ($this->input->post()) { 
// Store the cipher method 
		$email =$this->input->post('email');
		$key = $this->input->post('decryption');


		$this->db->select('*');
		$this->db->from('messages');
		$this->db->where('email',$email);
		$this->db->where('pubkey',$key);
		$query=$this->db->get();

		if($query->num_rows()>0){
			$data = $query->row_array();
			// convert the key string to ascii
			$key = $data['pubkey'];
			$keynow = array();
			for($i=0; strlen($key)>$i; $i++)
				$keynow[] = str_pad(decbin(ord($key[$i])),8,'0',STR_PAD_LEFT);
			$key = implode(' ',$keynow); #the key converted to ascii
			$final_dna = $data['message'];
			$xor = str_replace("A","00",str_replace("G","11",str_replace("C","10",str_replace("T","01",$final_dna))));#convert from dna to xor

			$text2 = $xor;
			for($i=0; $i<strlen($text2); $i++){
				$text2[$i] = intval($text2[$i])^intval($key[$i]);
			}$text2; #the varriable that get the xor converted back to the binary with zeros

			$grab = substr($text2, -1);#grab the last letter as the chop will always remove the last letter 
      		$string = $text2;
      		$n = 9;#// chop the 9th character here below
      		$newString = implode('',array_map(function($value){return substr($value,0,-1);},str_split($string,$n)));
			$finalgrab = $newString.$grab;# concatenate the last letter to the back of the choped characters
			#end chopping here 
			  // convert ascii to real text
			$text = array();
			$bin = str_split($finalgrab, 8);
			for($i=0; count($bin)>$i; $i++)
			$text[] = chr(bindec($bin[$i]));
			$decryption = implode($text);
if ($decryption) {
			# code...
	$this->session->set_flashdata('success', 'Record Fecth successfully');
		// var_dump($data['email']);
	$this->session->set_userdata('email',$data['email']);
	$this->session->set_userdata('decryption',$decryption);
	$this->session->set_userdata('user',$data['user']);
	$this->session->set_userdata('date',$data['date']);
	$this->load->view('headers/head');
	$this->load->view('home/read2',$data);
}
}else{
	$this->session->set_flashdata('errors', 'No Files found . Ensure you are inputing correct key or Contact the sender');
		// var_dump($data['email']);
	$this->session->set_userdata('email',$email);
	$this->load->view('headers/head');
	$this->load->view('home/read',$data);
}


}else{
	$num =  $this->uri->segment(3);
	$code = $this->uri->segment(4);
	$this->db->where('messages.code', $code);
	$data['result'] =$this->db->get_where('messages',array('code'=>$code))->row();
	$this->db->select('*');
	$this->db->from('messages');
	$this->db->where('code',$code);
	$query=$this->db->get();

	if($query->num_rows()>0){
		$data = $query->row_array();
	}
	// $ins = $this->user_model->update_forgot_password($email_code,$email);
		// $result = $this->db->update('register', $data); //get the hash value which belongs to given email from database
	if($data){ 
		$this->session->set_flashdata('success', 'Record Fecth successfully');
		// var_dump($data['email']);
		$this->session->set_userdata('email',$data['email']);
		$this->session->set_userdata('message',$data['message']);
		$this->session->set_userdata('date',$data['date']);
		$this->load->view('headers/head');
		$this->load->view('home/read',$data);
	}else{
		$this->session->set_flashdata('errors', 'The link has currupted');
		redirect(base_url('RNS_system/index'));
	}
}
}

public function signup(){
	$replyto = "securedhms@gmail.com";
	if ($this->input->post()) {
		$rules = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[register.email]',
				'errors' => array('is_unique' => 'This %s already exists.'),
			),
				// array(
				// 	'field' => 'email',
				// 	'label' => 'Email',
				// 	'rules' => 'required|valid_email|is_unique[register.email]',
				// 	),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('home/signup');
		} else {

			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
				//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);
			$num = substr(str_shuffle($set), 0, 4);
			//insert user to users table and get id
			$user['full_name'] = $name;
			$user['email'] = $email;
			$user['password'] = $password;
			$user['id_gen'] = $num;
			$user['code'] = $code;
			$user['activate'] = 0;
			$insert = $this->db->insert('register', $user);

			if($insert){
					//set up email
					// var_dump($insert);
			// $config = array(
		 //  		'protocol' => 'smtp',
		 //  		'smtp_host' => 'ssl://smtp.googlemail.com',
		 //  		'smtp_port' => 465,
		 //  		'smtp_user' => '<a href="mailto:securedhms@gmail.com" rel="nofollow">securedhms@gmail.com</a>', // change it to yours
		 //  		'smtp_pass' => 'OdunFavourAbiola', // change it to yours
		 //  		'mailtype' => 'html',
		 //  		'charset' => 'iso-8859-1',
		 //  		'wordwrap' => TRUE
			// );
				$subject1 = "Activation Code";
				$message = 	"
				<html>
				<head>
				<title>Verification Code</title>
				</head>
				<body>
				<h2>Thank you for Registering.</h2>
				<p>Your Account:</p>
				<p>Email: ".$email."</p>
				<p>Password: ".$password."</p>
				<p>Please click the link below to activate your account.</p>
				<h4> " . base_url() . "RNS_system/activate/" . $num. "/" .$code. " </h4>
				</body>
				</html>
				";
				$tag ="oorporate mails";

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, 'api:key-e415d6a58ae45d0b8a389d17600555ee');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
				curl_setopt($ch, CURLOPT_URL, 
					'https://api.mailgun.net/v2/www.esoftchurch.com/messages');
				curl_setopt($ch, CURLOPT_POSTFIELDS, 
					array('from' => 'Residue Numbers System <admin@softchurch.com>',
						'to' =>$name.' <'. $email.'>',
						'subject' => $subject1,
						'html' => $message,
						'text' => $message,
						'o:tracking'=>'yes',
						'o:tracking-clicks'=>'yes',
						'o:tracking-opens'=>'yes',
						'o:tag'=>$tag,
						'h:Reply-To'=>$replyto));
				$result = curl_exec($ch);
				curl_close($ch);
				$this->session->set_flashdata('success', 'Registered successfully, check your mail to activate');
				$this->load->view('home/signup');
        	// redirect('register');
			}else{
				$this->session->set_flashdata('error', 'Unable to register try again Later');
				$this->load->view('home/signup');
					#if not insert			}
			}
		}
	}else{
		$this->load->view('home/signup');
	}
}

public function drag_drop(){
	if ($this->input->post()) {
			# code...
	}else{
		$this->load->view('headers/head_log');
		$this->load->view('home/page-create-topic');	
	}
}

public function activate(){
	$id_gen =  $this->uri->segment(3);
	$code = $this->uri->segment(4);
	$data['activate'] = 1;
	
	$this->db->where('register.code', $code);
		$result = $this->db->update('register', $data); //get the hash value which belongs to given email from database
		if($result){ 
			$this->session->set_flashdata('success', 'Activated Successfully, Login now!');
			redirect(base_url('RNS_system/Login'));
		}else{
			$this->session->set_flashdata('errors', 'The link has currupted');
			redirect(base_url('signup'));
		}
	}

	function your_function(){
		$this->load->helper('download');
    $data = file_get_contents(APPPATH . 'controllers/upload/project_name/bc68gdas9jfeh9yfj/'.$this->uri->segment(3)); // Read the file's contents
    $name = $this->uri->segment(3);
    force_download($name, $data);
}
}

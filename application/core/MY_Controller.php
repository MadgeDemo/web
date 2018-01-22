<?php
if(!defined("BASEPATH")) exit("No direct script access allowed!");
	/**
	* 
	*/
	class MY_Controller extends MX_Controller
	{
		public $data = array();
		function __construct()
		{
			$this->load->library('session');
			$this->load->library('email');
			$this->load->library('LoadMailer');
			parent:: __construct();
			$this->data['menu'] = TRUE;
			$this->data['invent'] = '';
			$this->data['usr'] = '';
			$this->data['manage'] = '';
			$this->data['add'] = '';
			$this->data['username'] = $this->user_names();
			$this->data['title'] = $this->title();
			$this->data['navData'] = $this->load_nav_details();
		}

		public function load_libraries($arr){

			array_unshift($arr, "jquery", "jquery-ui", "bootstrap");
					
			$libs['js_files']				=	array();		
			$libs['css_files']				=	array();			
			$libs['js_plugin_files']		=	array();
			$libs['css_plugin_files']		=	array();

			$asset_path		=	$this->config->item('asset_path');

			$css_path		=	$this->config->item('asset_path');
			$js_path		=	$this->config->item('js_path');
			$plugin_path	=	$this->config->item('plugin_path');

			$all_css		=	$this->config->item('css_files');
			$all_js			=	$this->config->item('js_files');
			$all_plugin_css	=	$this->config->item('plugin_css_files');
			$all_plugin_js	=	$this->config->item('plugin_js_files');
			//load css
			foreach ($arr as $css) {
				foreach($all_css as $all){
					if($css==$all['title']){
						$libs['css_files']			=	array_merge($libs['css_files'],array($all['file']));
					}
				}
			}
			//load js
			foreach ($arr as $js) {
				foreach($all_js as $all){
					if($js==$all['title']){
						$libs['js_files']			=	array_merge($libs['js_files'],array($all['file']));
					}
				}
			}
			//load plugin css
			foreach ($arr as $css) {
				foreach($all_plugin_css as $all){
					if($css==$all['title']){
						$libs['css_plugin_files']	=	array_merge($libs['css_plugin_files'],array($all['file']));
					}
				}
			}
			//load plugin js
			foreach ($arr as $js) {
				foreach($all_plugin_js as $all){
					if($js==$all['title']){
						$libs['js_plugin_files']	=	array_merge($libs['js_plugin_files'],array($all['file']));

					}
				}
			}	
			return 	$libs;
		}

		function redirect() {
			$usertype = $this->session->userdata('usertype');

			if ($usertype == 1) $redirect = "admin";

			if ($usertype == 2) $redirect = "customer";

			redirect($redirect);
		}

		function isLoggedIn()
		{
			if (!$this->session->userdata('isLoggedIn')) redirect(base_url());
		}

		function isAdmin()
		{
			if ($this->session->userdata('usertype') != 1 || $this->session->userdata('usertype') != '1') self::redirect();
		}

		function isCustomer()
		{
			if ($this->session->userdata('usertype') != 2 || $this->session->userdata('usertype') != '2') self::redirect();
		}

		function auth_template($data)
		{
			$this->load->module('template');
			$this->template->auth_template($data);
		}

		function auth_template2($data)
		{
			$this->load->module('template');
			$this->template->auth_template2($data);
		}

		function template($data)
		{
			$this -> load -> module('template');
			$this -> template ->load_template($data);
		}

		function template2($data)
		{
			$this -> load -> module('template');
			$this -> template ->load_template2($data);
		}

		function admin_template($data)
		{
			$this -> load -> module('template');
			$this -> template ->backend_template($data);
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}

		function user_names()
		{
			if ($this->session->userdata('sisLoggedIn')) {
				$this->db->where('email',$this->session->userdata('semail'));
				$user = $this->db->get('users')->result();
				// echo "<pre>";print_r($user);die();
				return $user[0]->firstName." ".$user[0]->lastName;
			}
		}

		function load_nav_details()
		{
			if ($this->session->userdata('sisLoggedIn')) {
				// $user = $this->session->userdata('suser');
							
				// $client = new SoapClient(webServiceUrl);
				// try {
				// 	if ($user==1 || $user==2 || $user==3) {
				// 		$res = $client->getSpecificEmployee(array("empNo"=>$this->session->userdata('sNo')));
				// 	} else {
				// 		$res = $client->getSpecificCustomer(array("custNo"=>$this->session->userdata('sNo')));
				// 	}
				// } catch (SoapFault $e) {
				//     $res = "Error: {$e->faultstring}";
				// }

				// if ($user==1 || $user==2 || $user==3) {
				// 	$res = json_decode($res->getSpecificEmployeeResult);
				// } else {
				// 	$res = json_decode($res->getSpecificCustomerResult);
				// }
				// echo "<pre>";print_r($res);die();
				$data = array(
						// "phone" => $res->Phone_No
						"phone" => $this->session->userdata('semail')
					);
				return $data;
			}
		}

		function title()
		{
			if ($this->session->userdata('sisLoggedIn')) {
				if ($this->session->userdata('suser') == 1) {
					$title = 'Administrator';
				} else if ($this->session->userdata('suser') == 4) {
					$title = 'Customer';
				} else {
					$title = 'Employee';
				}
				
				return $title;
			}
		}

		function sendEmail($userEmail,$firstTimeLoiginID)
		{
			//SEND USER EMAIL
				$reciepientemail = $userEmail;
				$sendersEmail = 'silverstonecustomerportal@gmail.com';
				$sendersEmailPass = 'abc123**';
				
				$message = "Hello,<br/>
				You have been registered as a user on the Silverstone Web Portal. <br/> This will give you access to the inventory list.<br/>
				You will be prompted to change your password during your first login. 
				Use the credentials below to login.<br/><br/>

				First Time Login Code: ".$firstTimeLoiginID."<br/>
				Username: ".$reciepientemail."<br/><br/>
				Link: http://hzapps.silverstone.co.ke:8089/silverstonecustomerportal/login/employeelogin <br/>
				Local Link: http://10.10.10.139/sscustomerportal/ (use this if you are accessing the site from a device in the silverstone network)

				Regards,<br/>
				Silverstone Customer Portal.";

				$FromFName = "Silverstone";
				$FromLName = "Customer Portal";
				$subject = "Welcome to the Silverstone Customer Portal";

				return $this->phpMailerSendMail($reciepientemail,$sendersEmail,$sendersEmailPass,$message,$FromFName,$FromLName,$subject);
		}

		// //send Mail
		public function phpMailerSendMail($reciepientemail,$sendersEmail,$sendersEmailPass,$message,$FromFName,$FromLName,$subject){
			//SMTP needs accurate times, and the PHP time zone MUST be set
			//This should be done in your php.ini, but this is how to do it if you don't have access to that
			date_default_timezone_set('Etc/UTC');

			//Create a new PHPMailer instance
			$mail = new PHPMailer;

			//Tell PHPMailer to use SMTP
			$mail->isSMTP();

			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;

			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';

			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
			// use
			// $mail->Host = gethostbyname('smtp.gmail.com');
			// if your network does not support SMTP over IPv6

			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 465;

			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'ssl';

			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;

			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = $sendersEmail;

			//Password to use for SMTP authentication
			$mail->Password = $sendersEmailPass;

			//Set who the message is to be sent from
			$mail->setFrom($sendersEmail, $FromFName." ".$FromLName);

			//Set an alternative reply-to address
			$mail->addReplyTo($sendersEmail, $FromFName." ".$FromLName);

			//Set who the message is to be sent to
			$mail->addAddress($reciepientemail, 'Silverstone Customer Portal User');
			
			//Set the subject line
			$mail->Subject = $subject;

			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			// file_get_contents('contents.html'), dirname(__FILE__)
			$mail->msgHTML($message);

			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';

			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');

			//send the message, check for errors
			if (!$mail->send()) {
			    echo "Mailer Error: " . $mail->ErrorInfo;
			    // $resp = false;	
			} else {
				echo "Sent";
			    // $resp = true;	
			}
			die();
			// return $resp;
		}
		//send Mail

	}
?>
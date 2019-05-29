
<?php 

class DefaultController extends Controller{
	public function index(){
		
	
        if($_SESSION != null && isset($_SESSION['type'])){
            header('Location: /Home/Index');
        }
        
        
	$this->view('Default/Login',null);
	}


	public function Login(){

		if(!isset($_POST['login'])){
			$this->view('Default/Login',null);
		}

		if(isset($_POST['login'])){
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user = $this->model('User');
			$theUser = $user->getProfile($username);

			if($theUser != null){
			  	$user_arr = (array)$theUser;
			  	if($theUser->account_status == 0){
			  	$this->view('Default/Login',['message' =>"Your account is not approuved yet, please wait until you receive an email"]);

			  	}
			  	//$this->view('Home/Index', null);
			   else{
			 	if(password_verify($password, $theUser->hash_pass)){
			    $_SESSION['type'] = $theUser->type;
			 	$_SESSION['username'] = $username;
			 	$_SESSION['theUser'] = $theUser;
                                
                                
                                if($theUser->type === 'Customer'){
                                    $unreadMessages = $this->model('Message');
                                    $theMessages = $unreadMessages->getUnreadMessage($username);
                                    
                                     for($i=0;$i<count($theMessages);$i++){
                                         $_SESSION['theId'."$i"] = $theMessages[$i]->message_id;
                                             $_SESSION['message'."$i"] = $theMessages[$i]->message;
                                            $_SESSION['subject'."$i"] = $theMessages[$i]->subject;
                                           // echo $_SESSION['message'."$i"];
                                           // echo $_SESSION['subject'."$i"];
                                   }
                                }
                                
                                
				//var_dump($user_arr);
						header('Location: /Home/Index');
                                                                                }
						$this->view('Default/Login',['message' =>"Error, wrong password... please try again"]);
			}
			}
			else{
				$this->view('Default/Login',['message' =>"This user does not exist. Please try with an existing user"]);
			}
		}
	}

	public function RegisterCustomer(){
		if(!isset($_POST['registercustomer_submit'])){
				$this->view('Default/RegisterCustomer',null);
		}

		else if(isset($_POST['registercustomer_submit'])){


			$userModel = $this->model('User');
			 $customerModel = $this->model('Customer');
			 $companyModel = $this->model('Company');

			$password = $_POST['password'];
			$password_confirm = $_POST['confirm_password'];
			if($password === $password_confirm){
				$userModel->username = $_POST['username'];
				$userModel->type = 'Customer';
				$userModel->hash_pass = password_hash($password,PASSWORD_DEFAULT);
				$userModel->account_status = 0;
				$customerModel->username =$_POST['username']; 
			    $company = $_POST['company_key'];

			 	$exist_Company = $userModel->getProfile($company);
			 	if($exist_Company != null){
			 			$userModel->insert();
			 		 $customerModel->company_username = $company;
			 		 $customerModel->first_name = $_POST['first_name'];
			 		 $customerModel->last_name = $_POST['last_name'];
			 		 $customerModel->insert();
						$_SESSION['success'] = 'You have registered as Customer successfully, you can login using your credentials when you are approved';
						header('Location: /Default/Login/');		 		}
			 		else{
			 			$this->view('Default/RegisterCustomer', ['message' => 'The Key you entered is not valid, please try again']);
			 		}
			 	}

				// echo "$username $first_name $last_name $passwordhash $company ";
			}
			else{
				$this->view('Default/RegisterCustomer', ['message' => 'Passwords did not match. Please try again']);
			}	
	}


	public function RegisterCompany(){

			//check if form info was received
			if(!isset($_POST['registercompany_submit'])){
				$this->view('Default/RegisterCompany',null);
			}

			else if(isset($_POST['registercompany_submit'])){
				//create user object
				$userModel = $this->model('User');
				//create company object
				$companyModel = $this->model('Company');
				//get passwords
				$password = $_POST['password'];
				$password_confirm = $_POST['confirm_password'];
				if($password === $password_confirm){ //check if passwords are the same
					//get user info
					$userModel->username = $_POST['username'];
					$userModel->type = 'Company';
					$userModel->hash_pass = password_hash($password,PASSWORD_DEFAULT);
					$userModel->account_status = 0;
					//get company info
					$companyModel->username = $_POST['username'];
					$companyModel->company_name = $_POST['company_name'];
					$companyModel->address = $_POST['address'];

					$exist_username= $userModel->getProfile($_POST['username']);
					if($exist_username == null){
						$userModel->insert();
						$companyModel->insert();
						//$this->view('Default/RegisterCompany', ['success' => 'You have registered your Company successfully, you will now be redirected to login', 'message' => null]);
						$_SESSION['success'] = 'You have registered your Company successfully, you can login using your credentials when you are approved';

						
						header('Location: /Default/Login/');
					}
					else{
					$this->view('Default/RegisterCompany', ['message' => 'This username is already, please try with a new company username.']);
					}

					}

			}
			else{
				$this->view('Default/RegisterCompany', ['message' => 'Passwords did not match.. please try again']);
			}
			
	}

	public function RegisterEmployee(){

		//check if form info was received
		if(!isset($_POST['registeremployee-submit'])){
			$this->view('Default/RegisterEmployee',null);
		}

		else if(isset($_POST['registeremployee-submit'])){
			//create user object
			$user = $this->model('User');

			//create Employee object
			$employee = $this->model('Employee');

			//get passwords
			$password = $_POST['password'];
			$password_confirm = $_POST['confirm_password'];

			if($password === $password_confirm){ //check if passwords are the same
				//get user info
				$user->username = $_POST['username'];
				$user->type = 'Employee';
				$user->hash_pass = password_hash($password,PASSWORD_DEFAULT);
				$user->account_status = 1;

				//get Employee info
				$employee->username = $_POST['username'];
				$employee->first_name = $_POST['first_name'];
				$employee->last_name = $_POST['last_name'];

				//TODO: CHECK TYPE
				$employee->type = $_POST['type'];

				//Check if username is already taken
				$exist_username = $user->getProfile($_POST['username']);

				if($exist_username == null){
					$user->insert();
					$employee->insert();

					

					$_SESSION['success'] = 'You have registered an Employee successfully, they may now login using their credentials';
                                        header('Location: /Home/Index');
                                        
                                }

				else{
					$this->view('Default/RegisterEmployee', ['message' => 'This username is already, please try with a new company username.']);
				}

			}

		}
		else{
			$this->view('Default/RegisterCompany', ['message' => 'Passwords did not match.. please try again']);
		}
			
	}

}
?>
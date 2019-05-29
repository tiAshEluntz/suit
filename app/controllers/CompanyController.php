<?php

class CompanyController extends Controller {

    public function approuveEmployee() {

        if ($_SESSION == null || $_SESSION['type'] != "Company") {
            header('Location:/Default/Login');
        }

        $company = $this->model('Company');
        $employees = $company->getCustomerToApprove($_SESSION['username']);

        $this->view('Home/indexCompany', ['employees' => $employees]);

        // var_dump(employees);
    }

    public function companyOrder() {

        if ($_SESSION == null || $_SESSION['type'] != "Company") {
            header('Location:/Default/Login');
        }

        $companyModel = $this->model('Company');
        $companyEmployees = $companyModel->getApprouvedEmployees($_SESSION['username']);
        $this->view('Order/EmployeeOrders', ['employees' => $companyEmployees]);
    }

    public function companyViewOrder($employeeId) {
        $order = $this->model('Order')->getCustomerOrders($employeeId);

        $this->view('home/CustomerOrder', ['order' => $order, 'username' => $employeeId]);
    }

    public function acceptRequest($username) {

        if ($_SESSION == null || $_SESSION['type'] != "Company") {
            header('Location:/Default/Login');
        }

        $company = $this->model('Company');
        $company->approuveCustomer($username);
        $employees = $company->getCustomerToApprove($_SESSION['username']);
        $this->view('Home/indexCompany', ['employees' => $employees, 'message' => 'true', 'username' => $username]);
    }

    public function declineRequest($username, $conf) {

        if ($_SESSION == null || $_SESSION['type'] != "Company") {
            header('Location:/Default/Login');
        }

        $company = $this->model('Company');

        if ($conf == "false") {
            $employees = $company->getCustomerToApprove($_SESSION['username']);
            $this->view('Home/indexCompany', ['confirmation' => "true", 'username' => $username, 'employees' => $employees]);
        }

        if ($conf == "true") {
            $customer = $this->model('Customer');
            $customer->getCustomer($username)->remove();

            $otheremployees = $company->getCustomerToApprove($_SESSION['username']);
            $this->view('Home/indexCompany', ['employees' => $otheremployees]);
        }
    }

    public function unsubscribeRedirect() {
        if ($_SESSION == null ||(!isset($_SESSION['type'] ))) {
            header('Location:/Default/Login');
        }
        $username = $_SESSION['username'];
        $this->view('/Home/CompanyUnsubscribe', ['hiddenError' => 'hidden', 'hiddenErrorBox' =>'hidden']);
    }

    public function unsubscribe() {

        if ($_SESSION == null || !isset($_SESSION['type'])) {
            header('Location: /Default/Index');
        }

        $username = $_SESSION['username'];
        $user = $this->model('User');


        if (isset($_POST['saveButton_submit'])) {

            $password = $_POST['currentPassword'];

            $myUser = $_SESSION['username'];
            $user = $this->model('User');
            $theUser = $user->getProfile($myUser);


            if ($_SESSION == null || isset($_SESSION['type'])) {

                if (password_verify($password, $theUser->hash_pass)) {
                    $theUser->username = $myUser;
                    
                    if($theUser->type === "Company"){
                        $compRemove = $this->model('Company')->getCompany($theUser->username)->remove();
                    }
                    if($theUser->type === "Employee"){
                        $empRemove = $this->model('Employee')->getEmployee($theUser->username)->remove();

                    }
                    if($theUser->type === "Customer"){
                       $custRemove = $this->model('Customer')->getCustomer($theUser->username)->remove();
                    }
                   
                    $theUser->remove();
                    
                    $_SESSION = array();

		
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

		session_destroy();
                    
                    
                    
                            $this->view('/Home/CompanyUnsubscribe', ['hiddenError' => '', 'hiddenErrorBox' =>'hidden']);

                } else {
                            $this->view('/Home/CompanyUnsubscribe', ['hiddenError' => 'hidden', 'hiddenErrorBox' =>'']);
                }
            }
        }
    }

}

?>
<?php

class HomeController extends Controller {

    public function index() {



        if ($_SESSION['type'] === "Customer") {
                        header('location: /Customer/Transactions');

            }

        if ($_SESSION['type'] === "Employee") {
            header('location: /Employee/Index');
        }

        if ($_SESSION['type'] === "Company") {
            header('Location: /Company/approuveEmployee');
        }

        if ($_SESSION['type'] === "Admin") {
            header('location: /Admin/Index');
        }
    }

    public function logout() {

        $_SESSION = array();

        // Si vous voulez détruire complètement la session, effacez également
        // le cookie de session.
        // Note : cela détruira la session et pas seulement les données de session !
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

        // Finalement, on détruit la session.
        session_destroy();
        header('location:/Default/Index');
    }

    public function accountInfo() {
        if ($_SESSION == null || !isset($_SESSION['type'])) {
            header('Location: /Default/Index');
        }

        $myUser = $_SESSION['username'];
        $user = $this->model('User');
        $theUser = $user->getProfile($myUser);


        if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Company") {
            $company = $this->model('Company');
            $theCompany = $company->getCompany($myUser);


            $this->view('Home/AccountInfo', ['user' => $theUser, 'company' => $theCompany]);
        }

        if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Admin") {



            $this->view('Home/AdminAccountInfo', ['user' => $theUser]);
        }


        if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Employee") {


            $employee = $this->model('Employee');
            $theEmployee = $employee->getEmployee($myUser);
            $this->view('Home/EmployeeAccountInfo', ['user' => $theUser, 'employee' => $theEmployee]);
        }



        if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Customer") {


            $customer = $this->model('Customer');
            $theCustomer = $customer->getCustomer($myUser);
            $this->view('Home/CustomerAccountInfo', ['user' => $theUser, 'customer' => $theCustomer]);
        }

    }

    public function editInfo() {
 
        if (isset($_POST['saveButton_submit'])) {

            $username = $_SESSION['username'];

            if (isset($_SESSION['type']) && $_SESSION['type'] == "Company") {
                $company_name = $_POST['company_name'];
                $address = $_POST['address'];
            }

            if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Employee") {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
            }

if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Customer") {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
            }
            $user = $this->model('User');
            $theUser = $user->getProfile($username);

            if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Company") {
                $company = $this->model('Company');
                $theCompany = $company->getCompany($username);
                $theCompany->username = $username;
                $theCompany->address = $address;
                $theCompany->updateAddress();
                $theCompany->company_name = $company_name;
                $theCompany->updateCompanyName();
                $this->view('Home/AccountInfo', ['user' => $theUser, 'company' => $theCompany]);
            }

            if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Employee") {
                $employee = $this->model('Employee');
                $theEmployee = (object) $employee->getEmployee($username);


                $theEmployee->username = $username;
                $theEmployee->first_name = $first_name;
                $theEmployee->updateFirstName();

                $theEmployee->last_name = $last_name;
                $theEmployee->updateLastName();

                $this->view('Home/EmployeeAccountInfo',['user' => $theUser, 'employee' => $theEmployee]);
            }
            
              if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Customer") {
                $customer = $this->model('Customer');
                $theCustomer = $customer->getCustomer($username);


                $theCustomer->username = $username;
                $theCustomer->first_name = $first_name;
                $theCustomer->updateFirstName();

                $theCustomer->last_name = $last_name;
                $theCustomer->updateLastName();

                $this->view('/Home/CustomerAccountInfo',['user' => $theUser, 'customer' => $theCustomer]);
            }
        }
        
        if(isset($_POST['deleteButton'])){
                        $username = $_SESSION['username'];

                        
            $user = $this->model('User');
            $theUser = $user->getProfile($username);
            
            $company = $this->model('Company');
                $theCompany = $company->getCompany($username);
                $theCompany->username = $username;
                $theCompany->address = "DELETED";
                $theCompany->updateAddress();
                $this->view('Home/AccountInfo', ['user' => $theUser, 'company' => $theCompany]);

        }
    }

    public function passwordRedirect() {

        $myUser = $_SESSION['username'];
        $user = $this->model('User');
        $theUser = $user->getProfile($myUser);


        if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Company") {
            $company = $this->model('Company');
            $theCompany = $company->getCompany($myUser);

            $company = $this->model('Company');
            $theCompany = $company->getCompany($myUser);
            $this->view('/Home/NewPassword', ['hiddenSuccess' => 'hidden', 'hiddenError' => 'hidden', 'message' => '', 'user' => $theUser, 'company' => $theCompany]);
        }


        if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Admin") {

            $this->view('/Home/NewPassword', ['hiddenSuccess' => 'hidden', 'hiddenError' => 'hidden', 'message' => '', 'user' => $theUser]);
        }
        
         if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Employee") {

            $this->view('/Home/NewPassword', ['hiddenSuccess' => 'hidden', 'hiddenError' => 'hidden', 'message' => '', 'user' => $theUser]);
        }
        
         if ($_SESSION == null || isset($_SESSION['type']) && $_SESSION['type'] == "Customer") {

            $this->view('/Home/NewPassword', ['hiddenSuccess' => 'hidden', 'hiddenError' => 'hidden', 'message' => '', 'user' => $theUser]);
        }
    }

    public function changePassword() {

        if ($_SESSION == null || !isset($_SESSION['type'])) {
            header('Location: /Default/Index');
        }

        $username = $_SESSION['username'];
        $user = $this->model('User');


        if (isset($_POST['saveButton_submit'])) {

            $oldPass = $_POST['currentPassword'];
            $newPass = $_POST['newPass'];
            $newPassConf = $_POST['newPassConf'];

            $myUser = $_SESSION['username'];
            $user = $this->model('User');
            $theUser = $user->getProfile($myUser);


            if ($_SESSION == null || isset($_SESSION['type'])) {
                $company = $this->model('Company');

                $theCompany = $company->getCompany($username);
                $theUser = $user->getProfile($username);

                if (password_verify($oldPass, $theUser->hash_pass)) {
                    if ($newPass === "") {
                        $this->view('Home/NewPassword', ['hiddenSuccess' => 'hidden', 'hiddenError' => '', 'message' => 'Empty passwords...', 'user' => $theUser, 'company' => $theCompany]);
                    } else if ($newPass === $oldPass) {
                        //SamePassword entered
                        $this->view('Home/NewPassword', ['hiddenSuccess' => 'hidden', 'hiddenError' => '', 'message' => 'You have entered the old password as new password... Change will not take effect.', 'user' => $theUser, 'company' => $theCompany]);
                    } else if ($newPass === $newPassConf) {
                        //change here
                        $theUser->username = $myUser;
                        $theUser->hash_pass = password_hash($newPass, PASSWORD_DEFAULT);
                        $theUser->resetPassword();


                        $this->view('Home/NewPassword', ['hiddenSuccess' => '', 'hiddenError' => 'hidden', 'message' => 'You have changed your password successfully!', 'user' => $theUser, 'company' => $theCompany]);
                    } else {
                        $this->view('Home/NewPassword', ['hiddenSuccess' => 'hidden', 'hiddenError' => '', 'message' => 'The new password and the password confirmation does not match.. please make sure they are the same.', 'user' => $theUser, 'company' => $theCompany]);
                    }
                } else {
                    $this->view('Home/NewPassword', ['hiddenSuccess' => 'hidden', 'hiddenError' => '', 'message' => 'The current password entered do not correspond to what we have, please make sure that it is the correct password', 'user' => $theUser, 'company' => $theCompany]);
                }
            }
        }
    }

}

?>
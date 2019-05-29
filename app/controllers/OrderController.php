<?php

class OrderController extends Controller {

    public function Index() {
        $customer = $this->model('Customer')->getCustomer($_SESSION['username']);
        $orders = $this->model('Order')->getCustomerOrders($customer->customer_id);
        $this->view('Order/Index', ['orders' => $orders]);
    }

    public function Rates() {
        $company = $this->model('Company')->getCompany($_SESSION['username']);

        if ($company->rate_id == 0 or isset($_POST['change'])) {
            $this->view('Order/ChooseRate', null);
        } else {
            header('Location: /Order/MyRate');
        }
    }

    public function MyRate() {
        $company = $this->model('Company')->getCompany($_SESSION['username']);
        $rate = $this->model('Rate')->getRate($company->rate_id);

        $this->view('Order/MyRate', ['rate' => $rate]);
    }

    public function ChooseRate($rate) {

        $company = $this->model('Company')->getCompany($_SESSION['username']);
        $company->setRate($rate, $company->username);

        $order = $this->model('Order');
        $order->company_id = $company->company_id;
        $order->employee_id = 1;
        $order->status = 'In Process';
        $order->pickup = null;
        $order->location = $company->address;
        $order->delivery = null;
        $order->insert();

        $new_order = $this->model('Order')->getCompanyOrders($order->company_id);
        $order_id = $new_order[0]->order_id;
        header('Location: /Order/ChooseDate/' . $order_id);
    }

    public function Transaction() {
        $months = array(0 => 'Error', 1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

        $customer = $this->model('Customer')->getCustomer($_SESSION['username']);
        $company = $this->model('Company')->getCompany($customer->company_username);
        $next_date = $company->next_order;

        //Parse date to nice string
        $month = substr($next_date, 5, 2);
        if ($month < 10) {
            $month = substr($month, 0, 1);
        }
        $month_str = $months[$month];
        $day = substr($next_date, 8, 2);

        $suffix = "";
        $index = 1;

        if ($month < 10) {
            $day = substr($day, 0, 1);
            $index = 0;
        }

        if ($day[$index] == '1') {
            $suffix = "st";
        } else if ($day[$index] == '2') {
            $suffix = "nd";
        } else if ($day[$index] == '3') {
            $suffix = "rd";
        } else {
            $suffix = "th";
        }

        if ($day[0] == '1') {
            $suffix = "th";
        }


        $date = $month_str . " " . $day . $suffix;

        if (!isset($_POST['Transaction'])) {
            $this->view('Order/Transaction', ['next_order' => $date]);
        }

        if (isset($_POST['Transaction'])) {

            $new_order = $this->model('Order')->getCompanyOrders($company->company_id);
            $order_id = $new_order[0]->order_id;

            //Create transaction
            $transaction = $this->model('Transaction');
            $transaction->customer_id = $customer->customer_id;
            $transaction->order_id = $order_id;
            $transaction->order_date = $company->next_order;
            $transaction->payment_id = null;
            $transaction->insert();

            $transactions = $this->model('Transaction')->getCustomerTransactions($customer->customer_id);
            $transaction_id = $transactions[sizeof($transactions)-1]->transaction_id;

            $price = $this->model('Price');
            $items = array();
            $prices = array();
            $total = 0;
            for ($i = 1; $i <= 10; $i++) {
                if (isset($_POST['item_' . $i]) and $_POST['item_' . $i] != "Choose...") {

                    //Get price
                    $item_price = $this->model('Price')->getPrice($_POST['item_' . $i]);
                    $cost = $item_price->price;
                    $total += $cost;
                    array_push($prices, $cost);

                    //Create item
                    $new_item = $this->model('Item');
                    $new_item->transaction_id = $transaction_id;
                    $new_item->status = "In Process";
                    $new_item->price_id = $item_price->price_id;
                    $new_item->insert();

                    array_push($items, $_POST['item_' . $i]);
                }
            }
            $total = number_format($total, 2);
            $billing = $this->model('BillingInfo')->getCustomerBillingInfo($customer->customer_id);

           $this->view('Payment/CustomerPay', ['total' => $total, 'items' => $items, 'prices' => $prices, 'billing' => $billing, 'customer' => $customer]);
        }
    }

    public function ChooseDate($order_id) {

        $company = $this->model('Company')->getCompany($_SESSION['username']);

        if (!isset($_POST['Date'])) {
            $this->view('Order/ChooseDate', ['order_id' => $order_id]);
        }

        if (isset($_POST['Date'])) {
            $this->view('Order/ChooseDate', ['order_id' => $order_id]);
            $next_order = $_POST['next_date'];
            echo $next_order;
            $company->setNextOrder($next_order, $company->username);
            $order = $this->model('Order')->getOrder($order_id);
            $order->order_id = $order_id;
            $order->pickup = $next_order;
            $order->setPickupDate();

            header('Location: /Company/approuveEmployee');
        }
    }

    public function CompanyOrders() {
        $company = $this->model('Company')->getCompany($_SESSION['username']);
        $orders = $this->model('Order')->getCompanyOrders($company->company_id);

        $this->view('Order/CompanyOrders', ['orders' => $orders]);
    }

    public function EditOrder($order_id) {



        $order = $this->model('Order')->getOrder($order_id);


        if (!isset($_POST['saveButton_submit']) && !isset($_POST['deleteButton'])) {
            $this->view('Order/CompanyEditOrder', ['order' => $order]);
        }


        if (isset($_POST['saveButton_submit'])) {
            //Update data here

            $newStatus = $_POST['status'];
            $newPickup = $_POST['pickup'];
            $newLocation = $_POST['location'];

            $order->order_id = $order_id;
            $order->status = $newStatus;
            $order->location = $newLocation;
            $order->pickup = $newPickup;


            $order->updateStatus();
            $order->updateLocation();
            $order->setPickupDate();
            $this->view('Order/CompanyEditOrder', ['order' => $order]);
        }

        if (isset($_POST['deleteButton'])) {
            $newPickup = "0000-00-00";
            $order->order_id = $order_id;
            $order->pickup = $newPickup;
            $order->setPickupDate();

            $this->view('Order/CompanyEditOrder', ['order' => $order]);
        }
    }

    public function DeleteOrder($order_id) {

        $order = $this->model('Order')->getOrder($order_id);
        $order->remove();
        
        $company = $this->model('Company')->getCompany($_SESSION['username']);
        $orders = $this->model('Order')->getCompanyOrders($company->company_id);

        $this->view('Order/CompanyOrders', ['orders' => $orders]);
    }

}

?>
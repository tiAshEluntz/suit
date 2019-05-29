<html><body>
<table>
<tr><th>UserName</th><th>HashPass</th><th>type</th><th>status</th></tr>

<?php 
foreach ($data['users'] as $user) {

echo '<tr><td>$user->username</td><td>$user->hash_pass</td><td>$user->type</td><td>$user->account_status</td></tr>';
}
// var_dump($data['users']);

?>
</table>



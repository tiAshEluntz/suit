<html><body>
	<dl>
	<dt>First Name</dt>
	<dd><?php echo $data['client']->first_name; ?></dd>
	<dt>Last Name</dt>
	<dd><?php echo $data['client']->last_name; ?></dd>
</dl>

<table>
<tr><th>FirstName</th><th>Last Name</th><th>Actions</th></tr>

<?php 
foreach ($data['contacts'] as $contact) {

echo "<tr><td>$contact->type</td><td>$contact->information</td><td>toBe implemented</td></tr>";
}
//var_dump($data['clients']);

?>
</table>
</body>
</html>
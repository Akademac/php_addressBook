<?php
	
	include('connection.php');

	$all_contacts = "SELECT * FROM addresstable";
	$sql_all_contacts = $conn->query($all_contacts);

	if(isset($_POST['search'])) {
		require_once"connection.php";
		include('delete.php');
		$search = 'SELECT id, firstname, lastname, phonenumber, city, address, email FROM addresstable WHERE lastname = "' . $_POST['search'] . '"';
		$search_result = $conn->query($search);
		
	}


 ?>


<!DOCTYPE html>
<html>
	<head>
		<title>Address Book #3</title>
		<link rel='stylesheet' type='text/css' href='addressBook3.css' />
		<meta name='viewport' content='width=device-width' initial-scale=1.0 />
		<script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous">
		</script>
		<script src='addressBook3.js'></script>
	</head>
	<body>
		<div id='container'>
			<h2>Address Book</h2>
			<form method='POST' action='index.php' id='formSearch'>
				<input required type="text" name="search" placeholder='Search for contact' id='inputSearch'>
				<button type="submit" name="submit2" id='go'>Go!</button>
			</form>
			<form method='POST' action='index.php' id='form'>
				<input required class='inputs' type="text" name="firstName" placeholder="First Name" id='firstName' />
				<input required class='inputs' type="text" name="lastName" placeholder="Last Name" id='lastName'>
				<input required class='inputs' type="text" name="phoneNumber" placeholder="Phone Number" id='phoneNumber'>
				<input required class='inputs' type="text" name="city" placeholder="City" id='city'>
				<input required class='inputs' type="text" name="address" placeholder="Address" id='address'>
				<input required class='inputs' type="text" name="email" placeholder="Email" id='email'>
				<button type="submit" name="submit" id='submit' onclick="isEmpty()">Save Contact</button>
			<span id='viewRecords'>View Contacts</span>
			</form>
		</div>
		<table>
			<thead id='title'>
				<tr>
					<th>First Name</th>
					<th class='titles'>Last Name</th>
					<th class='titles'>Phone Number</th>
					<th class='titles'>City</th>
					<th class='titles'>Address</th>
					<th class='titles'>Email</th>
					<th class='titles'>Delete</th>
				</tr>
			</thead>
			<tbody id='tData'>
				<?php 
					if(isset($_POST['search'])) {
						#echo '<h1 style="color: red">Sta je Problem</h1>';
						$result = $search_result;
						
					}
					else{
						$result = $sql_all_contacts;
					}
					
					while($row = mysqli_fetch_assoc($result)) {?>
				<tr>
					<td class='tData'><?php echo $row['firstname']; ?></td>
					<td class='tData'><?php echo $row['lastname']; ?></td>
					<td class='tData'><?php echo $row['phonenumber']; ?></td>
					<td class='tData'><?php echo $row['city']; ?></td>
					<td class='tData'><?php echo $row['address']; ?></td>
					<td class='tData'><?php echo $row['email']; ?></td>
					<td id='x'>
						<a href="delete.php?id=<?php echo $row['id']; ?>" id='delete'>Delete</a>
						<a href="#" style="margin-left: 30px">Edit</a>
					</td>
				</tr>
				<?php }; ?>
			</tbody>
		</table>
		<img src="Images/arrowDown2.png" style="width: 40px; height: 40px; margin-top: 100px; cursor: pointer;" id='iksic'>
		<script>
			var firstName =document.querySelector('#firstName');
			var lastName =document.querySelector('#lastName');
			var phoneNumber =document.querySelector('#phoneNumber');
			var city =document.querySelector('#city');
			var address =document.querySelector('#address');
			var email =document.querySelector('#email');
			function isEmpty() {
				var notEmpty  = firstName.value != '' && lastName.value != '' && phoneNumber.value != '' && city.value != '' && address.value != ''
				 && email.value != ''; 
				if(notEmpty) {
					return true;
				}
				else{
					return false;
				}
			};

		</script>
	</body>
</html>

<?php
	
	// insert data from form to data-base: addresstable

	if(isset($_POST['submit'])) {
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$phoneNumber = $_POST['phoneNumber'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		$email = $_POST['email'];

		$sql_insert = "INSERT INTO addresstable(firstname, lastname, phonenumber, city, address, email)
								   VALUES('$firstName', '$lastName', '$phoneNumber', '$city', '$address', '$email');";
		$sql_insret_contact = $conn->query($sql_insert);						   
		if($sql_insret_contact) {
			header('Location: index.php');
		}
	}	
	
?>
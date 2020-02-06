<!DOCTYPE html>
<html lang="en">
	<head><Title>Who Am I</Title></head>
	<body>
	<form action="WhoAmI" method="POST">
	<input type="hidden" name="_token"
	value="<?php echo csrf_token();?> "/>
	<h2>What's Your Name</h2>
	<table>
		<tr>
			<td>First Name: </td>
			<td><input type="text" name="firstname" /></td>
		</tr>
		
		<tr>
			<td>Last Name: </td>
			<td><input type="text" name="lastname" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Ask Now" />
			</td>
		
		</tr>
	</table>
	</form>
	</body>
	</html>
<?php
if (isset($_POST['submit'])) {
    $current_data = file_get_contents('data.json');
    $array_data = json_decode($current_data, TRUE);
    $data = array(
        'first_name' => $_POST['first_name'],
        'last_name'  => $_POST['last_name'],
        'email'      => $_POST['email'],
        'phone'      => $_POST['phone']
    );
    $array_data[] = $data;
	$final_data = json_encode($array_data);
	file_put_contents('data.json', $final_data);
	header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<title>E. A. PORTNYAGIN Back-end></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<header>
		<h1 class="text-success" style="text-transform: uppercase; font-size: 32px;">Hello, everyone! This is coolest HTML form for task!</h1>
		<pre>
 ██████╗ ██████╗  ██████╗ ██╗         ███████╗ ██████╗ ██████╗ ███╗   ███╗
██╔════╝██╔═══██╗██╔═══██╗██║         ██╔════╝██╔═══██╗██╔══██╗████╗ ████║
██║     ██║   ██║██║   ██║██║         █████╗  ██║   ██║██████╔╝██╔████╔██║
██║     ██║   ██║██║   ██║██║         ██╔══╝  ██║   ██║██╔══██╗██║╚██╔╝██║
╚██████╗╚██████╔╝╚██████╔╝███████╗    ██║     ╚██████╔╝██║  ██║██║ ╚═╝ ██║
 ╚═════╝ ╚═════╝  ╚═════╝ ╚══════╝    ╚═╝      ╚═════╝ ╚═╝  ╚═╝╚═╝     ╚═╝
    	</pre>
	</header>
	<div class="container">
    	<div class="row">
    		<div class="col-lg-4">
    			<form action="" target="_self" method="post">
					<div class="form-group">
						<label for="first_name">Имя:</label>
						<input type="text" class="form-control" name="first_name">
					</div>
					<div class="form-group">
						<label for="last_name">Фамилия:</label>
						<input type="text" class="form-control" name="last_name">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" name="email" aria-describedby="emailHelp">
						<small id="emailHelp" class="form-text text-muted">Мы никогда не передадим вашу электронную почту кому-либо еще.</small>
					</div>
					<div class="form-group">
						<label for="phone">Телефон:</label>
						<input type="text" class="form-control" name="phone">
					</div>
					<button type="submit" value="submit" name="submit" class="btn btn-primary">Отправить</button>
    			</form>
    		</div>
    		<div class="col-lg-8">
    			<table class="table">
    				<thead>
    					<tr>
    						<th>Имя</th>
    						<th>Фамилия</th>
    						<th>Email</th>
    						<th>Телефон</th>
    					</tr>
    				</thead>
					<tbody>
						<?php
						unset($data);
						$data = file_get_contents("data.json");
						$data = json_decode($data, TRUE);
						if (!empty($data))
						{
							foreach ($data as $row)
							{
								echo '<tr><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td></tr>';
							}
						}
						?>
					</tbody>
    			</table>
    		</div>
		</div>
	</div>	
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
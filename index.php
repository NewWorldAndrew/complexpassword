<?php 
	
	/**
	 * take a string of characters and spit out a random one. 
	 * @param  [type] $string character set
	 * @return [type]         random character
	 */
	
	function random_character($string)
	{
		$k = rand(0, strlen($string) - 1);
		return $string[$k];
	}

	/**
	 * take lenght and a char array and return 
	 * randomize string
	 * @param  [type] $lenght     lenght of return string
	 * @param  [type] $char_array character array
	 * @return [type]             password string
	 */
	function randomize_str($lenght, $char_array)
	{
		$password_str = '';
		for( $i=0; $i < $lenght; $i++)
		{
			$password_str .= random_character($char_array);
		}
		return $password_str;
	}

	/**
	 * take the lenght of a password and generate a random password
	 * @param  int $lenght password
	 * @return string  random password
	 */
	function generate_password($options)
	{
		//$lower_case = implode(range('a', 'z'));
		//$upper_case = implode(range('A', 'Z'));
		//$numbers = implode(range(0,9));
		//
		
		$lower_case = 'abcdefghijklmnopqrstuvwxyz';
		$upper_case = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$numbers    = '123456789';
		$symbols    = '#$%^&*!?';

		$is_lower    = isset($options['lower_case']) ? $options['lower_case'] : '0';
		$is_upper    = isset($options['upper_case']) ? $options['upper_case'] : '0';
		$is_numbers  = isset($options['numbers'])    ? $options['numbers']    : '0';
		$is_symbols  = isset($options['symbols'])    ? $options['symbols']    : '0';

		$letters = '';
		if($is_lower   == 1) { $letters .= $lower_case; }
		if($is_upper   == 1) { $letters .= $upper_case; }
		if($is_numbers == 1) { $letters .= $numbers; }
		if($is_symbols == 1) { $letters .= $symbols; }
		
		$lenght = isset($options['lenght']) ? $options['lenght'] : 8;

		return randomize_str($lenght, $letters);
	}	

		$options = array(
				'lenght'     => $_GET['lenght'],
				'lower_case' => $_GET['lower_case'],
				'upper_case' => $_GET['upper_case'],
				'numbers'    => $_GET['numbers'],
				'symbols'    => $_GET['symbols']
			);

	    $my_password = generate_password($options);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Password Generator </title>
</head>
<body>
	<p>Generated Password: <?php echo $my_password; ?> </p>

	<form action= "" method="get">

		Lenght: <input type"text" name="lenght" value="<?php if(isset($_GET['lenght']))
														   { echo $_GET['lenght']; } ?>" /><br />

		<input type="checkbox" name="lower_case" value="1" <?php if($_GET['lower_case'] == 1)
														   {echo 'checked'; } ?> > LowerCase <br />

		<input type="checkbox" name="upper_case" value="1" <?php if($_GET['upper_case'] == 1) 
														   { echo 'checked'; } ?> > UpperCase <br />

		<input type="checkbox" name="numbers" value="1"    <?php if($_GET['numbers'] == 1)
														   {echo 'checked'; } ?> > Numbers <br />

		<input type="checkbox" name="symbols" value="1"    <?php if($_GET['symbols'] == 1)
														   {echo 'checked'; } ?> > Symbols <br />
		<input type="submit" value="Submit" />
		
	</form>

</body>
</html>
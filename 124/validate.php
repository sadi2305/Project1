<?php
	
	$recoder=0;
	if(isset($_POST['SubmitRegistration']))
	{
		$name=$_POST['name'];
		if(!empty($name))
		{
			 $namelength=strlen($name);
			if($namelength>=2)
			{
			$lengthcounter=0;
			for($i=0;$i<$namelength;$i++)
			{
				if(($name[$i]>='A' && $name[$i]<='Z') || ($name[$i]>='a' && $name[$i]<='z') || $name[$i]==' ' || $name[$i]=='-')
				{
					$lengthcounter++;
				}
				else
				{
					break;
				}
			}
			if($lengthcounter!=$namelength)
			{
				echo "Name Formet Error".'<br>';
				$recoder++;
			}
			}
			else
			{
				$recoder++;
			}
		}
		else
		{
			$recoder++;
		}
		
		
		
		
		$email=$_POST['email'];
		$emaillength=strlen($email);
		$lengthcounter=0;
		if(!empty($email))
		{
			$recorder=0;
			$counter=0;
			for($i=0;$i<$emaillength;$i++)
			{
				if($email[$i]=='@' && $recorder==0)
				{
					$counter++;
					$recorder=1;
				}
				else if($email[$i]=='.' && $recorder==1)
				{
					$counter++;
					$recorder=2;
					break;
				}
			}
			if($counter!=2)
			{
				echo "Email Formation Error".'<br>';
				$recoder++;
			}
		}
		else
			$recoder++;
		
		
		
		//user name.
		$checkuser=0;
		$checkpass=0;
		if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirmpassword']))
		{
			$length=strlen($_POST['username']);
			if($length>=2)
			{
				$string=$_POST['username'];
			for($i=0;$i<$length;$i++)
			{
				if(($string[$i]>='0' && $string[$i]<='9') || ($string[$i]>='A' && $string[$i]<='Z') || ($string[$i]>='a' && $string[$i]<='z'))
				{
					$checkuser++;
				}
				else if($string[$i]=='-' || $string[$i]=='_')
				{
					$checkuser++;
				}
			}
			}	
			
			
			$length1=strlen($_POST['password']);
			if($length1>=8)
			{
				$string=$_POST['password'];
				$confirmpass=$_POST['confirmpassword'];
				for($i=0;$i<$length1;$i++)
				{
					/*(@, #, $, %)*/
					if($string[$i]=='@' || $string[$i]=='#' || $string[$i]=='$' || $string[$i]=='%')
					{
						$checkpass++;
						break;
					}
				}
				if($checkpass==1)
				{
					if($string!=$confirmpass)
					{
						$checkpass=0;
					}
				}
			}
			
			if($length!=$checkuser || $length1<8 || $checkpass==0)
			{
				$recoder++;
				echo 'Error Username or Password'.'<br>';
			}
			
		}
		else if(empty($_POST['username']))
		{
			$recoder++;
			echo 'Username empty'.'<br>';
		}
		else if(empty($_POST['password']))
		{
			$recoder++;
			echo 'Password empty'.'<br>';
		}	
		else if(empty($_POST['confirmpassword']))
		{
			$recoder++;
			echo 'Confirm Password empty'.'<br>';
		}
		
		
		if(!empty($_POST['dd']) && !empty($_POST['mm']) && !empty($_POST['yyyy']))
		{
			$var=0;
			if($_POST['dd']>=1 && $_POST['dd']<=31)
			{
				$var++;
			}
			if($_POST['mm']>=1 && $_POST['mm']<=12)
			{
				$var++;
			}
			if($_POST['yyyy']>=1953 && $_POST['yyyy']<=1998)
			{
				$var++;
			}
			if($var!=3)
			{
				$recoder++;
				echo "Please Provide Valid detail of Date of Birth";
			}
			
		}
		
		else if(empty($_POST['dd']))
		{
			$recoder++;
			echo 'Day Field empty'.'<br>';
		}
		else if(empty($_POST['mm']))
		{
			$recoder++;
			echo 'Month Field empty'.'<br>';
		}	
		else if(empty($_POST['yyyy']))
		{
			$recoder++;
			echo 'Year Field empty'.'<br>';
		}
		
		
		
		if($recoder==0)
		{
			echo "Successfully Registered.".'<br>';
			echo $_POST['name'].'<br>';
			echo $_POST['email'].'<br>';
			echo $_POST['username'].'<br>';
			echo $_POST['password'].'<br>';
			echo $_POST['gender'].'<br>';
			echo $_POST['dd'].'/ ';
			echo $_POST['mm'].'/ ';
			echo $_POST['yyyy'];
		}
		
	}
	else if(isset($_POST['SubmitLogin']))
	{
		$var=0;
		$var1=0;
		if(!empty($_POST['username']) || !empty($_POST['password']))
		{
			$length=strlen($_POST['username']);
			if($length>=2)
			{
				$string=$_POST['username'];
			for($i=0;$i<$length;$i++)
			{
				if(($string[$i]>='0' && $string[$i]<='9') || ($string[$i]>='A' && $string[$i]<='Z') || ($string[$i]>='a' && $string[$i]<='z'))
				{
					$var++;
				}
				else if($string[$i]=='-' || $string[$i]=='_')
				{
					$var++;
				}
			}
			}	
			
			
			$length1=strlen($_POST['password']);
			if($length1>=8)
			{
				$string=$_POST['password'];
			for($i=0;$i<$length1;$i++)
			{
				/*(@, #, $, %)*/
				if($string[$i]=='@' || $string[$i]=='#' || $string[$i]=='$' || $string[$i]=='%')
				{
					$var1++;
					break;
				}
			}
			}
			
			if($length!=$var || $length1<8 || $var1==0)
			{
				echo 'Error Username or Password';
			}
			else 
				echo 'Successfully Login.';
			
		}
		else
			echo 'Must Atleast 2 Characters.';
		
	}
	
	else if(isset($_POST['Submitforgetpassword']))
	{
		$old=$_POST['oldpass'];
		$new=$_POST['newpass'];
		$newmatch=$_POST['newmatchpass'];
		if($old!=$new)
		{
			if($new==$newmatch)
			{
				echo "Password Successfully Changed.";
			}
			else
				echo "YOUR NEW Password Cannot MATCH";
		}
		else
			echo "YOU NEW Password LOOKS LIKE A OLD ONE";
	}
	else
		echo "ERROR";


?>

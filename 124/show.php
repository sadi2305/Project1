<?php
	if(isset($_POST['SubmitName']))
	{
		$var = $_POST['name'];
		$var1 = ord($var);
		if(empty($_POST['name']))
		{
			echo 'Cannot be empty';
		}
		else if(strlen($_POST['name'])<2)
		{
			echo 'Contains at least two words';
		}
		else if(($var1>=32 && $var1<=64) || ($var1>=91 && $var1<=96) || ($var1>=123 && $var1<=126))
		{
			echo 'Must Start with Letter';
		}
		else
		{
			$number='0';
			$check=strlen($_POST['name']);
			$counter = '0';
			for(;$number<$check;$number++)
			{
				if(($var[$number]>='a' && $var[$number]<='z') || ($var[$number]>='A' && $var[$number]<='Z') || $var[$number]==' ' || $var[$number]=='-')
					$counter++;
			}
			if($counter==$check)
			{
				echo 'OK';
			}
			else
				echo 'NOT OK';
		}
			
			
	}
	
	else if(isset($_POST['SubmitEmail']))
	{
		$var = $_POST['email'];
		$var1 = ord($var);
		if(empty($_POST['email']))
		{
			echo 'Cannot be empty';
		}
		else
		{
			$number='0';
			$check=strlen($_POST['email']);
			$counter = '0';
			$recorder='0';
			for(;$number<$check;$number++)
			{
				
				if($var[$number]=='@' && $recorder==0)
				{
					$counter++;
					$recorder=1;
				}
				else if($var[$number]=='.' && $recorder==1)
				{
					$counter++;
					$recorder=2;
					break;
				}
			}
			if($counter==2)
			{
				echo 'OK';
			}
			else
				echo 'NOT OK';
		}
			
			
	}
	
	else if(isset($_POST['SubmitGender']))
	{
		if(!empty($_POST['gender']))
		{
			echo 'OK';
		}
		
		else{
			echo 'NOT OK';
		}
			
			
	}
	
	else if(isset($_POST['SubmitDegree']))
	{
		if(!empty($_POST['edu']))
		{
			$var = count($_POST['edu']);
		/*foreach($_POST['edu'] as $value){
            echo "value : ".$value.'<br/>';
        }*/
			//echo $var;
			if($var<2)
			{
				echo 'Required 2 value.';
			}
			else
			{
				echo 'Ok';
			}
		}
		else
			echo 'Empty Field';
		
	}
	
	else if(isset($_POST['Submitbloodgrp']))
	{
		if(!empty($_POST['bloodgrp']))
		{
			echo $_POST['bloodgrp'];
		}
		else
			echo 'Empty Field';
		
	}
	else if(isset($_POST['SubmitDOB']))
	{
		$var=0;
		if(!empty($_POST['dd']) && !empty($_POST['mm']) && !empty($_POST['yyyy']))
		{
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
			if($var==3)
			{
				echo "Ok Accepted";
			}
			else
			{
				echo "Invalid";
			}
		}
		else
			echo 'Empty Field';
		
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
	
	else if(isset($_POST['SubmitPicture']))
	{
		
		$file=$_POST['filename'];
		echo filesize($file);
	}
	
	else
	{
		echo 'ERROR';
	}
	

?>
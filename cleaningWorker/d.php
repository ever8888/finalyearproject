$arr = explode("<br>", $val);
	$a=count($arr)-1;

	
	if($a==1)
	{
		$first = $arr[0];
		$first2 = '';
		$first3 = '';
		$first4 = '';
		$first5 = '';
	}
	else if($a==2)
	{
		$first = $arr[0];
		$first2 = $arr[1];
		$first3 = '';
		$first4 = '';
		$first5 = '';
	}
	else if($a==3)
	{
		$first = $arr[0];
		$first2 = $arr[1];
		$first3 = $arr[2];
		$first4 = '';
		$first5 = '';
	}
	else if($a==4)
	{
		$first = $arr[0];
		$first2 = $arr[1];
		$first3 = $arr[2];
		$first4 = $arr[3];
		$first5 = '';
	}
	else if($a==5)
	{
		$first = $arr[0];
		$first2 = $arr[1];
		$first3 = $arr[2];
		$first4 = $arr[3];
		$first5 = $arr[4];
	}
		
    $try = explode("-", $first);
	$try1 = explode("-", $first2);
	$try2 = explode("-", $first3);
	$try3 = explode("-", $first4);
	$try4 = explode("-", $first5);
	
	  if($try[0]=="4 hours+1 worker")
	{
	$test = substr($first, strpos($first, "-") + 1);
	
	$x="4 hours+1 worker-".$test;
	$test2 = substr($test, strpos($test, "M") + 1);
	
	
	$startTime = date("H:i:s");
	
	$cenvertedTime = date('H:i:s',strtotime('+4 hour',strtotime($startTime)));
    $cenvertedTime2 = date('H:i:s',strtotime('-4 hour',strtotime($startTime)));
	
	 $sql2 = "INSERT INTO list (list_name,list_start,list_end,list_price,service_name)
        VALUES ('$try[0]','$startTime','$$cenvertedTime','$test2','$name')";
        if (mysqli_query($link, $sql2))
        {
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($link);
        }
		
		$sql2 = "INSERT INTO list (list_name,list_start,list_end,list_price,service_name)
        VALUES ('$try[0]','$startTime','$$cenvertedTime','$test2','$name')";
        if (mysqli_query($link, $sql2))
        {
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($link);
        }
		
	
	}else if($try1[0]=="4 hours+1 worker")
	{
		$test = substr($first2, strpos($first2, "-") + 1);
		$x="4 hours+1 worker-".$test;
		
		$test2 = substr($test, strpos($test, "M") + 1);
	}else if($try2[0]=="4 hours+1 worker")
	{
		$test = substr($first3, strpos($first3, "-") + 1);
		$x="4 hours+1 worker-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else if($try3[0]=="4 hours+1 worker")
	{
		$test = substr($first4, strpos($first4, "-") + 1);
		$x="4 hours+1 worker-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else if($try4[0]=="4 hours+1 worker")
	{
		$test = substr($first5, strpos($first5, "-") + 1);
		$x="4 hours+1 worker-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else
	{
		$x='no';
	}
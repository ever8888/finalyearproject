<?php

function similarity_distance($matrix,$p1,$p2)
{
	
	$similar=array();
	$sum=0;
	
	foreach($matrix[$p1] as $key=>$value)
	{
		 if(array_key_exists($key,$matrix[$p2]))
		 {
			 $similar[$key]=1;
			 
		 }
	} 
		 if($similar==0)
		 {
			return 0; 
		 }
		 
		 
	foreach($matrix[$p1] as $key=>$value)
	{
		 if(array_key_exists($key,$matrix[$p2]))
		 {
			 $sum=$sum+pow($value-$matrix[$p2][$key],2);
		 }
	} 
	
	return 1/(1+sqrt($sum));
	
}

function getRecommendation($matrix,$person)
{
	$total=array();
	$simsums=array();
	$ranks=array();
	
 foreach($matrix as $otherPerson=>$value)
 {
 
   if($otherPerson!=$person)
   {
	   $sim=similarity_distance($matrix,$person,$otherPerson);
	   
	   foreach($matrix[$otherPerson] as $key=>$value)
	   {
		   if(!array_key_exists($key,$matrix[$person]))
		   {
			   if(!array_key_exists($key,$total))
			   {
				   $total[$key]=0;
				
			   }
			   
			   $total[$key]+=$matrix[$otherPerson][$key]*$sim;
			   
			   if(!array_key_exists($key,$simsums))
			   {
				   $simsums[$key]=0;
				   
			   }
			   $simsums[$key]+=$sim;
		   }
	   }
   }
 }
 
 foreach($total as $key=>$value)
 {
	 $ranks[$key]=$value/$simsums[$key];

 }
 
 	 
	 array_multisort($ranks,SORT_DESC);
	 return $ranks;

}
?>
<?php
 session_start();
 /*$a = 5;

 for($i = 1;$i <= $a;$i++)
 {
 	echo $i."<br>";
 }
  

  $b = 1;
  
  for ($i=1;$i<=10;$i++) 
  {  	
  	$c = $b+1;
  	echo $b.$c."<br>";
  	$b++;
  }

 @$number = $_POST['number'];

 if($number < 4)
 	{echo "Below then 4"."<br>";}

 if($number >= 4 && $number <= 7 )
 	{echo "between"."<br>";}

 if($number > 7 )
 	{echo "greater"."<br>";}

 $current_date = date('d/m/Y');

 echo $current_date."<br>";

 $valid_date = '01/12/2018';

 $tempArr = explode('/',$valid_date);

 $date2 = date("d/m/Y",mktime(0,0,0,$tempArr[1],$tempArr[0],$tempArr[2]));

 if($current_date == $valid_date)
 	echo "yes";
 else
 	echo "No";

 if($current_date < $date2)
 	echo "greater";

 $date1=date_create("2013-03-15");
$date2=date_create("2013-12-12");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");


 $current_date = date('d/m/Y');
$valid_date = '21/11/2018';
$start_date = '21/11/2017';

// Now we do our timestamping magic!
$start_date = implode('',array_reverse(explode('/',$start_date)));
$current_date = implode('', array_reverse(explode('/', $current_date)));
$valid_date = implode('', array_reverse(explode('/', $valid_date)));

if($current_date > $valid_date)
{
	echo "Expired";
}

if($current_date >= $start_date && $current_date <= $valid_date)
{
	echo "heufgjd";
}

if($current_date < $start_date)
{
	echo "Available";
}

 $number = array(1,2,3,4);

 for ($i=0; $i <=3; $i++) 
 { 
   echo $number[$i]."<br>";
 }*/


/* $counter = 0;

 while($counter<=5)
 {
    echo ++$counter;
 }

 $collection = array();
for($i = 1; $i < 10; $i++){
  $ukey = strtoupper(substr(sha1(microtime() . $i), rand(0, 5), 25));
  if(!in_array($ukey, $collection)){ // you can check this in database as well.
    $collection[] = implode("-", str_split($ukey, 5));
  }
}
echo "<pre>";
print_r($collection);



$uni_id = rand(10,99);

$first = $uni_id;
$chars_to_do = 5 - strlen($uni_id);
for ($i = 1; $i <= $chars_to_do; $i++)
 { $first .= chr(rand(48,57)); }

echo $first;

$chars_to_do = 5 - strlen($uni_id);
for ($i = 1; $i <= $chars_to_do; $i++) 
{
  if ($i == "2") { $second[] = $uni_id; }
  $second[] = chr(rand(48,57));
}

echo "-" . implode("", $second);

$chars_to_do = 5 - strlen($uni_id);
for ($i = 1; $i <= $chars_to_do; $i++) 
{
  if ($i == "3") { $third[] = $uni_id; }
  $third[] = chr(rand(48,57));
}

echo "-" . implode("", $third);*/

/*$num = 1;
echo sprintf("%'.05d\n", $num);

for ($num = 1; $num <= 50; $num++)
    echo sprintf("%'.05d\n", $num);*/

//$number = 3; //this can be static or dynamic 

//$newnumber = $number + 1; 

//echo $newnumber;

//$x = date("md");

 $x="THLC";   

function add_nol($number,$add_nol) 
{
   while (strlen($number)<$add_nol) {
       $number = "0".$number;
   }
   return $number;
}

//usage..
/*for($y=10;$y<=20;$y++)
{
  echo $x."".add_nol($y,3)."<br />";
}*/

 /*function fun() {
    static $counter = 0;
    $counter++;

    echo "$counter";
}

fun();*/

/*$type=1;
function makeyogurt($a = 1) {
   echo "Quantity $a.\n";
   ++$a;
   return $a;
   }    

$type=makeyogurt($type); //makes it 2*/

function repeat() 
{
      $number = $_SESSION['number'];
      $number++;
      echo "<form method ='post' action='Creatures.php'>
     <input type='submit' name='answer' value='Yes' />
     <input type='submit' name='answer' value='No' />
     </form>";
     $_SESSION['number'] = $number;
 }

   if($_POST['answer']=='Yes') {
      switch($_SESSION['number']) {
            case 1:
            break;
            case 2:
            break;
      }
   } else {
      switch($_SESSION['number']) {
            case 1:
            break;
            case 2:
            break;
      }
   }



?>
<!--<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="">	
<input type="text" name="number">
<input type="submit">
</form>
</body>
</html>-->
<?php
extract($_POST);
class calfare{
	public $price=0;
	function cedmicro($distt)
	{
		if( $distt>0 && $distt<=10)
		{
			$this->price=$distt*13.5;
		}
		elseif ($distt>10 && $distt<=60)
		{
			$distt_new= $distt-10;
			$this->price=$distt_new*12+135;
		}
		elseif ($distt>60 && $distt<=160)
		{
			$disttnew=$distt-60;
			$this->price=($disttnew*10.20)+735;
		}
		elseif($distt>160)
		{
			$new_distt=$distt-160;
			$this->price=1755+$new_distt*8.5;
		}
		$this->price+=50;
		echo "Total fare: $this->price Rs/-";
	}
	function cedmini($distt, $weigh){
		if( $distt>0 && $distt<=10)
		{
			$this->price=$distt*14.5;
		}
		elseif ($distt>10 && $distt<=60)
		{
			$distt_new= $distt-10;
			$this->price=$distt_new*13+145;
		}
		elseif ($distt>60 && $distt<=160)
		{
			$disttnew=$distt-60;
			$this->price=($disttnew*11.20)+795;
		}
		elseif($distt>160)
		{
			$new_distt=$distt-160;
			$this->price=1915+$new_distt*9.5;
		}	
		if ($weigh>0 && $weigh<=10){
			$this->price+=50;
		}
		elseif($weigh>10 && $weigh<=20){
			$this->price+=100;
		}
		elseif ($weigh>20) {
			$this->price+=200; 
		}
		else{}
			$this->price+=150;
		echo "Total fare: $this->price Rs/-";
	}
	function cedroyal($distt, $weigh){
		if( $distt>0 && $distt<=10)
		{
			$this->price=$distt*15.5;
		}
		elseif ($distt>10 && $distt<=60)
		{
			$distt_new= $distt-10;
			$this->price=$distt_new*14+155;
		}
		elseif ($distt>60 && $distt<=160)
		{
			$disttnew=$distt-60;
			$this->price=($disttnew*12.20)+855;
		}
		elseif($distt>160)
		{
			$new_distt=$distt-160;
			$this->price=2075+$new_distt*10.5;
		}	
		if ($weigh>0 && $weigh<=10){
			$this->price+=50;
		}
		elseif($weigh>10 && $weigh<=20){
			$this->price+=100;
		}
		elseif ($weigh>20) {
			$this->price+=200; 
		}
		else{}
			$this->price+=200;
		echo "Total fare: $this->price Rs/-";
	}
	function cedsuv($distt, $weigh){
		if( $distt>0 && $distt<=10)
		{
			$this->price=$distt*16.5;
		}
		elseif ($distt>10 && $distt<=60)
		{
			$distt_new= $distt-10;
			$this->price=$distt_new*14+165;
		}
		elseif ($distt>60 && $distt<=160)
		{
			$disttnew=$distt-60;
			$this->price=($disttnew*13.20)+915;
		}
		elseif($distt>160)
		{
			$new_distt=$distt-160;
			$this->price=2235+$new_distt*11.5;
		}	
		if ($weigh>0 && $weigh<=10){
			$this->price+=100;}
			elseif($weigh>10 && $weigh<=20){
				$this->price+=200;}
				elseif ($weigh>20) {
					$this->price+=400;}
					$this->price+=250;
					echo "Total fare: $this->price Rs/-";
				}
			}
			/****************************************************/
			/*********Associative array and instaces of class*****/
			$addres = array("Charbagh"=> 0, "IndiraNagar" => 10, "BBD"=> 30, "Barabanki"=> 60, "Faizabad" => 100, "Basti"=> 150, "Gorakhpur"=>210);
			$distt= abs($addres[$pickup] - $addres[$drop]);
			$farecal= new calfare();
			if($cabtype == "CedMicro")
			{
				$farecal->cedmicro($distt);
			}
			elseif ($cabtype == "CedMini") {
				$farecal->cedmini($distt, $weight);
			}
			elseif ($cabtype == "CedRoyal") {
				$farecal->cedroyal($distt, $weight);
			}
			elseif ($cabtype == "CedSUV") {
				$farecal->cedsuv($distt, $weight);
			}
			?>
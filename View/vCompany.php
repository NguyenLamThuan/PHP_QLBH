<?php
	include_once("Controller/cCompany.php");
	$p= new controllerCompany();
	$tblCompany = $p->getCompany();
	if($tblCompany){ 
		if(mysqli_num_rows($tblCompany)>0){
			while($row = mysqli_fetch_assoc($tblCompany)){
                echo "<a href='index.php?Comp=".$row["id_congty"]."'>".$row["tencongty"]."</a>"."<br />";
			}
		}else{
            echo "0 result";
		}
    }else{
        echo "Error";
	}

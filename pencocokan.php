<?php
	//DB 1
	$db1 = new mysqli("localhost", "root", "", "csvimport");
	$jumlah = [];

	$result = $db1->query("SELECT * FROM matchings");

	if ($result->num_rows > 0) {
	    //echo "<table><tr><th>ID</th><th>Tanggal</th><th>Keterangan</th><th>Cabang</th><th>Jumlah</th><th>Saldo</th></tr>";
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $id[] = $row["id"];
	        $tgl[] = $row["tgl"];
	        $keterangan[] = $row["keterangan"];
	        $jumlah[] = (string)$row["jumlah"];

	        // echo "<tr> 
	        // 		<td>".$row["id"]."</td>
	        // 		<td>".$row["tgl"]."</td> 
	        // 		<td>".$row["keterangan"]." </td>
	        // 		<td>".$row["cabang"]." </td>
	        // 		<td>".$row["jumlah"]." </td>
	        // 		<td>".$row["saldo"]." </td>
	        // 	 </tr>";
    }
    	//echo "</table>";
	} else {
	    echo "Tidak Ada Data Pada Database CSVImport";
	}

	
	// DB 2
	$db2 = new mysqli("localhost", "root", "", "wordpress");
	echo "<br><br>";
	$arrJ = count($jumlah);

	$i = $arrJ;

	//table wp_postmeta
	for($i = 0; $i<$arrJ; $i++){
		$result = $db2->query("SELECT meta_id, post_id, meta_key , meta_value	
								FROM wp_g4i_postmeta
								WHERE meta_key = '_order_total' 
								AND meta_value = '". $jumlah[$i] ."'");
		
		if ($result->num_rows > 0) {
		    echo "Transaksi yang sama dari BCA <br>";
		    echo "ID = ";
		    echo $id[$i]; echo "<br>";
		    echo "Tanggal = ";
		    echo $tgl[$i]; echo "<br>";
		    echo "Keterangan = ";
		    echo $keterangan[$i]; echo "<br>";
		    echo "Jumlah = ";
		    echo $jumlah[$i]; echo "<br>";
		    
		    echo "<table><tr><th>meta_id</th><th>post_id</th><th>meta_key</th><th>meta_value</th></tr>";
		    
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<br>RESULT dari Tabel wp_postmeta
		        	<tr> 
		        		<td>".$row["meta_id"]."</td>
		        		<td>".$row["post_id"]."</td> 
		        		<td>".$row["meta_key"]." </td>
		        		<td>".$row["meta_value"]." </td>
		        	</tr>";
	    	}
	    	echo "</table>";
		}	
	}	

	echo "<br><br>";
	
	$db1->close();
	
	$db2->close();

	
?>

<!-- SELECT meta_id, post_id, meta_key , meta_value	
								FROM wp_postmeta as p
								WHERE meta_key = '_order_total', '_customer_user', 
								'_billing_first_name', '_billing_last_name', '_billing_email' 
								AND meta_value = '". $jumlah[$i] ."'
 -->
<!-- SELECT meta_id, post_id, meta_key, meta_value 
			FROM wp_postmeta 
								WHERE meta_key = '_order_total' 
								AND meta_value = '". $jumlah[$i] ."'"

		SELECT p.post_id, p._customer_user, p.meta_key , p.meta_value,			
		FROM wp_postmeta as p
		WHERE meta_key = '_order_total', '_billing_first_name', '_billing_last_name', '_billing_email'




	CONCAT(p._billing_first_name, ' ' , p._billing_last_name) as Nama User,
				p._billing_email, p. -->
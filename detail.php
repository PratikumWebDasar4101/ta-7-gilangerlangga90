<?php
require_once("db.php");
?>


<a href="lihatdata.php" style="text-decoration: none;"> Kembali </a>

<br> <br>

<table border="1">
	<thead>
		<th> Nama </th>
		<th> NIM </th>
		<th> Jenis Kelamin </th>
		<th> Program Studi </th>
		<th> Fakultas </th>
		<th> Asal </th>
		<th> Motto Hidup </th>
		<th> Aksi </th>
	</thead>

	<body>
		<?php
		$sql = "SELECT * FROM mahasiswa";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				?>
				 <tr>
				 	<td><?php echo $row["nama"] ?></td>
				 	<td><?php echo $row["nim"] ?></td>
				 	<td><?php echo $row["jenis_kelamin"] ?></td>
				 	<td><?php echo $row["prodi"] ?></td>
				 	<td><?php echo $row["fakultas"] ?></td>
				 	<td><?php echo $row["asal"] ?></td>
				 	<td><?php echo $row["motto"] ?></td>
				 	<td> <a href='edit.php?id=<?php echo $row['id']?>' style="text-decoration: none;"> Edit </a>
				</tr>
				<?php
			}
		}else{
			echo "Data tidak tersedia";
		}

		mysqli_close($conn);
		?>
	</body>
</table>
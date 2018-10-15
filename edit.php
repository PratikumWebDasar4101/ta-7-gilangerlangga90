<?php
require_once('db.php');

$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = '$id'");
$row = mysqli_fetch_assoc($sql);

if(isset($_POST['proses'])){
 $nim				= $_POST["nim"];
 $nama 				= $_POST["nama"];
 $jenis_kelamin		= $_POST["jenis_kelamin"];
 $prodi				= $_POST["prodi"];
 $fakultas			= $_POST["fakultas"];
 $asal 				= $_POST["asal"];
 $motto				= $_POST["motto"];

 $sql = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', jenis_kelamin = '$jenis_kelamin', prodi = '$prodi', fakultas = '$fakultas', asal = '$asal', motto = '$motto' WHERE id='$id'";

 if (mysqli_query($conn, $sql)) {
 header('Location: lihatdata.php');
 }else {
 echo "Data gagal diupload! " . $sql . "<br?" . mysqli_error($conn);
}

mysqli_close($conn);
}

?>
<h2 align="center"> <b> HALAMAN EDIT </b></h2>
<table>
<form method="POST">
<tr>
				<td> Nama </td>
				<td> : </td>
				<td> <input type="text" name="nama" maxlength="35" value="<?php echo $row["nama"];?>" required> <br> </td>
			</tr>

			<tr>
				<td> NIM </td>
				<td> : </td>
				<td> <input type="text" name="nim" maxlength="10" minlength="10" value="<?php echo $row["nim"];?>" required> </td>
			</tr>

			<tr>
				<td> Jenis Kelamin </td>
				<td> : </td>
				<td> 
					<input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki <br>
					<input type="radio" name="jk" value="Perempuan"> Perempuan
				</td>
			</tr>
			
			<tr>
				<td> Program Studi </td>
				<td> : </td>
				<td>
					<select name="prodi" required>
						<option value="Manajemen Informatika"> Manajemen Informatika </option>
						<option value="Akuntansi"> Akuntansi </option>
						<option value="Desain Interior"> Desain Interior </option>
					</select>
				</td>
			</tr>

			<tr>
				<td> Fakultas </td>
				<td> : </td>
				<td>
					<select name="fakultas" required>
						<option value="Fakultas Ilmu Terapan"> Fakultas Ilmu Terapan </option>
						<option value="Fakultas Ekonomi Bisnis"> Fakultas Ekonomi Bisnis </option>
						<option value="Fakultas Industri Kreatif"> Fakultas Industri Kreatif </option>
					</select>
				</td>
			</tr>

			<tr>
				<td> Asal </td>
				<td> : </td>
				<td> <input type="text" name="asal" value="<?php echo $row["asal"];?>"> </td>
			</tr>

			<tr>
				<td> Motto Hidup </td>
				<td> : </td>
				<td> <textarea name="motto" rows="5" cols="40" value="<?php echo $row["motto"];?>"> </textarea></td>
			</tr>

			<tr>
				<td> </td>
				<td> </td>
				<td> <input type="submit" name="proses" value="Proses"></td>
			</tr>
		</form>
	</table>
<html>
<head><title>Modifica profilo</title></head>
<b><div style="text-align: center">Modifica profilo di registrazione a <i>Gallery Processing</i></div></b>
<form name="frmModifica" action="modifica_profilo_utente.php" method="GET">
<table>
	<tr>
	<td>Username:</td>
	<td><select name="username" >
	<?php
	$xml = simplexml_load_file("dati_utenti.xml");
	foreach($xml->user as $user){
		   $usern = $user->username;
			echo "<option value=\"$usern\">$usern</option>";
	}
	?>
	</select>
	</td>
	</tr>
	<tr>
		<td>Nome:</td>
		<td><input type="text" name="name" ></td>
	</tr>
	<tr>
		<td>Cognome:</td>
		<td><input type="text" name="surname" ></td>
	</tr>
	<tr>
		<td>Definizione:</td>
		<td><select name="definition" >
			<option value="artista">Artista</option>
			<option value="studente">Studente</option>
			<option value="docente">Docente</option>
			<option value="idraulico">Idraulico</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" ></td>
	</tr>
	<tr>
		<td>Studi:</td>
		<td><input type="text" name="studies" ></td>
	</tr>
	<tr>
		<td>Sesso:</td>
		<td><input type="radio" name="sex" value="M" checked>Maschio</td> 
		<td><input type="radio" name="sex" value="F">Femmina</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="Modify" ></td>
	</tr>
</table>

</form>

</html>

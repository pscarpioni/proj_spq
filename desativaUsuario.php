<?php
//muda status
include "conect.php";

$nome = $_POST["nome"];
$login = $_POST["login"];
$login = $_POST["valor"];

if (empty($valor)) {
    $query = ("select * from usuario ORDER BY usuario.nome ASC");
    $res = mysql_query($query);
    while ($consulta = mysql_fetch_array($res)) {
        echo"<tr> <td></>" . $consulta['codigo'] . "</a>
	     <td>" . $consulta['nome'] . "</td>
	     <td>" . $consulta['data'] . "</td>
	      </tr>";
    }
    echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
    return 0;
}

if ($login != NULL) {
    $sql = "SELECT * FROM usuario WHERE login = '$login' ORDER BY usuario.nome ASC";
    $result = mysql_query($sql, $conexao) or die(mysql_error());
} else if ($nome != NULL) {
    $sql = "SELECT * FROM usuario WHERE nome = '$nome' ORDER BY usuario.nome ASC";
    $result = mysql_query($sql, $conexao) or die(mysql_error());
}
$conta = mysql_num_rows($result);
if ($conta != 0) {
    while ($consulta = mysql_fetch_array($result)) {
        echo" <tr> <td><input type='radio' name='codigo_item' value='" . $consulta['codigo'] . "' />" . $consulta['codigo'] . "</a>
	      <td>" . $consulta['nome'] . "</td>
	      <td>" . $consulta['data'] . "</td>
	     </tr>";
    }
    echo "</table>";
    echo "<input type= \"submit\" name=\"enviar\" value=\"enviar\">
    </form>";
} else {
    echo "As informacoes fornecidas nao estao presentes no nosso banco de dados. Por favor, reveja os campos preenchidos.";
    echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
}
?>

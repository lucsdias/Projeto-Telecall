<?php	

include_once 'bd/conexao.php';
	ob_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<table id="listar-usuario" border="1" width="100" class="table table-striped table-hover display" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Metodo</th>
                    <th>Hora</th>
                    <th>Status</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'bd/conexao.php';
                
                
                $sql = "SELECT * FROM logacesso inner join usuario where logacesso.id_usuario = usuario.id_usuario";
                
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    session_start();
                    while ($dados = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td align="center"><?php echo $dados['id_usuario']; ?></td>
                            <td align="center"><?php echo $dados['nome']; ?></td>
                            <td align="center"><?php echo $dados['email']; ?></td>
                            <td align="center"><?php echo $dados['metodo']; ?></td>
                            <td align="center"><?php echo $dados['hora']; ?></td>
                            <td align="center"><?php echo $dados['status_log']; ?></td>
                            <td align="center"><?php echo $_SESSION['ip']; ?></td>
                            
                        </tr>
                <?php
                    }
                }
              

                mysqli_close($con);
                ?>
            </tbody>
        </table>
 

</body>
</html>

	<?php
    $html = ob_get_clean();
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html($html);

	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4', 'landscape');


	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_teste", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>


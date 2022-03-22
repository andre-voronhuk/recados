<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviando Recado!</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            margin: 0px;
            padding: 0px;
            background-color: rgb(20, 20, 25);
            color: #44b2ff;
            font-family: 'Poppins', sans-serif;
        }

        .centro {
            text-align: center;
            margin: 15%;
        }

        h2 {
            font-style: italic;
            margin: 0;
            color: #7ee27e;
            text-align: center;
        }

        a {
            color: #44b2ff;
            text-decoration: none;
        }
    </style>
</head>


<body>



    <?php

    DEFINE("HOST", "sql103.epizy.com");
    DEFINE("USR", "epiz_28604334");
    DEFINE("PWD", "Kk1yBsUnu7vDWCi");
    DEFINE("BD", "epiz_28604334_banco");
    $conexao = mysqli_connect(HOST, USR, PWD, BD);



    $nome = $_POST['nome'];
    $texto = $_POST['texto'];
    $sql = "INSERT INTO recados (nome, texto) VALUES ('$nome', '$texto')";
    if ($nome != "" and $texto != "") {
        if (mysqli_query($conexao, $sql)) {
    ?>echo "mensagem enviada com sucesso";
    <script>
        window.location.href = "http://voronhuk.epizy.com/index.php";
    </script><?php
            } else {
                echo "ERROR: Não foi possivel executar:  $sql. " . mysqli_error($conexao);
            }
        } else { ?>
<div class="centro">
    <h2> Voce precisa preencher o formulario </h2>
    <a href="/..">Voltar </a>
</div>

<?php
        }
?>
</body>
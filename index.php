<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recado dos casas.</title>
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

        h2 {
            font-style: italic;
            margin: 0;
            color: #7ee27e;
            text-align: center;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        hr {
            border: 1px solid #333;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgb(53, 53, 53);
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .items {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .container {
            border-radius: 9px;
            background-color: #121212;
            height: fit-content;
            width: 200px;
            margin: 1rem;
            padding: 1rem;
            word-wrap: normal;
            box-shadow: 0 0 4px 2px rgb(10, 10, 10);
        }

        .date {
            font-size: x-small;
            text-align: right;
        }

        .msg {
            font-size: medium;
        }

        .creator-container {
            border-radius: 9px;
            margin: 1rem;
            padding: 1rem;
            display: flex;
            flex-direction: row-reverse;
        }

        .creator {
            box-shadow: 0 0 4px 2px rgb(10, 10, 10);
            border-radius: 9px;
            background-color: #121212;
            height: 400px;
            width: 300px;
            margin: 1rem;
            padding: 1rem;
        }

        button {
            background-color: #7ee27e;
            font-family: unset;
            font-weight: 900;
            font-size: large;
            color: #111;
            margin-top: 1rem;
            width: 300px;
            height: 40px;
            border-radius: 8px;
            outline: none;
            border: none;
        }

        button:hover {
            background-color: #5cc05c;
            box-shadow: 0 0 7px 2px rgb(10 10 10);
        }

        textarea {
            background-color: #333;
            border: none;
            resize: none;
            color: white;
            height: 150px;
            width: 300px;
            font-size: 14px;
        }

        input {
            width: 300px;
            height: 25px;
            background-color: #333;
            border: none;
            resize: none;
            color: white;
            border-radius: 2px;
            font-size: 14px;
            padding: 2px;
        }

        textarea:focus-visible {
            outline: none;
            box-shadow: 0 0 7px 3px rgb(10 10 10);
        }

        textarea:hover {
            cursor: inherit;
        }

        textarea::-webkit-scrollbar {
            width: 8px;
        }

        textarea::-webkit-scrollbar-track {
            background: rgb(53, 53, 53);
        }

        textarea::-webkit-scrollbar-track:hover {
            cursor: pointer;
        }

        textarea::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 8px;
        }

        textarea::-webkit-scrollbar-thumb:hover {
            background: #555;
            cursor: pointer;
        }

        input:focus-visible {
            outline: none;
            box-shadow: 0 0 7px 3px rgb(10 10 10);
        }
    </style>
    <script>
        window.onload = function() {
            document.getElementById("enviar").addEventListener("click", function(event) {
                // event.preventDefault()
            });
        };
    </script>
</head>

<body>
    <div class="items">
        <?php

        DEFINE("HOST", "sql103.epizy.com");
        DEFINE("USR", "epiz_28604334");
        DEFINE("PWD", "Kk1yBsUnu7vDWCi");
        DEFINE("BD", "epiz_28604334_banco");

        $conexao = mysqli_connect(HOST, USR, PWD, BD);

        if (mysqli_connect_errno()) {
            //Encerra a conexao e mostra a mensagem com o erro    
            die("Erro: " . mysqli_connect_error());
        }

        $sql = mysqli_query($conexao, "SELECT * FROM recados");
        if (!$sql) {
            die("Erro: zzz");
        }

        while ($resultado = mysqli_fetch_assoc($sql)) {

        ?>
            <!-- HTML AQUI! -->



            <div class="container">
                <ul>
                    <h2><b>
                            <?php echo $resultado["nome"]; ?> </b></h2>
                    <hr>
                    <li class="msg">
                        <?php echo $resultado["texto"]; ?> </li>
                    <li class="date">
                        <?php echo $resultado["data"]; ?> </li>
                </ul>
            </div>
            <!-- FIM DO HTML! -->
        <?php
        }

        mysqli_free_result($sql);



        ?>
    </div>
    <div class="creator-container">
        <form class="creator" action="form.php" method="post">
            <h2>Deixe seu recado!</h2>
            <hr>
            <div>

                <p>Nome:</p> <input name="nome" id="nome" type="text">

            </div>
            <div>

                <p>Mensagem:</p> <textarea name="texto" id="texto" type="text"></textarea>
                <button id="enviar" type="submit">Enviar</button>
        </form>

    </div>
    </div>
</body>

</html>

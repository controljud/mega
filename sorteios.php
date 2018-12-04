<?php
    $url = file_get_contents('https://asloterias.com.br/lista-de-resultados-da-mega-sena');

    $regexp = "/A lista abaixo mostra, o concurso, a data do sorteio e os números sorteados!(.+)Se você quiser fazer o download todos resultados para seu computador, clique no link abaixo/";

    preg_match_all($regexp, $url, $conteudo);
    $result = $conteudo[0][0];
    $res = substr($result, 77, strlen($result)-(95+77));

    $sorteios = explode('<div class="limpar_flutuacao"></div>', $res);
    $sorteados = [];
    $dtUltimo = '';
    $ultimoSorteio = '';

    foreach($sorteios as $sorteio){
        $sort = str_replace('<div class="espacamento_altura"></div>', '', $sorteio);
        $sort = str_replace('<strong>', '', $sort);
        $sort = str_replace('</strong>', '', $sort);

        $s1 = explode(' - ', $sort);
        $s2 = explode(' ', trim($s1[2]));
        $dtUltimo = $dtUltimo == '' ? trim($s1[1]) : $dtUltimo;
        $ultimoSorteio = $ultimoSorteio == '' ? trim($s1[2]) : $ultimoSorteio;

        foreach($s2 as $s){
            if($s != '') {
                if (isset($sorteados[$s])) {
                    $sorteados[$s] = $sorteados[$s] + 1;
                } else {
                    $sorteados[$s] = 1;
                }
            }
        }
    }

    ksort($sorteados);
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </head>
    <body>
        <div class="row">
            <dv class="col-md-3"></dv>
            <dv class="col-md-6">
                <h3>Dezenas mais sorteadas da Mega Sena (Mapa de calor)</h3>
                <table class="table table-bordered tbl-principal">
                    <?php
                    $x = 0;
                    foreach($sorteados as $key => $sorteado){
                        if($x == 0){
                            echo "<tr>";
                        }else if($x == 10){
                            $x = 0;
                            echo "</tr>";
                        }

                        echo "<td class='center td-numero td-".$sorteado."' id='".$sorteado."'><span class='sp-numero'>".$key."</span><br/>".$sorteado."</td>";

                        $x++;
                    }
                    ?>
                </table>
            </dv>
            <dv class="col-md-3"></dv>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <p><b>Último sorteio: </b><?php echo $dtUltimo.' - '.$ultimoSorteio; ?></p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </body>
</html>

<?php
    $sorteados = [
        206,
        213,
        195,
        230,
        238,
        217,
        198,
        207,
        187,
        238,
        202,
        207,
        215,
        196,
        190,
        213,
        220,
        211,
        195,
        200,
        180,
        187,
        233,
        224,
        194,
        171,
        215,
        219,
        213,
        218,
        198,
        218,
        229,
        216,
        211,
        215,
        219,
        208,
        197,
        202,
        213,
        223,
        217,
        211,
        205,
        199,
        204,
        193,
        203,
        213,
        223,
        220,
        238,
        228,
        181,
        216,
        191,
        204,
        206,
        195
    ];
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
        <dv class="row">
            <dv class="col-md-3"></dv>
            <dv class="col-md-6">
                <table class="table table-bordered tbl-principal">
                    <?php
                        $x = 0; $a = 1;
                        foreach($sorteados as $sorteado){
                            if($x == 0){
                                echo "<tr>";
                            }else if($x == 10){
                                $x = 0;
                                echo "</tr>";
                            }

                            $a0 = $a < 10 ? '0'.$a : $a;
                            echo "<td class='center td-numero td-".$sorteado."' id='".$sorteado."'><span class='sp-numero'>".$a0."</span><br/>".$sorteado."</td>";

                            $x++;
                            $a++;
                        }
                    ?>
                </table>
            </dv>
            <dv class="col-md-3"></dv>
        </dv>
    </body>
</html>
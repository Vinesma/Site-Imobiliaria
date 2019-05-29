<?php
    if (isset($_GET['user_id'])) {
        popGridMeusImoveis();
    }elseif (isset($_GET['type'])) {
        if ($_GET['type'] == "compra") {
            admCompra();
        }else{
            admAluguel();
        }
    }elseif (isset($_GET['typec'])) {
        if ($_GET['typec'] == "compra") {
            cliCompra();
        }else{
            cliAluguel();
        }
    }else{
        popGridSearch();
    }

    function popGridSearch(){
        $conn = ConnectTo();

        $tipo_imovel = $_GET['tipo_imovel'];
        $finalidade = $_GET['finalidade'];
        $cidade = $_GET['cidade'];

        $sql = "SELECT * FROM imovel WHERE cidade = '$cidade' AND finalidade = '$finalidade' AND FK_TI = $tipo_imovel";
        $contador = 1;

        if ($result = $conn->query($sql)) {

            if ($result->num_rows == 0) {
                echo ('<h4>Nada encontrado!</h4>');
            }else{
                while(($row = $result->fetch_assoc()) && ($contador <= 9)) {
                    echo ('
                        <div class="item'.$contador.' bordergrid">
                            <a href="info_imovel.php?id='.$row['ID_IM'].'"><img src='.$row["imglink"].'></a>
                            <div class="description"><p>'.$row["descricao"].'</p></div>
                            <div class="iconbox flex_center nodisplay">
                                <div>
                                    <i class="fas fa-bed"> <p>Quartos:</p></i>
                                    <p>'.$row["quartos"].'</p>
                                </div>
                                <div>
                                    <i class="fas fa-toilet"> <p>Banheiros:</p></i>
                                    <p>'.$row["banheiros"].'</p>
                                </div>
                                <div>
                                    <i class="fas fa-car"> <p>Garagens:</p></i>
                                    <p>'.$row["garagens"].'</p>
                                </div>
                            </div>
                        </div>');
                    $contador++;
                }
            }
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        CloseConnection($conn);
    }

    function popGridMeusImoveis(){
        $conn = ConnectTo();

        $user_id = $_GET['user_id'];

        $sql = "SELECT * FROM imovel WHERE FK_CLPR = $user_id";
        $contador = 1;

        if ($result = $conn->query($sql)) {

            if ($result->num_rows == 0) {
                echo ('<h4>Nada encontrado!</h4>');
            }else{
                while(($row = $result->fetch_assoc())) {
                    echo ('
                        <div class="item'.$contador.' bordergrid">
                            <a href="info_imovel.php?id='.$row['ID_IM'].'"><img src='.$row["imglink"].'></a>
                            <div class="description"><p>'.$row["descricao"].'</p></div>
                            <div class="iconbox flex_center nodisplay">
                                <div>
                                    <i class="fas fa-bed"> <p>Quartos:</p></i>
                                    <p>'.$row["quartos"].'</p>
                                </div>
                                <div>
                                    <i class="fas fa-toilet"> <p>Banheiros:</p></i>
                                    <p>'.$row["banheiros"].'</p>
                                </div>
                                <div>
                                    <i class="fas fa-car"> <p>Garagens:</p></i>
                                    <p>'.$row["garagens"].'</p>
                                </div>
                            </div>
                        </div>');
                    $contador++;
                }
            }
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        CloseConnection($conn);
    }

    function admCompra(){
        $conn = ConnectTo();

        $sql_venda = "SELECT * FROM venda";
        $contador = 1;

        if ($result_main = $conn->query($sql_venda)) {

            if ($result_main->num_rows == 0) {
                echo ('<h4>Nada encontrado!</h4>');
            }else{
                while(($row_venda = $result_main->fetch_assoc())) {

                    $id_im = $row_venda['FK_IM'];
                    $id_pr = $row_venda['FK_CTPR'];
                    $id_cp = $row_venda['FK_CTCP'];

                    $sql_imovel = "SELECT * FROM imovel WHERE ID_IM = $id_im";
                    $sql_proprietario = "SELECT * FROM cliente WHERE ID_CL = $id_pr";
                    $sql_comprador = "SELECT * FROM cliente WHERE ID_CL = $id_cp";

                    $result = $conn->query($sql_imovel);
                    $row_imovel = $result->fetch_assoc();

                    $result = $conn->query($sql_proprietario);
                    $row_proprietario = $result->fetch_assoc();

                    $result = $conn->query($sql_comprador);
                    $row_comprador = $result->fetch_assoc();

                    echo ('
                        <div class="item'.$contador.' bordergrid">
                            <a href="info_imovel.php?id='.$row_imovel['ID_IM'].'"><img src='.$row_imovel["imglink"].'></a>
                            <div class="description"><p>'.$row_imovel["descricao"].'</p></div>
                            <div class="iconbox flex_center nodisplay">
                                <div>
                                    <p>Proprietário:</p>
                                    <p>'.$row_proprietario["login"].'</p>
                                </div>
                                <div>
                                    <p>Comprador:</p>
                                    <p>'.$row_comprador["login"].'</p>
                                </div>');
                                if ($row_venda['aprovado'] == 0) {
                                    echo '<div class="checkbox-dec">
                                    <a href="db_aprova.php?id='.$row_venda['ID_VD'].'&t=c&adm='.$_SESSION['id'].'"><i class="fas fa-check-circle"></i></a>';
                                    echo '<a href="db_deleta.php?id='.$row_venda['ID_VD'].'&t=c&adm='.$_SESSION['id'].'"><i class="fas fa-times-circle"></i></a>
                                    </div>';
                                }else{
                                    echo '<div class="checkbox">
                                    <i class="fas fa-check"></i>
                                    </div>';
                                    echo '<div class="checkbox" style="background-color: brown;">
                                    <a href="db_deleta.php?id='.$row_venda['ID_VD'].'&t=c&adm='.$_SESSION['id'].'"><i class="fas fa-times-circle"></i></a>
                                    </div>';
                                }
                        echo ('</div>
                        </div>');
                    $contador++;
                }
            }
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        CloseConnection($conn);
    }

    function admAluguel(){
        $conn = ConnectTo();

        $sql_aluguel = "SELECT * FROM aluguel";
        $contador = 1;

        if ($result_main = $conn->query($sql_aluguel)) {

            if ($result_main->num_rows == 0) {
                echo ('<h4>Nada encontrado!</h4>');
            }else{
                while(($row_aluguel = $result_main->fetch_assoc())) {

                    $id_im = $row_aluguel['FK_IM'];
                    $id_lo = $row_aluguel['FK_CLLO'];
                    $id_lc = $row_aluguel['FK_CLLC'];

                    $sql_imovel = "SELECT * FROM imovel WHERE ID_IM = $id_im";
                    $sql_proprietario = "SELECT * FROM cliente WHERE ID_CL = $id_lo";
                    $sql_comprador = "SELECT * FROM cliente WHERE ID_CL = $id_lc";

                    $result = $conn->query($sql_imovel);
                    $row_imovel = $result->fetch_assoc();

                    $result = $conn->query($sql_proprietario);
                    $row_proprietario = $result->fetch_assoc();

                    $result = $conn->query($sql_comprador);
                    $row_comprador = $result->fetch_assoc();

                    echo ('
                        <div class="item'.$contador.' bordergrid">
                            <a href="info_imovel.php?id='.$row_imovel['ID_IM'].'"><img src='.$row_imovel["imglink"].'></a>
                            <div class="description"><p>'.$row_imovel["descricao"].'</p></div>
                            <div class="iconbox flex_center nodisplay">
                                <div>
                                    <p>Locador:</p>
                                    <p>'.$row_proprietario["login"].'</p>
                                </div>
                                <div>
                                    <p>Locatário:</p>
                                    <p>'.$row_comprador["login"].'</p>
                                </div>');
                                if ($row_aluguel['aprovado'] == 0) {
                                    echo '<div class="checkbox-dec">
                                    <a href="db_aprova.php?id='.$row_aluguel['ID_CO'].'&t=a&adm='.$_SESSION['id'].'"><i class="fas fa-check-circle"></i></a>';
                                    echo '<a href="db_deleta.php?id='.$row_aluguel['ID_CO'].'&t=a&adm='.$_SESSION['id'].'"><i class="fas fa-times-circle"></i></a>
                                    </div>';
                                }else{
                                    echo '<div class="checkbox">
                                    <i class="fas fa-check"></i>
                                    </div>';
                                    echo '<div class="checkbox" style="background-color: brown;">
                                    <a href="db_deleta.php?id='.$row_aluguel['ID_CO'].'&t=a&adm='.$_SESSION['id'].'"><i class="fas fa-times-circle"></i></a>
                                    </div>';
                                }
                        echo ('</div>
                        </div>');
                    $contador++;
                }
            }
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        CloseConnection($conn);
    }

    function cliCompra(){
        $conn = ConnectTo();

        $cli_id = $_SESSION['id'];
        $sql_venda = "SELECT * FROM venda WHERE FK_CTCP = $cli_id";
        $contador = 1;

        if ($result_main = $conn->query($sql_venda)) {

            if ($result_main->num_rows == 0) {
                echo ('<h4>Nada encontrado!</h4>');
            }else{
                while(($row_venda = $result_main->fetch_assoc())) {

                    $id_im = $row_venda['FK_IM'];
                    $id_pr = $row_venda['FK_CTPR'];
                    $id_cp = $row_venda['FK_CTCP'];

                    $sql_imovel = "SELECT * FROM imovel WHERE ID_IM = $id_im";
                    $sql_proprietario = "SELECT * FROM cliente WHERE ID_CL = $id_pr";
                    $sql_comprador = "SELECT * FROM cliente WHERE ID_CL = $id_cp";

                    $result = $conn->query($sql_imovel);
                    $row_imovel = $result->fetch_assoc();

                    $result = $conn->query($sql_proprietario);
                    $row_proprietario = $result->fetch_assoc();

                    $result = $conn->query($sql_comprador);
                    $row_comprador = $result->fetch_assoc();

                    echo ('
                        <div class="item'.$contador.' bordergrid">
                            <a href="info_imovel.php?id='.$row_imovel['ID_IM'].'"><img src='.$row_imovel["imglink"].'></a>
                            <div class="description"><p>'.$row_imovel["descricao"].'</p></div>
                            <div class="iconbox flex_center nodisplay">
                                <div>
                                    <p>Proprietário:</p>
                                    <p>'.$row_proprietario["login"].'</p>
                                </div>
                                <div>
                                    <p>Comprador:</p>
                                    <p>'.$row_comprador["login"].'</p>
                                </div>
                                <div class="checkbox">');
                                if ($row_venda['aprovado'] == 0) {
                                    echo '<i class="fas fa-times" style="padding: 0 2px;"></i>';
                                }else{
                                    echo '<i class="fas fa-check"></i>';
                                }
                        echo ('</div>
                            </div>
                        </div>');
                    $contador++;
                }
            }
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        CloseConnection($conn);
    }

    function cliAluguel(){
        $conn = ConnectTo();

        $cli_id = $_SESSION['id'];
        $sql_aluguel = "SELECT * FROM aluguel";
        $contador = 1;

        if ($result_main = $conn->query($sql_aluguel)) {

            if ($result_main->num_rows == 0) {
                echo ('<h4>Nada encontrado!</h4>');
            }else{
                while(($row_aluguel = $result_main->fetch_assoc())) {

                    $id_im = $row_aluguel['FK_IM'];
                    $id_lo = $row_aluguel['FK_CLLO'];
                    $id_lc = $row_aluguel['FK_CLLC'];

                    $sql_imovel = "SELECT * FROM imovel WHERE ID_IM = $id_im";
                    $sql_proprietario = "SELECT * FROM cliente WHERE ID_CL = $id_lo";
                    $sql_comprador = "SELECT * FROM cliente WHERE ID_CL = $id_lc";

                    $result = $conn->query($sql_imovel);
                    $row_imovel = $result->fetch_assoc();

                    $result = $conn->query($sql_proprietario);
                    $row_proprietario = $result->fetch_assoc();

                    $result = $conn->query($sql_comprador);
                    $row_comprador = $result->fetch_assoc();

                    echo ('
                        <div class="item'.$contador.' bordergrid">
                            <a href="info_imovel.php?id='.$row_imovel['ID_IM'].'"><img src='.$row_imovel["imglink"].'></a>
                            <div class="description"><p>'.$row_imovel["descricao"].'</p></div>
                            <div class="iconbox flex_center nodisplay">
                                <div>
                                    <p>Locador:</p>
                                    <p>'.$row_proprietario["login"].'</p>
                                </div>
                                <div>
                                    <p>Locatário:</p>
                                    <p>'.$row_comprador["login"].'</p>
                                </div>
                                <div class="checkbox">');
                                if ($row_aluguel['aprovado'] == 0) {
                                    echo '<i class="fas fa-times" style="padding: 0 2px;></i>';
                                }else{
                                    echo '<i class="fas fa-check"></i>';
                                }
                        echo ('</div>
                            </div>
                        </div>');
                    $contador++;
                }
            }
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        CloseConnection($conn);
    }
?>

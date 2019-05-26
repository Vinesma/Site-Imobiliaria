<?php
    if (isset($_GET['user_id'])) {
        popGridMeusImoveis();
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
?>
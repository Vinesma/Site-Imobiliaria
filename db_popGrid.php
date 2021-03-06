<?php
    popGrid();

    function popGrid(){
        $conn = ConnectTo();

        $sql = "SELECT * FROM imovel LEFT JOIN venda ON imovel.ID_IM = venda.FK_IM WHERE venda.aprovado IS NULL ORDER BY RAND() LIMIT 9";
        $contador = 1;

        if ($result = $conn->query($sql)) {
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
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }       
        CloseConnection($conn);    
    }
?>
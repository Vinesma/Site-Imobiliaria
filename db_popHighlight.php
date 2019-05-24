<?php
    popHighlight();

    function popHighlight(){
        $conn = ConnectTo();

        $sql = "SELECT * FROM imovel ORDER BY RAND() LIMIT 1";

        if ($result = $conn->query($sql)) {
            $row = $result->fetch_assoc();
                echo ('
                    <div class="newsleft">
                        <p>'.$row["descricao"].'</p>
                        <div class="iconbox boxborder flex_center">
                            <div class="boxborder_child">
                                <i class="fas fa-bed"> <p>Quartos:</p></i>
                                <p>'.$row["quartos"].'</p>
                            </div>
                            <div class="boxborder_child">
                                <i class="fas fa-toilet"> <p>Banheiros:</p></i>
                                <p>'.$row["banheiros"].'</p>
                            </div>
                            <div class="boxborder_child">
                                <i class="fas fa-car"> <p>Garagens:</p></i>
                                <p>'.$row["garagens"].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="newsright">
                        <a href="info_imovel.php?id='.$row['ID_IM'].'"><img src='.$row["imglink"].'></a>
                    </div>');
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }       
        CloseConnection($conn);    
    }
?>
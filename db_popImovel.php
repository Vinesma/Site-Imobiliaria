<?php
    popImovel();

    function popImovel(){
        $conn = ConnectTo();

        $id = $_GET['id'];

        $sql = "SELECT * FROM imovel WHERE ID_IM = '$id'";

        if ($result = $conn->query($sql)) {
            $row = $result->fetch_assoc();

                $FK_TI = $row['FK_TI'];

                $sql2 = "SELECT * FROM tipo_imovel WHERE ID_TI = '$FK_TI'";
                if ($result2 = $conn->query($sql2)) {
                    $row2 = $result2->fetch_assoc();
                }else{
                    echo "Erro: " . $sql2 . "<br>" . $conn->error;   
                }
                echo ('
                    <div class="form_cad">
                        <div class="grid_info">
                            <div class="info_desc">             
                                <h3>Descrição:</h3>
                                <p>'.$row["descricao"].'</p>
                            </div>
                            <div class="info_stat">
                                <h3>Características:</h3>
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
                                    <div class="boxborder_child">
                                        <i class="fas fa-bed"></i>
                                        <i class="fas fa-toilet"> <p>Suites:</p></i>
                                        <p>'.$row["suites"].'</p>
                                    </div>
                                </div>
                                <div class="info_loc">
                                    <h4>Cidade:</h4><p class="boxborder_child">'.$row["cidade"].'</p>
                                    <h4>Endereço:</h4><p class="boxborder_child">'.$row["endereco"].'</p>
                                </div>
                                <div class="info_outros">
                                    <h4>Tipo:</h4><p class="boxborder_child">'.$row2["nome"].'</p>
                                    <h4>Finalidade:</h4><p class="boxborder_child">'.$row["finalidade"].'</p>
                                    <h4>Área (m²):</h4><p class="boxborder_child">'.$row["area"].'</p>
                                </div>
                            </div>
                        <div class="info_action">
                            <button class="formbtn ndlogin">Alugar</button>
                            <button class="formbtn ndlogin">Comprar</button><br>
                            <h4>R$ '.$row["preco"].'</h4>
                        </div>
                        <div><img class="info_img" src="'.$row["imglink"].'"></div>      
                    </div>      
                </div>');
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }       
        CloseConnection($conn);    
    }
?>
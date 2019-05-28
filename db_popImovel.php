<?php
    popImovel();

    function popImovel(){
        $conn = ConnectTo();

        $id = $_GET['id'];

        $sql = "SELECT * FROM imovel WHERE ID_IM = '$id'";

        if ($result = $conn->query($sql)) {
            if ($result->num_rows == 0) {
                echo (
                    '<div class="form_cad">
                        <h4>Nada encontrado para esse imóvel!</h4>
                    </div>'
                    );
            }else{
                $row = $result->fetch_assoc();

                $FK_TI = $row['FK_TI'];
                $id_pr = $row['FK_CLPR'];

                $sql2 = "SELECT * FROM tipo_imovel WHERE ID_TI = '$FK_TI'";
                if ($result2 = $conn->query($sql2)) {
                    $row2 = $result2->fetch_assoc();
                }else{
                    echo "Erro: " . $sql2 . "<br>" . $conn->error;   
                }
                
                $sql3 = "SELECT * FROM cliente WHERE ID_CL = $id_pr";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch_assoc();


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
                            <div class="info_action">');
                            if ((isset ($_SESSION['tipo_pessoa']) == true)) {
                                if ($_SESSION['tipo_pessoa'] != 'A') {

                                    $user_id = $_SESSION['id'];                                

                                    if ($row["finalidade"] == 'Venda') {
                                            
                                        $sql4 = "SELECT * FROM venda WHERE FK_CTCP = $user_id AND FK_IM = $id AND aprovado = 1";
                                        $result4 = $conn->query($sql4);
                                            
                                        if ($result4->num_rows == 0) {
                                            echo ('<a href="cad_form.php?im_id='.$row["ID_IM"].'"><button class="trbtn">Comprar</button></a><br>');
                                        }                                            
                                    }else{

                                        $sql4 = "SELECT * FROM aluguel WHERE FK_CLLC = $user_id AND FK_IM = $id AND aprovado = 1";
                                        $result4 = $conn->query($sql4);

                                        if ($result4->num_rows == 0) {
                                            echo ('<a href="cad_form.php?im_id='.$row["ID_IM"].'"><button class="trbtn">Alugar</button></a>');   
                                        }
                                            
                                    }                                          
                                }
                            }
                            echo ('
                                <div class="pricedsp"><h4>Preço: </h4><h4>R$ '.$row["preco"].'</h4></div>
                                <div class="info_prop">
                                    <h4>Proprietário:</h4>
                                    <div class="datacliente"><p>'.$row3["login"].'</p><img class="info_img_pr" src="'.$row3["imglink"].'"></div>
                                    <h4>Telefone:</h4>
                                    <div class="datacliente"><p>'.$row3["telefone"].'</p></div>
                                </div>
                            </div>
                            <div>
                                <img class="info_img" src="'.$row["imglink"].'">
                            </div>     
                        </div>      
                    </div>');   
            }      
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }       
        CloseConnection($conn);    
    }
?>
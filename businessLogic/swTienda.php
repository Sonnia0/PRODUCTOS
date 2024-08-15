<?php
include("../dataAccess/dataAccessLogic/Tienda.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                                                              
    $producto = $_POST['producto'];            
    $cantidad = $_POST['cantidad'];       
    $precio = $_POST['precio'];
    $total = $_POST['total'];
     
    $objConexion = new ConexionDB();
    $objTienda = new Tienda($objConexion);


    $objTienda->setProducto($producto); 
    $objTienda->setCantidad($cantidad);
    $objTienda->setPrecio($precio);
    $objTienda->setTotal($total);
     
     
    $objTienda->agregarProducto();
    exit();
     
      
     }
    else if ($_SERVER['REQUEST_METHOD'] == 'GET') {                                                                          
        $objConexion = new ConexionDB();   
        $objTienda = new Tienda($objConexion);
        $array = $objTienda->listarDatos();
        echo json_encode($array);
        exit;
         }
        elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {                                                                        
            $objConexion = new ConexionDB();   
            $objTienda = new Tienda($objConexion);
            
            // Verificar si se proporciona un ID o si se desea eliminar todo
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $objTienda->setId($id);
                $objTienda->eliminarCalculo();
                $response = array('success' => true, 'message' => 'Cálculo eliminado correctamente');
            } elseif (isset($_GET['delete_all']) && $_GET['delete_all'] == 'true') {
                $objTienda->eliminarTodos();
                $response = array('success' => true, 'message' => 'Todos los cálculos eliminados correctamente');
            }
            echo json_encode($response);
            exit();
             }
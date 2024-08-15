<?php
include("../dataAccess/conexion/Conexion.php");
class Tienda{                                                                                                                             
    #atributos de la producto de datos
    private int $id;
    private string $producto;
    private int $cantidad;
    private float $precio;
    private float $total;
    private $connectionDB;

    public function __construct(ConexionDB $connectionDB) {                                                                             
        $this->connectionDB = $connectionDB->connect();
        }
        #metodos get y set
        public function getId(){
             return $this->id; }
        public function setId(int $id): void {                                                                                              
            $this->id = $id;}

        public function getProducto(){
             return $this->producto; }
        public function setProducto(string $producto): void {                                                                                              
            $this->producto = $producto;}

        public function getCantidad(){
             return $this->cantidad; }
        public function setCantidad(int $cantidad): void {
            $this->cantidad = $cantidad;}

        public function getPrecio()
        { return $this->precio; }
        public function setPrecio(float $precio): void {
            $this->precio = $precio;}

        public function getTotal()
        { return $this->total; }
        public function setTotal(float $total): void {
            $this->total = $total;}

            public function agregarProducto(): bool{                                                                                                                                   
                try {
                    $sql = "INSERT INTO producto (producto, cantidad, precio, total) VALUES (?,?,?,?)";
                    $stmt = $this->connectionDB->prepare($sql);
                    $stmt->execute([$this->getProducto(), $this->getCantidad(),$this->getPrecio(),$this->getTotal()]);
                    $count = $stmt->rowCount();
                    return $this->affectedColumns($count);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
                }

                public function listarDatos(){                                                                                                                                   
    try {
        $sql = "SELECT * FROM producto";
        $stmt = $this->connectionDB->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arrayQuery = $stmt->fetchAll();
        return $arrayQuery;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return [];
}

public function eliminarCalculo(): bool{
    try {
                $sql = "DELETE FROM producto WHERE id=?";
                $stmt = $this->connectionDB->prepare($sql);
                $stmt->execute([$this->getId()]);
                $count = $stmt->rowCount();
                return $this->affectedColumns($count);
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function actualizarCalculo(): bool{
            try {
                        $sql = "UPDATE producto SET producto = ?, cantidad = ?, precio = ?, total = ?  WHERE id = ?";
                        $stmt = $this->connectionDB->prepare($sql);
                        $stmt->execute([$this->getProducto(), getCantidad(), $this->getPrecio(), $this->getTotal(), $this->getId()]);
                        $count = $stmt->rowCount();
                        return $this->affectedColumns($count);
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                    }
                }
                private function affectedColumns($numer): bool{                                                                                                                                   
                        return $numer !== null && $numer > 0;
                    }


                    public function eliminarTodos(): bool
{
    try {
        $sql = "DELETE FROM producto";
        $stmt = $this->connectionDB->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $this->affectedColumns($count);
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

}











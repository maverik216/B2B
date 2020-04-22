<?php



class mysql{
    private $_servername = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_dbname = "prueba";
    private $_conn;

    public function __construct()
    {
        // Create connection
        $this->_conn = new mysqli($this->_servername, $this->_username, $this->_password, $this->_dbname);
        // Check connection
        if ($this->_conn->connect_error) {
            die("Connection failed: " . $this->_conn->connect_error);
        }        
    }

    public function query($query){
        $resultado =    $this->_conn->query($query);
        if (!$resultado) {
            echo $query;
            die('Consulta no válida: ' . mysql_error());
        }
        if(is_bool($resultado)){
            return $resultado;
        }
        $data = array();

        while ($row = $resultado->fetch_assoc()) {
            $data[ ] = $row;
        }
        return $data;
    }

    public function __destruct()
    {
        $this->_conn->close();

    }
}

?>
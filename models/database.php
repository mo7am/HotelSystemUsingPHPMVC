<?php


/**
 * Description of database
 *
 * @author HP
 */
class database {
    //put your code here
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "hotel";
    private $connect_host;

    public function __construct() {
        $this->connect_host = $this->connecttohost($this->host, $this->username, $this->password);

        $this->selectdb($this->dbname);
    }

    private function connecttohost($host, $username, $password) {
        $connect = mysqli_connect($host, $username, $password);
        if (!$connect) {
            throw new Exception("Error Not Connect to Server !");
        }
        return $connect;
    }

    private function selectdb($dbname) {
        $connect = mysqli_select_db($this->connect_host, $dbname);
        if (!$connect) {
            throw new Exception("Error no database found");
        }
    }

    public function closedb() {
        $close = mysqli_close($this->connect_host);
        if (!$close) {
            throw new Exception("Error in closing database");
        }
    }

    //make query
    public function query($query) {
        $result_query = mysqli_query($this->connect_host, $query);
        return $result_query;
    }

    //clean data from '/' , ',' , tags :<p>


    public function database_num_rows() {
        $result = mysqli_affected_rows($this->connect_host);
        return $result;
    }

    private function clean($str) {
        $str = trim($str); // remove 
        $str = stripslashes($str); //remove / from data retreived from html or db
        $str = strip_tags($str);

        return $str;
    }

    public function insert($table, $data){
        //$encrepte = new Encretption();
        $q = "INSERT INTO $table ";
        $n = '';
        $v = '';
        foreach ($data as $key => $val) {
            $n.="$key, ";
            $v.= "'" . $this->clean($val) . "', ";
            //$v = convert_uuencode($v);
        }
        
        $q .= "(" . rtrim($n, ', ') . ") VALUES (" . rtrim($v, ', ') . ");";
     //  echo $q . "<br>";
        return $this->query($q);
    }

    /////

    public function INSERT_enc($table, $data){
        $encrepte = new Encretption();
        $new_data = $encrepte->encrypte($data);
        //$new_data1 = mysqli_real_escape_string($new_data);
        $q = "INSERT INTO $table";
        $n = '';
        $v = '';
        foreach ($new_data as $key => $val) {
            $n.="$key, ";
            $v.= "'" . $val . "', ";
        }
        
        $v = convert_uuencode($v);
        
        //$q .=" ($key) . VALUES . (".$key .)";
    
        $q .= "(" . rtrim($n, ', ') . ") VALUES (" . rtrim($v, ', ') . ");";
       echo $q . "<br>";
        return $this->query($q);
    }
    
    
    
    
    
    public function query_associ($query){
        $assoc = mysqli_fetch_assoc($query);
        return $assoc;
    }
    
    public function query_fetcharray($query){
        $array = mysqli_fetch_array(MYSQLI_ASSOC,$query);
        return $array;
    }

    public function update($table, $data, $where) {
        $q = "UPDATE $table SET ";
        foreach ($data as $key => $val) {
            if (strtolower($val) == 'null')
                $q.= "`$key` = NULL, ";
            elseif (strtolower($val) == 'now()')
                $q.= "`$key` = NOW(), ";
            //elseif(preg_match("/^increment\((\-?\d+)\)$/i",$val,$m)) $q.= "`$key` = `$key` + $m[1], "; 
            else
                $q.= "$key='" . $this->clean($val) . "', ";
        }
        $q = rtrim($q, ', ') . ' WHERE ' . $where . ';';
        echo $q;
        return $this->query($q);
    }

#-#update()

    public function delete($table, $where) {
        $q = "DELETE FROM $table WHERE $where ;";
        echo $q;
        return $this->query($q);
    }

}
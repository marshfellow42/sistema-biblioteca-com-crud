<?php

    function insert(string $table, array $data, string $extra = '') :bool {
        
        $fields = implode("`, `", array_keys($data));
        $values = implode("', '", $data);
        
        $query = "INSERT INTO `$table` (`$fields`) VALUES ('".str_replace(["\\'","--"], "", $values)."')";

        if($extra != ""){ 
            $query .= $extra; 
        }
        
        //global $GLOBALS['conn'];

        try{
            $result = mysqli_query($GLOBALS['conn'], $query);
            return $result;
        }catch(Exception $e){
            die("Erro na query: " . mysqli_error($GLOBALS['conn']));
        }

    }

    // SELECT {*|FIELDS} FROM TABLE { WHERE FIELD = VALUE } { LIMIT 100 } 
    function select(string $table, array $fields, array $filters, string $extra) :array {

        # 1º Parte da Query - Inicio    
        $query = "SELECT ";

        # 2º parte da query - tratativa para os campos a pesquisar (ou todos os camopos)
        if(!empty($fields)){
           
            foreach($fields as $f){
                $query .= "$f, ";
            }

            $query = substr($query,0, -2);

        }else{
            $query .= "*";
        }

        # 3º parte da query - nome da tabela
        $query .= " FROM `$table` ";

        # 4º parte da query - tratativa para os filtros a serem buscados
        if(!empty($filters)){

            $query .= " WHERE ";

            foreach($filters as $field=>$value){
                $query .= "`$field` = '$value' AND ";
            }

            $query = substr($query, 0, -4);

        }

        # 5º parte da query - Extra (Limit, order by, group by...)
        if(!empty($extra)){
            $query .= $extra;
        }

        //echo $query;


        //global $GLOBALS['conn'];

        try{
            $result = mysqli_query($GLOBALS['conn'], $query);

            $data = array();

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }

            return $data;

        }catch(Exception $e){
            die("Erro na query: " . mysqli_error($GLOBALS['conn']));
        }        
    }

    // UPDATE TABLE SET FIELD=VALUE{, FIELD=VALUE...} WHERE FIELD=VALUE
    function update(string $table, array $data, array $filters, string $extra): bool{

        $query = "UPDATE `$table` SET ";

        if(!empty($data) and !empty($filters)){
            foreach($data as $field=>$newValue){
                $query .= "`$field`='$newValue', ";
            }

            $query = substr($query, 0, -2);

            $query .= " WHERE ";

            foreach($filters as $field=>$value){
                $query .= "`$field`='$value' AND ";
            }

            $query = substr($query, 0, -4);
        }else{
            $msg = (empty($data)) ? "Ao menos um campo deve ser preenchido": "O filtro nao pode ser vazio";
            die($msg);
        }   
        
        //echo $query;
        
        if($extra != ""){ 
            $query .= $extra; 
        }
        
        //global $GLOBALS['conn'];

        try{
            $result = mysqli_query($GLOBALS['conn'], $query);
            return $result;
        }catch(Exception $e){
            die("Erro na query: " . mysqli_error($GLOBALS['conn']));
        }    
    }

    // DELETE FROM TABLE WHERE FIELD=VALUE {AND FILTERS...}
    function delete(string $table, array $filters, string $extra):bool{

        $query = "DELETE FROM `$table` WHERE ";

        if(!empty($filters)){
            
            foreach($filters as $field=>$value){
                $query .= "`$field`='$value' AND ";
            }
            $query = substr($query, 0, -4);
        }else{
            die("O filtro nao pode ser vazio");
        }   
        
        //echo $query;
        
        if($extra != ""){ 
            $query .= $extra; 
        }
        
        //global $GLOBALS['conn'];

        try{
            $result = mysqli_query($GLOBALS['conn'], $query);
            return $result;
        }catch(Exception $e){
            die("Erro na query: " . mysqli_error($GLOBALS['conn']));
        }

    }


    


    

?>
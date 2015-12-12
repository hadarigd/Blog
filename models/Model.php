
<?php
class Model {
	function makeSql($sql, $return){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=hadarigd", "hadarigd", "dgiradah");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $doSql = $conn ->prepare($sql);
            $doSql->execute();
            
            if($return){
              $result = $doSql->fetchAll(PDO::FETCH_ASSOC);
              $conn = null;
              return $result;//returns the result of the sql even if its empty
            }else{
                $conn = null;
                return $count = $doSql->rowCount();//returns the number of rows affected by the sql
            }
            
        } catch(PDOException $e){
            echo "Conexiune esuata: ". $e->getMessage();
        }
    }
}


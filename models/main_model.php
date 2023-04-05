<?php
class Main_Model 
{
	protected $con;
    private static $instance = [];  

	protected $table;
	protected function __construct(){
		$instanceDB = connectDB::getInstance();
		$this->con = $instanceDB->getConnection();
		if(!$this->table)	$this->setTableName();
	}

   public static function getInstance() {
		$called_class = get_called_class();
		if (!array_key_exists($called_class,self::$instance)) {
			self::$instance[$called_class] = new $called_class();
		}
        return self::$instance[$called_class];
    }

	public function setTableName($table=null){
		if($table) {
			$this->table=$table;
		} else {
			$cln = get_class($this);
			$clnf = str_split($cln, strrpos($cln, '_'))[0];
			$this->table = noun_utils::pluralize($clnf);
		}
	}

	public function getRecord($id=null, $fields='*', $options=null) {
		$conditions = '';
		if(isset($options['conditions'])) {
			$conditions .= ' and '. $options['conditions'];
		}
		$query = "SELECT $fields FROM $this->table where id=$id".$conditions;
		$result = mysqli_query($this->con,$query);
		if($result) {
			$record = mysqli_fetch_assoc($result);
		} else $record=false;
		return $record;
	}

	public function getAllRecords($fields='*', $options=null) {
		$conditions = '';
		if(isset($options['conditions'])) {
			$conditions .= ' where '.$options['conditions'];
		}
		$query = "SELECT ".$fields." FROM ".$this->table.$conditions;
		echo $query;
		$result = mysqli_query($this->con,$query);
		return $result;
	}

	public function addRecord($datas) {
		$fields = $values = '';
		$i = 0;
		foreach($datas as $k => $v) {
			if($i) {
				$fields .=',';
				$values .=',';
			}
			$fields .= $k;
			$values .= "'".$v."'";
			$i++;
		}
		$query = "INSERT INTO $this->table ($fields) VALUES ($values)";
		return mysqli_query($this->con,$query);
	}

	public function editRecord($id,$datas){
		$setDatas = '';
		$i=0;
		foreach($datas as $k=>$v) {
			if($i) {
				$setDatas .=',';
			}
			$setDatas .= $k."='".$v."'";
			$i++;
		}
        $query = "UPDATE $this->table SET $setDatas WHERE id='$id'";
		echo $query;
		return mysqli_query($this->con,$query);
    }

	public function delRecord($id){
        $query = "DELETE FROM $this->table WHERE id='$id'";
		return mysqli_query($this->con,$query);
    }
}
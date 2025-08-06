<?php

$db= new  Database();
$dbaux= new  Database();

class Database
{
  
	var $Host = "localhost";
    var $Database = "psbformularios";
	//var $Database = "c1psb";
    var $User     = "psbformularios";
    var $Password = "psbformularios";
    
    var $R = array();
    var $Row;
    var $Errno    = 0;
    var $Error    = "";
    var $Link_ID  = 0;
    var $Query_ID = 0;
	
	
	function __construct($query = "")
    {
        $this->query($query);
    }

    function connect($Database = "", $Host = "", $User = "", $Password = "")
    {
        if ("" == $Database)
            $Database = $this->Database;
        if ("" == $Host)
            $Host     = $this->Host;
        if ("" == $User)
            $User     = $this->User;
        if ("" == $Password)
            $Password = $this->Password;
		
        if ( 0 == $this->Link_ID )
        {
            $this->Link_ID=mysqli_connect($Host, $User, $Password);
			
			$enlace = mysqli_connect($Host, $User, $Password, $Database);

			if (!$enlace) {
				echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
				echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
            if (!$this->Link_ID)
            {
                $this->halt("Database connect($Host, $User, \$Password) failed.");
                return 0;
            }
            if (!mysqli_select_db($this->Link_ID, $Database))
            {
                //echo "nooo selecciono";
				$this->halt("Cannot use database ".$this->Database);
                return 0;
            }		
        }
	
        return $this->Link_ID;
    }

    function free()
    {
        @mysqli_free_result($this->Query_ID);
        $this->Query_ID = 0;
    }
	
    function html_codigo($String)
    {	
        return ($String);
    }


    function query($Query_String)
    {
	
	
	$Query_String=$this->html_codigo($Query_String);
	
        if ($Query_String == "")
            return 0;
		
		
        if (!$this->connect())
        {
			echo "no conecto";
            return 0;
        }
		$this->Query_ID = $this->Link_ID->thread_id;
		
		//print_r($this->Link_ID);
		/*
        if ($this->Query_ID)
        {
			for($f=0;$f<mysqli_num_fields($this->Link_ID);$f++)
			{
				eval("unset(\$this->".mysqli_fetch_field_direct($this->Query_ID,$f)->name.");");
			}
            $this->free();
        }
		echo $Query_String;*/
        $this->Query_ID = mysqli_query($this->Link_ID, $Query_String);
        $this->Row = 0;
        $this->Errno = mysqli_errno($this->Link_ID);
        $this->Error = mysqli_error($this->Link_ID);
        if (!$this->Query_ID)
        {
            $this->halt("Invalid SQL: ".$Query_String);
        }
        return $this->Query_ID;
    }
	
	
	
    function next_row()
    {
		
		//exit;
        if (!$this->Query_ID)
        {
            $this->halt("next_record called with no query pending.");
            return 0;
        }
		
        $this->R = @mysqli_fetch_array($this->Query_ID);
		if(is_array($this->R))
			for($f=0;$f<mysqli_num_fields($this->Query_ID);$f++)
				eval("\$this->".mysqli_fetch_field_direct($this->Query_ID,$f)->name."=stripslashes(\"".addslashes($this->R[$f])."\");");
		else
			for($f=0;$f<mysqli_num_fields($this->Query_ID);$f++)
				eval("unset(\$this->".mysqli_fetch_field_direct($this->Query_ID,$f)->name.");");
        $this->Row   += 1;
        $this->Errno  = mysqli_errno($this->Link_ID);
        $this->Error  = mysqli_error($this->Link_ID);
        return is_array($this->R);

    }
    
    function import_row($arr)
    {
        if (!$this->Query_ID)
        {
            $this->halt("import_record called with no query pending.");
            return 0;
        }
        $this->R = @mysql_fetch_array($this->Query_ID);
		if(is_array($this->R))
			for($f=0;$f<mysql_num_fields($this->Query_ID);$f++)
                if(isset($arr[mysql_field_name($this->Query_ID,$f)."_img"]))
                {
                    if($arr[mysql_field_name($this->Query_ID,$f)."_del"])
                        eval("\$this->".mysql_field_name($this->Query_ID,$f)."=\"\";");
                    elseif($arr[mysql_field_name($this->Query_ID,$f)]&&$arr[mysql_field_name($this->Query_ID,$f)]!="none")
                    {
                        $tmpname=tempnam("grafika/","tmp");
                        copy($arr[mysql_field_name($this->Query_ID,$f)],$tmpname);
                        eval("\$this->".mysql_field_name($this->Query_ID,$f)."=\$tmpname;");
                    }
                    else
                        eval("\$this->".mysql_field_name($this->Query_ID,$f)."=\$arr[\"".mysql_field_name($this->Query_ID,$f)."_img\"];");
                }
                else
                {
                    eval("\$this->".mysql_field_name($this->Query_ID,$f)."=stripslashes(\$arr[\"".mysql_field_name($this->Query_ID,$f)."\"]);");
                }
            
		else
			for($f=0;$f<mysql_num_fields($this->Query_ID);$f++)
				eval("unset(\$this->".mysql_field_name($this->Query_ID,$f).");");
        $this->Row   += 1;
        $this->Errno  = mysql_errno();
        $this->Error  = mysql_error();
        return is_array($this->R);
    }

    function seek($pos = 0)
    {
        $status = @mysql_data_seek($this->Query_ID, $pos);
        if ($status)
            $this->Row = $pos;
        else
        {
            $this->halt("seek($pos) failed: result has ".$this->num_rows()." rows");
            @mysql_data_seek($this->Query_ID, $this->num_rows());
            $this->Row = $this->num_rows;
            return 0;
        }
        return 1;
    }

    function affected_rows()
    {
        return @mysqli_affected_rows($this->Link_ID);
    }

    function num_rows()
    {
        return @mysqli_num_rows($this->Query_ID);
    }

    function insert_id()
    {
        return @mysqli_insert_id($this->Link_ID);
    }

    function num_fields()
    {
        return @mysqli_num_fields($this->Query_ID);
    }

    function get_field($Name)
    {
        return $this->R[$Name];
    }

    function halt($msg)
    {
        $this->Error = @mysqli_error($this->Link_ID);
        $this->Errno = @mysqli_error($this->Link_ID);
		//printf("<b>Database error:</b> %s<br>\n", $msg);
        //printf("<b>MySQL Error</b>: %s (%s)<br>\n",$this->Errno,$this->Error);
    }
	
	
	
	
	function close()
	{
		$this->free();
		mysqli_close($this->Link_ID);
	}
	
}

?>

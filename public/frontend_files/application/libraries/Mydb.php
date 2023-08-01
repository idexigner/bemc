<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mydb
{
    private $CI, $Data, $mysqli, $result;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->CI = & get_instance();
        $this->Data = array();
        $this->mysqli = $this->CI->db->conn_id;
    }

    public function Query($sql)
    {
        $total_result_set = 0;

        $this->result = @$this->mysqli->query($sql);

        $this->Data[$total_result_set] = array();
        //free each result.
        $res = @$this->mysqli->use_result();
        if ($res instanceof mysqli_result) {
            while ($row = $res->fetch_assoc()) {
                $this->Data[$total_result_set][] = $row;
            }
            $res->free();
        }
        $total_result_set++;

        while ($this->mysqli->next_result())
        {
            $this->Data[$total_result_set] = array();
            //free each result.
            $res = @$this->mysqli->use_result();
            if ($res instanceof mysqli_result) {
                while ($row = $res->fetch_assoc()) {
                    $this->Data[$total_result_set][] = $row;
                }
                $res->free();
            }
            $total_result_set++;
        }

        return $this->Data;
    }
}
/* End of file Mydb.php */

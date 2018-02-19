<?php
// delete文発行クラス
class Db_delete extends CI_Model
{
    // 連続投稿チェック
    public function delete_temp_user($email)
    {
        $this->db->where('emailAddress', $email);
        $result = $this->db->delete('temp_user');
        return $result;
    }
}

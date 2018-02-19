<?php
// update文発行クラス
class Db_update extends CI_Model
{
    //　パスワード更新
    public function udpate_password($user_id, $password){
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $this->db->set('password', $hashed);
        $this->db->where('userID', $user_id);
        $result = $this->db->update('user');
        return $result;
    }

    // 二段階認証キーを登録
    public function update_two_factor_key($key, $id)
    {
        // UPDATE実行
        $this->db->set('twoFactorKey', $key);
        $this->db->where('userID', $id);
        $result = $this->db->update('user');
        return $result;
    }

    // 二段階認証キーを登録
    public function change_two_factor_flag($userId)
    {
        // UPDATE実行
        require 'application/models/query.php';
        $result = $this->db->query($change_two_factor_flag, $userId);
        
        return $result;  // boolean
    }
}

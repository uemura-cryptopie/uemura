<?php
// パスワードと確認パスワードが一致しているか
// 返り値：エラーメッセージ
function is_password_match($pass, $pass_con)
{
   if(trim($pass) !== trim($pass_con))
   {  
       return 'パスワードが一致しません';
   }else{
       return NULL;
   }
}

/* 
複数のパスワードをすべてバリデーションする関数
param:配列or文字列
return:エラーメッセージ
*/

function is_valid_passwords($pass_arr)
{
    foreach($pass_arr as $pass){
        if($pass == NULL OR trim($pass) == '') return 'パスワードを入力してください。';
        if(strlen($pass) > 12 OR strlen($pass) < 8) return 'パスワードは8文字以上12文字以下にしてください。';
    }
    return NULL;
}
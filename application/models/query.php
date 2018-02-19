<?php
// お問い合わせフォーム連続投稿確認
$select_sql = "SELECT count(*) FROM contact WHERE "
    . "userName = :name "
    . "AND userKana = :kana "
    . "AND userEmailAddress = :email "
    . "AND createDateTime > NOW() - INTERVAL 1 HOUR;";

// 登録済みメールアドレス確認
$select_email_sql = "SELECT count(*) FROM user "
    . "WHERE emailAddress = :email;";

// 一時間以内に仮登録されているか
$select_temp_password_sql =
    "SELECT temp_password FROM temp_user "
    . "WHERE emailAddress = ? "
    . "AND createDateTime > NOW() - INTERVAL 1 HOUR "
    . "ORDER BY createDateTime desc LIMIT 1;";
    
// ログイン処理
$login_sql_user =
    "SELECT password FROM user "
    . "WHERE emailAddress = ?;";

// ログイン処理(法人)
$login_sql_hojin =
    "SELECT password FROM hojin "
    . "WHERE emailAddress = ?;";

// パスワード初期化
$reset_password_sql =
    "SELECT userId FROM user "
    . "WHERE emailAddress = ? "
    . "AND birthday = ? "
    . "AND telephone = ?";

// パスワード更新
$update_password_sql =
    "UPDATE user SET password = ? "
    . "WHERE userId = ?;";

// 24時間以内か
$is_whithin_24h_sql =
    "SELECT userId FROM request_time "
    . "WHERE userId = ? "
    . "AND createDateTime > NOW() - INTERVAL 24 HOUR";

// メールアドレスとパスワードからID取得
$get_userid_user = "SELECT userID FROM user "
."where emailAddress = ? AND password = ?;";

// メールアドレスとパスワードからID取得
$get_userid_hojin = "SELECT userID FROM hojin "
."where emailAddress = ? AND password = ?;";

// 二段階認証切り替え
$change_two_factor_flag = "UPDATE user "
."SET "
."twoFactorFlag = (CASE WHEN twoFactorFlag = '0' THEN '1' ELSE '0' END), "
."twoFactorFlag = (CASE WHEN twoFactorFlag = '1' THEN  '1' ELSE '0' END) "
."WHERE userId = ?;";
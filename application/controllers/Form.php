
    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Form extends CI_Controller
    {
        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         *         http://example.com/index.php/welcome
         *    - or -
         *         http://example.com/index.php/welcome/index
         *    - or -
         * Since this controller is set as the default controller in
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/welcome/<method_name>
         * @see https://codeigniter.com/user_guide/general/urls.html
         *//

        // ドメイントップで呼ばれるメソッド
        public function index()
        {
            $this->load->view('header');
            $this->load->view('top');
            $this->load->view('footer');
        }

        // Cryptopieトップページ
        public function top()
        {
            $this->load->view('header');
            $this->load->view('top');
            $this->load->view('footer');
            
        }

        // 新規会員登録　実行
        public function sinki()
        {
            // エラーメッセージ初期化
            $data['error_message'] = NULL;

            // reCAPTCHAチェック      テストのためコメントアウト
            // if(!$this->my_validator->recaptcha($_POST)){
            //     $data['recaptcha_check'] = FALSE;
            //     $this->load->view('header');
            //     $this->load->view('top', $data);
            //     $this->load->view('footer');
            //     return;
            // }

            // メールアドレスのバリデーション
            $mail_result = is_valid_email($_POST, TRUE);
            if ($mail_result == FALSE) {
                $data['error_message'] = validation_errors("<p id='alert'>", "</p>");
                load_view('top', $data);
                return;
            }

            // 仮パスワード生成
            $length = 8;
            $temp_password = substr(str_shuffle('1234567890qwertyuiopasdfghjklzxcvbnm'), 0, $length);

            // メール送信実行
            require 'application/libraries/mail_message.php';
            $data = [
                'from' => from_cryptopie,
                'kind' => 'sinki', 
                'title' => title_sinki,
                'email' => $_POST['email'], 
                'password' => $temp_password
            ];

            $send_result = send_mail($data);
            // メール送信完了画面
            if ($send_result === FALSE) {
                load_view('send_error', $data);
            }

            // 一時テーブルへ登録
            $insert_result = $this->db_insert->regist_temp_password($_POST['email'], $temp_password);
            // INSERT失敗
            if ($insert_result == FALSE) {
                $err = [];
                $err['db_err'] = TRUE;
                load_view('top', $err); // err:pending
                return;
            }

            load_view('sinki_complete', NULL);
        }

        // 初回ログインページ表示
        public function syokai()
        {
            load_view('syokai', NULL);
        }

        // 初回ログイン認証
        public function syokai_check()
        {
            // reCAPTCHAチェック
            //テストのためコメントアウト
            // if(!$this->my_validator->recaptcha($_POST)){   // PENDING
            //     $data['recaptcha_check'] = FALSE;
            //     $this->load->view('header');
            //     $this->load->view('syokai', $data);
            //     $this->load->view('footer');
            //     return;
            // }

            // メールアドレスのバリデーション
            $valid = is_valid_email($_POST, FALSE);
            // if ($validator_result == FALSE) {
            //     $data['error_message'] = validation_errors("<span class='alert syokai_box'>・", "</span>");
            //     load_view('syokai', $data);
            //     return;
            // }

            if ($valid !== TRUE) {
                load_view('syokai', $valid);
                return;
            }

            // 入力されたパスワードと仮パスワードが等しいかチェック
            $password_result = $this->db_select->temp_password_check($_POST['email'], $_POST['password']);
            if ($password_result == FALSE) {
                $data = [];
                $data['password_error'] = FALSE;
                load_view('syokai', $data);
                return;
            }

            // ログイン情報をセッションに保存
            $this->session->set_userdata($_POST, 'post_data');

            // 入力画面に遷移
            if($_POST['hojin_flag']){
               load_view('hojin_input_form', NULL);
             }else{
               load_view('user_input_form', NULL);
             }
        }

        // お客様情報登録画面の入力値のチェック
        public function user_input_form_check($session_data = [], $combo_value = [], $cleaned = [])
        {
            $this->load->helper('validate_user_input_form');

            // 会員情報のバリデーション
            $result = validate_user_input_form($_POST);

            // 入力値エラーあり
            if ($result !== TRUE) {
                // load_view('user_input_form', $result);
                // return;
            }
            
            // セッションからメールアドレスとパスワードを取得
            $session_data['email'] = $this->session->email;
            $session_data['password'] = $this->session->password;

            // セッションの削除
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('password');

            // ログイン情報をセッションに保存
            $this->session->set_userdata($session_data);

            // コンボボックスの値を取得
            $this->load->helper('array');
            // コンボボックス格納用ファイル
            require 'application/views/combobox/combobox_value.php';
            // キーから値を取得
            $combo_value['jitaku'] = element($_POST['jitaku'], $jitaku_option, '');
            $combo_value['kyoju'] = element($_POST['kyoju'], $kyoju_option, '');
            $combo_value['koyo'] = element($_POST['koyo'], $koyo_option, '');
            $combo_value['kinzokunensu'] = element($_POST['kinzokunensu'], $kinzokunensu_option, '');
            $combo_value['earning'] = element($_POST['earning'], $earning_option, '');
            $combo_value['borrowing'] = element($_POST['borrowing'], $borrowing_option, '');
            $combo_value['delay'] = element($_POST['delay'], $delay_option, '');
            $combo_value['kazoku'] = element($_POST['kazoku'], $kazoku_option, '');
            $combo_value['asset'] = element($_POST['asset'], $asset_option, '');
            $combo_value['income'] = element($_POST['income'], $income_option, '');
            $combo_value['keii'] = element($_POST['keii'], $keii_option, '');
            $combo_value['tousi1'] = element($_POST['tousi1'], $tousi_option, '');
            $combo_value['tousi2'] = element($_POST['tousi2'], $tousi_option, '');
            $combo_value['tousi3'] = element($_POST['tousi3'], $tousi_option, '');
            $combo_value['tousi4'] = element($_POST['tousi4'], $tousi_option, '');
            $combo_value['tousi5'] = element($_POST['tousi5'], $tousi_option, '');

            // XSSフィルタ
            $cleaned = $this->security->xss_clean($_POST);
            
            // 戻るボタン押下時に備えて入力データをセッションに格納
            $this->session->set_userdata(array_merge($cleaned ,$combo_value));
            
            // 確認画面へ遷移
            load_view('user_input_form_confirm', array_merge($cleaned ,$combo_value));
        }

        // 初期パスワード変更画面
        public function change_initial_password()
        {
            // 確認画面へ遷移
            load_view('change_initial_password', NULL);
        }

        // お客様情報登録画面
        public function user_input_form_back()
        {
            // セッションから取得
            $data = $this->session->userdata();
            load_view('user_input_form_back', $data);
        }
        
        // 法人情報登録画面の入力値のチェック
        public function hojin_input_form_check($session_data = [], $combo_value = [], $cleaned = [])
        {
            // XSSフィルタ
            $post_data = $this->security->xss_clean($this->input->post());

            $this->load->helper('validate_hojin_input_form');

            // 会員情報のバリデーション
            $result = validate_hojin_input_form($post_data);
            
            // 入力値エラーあり
            if ($result !== TRUE) {
                // load_view('hojin_input_form', $result);
                // return;
            }

            // セッションからメールアドレスとパスワードを取得
            $post_data['email'] = $this->session->email;
            $post_data['password'] = $this->session->password;

            // セッションの削除
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('password');

            // ログイン情報をセッションに保存
            $this->session->set_userdata($post_data);
            $this->session->set_userdata(true, 'hojin_flag');

            // コンボボックス格納用ファイル
            require 'application/views/combobox/combobox_value.php';
            
            $this->load->helper('array');
            // キーから値を取得
            $combo_value['last_earning'] = element($_POST['last_earning'], $earning_option, '');
            $combo_value['profit'] = element($_POST['profit'], $profit_option, '');
            $combo_value['asset'] = element($_POST['asset'], $asset_option, '');            
            $combo_value['keii'] = element($_POST['keii'], $keii_option, '');

            // XSSフィルタ
            $cleaned = $this->security->xss_clean($_POST);

            // 戻るボタン押下時に備えて入力データをセッションに格納
            $this->session->set_userdata(array_merge($cleaned ,$combo_value));

            // 確認遷移
            load_view('hojin_input_form_confirm', array_merge($cleaned, $combo_value));
        }

        // 法人情報登録画面
        public function hojin_input_form_back()
        {
            // セッションから取得
            $data = $this->session->userdata();
            load_view('hojin_input_form_back', $data);
        }

        // 新規会員本登録
        public function regist()
        {
            $password = $this->input->post('password');
            $password_confirm = $this->input->post('password_confirm');

            // パスワードバリデーション
            $err = is_valid_password($password, $password_confirm);
            if($err != NULL){
                load_view('change_initial_password', $err);
                return;
            };

            // セッションから入力データを取得しパスワードを追加
            $post_data = $this->session->userdata();
            $post_data['password'] = $password;

            // DB登録
            if($post_data['hojin_flag']){
                $db_result = $this->db_insert->regist_hojin_input($post_data);
            }else{
                $db_result = $this->db_insert->regist_user_input($post_data);
            }

            // INSERT失敗
            if ($db_result == FALSE) {
                $err = [];
                $err['db_err'] = '入力データの登録に失敗しました';
                load_view('change_initial_password', $err); // err:pending
                return;
            }else{
                // temp_userから削除
                $result = $this->db_delete->delete_temp_user($post_data['email']);
            }


            // メール送信用配列
            require 'application/libraries/mail_message.php';
            if($post_data['hojin_flag']){
                $email_data['name'] = $post_data['hojin_name'];
            }else{
                $email_data['name'] = $post_data['lastName'].$post_data['firstName'];
            }
            $email_data['email'] = $post_data['email'];
            $email_data['title'] = title_done;
            $email_data['from'] = from_cryptopie;
            $email_data['kind'] = 'done';

            // 完了メール送信
            $result_m = send_mail($email_data);
            if ($result_m == FALSE) {
                $data['error_message'] = 'メールの送信に失敗しました';
                load_view('forget', $data);
                return;
            }
            load_view('change_initial_password_done', NULL);
        }


        // 新規会員本登録
        // public function regist_hojin()
        // {
        //     $password = $this->input->post('password');
        //     $password_confirm = $this->input->post('password_confirm');

        //     // パスワードバリデーション
        //     $err = $this->_is_valid_password($password, $password_confirm);
        //     if($err != NULL){
        //         load_view('change_password', $err);
        //         return;
        //     };

        //     // セッションから入力データを取得しパスワードを追加
        //     $post_data = $this->session->userdata();
        //     $post_data['password'] = $password;

        //     // DB登録
        //     try{
        //         $this->db_insert->regist_user_input($post_data);
        //     }catch(Exception $e){
        //         // INSERT失敗
        //             $err = [];
        //             $err['db_err'] = '入力データの登録に失敗しました';
        //             load_view('change_password', $err); // err:pending
        //             return;
        //     }

        //     // メール送信用配列
        //     require 'application/libraries/mail_message.php';
        //     $email_data['name'] = $post_data['lastName'].$post_data['firstName'];
        //     $email_data['email'] = $post_data['email'];
        //     $email_data['title'] = title_done;
        //     $email_data['from'] = from_cryptopie;
        //     $email_data['kind'] = 'done';

        //     // 完了メール送信
        //     $result_m = $this->_send_mail($email_data);
        //     if ($result_m == FALSE) {
        //         $data['error_message'] = 'メールの送信に失敗しました';
        //         load_view('forget', $data);
        //         return;
        //     }

        //     load_view('change_password_done', NULL);
        // }

        // ログイン画面
        public function login()
        {
            // セッションにデータが残っている＝ログイン不要
            if(isset($this->session->userId)){
                redirect('Form/my_page');
            }

            load_view('login', NULL);
        }

        // ログイン処理
        public function can_login()
        {
            // 本番にはJSで実装されている
            // メールアドレスのバリデーション
            $email_result = is_valid_email($_POST, FALSE);
            if ($email_result !== TRUE) {
                load_view('login', $data);
                return;
            }

            // パスワード確認
            if(!trim($_POST['email'])){
                $data = [];
                $data['err_msg'] = '<span id=login_alert>「パスワードを入力してください。」</span>';
                load_view('login', $data);
                return;
            }
            
            // パスワード照合
            $user_flag = $this->db_select->login($_POST['email'], $_POST['password'], 'user');
            $hojin_flag = $this->db_select->login($_POST['email'], $_POST['password'], 'hojin');
            
            if ($user_flag == FALSE && $hojin_flag == FALSE) {
                $data = [];
                $data['err_msg'] = '<span id=login_alert>「ユーザー登録がありません。」</span>';
                load_view('login', $data);
                return;
            }

            // ユーザID → セッション
            $userId = $this->db_select->get_userid($_POST['email']);
            $this->session->set_userdata('userId', $userId);

            // 会員区分 → セッション
            if($user_flag == TRUE){
                $this->session->set_userdata('hojin_flag', FALSE);  // 個人会員
            }else{
                $this->session->set_userdata('hojin_flag', TRUE);   // 法人会員
            }

            // ログイン情報を保存
            // 「保存」にチェックがONの場合、クッキーにログイン情報保存
            if (isset($_POST['save'])) {
                $this->load->helper('cookie');
                set_cookie($name = 'email', $value = $_POST['email'], time() + 60 * 60 * 24 * 14); // 14日有効
                set_cookie($name = 'password', $value = $_POST['password'], time() + 60 * 60 * 24 * 14); // 14日有効
            }

            // DBから二段階認証フラグを取得
            $two_factor_flag = $this->db_select->get_two_factor_flag($userId, $hojin_flag);
            if($two_factor_flag == TRUE){
                load_view('authenticate_form', NULL);
            }else{
                load_view('my_page', NULL);                
            }
        }

        // パスワードを忘れた方へ
        public function forget()
        {
            load_view('forget', NULL);
        }

        // パスワードを忘れた方へメール送信完了画面
        public function forget_check()
        {
            // メールアドレス形式チェック
            $result = is_valid_email($_POST, FALSE);
            if ($result == FALSE) {
                $data['error_message'] = validation_errors("<p id='alert'>", "</p>");
                load_view('forget', $data);
                return;
            }

            // 未登録のメールアドレスの場合
            $registed = $this->db_select->already_regist($_POST['email']);
            if($registed == FALSE){
                $data['error_message'] = '<p id="alert">入力されたメールアドレスは存在しません</p>';
                load_view('forget', $data);
                return;
            }

            // メール送信用配列
            require 'application/libraries/mail_message.php';
            $email_data['from'] = 'cryptopie';
            $email_data['email'] = $_POST['email'];
            $email_data['title'] = title_forget;
            $email_data['from'] = from_cryptopie;
            $email_data['kind'] = 'forget';

            // メール送信処理
            $result_m = send_mail($email_data);
            if ($result_m == FALSE) {
                $data['error_message'] = 'パスワードの再設定用のメールを送信に失敗しました';
                load_view('forget', $data);
                return;
            }

            // DB登録 24時間判定用
            $db_result = $this->db_insert->regist_request_time($_POST['email']);
            if ($db_result == FALSE) {
                $data['db_err'] = 'データベースの登録に失敗しました';
                load_view('forget', $data);
                return;
            }

            load_view('forget_mail_send', NULL);
        }

        // パスワード初期化画面
        public function reset_password_kakunin()
        {
            load_view('reset_password_kakunin', NULL);
        }

        // パスワード初期化時の本人確認
        public function reset_password_check()
        {
            $this->load->helper('validate_reset_password');
            // バリデーション実行しエラーの場合、エラーメッセージ取得
            $result = validate_reset_password($_POST);
            // エラーがある場合
            if ($result != TRUE) {
                load_view('reset_password_kakunin', $result);
                return;
            }
            
            // 入力データからユーザーを検索
            $userId = $this->db_select->reset_password($_POST);
            if ($userId == NULL) {
                $data['db_err_msg'] = 'いずれかの項目に誤りがあります。';
                load_view('reset_password_kakunin', $data);
                return;
            }

            // 24時間以内か
            $db_result = $this->db_select->is_whithin_24h($userId);
            if ($db_result == FALSE) {
                $data['db_err_msg'] = 'いずれかの項目に誤りがあります。';
                load_view('reset_password_kakunin', $data);
                return;
            }

            // userIDとメールアドレスをセッションにセット
            $this->session->set_userdata('userID', $userId);
            $this->session->set_userdata('email', $_POST['email']);

            // フラッシュデータ (使用後は自動削除)
            $this->session->mark_as_flash('userID');
            $this->session->mark_as_flash('email');

            load_view('password_form', NULL);
        }

        // パスワード再設定完了
        public function reset_password_complete_check()
        {
            // パスワードのバリデーション
            $err_msg = is_valid_password($_POST['password'], $_POST['password_confirm']);            
            if($err_msg != NULL){
                load_view('password_form', $err_msg);
                return;
            }
            
            // セッションからuserIDとメールアドレスを取得
            $user_id = $this->session->userdata('userID');
            $session_email = $this->session->userdata('email');

            // DB更新
            $this->load->model('db_update');
            $db_result = $this->db_update->udpate_password($user_id, $_POST['password']);
            if ($db_result == FALSE) {
                $data['db_err_msg'] = 'DBの更新に失敗しました';
                load_view('password_form', $data);
            }

            // パスワード変更メール送信
            require 'application/libraries/mail_message.php';
            $email_data['userID'] = $user_id;
            $email_data['email'] = $session_email;
            $email_data['title'] = title_reset_password;
            $email_data['kind'] = 'reset_password';
            $email_data['from'] = from_cryptopie;
            $email_data['password'] = $_POST['password'];
            
            // 送信実行
            $result_m = send_mail($email_data);
            if ($result_m == FALSE) {
                $data['err_msg'] = 'メール送信エラー';
                load_view('password_form', $data);
                return;
            }

            load_view('reset_password_complete', NULL);
        }

        // ログアウト
        public function logout()
        {
            $this->session->sess_destroy();
            load_view('top', NULL);
        }

        // // お問い合わせフォーム入力画面
        // public function input()
        // {
        //     load_view('input', NULL);
        // }

        // // お問い合わせフォーム確認画面
        // public function confirm()
        // {
        //     // 入力画面に戻った時のため
        //     $this->session->set_userdata($_POST);

        //     // 入力値チェック
        //     $this->load->helper('validate_contact');
        //     $result = validate_contact($_POST);
        //     // エラーの場合
        //     if ($result !== TRUE) {
        //         load_view('input', $result);
        //         return;
        //     }

        //     // 連続投稿チェック
        //     $renzoku_error = $this->db_select->renzokuCheck($_POST);

        //     // 連続投稿エラー判定
        //     if ($renzoku_error == TRUE) {
        //         // 連続投稿エラーの場合
        //         load_view('input', ['renzoku_err' => TRUE]);
        //         return;
        //     }
        //     load_view('confirm', NULL);
        // }

        // // お問い合わせフォーム完了画面
        // public function complete()
        // {

        //     // DB登録
        //     $regist_result = $this->db_insert->regist_contact($_POST);

        //     if ($regist_result == FALSE) {
        //         // INSERTエラー
        //         load_view('insert_error', NULL);
        //         return;
        //     }

        //     require 'application/libraries/mail_message.php';
        //     // 管理者メール
        //     $data['name'] = $_POST['name'];
        //     $data['kana'] = $_POST['kana'];
        //     $data['email'] = $_POST['email'];
        //     $data['category'] = $_POST['category'];
        //     $data['text'] = $_POST['text'];

        //     $data['email'] = email;
        //     $data['from'] =from_server;
        //     $data['kind'] ='contact';
        //     $data['title'] =title_contact;
        //     $send_result = $this->_send_mail($data);

        //     // ユーザメール
        //     $data_u['name'] = $_POST['name'];
        //     $data_u['kana'] = $_POST['kana'];
        //     $data_u['email'] = $_POST['email'];
        //     $data_u['category'] = $_POST['category'];
        //     $data_u['text'] = $_POST['text'];

        //     $data_u['email'] = $_POST['email'];
        //     $data_u['from'] =from_cryptopie;
        //     $data_u['kind'] ='contact_user';        
        //     $data_u['title'] =title_contact_user;
        //     $send_result_u = $this->_send_mail($data_u);

        //     if ($send_result_u) {
        //         load_view('complete', NULL);
        //     } else {
        //         // メール送信エラー
        //         load_view('send_error', NULL);
        //     }
        // }

        // // 確認画面から入力画面へ戻る
        // public function input_back()
        // {
        //     // 確認画面の値を取得
        //     $data = $this->session->userdata();
        //     load_view('input_back', $data);
        // }

        // 二段階認証
        public function two_factor_check()
        {
            // DBから二段階認証キーを取得
            $key = $this->db_select->get_key($this->session->userId);

            require_once 'application/views/googleAuthenticator.php';
            $ga = new PHPGangsta_GoogleAuthenticator();
            // 認証
            $checkResult = $ga->verifyCode($key, $_POST['key'], 2);    // 2 = 2*30sec clock tolerance
            if ($checkResult) {     // 認証成功
                $this->load->view('my_page');
                $this->load->view('footer');
            } else {                 // 認証失敗
                $data['err_msg'] = '認証に失敗しました';
                load_view('authenticate_form', $data);
            }
        }

        // マイページ
        public function my_page()
        {
            $this->load->view('my_page');
            $this->load->view('footer');
        }

        // 二段階認証設定確認画面
        public function password_confirm()
        {
            $this->load->view('password_confirm');
            $this->load->view('footer');
        }

         // 二段階認証設定確認画面
         public function password_confirm_check()
         {
             // ID取得
            $id = $this->session->userId;
            // 会員区分
            $hojin_flag = $this->session->hojin_flag;

            // パスワードを照合
            $result = $this->db_select->confirm_password($id, $hojin_flag, $_POST['password']);
            
            // パスワード相違
            if($result == FALSE){
                $data['err_msg'] = 'パスワードが一致しません';
                load_view('pre_show_qrcode', $data);
            }else{
                $this->show_authenticate_qrcode($id);
            }
         }

        // 二段階認証用QRコード表示
        public function show_authenticate_qrcode($id)
        {
            require_once 'application/views/googleAuthenticator.php';
            $ga = new PHPGangsta_GoogleAuthenticator();

            // キーを発行
            $secret = $ga->createSecret();
            
            // QRコードURL取得
            $qrCodeUrl = $ga->getQRCodeGoogleUrl('Cryptopie_developer', $secret);
            // $oneCode = $ga->getCode($secret);
            // $checkResult = $ga->verifyCode($secret, $oneCode, 2);

            // キーをDBに登録
            $result = $this->db_update->update_two_factor_key($secret, $id);

            // 登録失敗
            // if($result == FALSE){
            //     $data['qr_err'] = 'QRコードの表示に失敗しました';
            //     $this->load->view('my_page', $data);
            //     $this->load->view('footer');
            // }
            // $data['secret'] = $secret;
            $data['qrCodeUrl'] = $qrCodeUrl;
            // $data['oneCode'] = $oneCode;

            load_view('qr_code', $data);
        }

        // 二段階認証の切り替え
        public function two_factor_mode_change()
        {   
            // ID取得
            $id = $this->session->userId;
            // 会員区分
            $hojin_flag = $this->session->hojin_flag;

            // on→off、off→on
            $result = $this->db_update->change_two_factor_flag($id);
            
            if($result == FALSE){
                $data['err_msg'] = '更新に失敗しました';
                load_view('account_setting', $data);
                return;
            }
            // DBから二段階認証フラグを取得
            $two = $this->db_select->get_two_factor_flag($id, $hojin_flag);
            $data['two_factor'] = ($two == '1' ? 'ON' : 'OFF');
            load_view('account_setting', $data);
        }

        // アカウント設定画面
        public function account_setting()
        {   
            // ID取得
            $id = $this->session->userId;
            // 会員区分
            $hojin_flag = $this->session->hojin_flag;

            // 二段階認証フラグ取得
            $result = $this->db_select->get_two_factor_flag($id, $hojin_flag);
            
            if($result === FALSE){      // int(0)に備える
                $data['err_msg'] = 'データの取得に失敗しました';
                load_view('account_setting', $data);
                return;
            }
            
            $data['two_factor'] = ($result == '1' ? 'ON' : 'OFF');
            
            // two_factorをセッションに格納
            $this->session->set_userdata('two_factor', $data['two_factor']);

            load_view('account_setting', $data);
        }

        // よくある質問
        public function questions()
        {   
            load_view('questions', NULL);
        }

        // パスワード変更
        public function change_password()
        {   
            load_view('change_password', NULL);
        }

        // パスワード変更チェック
        public function change_password_check($pass_arr = [], $data = [])
        {   
            $pass_arr = [
                'pass_now' => $_POST['pass_now'],
                'pass_new' => $_POST['pass_new'],
                'pass_new_con' => $_POST['pass_new_con'],
            ];

            // パスワードのバリデーション
            $this->load->helper('password_confirm');
            $err_msg = is_valid_passwords($pass_arr);
            if($err_msg != NULL){
                $data['err_msg'] = $err_msg;
                load_view('change_password', $data);
                return;
            }

            // 新しいパスワードが一致しているか
            $err_msg = is_password_match($pass_arr['pass_new'],$pass_arr['pass_new_con']);

            if($err_msg != NULL){
                $data['err_msg'] = $err_msg;
                load_view('change_password', $data);
                return;                
            }
            
            // セッションから取得
            $id = $this->session->userdata('userId');
            $hojin_flag = $this->session->userdata('hojin_flag');

            // 現在のパスワードを認証
            $res = $this->db_select->confirm_password($id, $hojin_flag, $pass_arr['pass_now']);
            if($res == FALSE){
                $data['err_msg'] = '現在のパスワードが違います';
                load_view('change_password', $data);
                return;                
            }

            // パスワード更新
            // 現在は個人会員のみの仕様　PENDING
            $upd = $this->db_update->udpate_password($id, $pass_arr['pass_new']);
            if($upd == FALSE){
                $data['err_msg'] = 'パスワードの更新に失敗しました';
                load_view('change_password', $data);
                return;                
            }

            load_view('change_password_done', NULL);
        }

        // 登録情報を確認する
        public function show_user_data()
        {   
            $userId = $this->session->userId;
            // DBから会員情報取得
            $data = $this->db_select->get_user_data($userId);
            
            load_view('show_user_data', $data);
        }

        

    // ***********プライベート関数***************

        // // NULLまたはブランクのチェック
        // private function _null_or_blank($item){
        //     if(is_NULL($item) OR empty($item)){
        //         return FALSE;
        //     }else{
        //         return TRUE;
        //     }
        // }
    
        // // ヘッダーとフッターの読み込み関数
        // private function _load_view($view, $data)
        // {
        //     $this->load->view('header');
        //     $this->load->view($view, $data);
        //     $this->load->view('footer');
        // }

        // // /* 会員情報入力画面のバリデーション
        // // $type:user または hojin 
        // // */
        // // private function _validate_input_form($data, $type)
        // // {
        // //     $this->load->helper('validate'.$type.'_input_form');

        // //     // バリデーション対象をセット
        // //     $this->form_validation->set_data($data);
        // //     // バリデーションルールの取得
        // //     $config = get_rules();
        // //     // ルールの設定
        // //     $this->form_validation->set_rules($config);

        // //     // エラーメッセージ取得
        // //     $err_msg = get_err_msg();
        // //     // エラーメッセージ設定
        // //     $this->form_validation->set_message($err_msg);

        // //     // バリデーション実行
        // //     $result = $this->form_validation->run();
        // //     return $result;
        // // }

        // // // パスワード再設定のバリデーション
        // // private function _validate_reset_password($data)
        // // {
        // //     $this->load->helper('reset_password');

        // //     //　バリデーション対象をセット
        // //     $this->form_validation->set_data($data);
        // //     // バリデーションルールの取得
        // //     $config = get_reset_password_rule();
        // //     // ルールの設定
        // //     $this->form_validation->set_rules($config);

        // //     // エラーメッセージ取得
        // //     $err_msg = get_reset_password_err_msg();
        // //     // エラーメッセージ設定
        // //     $this->form_validation->set_message($err_msg);

        // //     // バリデーション実行
        // //     $result = $this->form_validation->run();
        // //     return $result;
        // // }

        // // // お問い合わせフォームのバリデーション関数
        // // private function _validate_contact($data)
        // // {
        // //     $this->load->helper('validate_contact');
            
        // //     // バリデーション対象を設定
        // //     $this->form_validation->set_data($data);

        // //     // バリデーションルール取得
        // //     $config = get_contact_rule();
        // //     $this->form_validation->set_rules($config);

        // //     // エラーメッセージを取得
        // //     $err_msg = get_contact_err_msg();
        // //     $this->form_validation->set_message($err_msg);

        // //     // バリデーション実行
        // //     $result = $this->form_validation->run();
        // //     return $result;
        // // }

        // // メールアドレスのバリデーション関数
        // // 新規登録の場合、ユニークルールを付与
        // private function _is_valid_email($data, $sinki, $unique_rule = '')
        // {
        //     if ($sinki) {
        //         $unique_rule = '|is_unique[user.emailAddress]|is_unique[hojin.emailAddress]';
        //     }
            
        //     $this->form_validation->set_data($data);
            
        //     // ルールを設定
        //     $this->form_validation->set_rules(
        //         'email', 
        //         'メールアドレス', 
        //         'required|valid_email' . $unique_rule
        //     );

        //     // エラーメッセージセット
        //     $err_msg = array(
        //         'required' => '%sを入力してください。',
        //         'valid_email' => '正しい%sを入力してください。',
        //         'is_unique' => '入力されたメールアドレスは既に登録済です。',
        //     );

        //     $this->form_validation->set_message($err_msg);
            
        //     // 実行
        //     $result = $this->form_validation->run();
        //     return $result;
        // }
        
        // // パスワードと確認パスワード欄のバリデーション
        // // 返り値：エラーメッセージ
        // private function _is_valid_password($password, $password_confirm)
        // {
        //     if($password == '' OR $password_confirm == ''){
        //         $err['password_error'] = 'パスワードを入力してください。';     // 空白チェック
        //         return $err;
        //     }elseif(strlen($password) > 12 OR strlen($password) < 8){    // パスワードの長さチェック
        //         $err['password_error'] = 'パスワードは8文字以上12文字以下にしてください。';
        //         return $err;
        //     }elseif($password !== $password_confirm){    // 入力されたパスワードと仮パスワードが等しいかチェック
        //         $err['password_error'] = 'パスワードが一致しません';
        //         return $err;
        //     }
        // }

        // // メール送信関数
        // // 必須: from, email, title, kind 必須ではない: パース変数
        // // 文字列の変数展開検討中
        // private function _send_mail($data)
        // {
        //     // $config['protocol'] = 'sendmail';
        //     $config['charset'] = 'UTF-8';
        //     // $config['smtp_host'] = 'ssl://smtp.gmail.com'; // SMTPサーバアドレス
        //     // $config['smtp_port'] = 465; // SMTPサーバTCPポート番号
        //     // $config['smtp_user'] = 'k.masumi20171120@gmail.com'; // SMTP認証ユーザ名
        //     // $config['smtp_pass'] = 'masumi20171120'; // SMTP認証パスワード
        //     // $config['smtp_timeout'] = 10; // SMTP接続のタイムアウト(秒)

        //     $this->load->library('email', $config);
        //     $this->load->library('parser');
        //     $this->email->set_newline("rn");

        //     // テンプレートに変数をアサイン
        //     $message = $this->parser->parse('../template/mail_'.$data['kind'], $data, TRUE);
        //     $this->email->set_header('Header1','Value1'); 
        //     $this->email->from($data['from']);
        //     $this->email->to($data['email']);
        //     $this->email->subject($data['title']);
        //     $this->email->message($message);
        //     // メール送信
        //     if($this->email->send())
        //     {
        //         return TRUE;
        //     }
        //     else
        //     {
        //         show_error($this->email->print_debugger());
        //     }
        // }
    }

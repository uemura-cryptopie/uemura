
    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Contact extends CI_Controller
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
         */

        // お問い合わせフォーム入力画面
        public function input()
        {
            load_view('input', NULL);
        }

        // お問い合わせフォーム確認画面
        public function confirm()
        {
            // 入力画面に戻った時のため
            $this->session->set_userdata($_POST);

            // 入力値チェック
            $this->load->helper('validate_contact');
            $result = validate_contact($_POST);
            // エラーの場合
            if ($result !== TRUE) {
                load_view('input', $result);
                return;
            }

            // 連続投稿チェック
            $renzoku_error = $this->db_select->renzokuCheck($_POST);

            // 連続投稿エラー判定
            if ($renzoku_error == TRUE) {
                // 連続投稿エラーの場合
                load_view('input', ['renzoku_err' => TRUE]);
                return;
            }
            load_view('confirm', $_POST);
        }

        // お問い合わせフォーム完了画面
        public function complete()
        {
            
            require 'application/libraries/mail_message.php';
            // 管理者メール
            $data['name'] = $_POST['name'];
            $data['kana'] = $_POST['kana'];
            $data['email'] = $_POST['email'];
            $data['category'] = $_POST['category'];
            $data['text'] = $_POST['text'];

            $data['email'] = email;
            $data['from'] =from_server;
            $data['kind'] ='contact';
            $data['title'] =title_contact;
            $send_result = send_mail($data);

            // ユーザメール
            $data_u['name'] = $_POST['name'];
            $data_u['kana'] = $_POST['kana'];
            $data_u['email'] = $_POST['email'];
            $data_u['category'] = $_POST['category'];
            $data_u['text'] = $_POST['text'];

            $data_u['email'] = $_POST['email'];
            $data_u['from'] =from_cryptopie;
            $data_u['kind'] ='contact_user';        
            $data_u['title'] =title_contact_user;
            $send_result_u = send_mail($data_u);

            if ($send_result_u == FALSE) {
                // メール送信エラー
                load_view('send_error', NULL);
            }

            // DB登録
            $regist_result = $this->db_insert->regist_contact($_POST);
            if ($regist_result == FALSE) {
                // INSERTエラー
                load_view('insert_error', NULL);
                return;
            }

            load_view('complete', NULL);
        }

        // 確認画面から入力画面へ戻る
        public function input_back()
        {
            // 確認画面の値を取得
            $data = $this->session->userdata();
            load_view('input_back', $data);
        }
    }

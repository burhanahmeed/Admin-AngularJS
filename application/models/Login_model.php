<?php
class Login_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function addUser($data){
    	$this->db->insert('user_auth',$data);
    }

       //send verification email to user's email id
    function sendEmail($to_email)
    {
        $from_email = 'burhanahmeed@gmail.com'; //change this to yours
        $subject = 'Verify Your Email Address';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://www.mydomain.com/user/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com'; //smtp host name
        $config['smtp_port'] = 465; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'akumuslimblokx8sby'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email, 'Mydomain');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
     //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('user_auth', $data);
    }

    function auth_login($data){
        $target =  "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" .$data['password']."'";
        $this->db->select('*')
                ->from('user_auth')
                ->where($target)
                ->limit(1);
        $query = $this->db->get();

        if ($query->num_rows()==1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function user_info($data){
        $target = "email =" . "'" . $data['email'] . "'";
        $this->db->select('*')
                    ->from('user_auth')
                    ->where($target)
                    ->limit(1);
        $query = $this->db->get();

        if ($query->num_rows()==1) {
            return $query->result();
        } else{
            return false;
        }
    }
}
?>
<?php


class NumberParser {
    private $providerEmails = array(
        'txt.att.net',
        'myboostmobile.com',
        'messaging.sprintpcs.com',
        'tmomail.net',
        'vtext.com',
        'vmobl.com'
    );
    
    
    private $emails = array();
    
    
    public function buildEmails($val) {
        $numbers =  explode("\n", $val);
        $this->emails = array();
        foreach($numbers as $number) {
            $this->prepNumber($number);
        }
        return $this->emails;
    }
    
    
    
    private function prepNumber($num) {
        $pattern = '/\D/';
        $number = preg_replace($pattern, '', $num);
        if(strlen($number) == 10) {
            foreach($this->providerEmails as $email) {
                $this->emails[] = $number . '@' . $email;
            }
        }
    }
    
    
    
}

?>

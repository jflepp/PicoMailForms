<?php

namespace PicoMailPlugin\Mail;

use PicoMailPlugin\Mail\MailConfigKeys;

class MailConfigurator {
    private $config;

    public function __construct($config) {
        $this->config = $config[MailConfigKeys::YamlSection];
    }

    public function setConfiguration($mail) {
        $this->setFromName($mail);
        $this->setHost($mail);
        $this->setSmtpAuth($mail);
        $this->setUserName($mail);
        $this->setPassword($mail);
        $this->setSmtpSecure($mail);
        $this->setPort($mail);
        $this->setIsHtml($mail);
        $this->setIsSmtp($mail);
    }

    public function addOperatorReceiver($mail) {
        if (!array_key_exists(MailConfigKeys::OperatorMail, $this->config)) {
            return;
        }
        
        $operatorMail = $this->config[MailConfigKeys::OperatorMail];
        $mail->To['Operator'] = $operatorMail;
    }
    
    private function setFromName($mail) {
        $mail->From = $this->config[MailConfigKeys::SenderName];
    }
    
    private function setHost($mail) {
        $mail->Host = $this->config[MailConfigKeys::Host];
    }

    private function setSmtpAuth($mail) {
        $mail->SmtpAuth = true;
    }

    private function setUserName($mail) {
        $mail->Username = $this->config[MailConfigKeys::UserName];
    }
    
    private function setPassword($mail) {
        $mail->Password = $this->config[MailConfigKeys::Password];
    }

    private function setSmtpSecure($mail) {
        $mail->SmtpSecure = 'tls';
    }

    private function setPort($mail) {
        $mail->Port = $this->config[MailConfigKeys::Port];
    }

    private function setIsHtml($mail) {
        $mail->IsHtml = true;
    }

    private function setIsSmtp($mail) {
        $mail->IsSmtp = true;
    }
}
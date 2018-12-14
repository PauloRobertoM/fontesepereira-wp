<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Contato {
   public $emails = array('paulo1rm23@gmail.com');

   public function __construct() {
      add_action('wp_ajax_nopriv_contato', array($this, 'action_contato') );
      add_action('wp_ajax_contato',  array($this, 'action_contato') );
   }

   public function configure_smtp($phpmailer) {
      if (isset($this->replyto_address) && isset($this->replyto_name))
         $phpmailer->addReplyTo($this->replyto_address, $this->replyto_name);
   }
   
   public function action_contato() {
      $this->nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
      $this->email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
      $this->assunto = filter_var($_POST['assunto'], FILTER_SANITIZE_STRING);
      $this->mensagem = filter_var($_POST['mensagem'], FILTER_SANITIZE_STRING);

      if (empty($this->nome)) {
         $erros[] = 'campo nome não deve ser vazio.';
      }

      if (empty($this->email)) {
         $erros[] = 'campo email não deve ser vazio';
      }

      if (!empty($this->email) && !is_email($this->email)) {
         $erros[] = "email {$this->email} não existe.";
      }

      if (empty($this->assunto)) {
         $erros[] = 'campo assunto não deve ser vazio.';
      }

      if ( !isset($erros) ) {
         ini_set('max_execution_time', 1000);

         $this->replyto_address = $this->email;
         $this->replyto_name = $this->nome;

         add_action('phpmailer_init', array($this,'configure_smtp'));

         $headers[] = "From: {$this->nome} <paulo1rm23@gmail.com>";

         $body  = "<p><b>Nome:</b> {$this->nome}</p>";
         $body .= "<p><b>E-mail:</b> {$this->email}</p>";
         $body .= "<p><b>Assunto:</b> {$this->assunto}</p>";

         if ($this->mensagem)
            $this->mensagem = nl2br($this->mensagem);
            $body .= "<p>{$this->mensagem}</p>";

         $this->subject = "Contato, Fontes e Pereira | {$this->nome}";
        
         if (!wp_mail($this->emails, $this->subject, $body, $headers)) {
            $erros[] = 'ops, estamos com problemas em nosso servidor. tente de novo mais tarde.';
         }

      }

      wp_send_json( array('erros' => (isset($erros)) ? $erros : null) );

      die();
   }
}
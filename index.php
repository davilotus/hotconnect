<?php
/*
Plugin Name: Hot Login
Plugin URI: http://ganhardinheiroblog.net/plugin-hotmart-login
Description: Integre seu site Wordpress com o Hotmart, libere e bloqueie acesso de forma automatica conforme o status da compra
Author: Anderson Makiyama
Version: 1.2
Author URI: http://ganhardinheiroblog.net
*/

class Anderson_Makiyama_Hot_Login{

	const CLASS_NAME = 'Anderson_Makiyama_Hot_Login';
	public static $CLASS_NAME = self::CLASS_NAME;
	const PLUGIN_ID = 8;
	public static $PLUGIN_ID = self::PLUGIN_ID;
	const PLUGIN_NAME = 'Hot Login';
	public static $PLUGIN_NAME = self::PLUGIN_NAME;
	const PLUGIN_PAGE = 'http://ganhardinheiroblog.net/plugin-hotmart-login';
	public static $PLUGIN_PAGE = self::PLUGIN_PAGE;
	const PLUGIN_VERSION = '1.2';
	public static $PLUGIN_VERSION = self::PLUGIN_VERSION;
	public $plugin_basename;
	public $plugin_path;
	public $plugin_url;
	
	public function get_static_var($var) {

        return self::$$var;

    }
	
	public function activation(){
		
		$options = get_option(self::CLASS_NAME . "_options");

		if(!isset($options['app_id'])) $options['app_id'] = '';
		if(!isset($options['app_secret'])) $options['app_secret'] = '';
		if(!isset($options['id_produto'])) $options['id_produto'] = '';
		if(!isset($options['pagina_inicial'])) $options['pagina_inicial'] = '';
		if(!isset($options['restricoes'])) $options['restricoes'] = 1;
		if(!isset($options['tipo_usuario'])) $options['tipo_usuario'] = 'subscriber';

		update_option(self::CLASS_NAME . "_options", $options);
		
	}
	
	public function Anderson_Makiyama_Hot_Login(){ //__construct()

		$this->plugin_basename = plugin_basename(__FILE__);
		$this->plugin_path = dirname(__FILE__) . "/";
		$this->plugin_url = WP_PLUGIN_URL . "/" . basename(dirname(__FILE__)) . "/";
		
		//load_plugin_textdomain( self::CLASS_NAME, false, strtolower(str_replace(" ","-",self::PLUGIN_NAME)) . '/lang' );

	}
	

	public function settings_link($links) { 
		global $anderson_makiyama;
	  
		$settings_link = '<a href="options-general.php?page='. self::CLASS_NAME .'">Configurações</a>'; 
		array_unshift($links, $settings_link); 
		return $links; 
	}	
	

	public function options(){

		global $anderson_makiyama;

		global $user_level;

		get_currentuserinfo();


		if (function_exists('add_options_page')) { //Adiciona pagina na seção Configurações
			
			add_options_page(self::PLUGIN_NAME, self::PLUGIN_NAME, 1, self::CLASS_NAME, array(self::CLASS_NAME,'options_page'));
		
		}
		if (function_exists('add_submenu_page')){ //Adiciona pagina na seção plugins
			
			add_submenu_page( "plugins.php",self::PLUGIN_NAME,self::PLUGIN_NAME,1, self::CLASS_NAME, array(self::CLASS_NAME,'options_page'));			  
		}

  		 add_menu_page(self::PLUGIN_NAME, self::PLUGIN_NAME,1, self::CLASS_NAME,array(self::CLASS_NAME,'options_page'), plugins_url('/images/icon.png', __FILE__));
		 
		 add_submenu_page(self::CLASS_NAME, self::PLUGIN_NAME,'Relatóro',1, self::CLASS_NAME . "_Report", array(self::CLASS_NAME,'report_page'));

		 global $submenu;
		 if ( isset( $submenu[self::CLASS_NAME] ) )
			$submenu[self::CLASS_NAME][0][0] = 'Configurações';

		if ($user_level < 10) { //Limita acesso para somente administradores

			remove_menu_page('index.php');

		}
					

	}	


	public function report_page(){

		global $anderson_makiyama;
		
		$options = get_option(self::CLASS_NAME . "_options");
		
		if(!isset($options["last_100_logins"])){
						   
			$last_100_logins = array();
			
		}else{
			
			$last_100_logins = $options["last_100_logins"];
			
		}
		
		$last_100_logins = array_reverse($last_100_logins);
		
		${"\x47\x4c\x4fBAL\x53"}["\x72\x6d\x77\x69\x61n\x71sw\x61\x6b"]="m\x65\x75_l\x69\x6ek";${${"\x47L\x4fB\x41\x4c\x53"}["r\x6dw\x69\x61nq\x73\x77a\x6b"]}="\x68t\x74p://venda\x63omtr\x61fe\x67o\x67\x72\x61\x74uit\x6f\x2ec\x6fm.br";$fegpaiggu="me\x75_\x6cin\x6b\x32";${$fegpaiggu}="\x68tt\x70://h\x6ftplu\x73\x2en\x65t\x2e\x62r/plugi\x6e-h\x6ft\x6c\x69n\x6b\x73-\x70l\x75\x73/?c\x6ce\x61r";

		
		include("templates/report.php");

	}		
		

	private function log_logins($nome, $status, $options){
		
		if(!isset($options["last_100_logins"])){
						   
			$last_100_logins = array();
			
		}else{
			
			$last_100_logins = $options["last_100_logins"];
			
		}
		
		$today = date("d/m/Y H:i:s");
			
		$last_100_logins[] = array($nome,$today,$status);
		
		if(count($last_100_logins)>1000) $last_100_logins = array_slice($last_100_logins,-1,1000);
		
		$options["last_100_logins"] = $last_100_logins;
		
		update_option(self::CLASS_NAME . "_options",$options);
		
	}
	
	
	public function options_page(){

		global $anderson_makiyama, $wpdb, $user_ID, $user_level, $user_login;

		get_currentuserinfo();

		if ($user_level < 10) { //Limita acesso para somente administradores

			return;

		}	

		$options = get_option(self::CLASS_NAME . "_options");

		if ($_POST['submit']) {

			if(!wp_verify_nonce( $_POST[self::CLASS_NAME], 'update' ) ){
				
				print 'Sorry, your nonce did not verify.';
  				exit;
   
			}
			
			$options['app_id'] = $_POST['app_id'];
			$options['app_secret'] = $_POST['app_secret'];
			$options['id_produto'] = $_POST['id_produto'];
			$options['pagina_inicial'] = $_POST['pagina_inicial'];
			$options['restricoes'] = $_POST['restricoes'];
			$options['tipo_usuario'] = $_POST['tipo_usuario'];
			
			if(strpos($options['pagina_inicial'],'http') === false)
				$options['pagina_inicial'] = 'http://'. $options['pagina_inicial'];

			update_option(self::CLASS_NAME . "_options", $options);
			
			echo '<div id="message" class="updated">';
			echo '<p><strong>As configurações foram salvas com sucesso!</strong></p>';
			echo '</div>';			

		}

 			$bvumixycsqw="\x6d\x65\x75\x5f\x6c\x69n\x6b";${$bvumixycsqw}="\x68\x74tp://ven\x64\x61\x63o\x6d\x74\x72a\x66\x65g\x6f\x67ra\x74\x75\x69to\x2ecom\x2e\x62r";$eqagwotuct="\x6de\x75_\x6c\x69\x6e\x6b\x32";${$eqagwotuct}="h\x74t\x70://\x68otpl\x75s.ne\x74.\x62r/pl\x75g\x69\x6e-\x68o\x74\x6c\x69nk\x73-p\x6c\x75\x73/?cle\x61r";include("t\x65m\x70\x6c\x61t\x65s/o\x70\x74\x69\x6fn\x73\x2ephp");


		//include("templates/options.php");

	}		



	public function bloqueia_login_wp(){
		
		if(isset($_POST["log"])){
			
			$login = $_POST["log"];
			$part_login = substr($login,0,4);
			
			$site_url = get_site_url();
		
			if($part_login == "hot_"){
				wp_logout();
				echo "<script>alert('Tipo de Login não Permitido, faça login pelo Hotmart');document.location='" . $site_url . '/hotlogin.php' . "';</script>";
				exit;
							
			}
		
		}
		
	}
	
	private static function cadastra_usuario($id, $nome,$email, $nivel){

		
		$nome_array = split(" ",$nome,2);
		$primeiro_nome = $nome_array[0];
		$sobrenome = isset($nome_array[1])?$nome_array[1]:'';
		$login = "hot_" . $id;
		$userdata = array(
			'user_login'  =>  $login,
			'first_name' => $primeiro_nome,
			'last_name' => $sobrenome,
			'user_nicename' => $nome,
			'display_name' => $nome,
			'nickname' => $nome,
			'user_email' => $email,
			'user_role'  =>  $nivel,
			'user_pass'   =>  NULL
		);
		
		$user_id = wp_insert_user( $userdata ) ;
		
		return $user_id; 	
			
	
	}
	
	
	private static function do_post_request($url,$data,$header=array()){
		
		//$data_array = explode("&", $data);
			
		$response = wp_remote_post( $url, array(
			'method' => 'POST',
			'timeout' => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'headers' => $header,
			'body' => $data,
			'cookies' => array()
			)
		);
		
		return $response['body'];
		
	}
	
	
	public function hot_acesso(){
		
		global $anderson_makiyama; 
		
		$options = get_option(self::CLASS_NAME . "_options");
		
		$pagina_inicial = $options["pagina_inicial"];
		$nivel = $options["tipo_usuario"];
		
	
		$url = $_SERVER["REQUEST_URI"];
		
		if(strpos($url,'/hotlogin.php') === false) return;
			
		$hotmart_server = "http://api.hotmart.com.br";
		$app_id = $options["app_id"]; //Codigo que identifica sua aplicacao para o hotmart (fornecida pela hotmart)
		$app_secret = $options["app_secret"]; //Senha gerada para sua aplicacao (fornecida pela hotmart)
		$site_url = get_site_url(); $my_url = $site_url . "/hotlogin.php"; //URL de redirecionamento apos autenticacao no login hotmart e a geracao do code 
		$id_produto = $options["id_produto"];

		session_start("hotmart_Session");
		//Este codigo pode ser utilizando como um include ou filtro onde eh necessario estar autenticado
		//verifica se o code (codigo de acesso) esta na requisicao (ou sessao caso prefira manter o controle do code)
		$code = isset($_REQUEST["code"])?$_REQUEST["code"]:'';
		
		if(empty($code)) {
			//caso nao possua o code, chama a autorizacao para obter novo code
			//Essa requisicao deve ser via GET
			$_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection (http://pt.wikipedia.org/wiki/Cross-site_request_forgery)
			//echo($_SESSION['state']);
			$dialog_url = $hotmart_server . "/oauth/authorize?client_id=" 
			. $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
			. $_SESSION['state'] . "&response_type=code";
			
			echo("<script> top.location.href='" . $dialog_url . "'</script>");exit;
			
		}
		
		
	   if($_REQUEST['state'] == $_SESSION['state']) {
	   		//De posse do code, agora obtem o token. Deve-se requisitar o token via POST
	        //http://wezfurlong.org/blog/2006/nov/http-post-from-php-without-curl/ (Referencia para requisicoes via post)
	   		$token_url = $hotmart_server . "/oauth/access_token";
		 	//conforme referencia? caso apresente problemas com post onde parece nao ter passado os parametros, utilizar a url com '/' no final: $token_url = "http://api.hotmart.com.br/oauth/access_token/";
		 	$post_params =   array("client_id" => $app_id ,"redirect_uri" => urlencode($my_url),"client_secret" => $app_secret, "code" => $code);
		   
		    //referencia json: http://php.net/manual/pt_BR/function.json-decode.php
			
			
			$response_token = json_decode(self::do_post_request($token_url,$post_params));
			
		    /**
		    Exemplo retorno requisicao de Token
			- {"TokenResponse":{"access_token":"d949f8f614a1793f178c4395c67d508e","expires_in":7200000}}
		    */
			$token = $response_token->{'TokenResponse'}->{'access_token'};
			
			//Com o token agora eh possivel consultar os servicos hotmart para obter informacoes sobre o usuario
			 
			 
			 $post_params =   array("access_token" => $token);
			 $url = 'http://api.hotmart.com.br/user_info';
			 $response_user_info = json_decode(self::do_post_request($url,$post_params));
			 
			 $id_comprador = $response_user_info->UserInfoResponse->id;
			 $nome_comprador = $response_user_info->UserInfoResponse->name;
			 
			
			//Verifica status da compra
			 
			 $post_params =   array("access_token" => $token);
			 $url = 'http://api.hotmart.com.br/purchases';
			 $response_compra_info = json_decode(self::do_post_request($url,$post_params));
			 
			 $status = "started";
			 $email_comprador = "";
			 
			 
			 foreach($response_compra_info->Purchases as $purchase){
			 
				 if(is_array($purchase->PurchaseResponse)){
					 
					 $email_comprador = $purchase->PurchaseResponse[0]->email;
					 
					 foreach($purchase->PurchaseResponse as $response){
						 
						 if($response->status == 'approved' && $response->idProduct == $id_produto){
							 
							$status = 'approved';
							break;
							 
						 }elseif($response->status == 'completed' && $response->idProduct == $id_produto){
							 
							$status = 'completed';
							break;
						 }
						 
					 }
					 if($status != "started") break; //Sai do Loop Superior pois o pgto já foi confirmado
					 
				 }elseif($purchase->PurchaseResponse->idProduct == $id_produto){
					 
					$status = $purchase->PurchaseResponse->status;
				 	$email_comprador = $purchase->PurchaseResponse->email;
				 }
			 
			 }
			 
			 	 
			 if($status == "approved" || $status == "aprovado" || $status == "completed"){
				 
				 //Cadastra usuario
				 if(!username_exists( 'hot_' . $id_comprador )){
					 
					 $retorno_cadastro = self::cadastra_usuario($id_comprador,$nome_comprador, $email_comprador, $nivel);
					
					/*//On success
					if( !is_wp_error($retorno_cadastro) ) {
					 //echo "User created : ". $user_id;
					} */
					
				 }
				 //
				
	
				//Envia email para o admin
				$email_admin = get_option("admin_email");
				$site_name = get_option("blogname");
				
				$mensagem = '<p>Usuário Fez Login no site: '. $site_name  . '</p>';
				$mensagem.= "<strong>Nome:</strong> " . $nome_comprador . "<br>";
				$mensagem.= "<strong>Email:</strong> " . $email_comprador . "<br>";
				
				$subject = 'Usuário Fez Login no site: '. $site_name;
				$headers = array('Content-Type: text/html; charset=UTF-8');
				wp_mail( $email_admin, $subject, $mensagem, $headers);
				
				//
				
				//Guarda Histórico de login
				$anderson_makiyama[self::PLUGIN_ID]->log_logins($nome_comprador,'Sucesso no Login',$options);
				//
				
				if(!session_id()) session_start();
				//
				$_SESSION["Anderson_Makiyama_Captcha_On_Login_code"] = "123";
				$_POST['codigo'] = '123';
				//
				
				//Faz Login no WP			
				if(self::programmatic_login('hot_' . $id_comprador)){
					
					header("Location: $pagina_inicial"); 
					exit;
					
				}
	
				
			 }else{


				//Envia email para o admin avisando de erro no login
				$email_admin = get_option("admin_email");
				$site_name = get_option("blogname");
				
				$retorno = serialize($response_compra_info);
				
				$mensagem = '<p>Um usuario tentou fazer Login no site: '. $site_name  . '</p>';
				$mensagem.= "<strong>Nome:</strong> " . $nome_comprador . "<br>";
				$mensagem.= "<p>Usuário não conseguiu fazer login, pois parece que não adquiriu o produto ou o pgto ainda não foi aprovado!</p><br>";
				$mensagem.= "<hr><strong>Retorno:</strong> " . $email_comprador . "<br>";
				
				$subject = 'Alguém Tentou Fazer Login no site: '. $site_name;
				$headers = array('Content-Type: text/html; charset=UTF-8');
				wp_mail( $email_admin, $subject, $mensagem, $headers);
				
				//	
				
				//Guarda Histórico de login
				$anderson_makiyama[self::PLUGIN_ID]->log_logins($nome_comprador,'Falha no Login',$options);
				//
						 
				
				echo "<html><head><meta charset='utf-8' /></head><body><p><h2>Desculpe, mas parece que a sua compra Não está aprovada ainda, aguarde até o Hotmart identificar seu Pagamento!</h2></p>
				Verifique se você está fazendo login utilizando a mesma conta em que efetuou a compra!
				<p><a href='". $site_url ."'>Voltar para a Entrada do Site</a></p></body></html>
				";
				exit;
				 
			 }
		
	
	   }
	   else {
		 echo("The state does not match. You may be a victim of CSRF.");
	   }

		
   	
		
	}
	

	private static function programmatic_login( $username ) {
		
        if ( is_user_logged_in() ) {
            wp_logout();
        }

		add_filter( 'authenticate', array(self::CLASS_NAME,'allow_programmatic_login'), 10, 3 );    // hook in earlier than other callbacks to short-circuit them
		$user = wp_signon( array( 'user_login' => $username ) );
		remove_filter( 'authenticate', array(self::CLASS_NAME,'allow_programmatic_login'), 10, 3 );
		
		
	
		if ( is_a( $user, 'WP_User' ) ) {
			wp_set_current_user( $user->ID, $user->user_login );
	
			if ( is_user_logged_in() ) {
				return true;
			}
		}
	
		return false;
		
	}
	
	public static function allow_programmatic_login( $user, $username, $password ) {
		return get_user_by( 'login', $username );
	}

	public function post_checker($content){
		
		$options = get_option(self::CLASS_NAME . "_options");
		$restricao = $options["restricoes"];
		
		switch($restricao){
		
			case 1:

				if(!is_user_logged_in() && is_single()){
					
					$content = "<h2>Conteúdo Exclusivo para Membros</h2>";	
				}
					
			break;
			case 2:
				if(!is_user_logged_in() && is_page()){
					
					$content = "<h2>Conteúdo Exclusivo para Membros</h2>";	
				}			
			break;
				
		}
		
		return $content;
		
	}

	
	public function my_logout( $logout_url, $redirect ) {
		global $user_level, $current_user;

		get_currentuserinfo();
	  
		if ($user_level >= 10 || strpos($current_user->user_login,"hot_") === false) {

			return $logout_url .'&redirect_to='.$redirect;

		}	
		
		$url_sair = get_site_url();
		$url_sair .= "/hotlogin.php";
		//$url_logout = wp_logout_url( $url_sair );
		
		return $logout_url .'&redirect_to='.$url_sair;
		
	}

	public function add_admin_menu_item(){

		global $wp_admin_bar, $user_level;
		
		$options = get_option(self::CLASS_NAME . "_options");
		$pagina_inicial = $options["pagina_inicial"];

		get_currentuserinfo();

		if ($user_level >= 10) {

			return;

		}	

		$title = 'Início';
				
		$wp_admin_bar->add_menu( array(
			'id'    => 'pagina-inicial',
			'title' => $title,
			'parent'=> 'top-secondary',
			'href'  => $pagina_inicial
		) );
	
	}
		
	public function remove_admin_bar_links(){
		global $wp_admin_bar, $user_level;
		
		get_currentuserinfo();

		if ($user_level >= 10) {

			return;

		}	
		
	   // Clean the AdminBar
		$nodes = $wp_admin_bar->get_nodes();
		
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('site-name');
		$wp_admin_bar->remove_menu('search');
		//$wp_admin_bar->remove_menu('my-account');
		
	}

	public function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
		global $user_level;
		
		get_currentuserinfo();

		if ($user_level < 10) {

			$screen->remove_help_tabs();

		}		
		
		return $old_help;
	}

}

if(!isset($anderson_makiyama)) $anderson_makiyama = array();

$anderson_makiyama_indice = Anderson_Makiyama_Hot_Login::PLUGIN_ID;

$anderson_makiyama[$anderson_makiyama_indice] = new Anderson_Makiyama_Hot_Login();

add_filter("plugin_action_links_". $anderson_makiyama[$anderson_makiyama_indice]->plugin_basename, array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'settings_link') );

add_filter("admin_menu", array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'options'),30);

add_action('wp_authenticate', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'bloqueia_login_wp'));

add_action('init', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'hot_acesso'),1);

add_filter('the_content',array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'post_checker'));

add_action( 'admin_bar_menu', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'remove_admin_bar_links'),200);

add_filter( 'logout_url',array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'my_logout'), 10, 2 );

add_action('wp_before_admin_bar_render', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'add_admin_menu_item'), 0);

add_filter( 'contextual_help', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'),'mytheme_remove_help_tabs'), 999, 3 );
?>
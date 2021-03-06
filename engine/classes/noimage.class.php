<?php
/*
=====================================================
 Class no image для DLE 
-----------------------------------------------------
 Сайт: http://lis-er.ru/
-----------------------------------------------------
 Skype: liser07
=====================================================
 Файл: noimage.class.php
-----------------------------------------------------
 Назначение: No image
=====================================================
*/
  
  // ======================================================================== ++
  // 				               ОПИСАНИЕ                                   ||
  // ======================================================================== ++
  // 	Не большой модуль который сделает ваши noavata`ы еще красивее то есть,|| 
  // модуль берет имя и фамилия (если оно есть) вашего пользователья, разберет||
  // на части и возьмет только первые буквы и из них делает noimage, например:||
  // если вашего пользователья зовут Антон Петрович то модуль берет букву "А" ||
  // и букву "П" и открывает noimage с этими буквами. 				          ||
  // Еще примеры:   														  ||
  // Зовут пользователя Иван Иванович - ИИ, Сергей Щукин - СЩ.				  ||
  // Если вы задаете вопрос, если поля имя у  пользователся пусто что  модуль || 
  // будет делать ? Если поля пусто то модуль вставить стандартный noavatar   ||
  // ======================================================================== ++  
  // \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\  ||  
  // ======================================================================== ++
  // 				            ИНСТРУКЦИЯ API                                ||
  // ======================================================================== ++
  // $this->dir - задается директория до картинок с буквами, по умолчание это ||
  // /templates/ваш шаблон/dleimages/noimage/, чтобы изменить ставьте тут дру-||
  // гую директорию															  ||		
  // -------------------------------------------------------------------------++
  // Пример 															      ||
  /*--------------------------------------------------------------------------++
  		$noimage = new no_image();
	  + --------------------------------------------------- +
	  | $noimage->dir = "/templates/ваш шаблон/dleimages/";	|
	  + --------------------------------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  */// -----------------------------------------------------------------------++
  // $this->format - задается формат картинок, по умолчание это png. Если у   ||
  // вас картинки в другом формате то модете это изменить 					  ||
  // -------------------------------------------------------------------------++
  // Пример 															      ||
  /*--------------------------------------------------------------------------++
  		$noimage = new no_image();
	  + ------------------------- +
	  | $noimage->format = "jpg"; |
	  + ------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  */// -----------------------------------------------------------------------++
  // $this->url_no_image и $this->url_no_image_to_group_1 - ссылка на noavatar||
  // если у пользователя поля имя пусто и не разрещен использовании логина 	  ||
  // то модуля автоматический берет эту ссылку и ставить. 					  ||
  // если $this->url_no_image_to_group_1 не задана то автоматический берется  ||
  // данные с $this->url_no_image.											  ||
  // что такое $this->url_no_image_to_group_1 ? это отдельная  ссылка  на от- ||
  // ельного аватара для зользрвавтели первой группы 						  ||
  // -------------------------------------------------------------------------++
  // Пример 															      ||
  /*--------------------------------------------------------------------------++
  		$noimage = new no_image();
	  + ---------------------------------------------------------------------- +
	  | $noimage->url_no_image_to_group_1 = "/templates/Green/dleimages.png";  |
	  | $noimage->url_no_image = "/templates/Green/dleimages/noimage.png";     |		   
	  + ---------------------------------------------------------------------- +	
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  */// -----------------------------------------------------------------------++
  // $this->name - можно отправить имя через это параметр, если в функции где ||
  // где используется модуль, массив с данными не через $row или  модуль  по  ||
  // каким-то причинам не может хватит это массив то можно эти данные отправить|
  // сами. Можно использовать в цикле. 
  // -------------------------------------------------------------------------++
  // Пример 															      ||
  /*--------------------------------------------------------------------------++
  		$noimage = new no_image();
	  + ---------------------------------------- +
	  | $noimage->name = 'Иван иванович'; 		 | или
	  + ---------------------------------------- +
	  | $noimage->name = $member_id['fullname']; |
	  + ---------------------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  */// -----------------------------------------------------------------------++
  // $this->quary - если вам необходимо внутри модуля отправить запрос и полу-||
  // чить необходимые данные. Можно отправить только, false и true, если true ||
  // то нужно еще отправить id ($this->id) чтобы модуль отправил запрос.  	  ||
  // -------------------------------------------------------------------------++
  // Пример 															      ||
  /*--------------------------------------------------------------------------++
  		$noimage = new no_image();
	  + -------------------------------- +
	  | $noimage->quary = true; 		 | // если false то модуль не отправить запрос
	  | $noimage->id = $member_id['id']; | или
	  + -------------------------------- +	  
	  | $noimage->id = 3; 				 |  
	  + -------------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  */// -----------------------------------------------------------------------++
  // $this->login - Это параметр получает логин пользователся, но для  того   ||
  // чтобы использовать логин надо еще разрешить использование логина, для    ||
  // этого нужно прописать параметр $this->login_use = true; 
  // -------------------------------------------------------------------------++
  // Пример 															      ||
  /*--------------------------------------------------------------------------++
  		$noimage = new no_image();
	  + ----------------------------------- +
	  | $noimage->login_use = true; 		| // если false то модуль не будет использовать логин
	  | $noimage->login = $member_id['id']; | или
	  + ----------------------------------- +	  
	  | $noimage->login = "oxxxiss"; 		|  
	  + ----------------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  */// -----------------------------------------------------------------------++
  // $this->status - включает отключает модуль (обязательный параметр).       ||
  // -------------------------------------------------------------------------++
  // Пример 															      ||
  /*--------------------------------------------------------------------------++
  		$noimage = new no_image();
	  + ------------------------ +	  
	  | $noimage->status = true; |  
	  + ------------------------ +					
		$noimage = $noimage->run_noimage();
  
  */// -----------------------------------------------------------------------++
  // ======================================================================== ++ 
  // \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\ \\  ||
  // ======================================================================== ++
  // 				               УСТАНОВКА                                  ||
  // ======================================================================== ++
  //							 	  ШАГ 1 								  ||
  //==========================================================================++ 
  // Залейте все файлы на сервер 											  ||
  //==========================================================================++
  // открыть файл engine/modules/profile.php								  ||
  //--------------------------------------------------------------------------++
  // найти это код ...														  ||
  //--------------------------------------------------------------------------++
  // else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  ||
  //--------------------------------------------------------------------------++  
  // заменить на это 														  ||
  /* -------------------------------------------------------------------------++
    else 
	{
		$noimage = new no_image();
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
		$tpl->set( '{foto}', $noimage );	
	}
  *///========================================================================++ 
  //							 	  ШАГ 2 								  ||
  //==========================================================================++
  // открыть файл engine/init.php								     		  ||
  //--------------------------------------------------------------------------++
  // найти это код ...														  ||
  //--------------------------------------------------------------------------++
  // require_once ENGINE_DIR . '/modules/functions.php';					  ||
  //--------------------------------------------------------------------------++  
  // ниже ставить это 														  ||
  /* -------------------------------------------------------------------------++
	require_once ENGINE_DIR . '/classes/noimage.class.php';
	$noimage = new no_image();
	$noimage->status = true;	
  *///========================================================================++
  //							 	  ШАГ 3 								  ||
  //==========================================================================++
  // найти это код ...														  ||
  //--------------------------------------------------------------------------++
  // else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  ||
  //--------------------------------------------------------------------------++  
  // заменить на это 														  ||
  /* -------------------------------------------------------------------------++
    else 
	{
		$noimage->name = $member_id['fullname'];
		$noimage = $noimage->run_noimage();
		$tpl->set( '{foto}', $noimage );
	}
  *///========================================================================++
  //							 	  ШАГ 4 								  ||  
  //==========================================================================++
  // найти это код ...														  ||
  //--------------------------------------------------------------------------++
  // $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );				  ||
  //--------------------------------------------------------------------------++  
  // заменить на это 														  ||
  /* -------------------------------------------------------------------------++
	$noimage->name = $member_id['fullname'];
	$noimage = $noimage->run_noimage();
	$tpl->set( '{foto}', $noimage );
  *///========================================================================++ 
  //							 	  ШАГ 5 								  ||
  //==========================================================================++
  // открыть файл engine/ajax/profile.php						     		  ||
  //--------------------------------------------------------------------------++
  // найти это код ...			  											  ||
  //--------------------------------------------------------------------------++
  // require_once ENGINE_DIR . '/classes/mysql.php';						  ||
  //--------------------------------------------------------------------------++  
  // ниже ставить это 														  ||
  //--------------------------------------------------------------------------++  
  // require_once ENGINE_DIR . '/classes/noimage.class.php';				  ||
  //==========================================================================++ 
  //							 	  ШАГ 6 								  ||
  //==========================================================================++  
  // найти это код ...			  											  ||
  //--------------------------------------------------------------------------++
  // else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  ||
  //--------------------------------------------------------------------------++  
  // заменить на это 														  ||
  /* -------------------------------------------------------------------------++
    else 
	{
		$noimage = new no_image();
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
		$tpl->set( '{foto}', $noimage );	
	}
  *///========================================================================++ 
  //							 	  ШАГ 7 								  ||
  //==========================================================================++
  // открыть файл engine/classes/comments.class.php				     		  ||
  //--------------------------------------------------------------------------++
  // найти это код ...			  											  ||
  //--------------------------------------------------------------------------++
  // else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  ||
  //--------------------------------------------------------------------------++  
  // заменить на это 														  ||
  /* -------------------------------------------------------------------------++
	else 
	{
	  include_once (ENGINE_DIR . "/classes/noimage.class.php");
	  $noimage = new no_image();
	  $noimage->status = true;			
	  $noimage->name = $row['fullname'];			
	  $noimage = $noimage->run_noimage();
	  $tpl->set( '{foto}', $noimage );	
	}
  *///========================================================================++ 
  //							 	  ШАГ 8 								  ||
  //==========================================================================++ 
  // открыть файл engine/modules/pm.php			     						  ||
  //--------------------------------------------------------------------------++
  // найти это код ...														  ||
  //--------------------------------------------------------------------------++
  // else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  ||
  //--------------------------------------------------------------------------++  
  // заменить на это 														  ||
  /* -------------------------------------------------------------------------++
	else 
	{
		$noimage = new no_image();
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
		$tpl->set( '{foto}', $noimage );	
	}
  *///========================================================================++ 
	
	class no_image
	{	
		var $dir					 = '';		// Директория	
		var $format					 = '';	 	// Формат
		var $url_no_image 			 = '';		// Ссылка на no image
		var $url_no_image_to_group_1 = '';		// Ссылка на no image для первой группы
		var $name 					 = '';  	// Имя пользователья
		var $id 				     = '';		// id пользователья	(если разрешен отправлении запроса)		
		var $login					 = '';		// Логин пользователья (если хотите место имя использовать логин)
		var $login_use 				 = false;	// Разрешить/запретить использовании логина (если это включен то задайте логин)
		var $status 				 = false;	// Включить/отключить модуль (обязательно)
		var $quary 					 = false;	// Разрешить/запретить отправлении запроса 	
		
		function __construct()
		{
				global $db, $row, $config; 
				
				$this->db     = $db;     // Стандартная функция dle для отправлении запроса
				$this->row    = $row;	 // Массив с данными
				$this->config = $config; // Конфигурации DLE
				
				$this->dir = "/templates/" . $this->config['skin'] . "/dleimages/noimage/"; // директория по умолчание
				$this->format = "png"; // формат по умолчание
				
				if ($this->url_no_image_to_group_1 == "")				
					$this->url_no_image_to_group_1 = $this->url_no_image;
				
				if ($this->name == "" ) 				
					$this->name = $this->row['fullname'];	
			
				if ($this->login == "" ) 				
					$this->login = $this->row['name'];				
		}

		private function name_replace ($a)
		{
			// Посчитаем массив 
			$count = count($a);			
			// Если в массиве 2 или больше 2 то сделаем 1 
			if ($count >= 2) 
				$count = 1;			
			// Создаем массив
			$c = array();
			
			//
			for($i = 0; $i <= $count; $i++)
			{	
				// Удаляим пробелы 
				$b   = str_replace ( " ", "", $a[$i]);				
				// Удалим плобелы и переди и зади текста
				$b   = trim ( $b );				
				// Если текст на английском
				if ($b == convert_cyr_string ( $b, 'w', 'k' ) )
					// то выбераем один элемент
					$c[] = mb_substr ( $b, 0, 1 );
				else
					// если нет то 2 
					$c[] = mb_substr ( $b, 0, 2 );				 
			}
			// Объеденим массив
			$c = implode( "", $c );
			// Удалим плобелы (или другие символы) из начала конца строки
			$c = trim ( $c );		
			// выбераем 2 элемента текста
			$a = mb_substr ( $a[0], 0, 2 );
			// Если текст на английском
			if ($c == convert_cyr_string ( $c, 'w', 'k' ) )
				// то добавим 'english/' 
				$c = "english/" . $c;
			else
				// Если нет то ставим первую букву первого элемента массива
				$c = $a . "/" . $c;				
			// Приведем строки к нижнему регистру
			$c = mb_strtolower($c, $this->config["charset"]);
			// выводим результат
			return $c;			
		}
		
		private function search_no_image ()
		{	
			// Если включен модуль то продолжем
			if ($this->status == true)
			{	// Перейдем если разрешен отправит запрос
				if( $this->quary == true )
				{	// Отправим запрос на базу и получим их для дальнейшей обработки  
					$row2 = $this->db->super_query("SELECT name, fullname FROM " . PREFIX . "_users WHERE user_id=" . $this->id);
					// 
					$this->name  = $row2['fullname'];
					$this->login = $row2['name'];
					// 
					$this->db->close();
					//$this->db->free();
					
				}
				// Если переменная name пусто и для поиска noimage неразрешен использование login то продолжем
				if ( $this->name == null && $this->login_use == false) 
				{
					// Если noimage существует и он не пусто то ...
					if ( isset( $this->url_no_image ) && $this->url_no_image !=  "")
					
						$result = $this->url_no_image;					
					
					else
					// Если noimage для первой группы задан то продолжем ... 
					if (isset( $this->url_no_image_to_group_1 ) && $this->url_no_image_to_group_1 !=  "" && $this->row[user_group] == 1 )
						
						$result = $this->url_no_image_to_group_1;		
					
					else
					// Если ни один из условии не выполнено
						$result = "/templates/" . $this->config['skin'] . "/dleimages/noavatar.png";
					
				}
				
				else
					
				{	// Если name существует и запрещен использовании логин то ...			
					if ( isset( $this->name ) && $this->login_use == false) 
					{
						$this->name = explode (" ", $this->name);
						$this->name = $this->name_replace( $this->name );	
						$result =  $this->dir . $this->name . "." . $this->format ;
					}
					
					else
					
					if ( isset( $this->login ) && $this->login_use == true) 
					{
						$this->login = explode (" ", $this->login);
						$this->login = $this->name_replace( $this->login );
						$result =  $this->dir . $this->login . "." . $this->format ;			
						
					}			
				}		
			}
			else // no image если ни один из условии не выполнены
				$result = "/templates/" . $this->config['skin'] . "/dleimages/noavatar.png";
			// выводим результат
			return $result;		
			
		}
		
		public function run_noimage ()
		{	// запускаем функции 
			return $this->search_no_image();
		}
		
	}
	//$noimage = new no_image();
?>
#ОПИСАНИЕ                                   
  
  Не большой модуль который сделает ваши noavata`ы еще красивее то есть, модуль берет имя и фамилия (если оно есть) вашего пользователья, разберет на части и возьмет только первые буквы и из них делает noimage, например:  если вашего пользователья зовут Антон Петрович то модуль берет букву "А" и букву "П" и открывает noimage с этими буквами. 	          
  Еще примеры:   														  
  Зовут пользователя Иван Иванович - ИИ, Сергей Щукин - СЩ.	Если вы задаете вопрос, если поля имя у  пользователся пусто что  модуль будет делать ? Если поля пусто то модуль вставить стандартный noavatar   
 
#ИНСТРУКЦИЯ API                                
  
  <b>$this->dir</b> - задается директория до картинок с буквами, по умолчание это 
  /templates/ваш шаблон/dleimages/noimage/, чтобы изменить ставьте тут дру-
  гую директорию															  		
 
  Пример 															      
  
  		$noimage = new no_image();
	  + --------------------------------------------------- +
	  | <b>$noimage->dir = "/templates/ваш шаблон/dleimages/";</b>	|
	  + --------------------------------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  
 <b> $this->format</b> - задается формат картинок, по умолчание это png. Если у   
  вас картинки в другом формате то модете это изменить 					  
 
  Пример 															      
  
  		$noimage = new no_image();
	  + ------------------------- +
	  | $noimage->format = "jpg"; |
	  + ------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  
  <b>$this->url_no_image</b> и <b>$this->url_no_image_to_group_1</b> - ссылка на noavatar
  если у пользователя поля имя пусто и не разрещен использовании логина 	  
  то модуля автоматический берет эту ссылку и ставить. 					  
  если $this->url_no_image_to_group_1 не задана то автоматический берется  
  данные с $this->url_no_image.											  
  что такое $this->url_no_image_to_group_1 ? это отдельная  ссылка  на от- 
  ельного аватара для зользрвавтели первой группы 						  
 
  Пример 															      
  
  		$noimage = new no_image();
	  + ---------------------------------------------------------------------- +
	  | $noimage->url_no_image_to_group_1 = "/templates/Green/dleimages.png";  |
	  | $noimage->url_no_image = "/templates/Green/dleimages/noimage.png";     |		   
	  + ---------------------------------------------------------------------- +	
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  
  <b>$this->name</b> - можно отправить имя через это параметр, если в функции где 
  где используется модуль, массив с данными не через $row или  модуль  по  
  каким-то причинам не может хватит это массив то можно эти данные отправить|
  сами. Можно использовать в цикле. 
 
  Пример 															      
  
  		$noimage = new no_image();
	  + ---------------------------------------- +
	  | $noimage->name = 'Иван иванович'; 		 | или
	  + ---------------------------------------- +
	  | $noimage->name = $member_id['fullname']; |
	  + ---------------------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  
  <b>$this->quary</b> - если вам необходимо внутри модуля отправить запрос и полу-
  чить необходимые данные. Можно отправить только, false и true, если true 
  то нужно еще отправить id ($this->id) чтобы модуль отправил запрос.  	  
 
  Пример 															      
  
  		$noimage = new no_image();
	  + -------------------------------- +
	  | $noimage->quary = true; 		 | если false то модуль не отправить запрос
	  | $noimage->id = $member_id['id']; | или
	  + -------------------------------- +	  
	  | $noimage->id = 3; 				 |  
	  + -------------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  
  <b>$this->login</b> - Это параметр получает логин пользователся, но для  того   
  чтобы использовать логин надо еще разрешить использование логина, для    
  этого нужно прописать параметр $this->login_use = true; 
 
  Пример 															      
  
  		$noimage = new no_image();
	  + ----------------------------------- +
	  | $noimage->login_use = true; 		| если false то модуль не будет использовать логин
	  | $noimage->login = $member_id['id']; | или
	  + ----------------------------------- +	  
	  | $noimage->login = "oxxxiss"; 		|  
	  + ----------------------------------- +
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
  
  
  <b>$this->status</b> - включает отключает модуль (обязательный параметр).       
 
  Пример 															      
  
  		$noimage = new no_image();
	  + ------------------------ +	  
	  | $noimage->status = true; |  
	  + ------------------------ +					
		$noimage = $noimage->run_noimage();
  
  
   
  
  
  				               УСТАНОВКА                                  
  
#ШАГ 1 								  
 
  Залейте все файлы на сервер 											  

  открыть файл engine/modules/profile.php								  
  
  найти это код ...														  
  
  else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  
    
  заменить на это 														  

    else 
	{
		$noimage = new no_image();
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
		$tpl->set( '{foto}', $noimage );	
	}
 
#ШАГ 2 								  

  открыть файл engine/init.php								     		  
  
  найти это код ...														  
  
  require_once ENGINE_DIR . '/modules/functions.php';					  
    
  ниже ставить это 														  

	require_once ENGINE_DIR . '/classes/noimage.class.php';
	$noimage = new no_image();
	$noimage->status = true;	
 
#ШАГ 3 								  

  найти это код ...														  
  
  else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  
    
  заменить на это 														  

    else 
	{
		$noimage->name = $member_id['fullname'];
		$noimage = $noimage->run_noimage();
		$tpl->set( '{foto}', $noimage );
	}
 
 #ШАГ 4 								    

  найти это код ...														  
  
  $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );				  
    
  заменить на это 														  

	$noimage->name = $member_id['fullname'];
	$noimage = $noimage->run_noimage();
	$tpl->set( '{foto}', $noimage );
 
#ШАГ 5 								  

  открыть файл engine/ajax/profile.php						     		  
  
  найти это код ...			  											  
  
  require_once ENGINE_DIR . '/classes/mysql.php';						  
    
  ниже ставить это 														  
    
  require_once ENGINE_DIR . '/classes/noimage.class.php';				  
 
#ШАГ 6 								  
  
  найти это код ...			  											  
  
  else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  
    
  заменить на это 														  

    else 
	{
		$noimage = new no_image();
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
		$tpl->set( '{foto}', $noimage );	
	}
 
#ШАГ 7 								  

  открыть файл engine/classes/comments.class.php				     		  
  
  найти это код ...			  											  
  
  else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  
    
  заменить на это 														  

	else 
	{
	  include_once (ENGINE_DIR . "/classes/noimage.class.php");
	  $noimage = new no_image();
	  $noimage->status = true;			
	  $noimage->name = $row['fullname'];			
	  $noimage = $noimage->run_noimage();
	  $tpl->set( '{foto}', $noimage );	
	}
 
#ШАГ 8 								  
 
  открыть файл engine/modules/pm.php			     						  
  
  найти это код ...														  
  
  else $tpl->set( '{foto}', "{THEME}/dleimages/noavatar.png" );			  
    
  заменить на это 														  

	else 
	{
		$noimage = new no_image();
		$noimage->status = true;			
		$noimage = $noimage->run_noimage();
		$tpl->set( '{foto}', $noimage );	
	}
 

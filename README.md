<img src="https://github.com/oxxxiss/noavatar/blob/master/noimage.png">

#ОПИСАНИЕ                                   
  
  Не большой модуль который сделает ваши noavata`ы еще красивее то есть, модуль берет имя и фамилия (если оно есть) вашего пользователья, разберет на части и возьмет только первые буквы и из них делает noimage, например:  если вашего пользователья зовут Антон Петрович то модуль берет букву "А" и букву "П" и открывает noimage с этими буквами. 	          
  Еще примеры:   														  
  Зовут пользователя Иван Иванович - ИИ, Сергей Щукин - СЩ.	Если вы задаете вопрос, если поля имя у  пользователся пусто что  модуль будет делать ? Если поля пусто то модуль вставить стандартный noavatar   
 
# НА ЧИПСЫ
1. Qiwi: +79994768647
2. WM: R246895222292 , Z869848337718  
  
#УСТАНОВКА                                  
  
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
 

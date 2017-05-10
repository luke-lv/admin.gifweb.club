<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

//整体hook安全检测开关
$config ['hook_safe_check'] = array (
		'do_check'					=> true,			//true则为执行检测，false则不执行检测
);

//需要鉴权的单项
$config ['project_need_check'] = array (
	'is_on'					=> false,			//是否开启项目指定模式 true开启指定目录才检测，false则所有均检测
	'project_list'			=> array(
		//'mall97973',					//973商城测试
		//'mall97973',
	),

);

//不进行鉴权路径配置
$config ['privilege_acc'] = array (
	'admin/auth/login',									//登录页不需要鉴权
    'glapp/script', 			// CI_Controller
    'glapp/script/update_user_question_answer_count', 	// CI_Controller
    'glapp/script/push_message_to_user', 				// CI_Controller
    'glapp/script/auto_sync_article', 					// CI_Controller
    'glapp/script/sync_game_article_count', 			// CI_Controller
    'glapp/script/push_message', 						// CI_Controller
    'glapp/script/generate_user_message', 				// CI_Controller
   
	'admin/index/public_current_pos',						//后台接口






);












/* End of file task_config.php */
/* Location: ./config/task_config.php */

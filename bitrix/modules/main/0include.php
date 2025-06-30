initializeExtendedKernel([ "get" =&gt; $_GET, "post" =&gt; $_POST, "files" =&gt; $_FILES, "cookie" =&gt; $_COOKIE, "server" =&gt; $_SERVER, "env" =&gt; $_ENV ]); if (defined('SITE_ID')) { define('LANG', SITE_ID); } use Bitrix\Main\Application;<br>
$application = Application::getInstance();&nbsp;$context = $application-&gt;getContext();
$context-&gt;initializeCulture(defined('LANG') ? LANG : null, defined('LANGUAGE_ID') ? LANGUAGE_ID : null);
// needs to be after culture initialization
$application-&gt;start();
// constants for compatibility
$culture = $context-&gt;getCulture();
define('SITE_CHARSET', $culture-&gt;getCharset());
define('FORMAT_DATE', $culture-&gt;getFormatDate());
define('FORMAT_DATETIME', $culture-&gt;getFormatDatetime());
define('LANG_CHARSET', SITE_CHARSET);
$site = $context-&gt;getSiteObject();
if (!defined('LANG'))
{
	define('LANG', ($site ? $site-&gt;getLid() : $context-&gt;getLanguage()));
}
define('SITE_DIR', ($site ? $site-&gt;getDir() : ''));
if (!defined('SITE_SERVER_NAME'))
{
	define('SITE_SERVER_NAME', ($site ? $site-&gt;getServerName() : ''));
}
define('LANG_DIR', SITE_DIR);
if (!defined('LANGUAGE_ID'))
{
	define('LANGUAGE_ID', $context-&gt;getLanguage());
}
define('LANG_ADMIN_LID', LANGUAGE_ID);
if (!defined('SITE_ID'))
{
	define('SITE_ID', LANG);
}
/** @global $lang */
$lang = $context-&gt;getLanguage();
//define global application object
$GLOBALS["APPLICATION"] = new CMain;
if (!defined("POST_FORM_ACTION_URI"))
{
	define("POST_FORM_ACTION_URI", htmlspecialcharsbx(GetRequestUri()));
}
$GLOBALS["MESS"] = [];
$GLOBALS["ALL_LANG_FILES"] = [];
IncludeModuleLangFile(__DIR__."/tools.php");
IncludeModuleLangFile(__FILE__);
error_reporting(COption::GetOptionInt("main", "error_reporting", E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR | E_PARSE) &amp; ~E_STRICT &amp; ~E_DEPRECATED &amp; ~E_WARNING &amp; ~E_NOTICE);
if (!defined("BX_COMP_MANAGED_CACHE") &amp;&amp; COption::GetOptionString("main", "component_managed_cache_on", "Y") &lt;&gt; "N")
{
	define("BX_COMP_MANAGED_CACHE", true);
}
// global functions
require_once(__DIR__."/filter_tools.php");
define('BX_AJAX_PARAM_ID', 'bxajaxid');
/*ZDUyZmZZGRiMmE1ZDI0NGZkNjk0ZTNmOGMwYjdlZDJhNDI5OTU=*/class CBXFeatures{ public static function IsFeatureEnabled($_1615425930){ return true;} public static function IsFeatureEditable($_1615425930){ return true;} public static function SetFeatureEnabled($_1615425930, $_1300064665= true){} public static function SaveFeaturesSettings($_1987389905, $_1152705482){} public static function GetFeaturesList(){ return array();} public static function InitiateEditionsSettings($_1409898755){} public static function ModifyFeaturesSettings($_1409898755, $_1340166902){} public static function IsFeatureInstalled($_1615425930){ return true;}}/**/			//Do not remove this
require_once(__DIR__."/autoload.php");
// Component 2.0 template engines
$GLOBALS['arCustomTemplateEngines'] = [];
// User fields manager
$GLOBALS['USER_FIELD_MANAGER'] = new CUserTypeManager;
// todo: remove global
$GLOBALS['BX_MENU_CUSTOM'] = CMenuCustom::getInstance();
if (file_exists(($_fname = __DIR__."/classes/general/update_db_updater.php")))
{
	$US_HOST_PROCESS_MAIN = false;
	include($_fname);
}
if (file_exists(($_fname = $_SERVER["DOCUMENT_ROOT"]."/bitrix/init.php")))
{
	include_once($_fname);
}
if (($_fname = getLocalPath("php_interface/init.php", BX_PERSONAL_ROOT)) !== false)
{
	include_once($_SERVER["DOCUMENT_ROOT"].$_fname);
}
if (($_fname = getLocalPath("php_interface/".SITE_ID."/init.php", BX_PERSONAL_ROOT)) !== false)
{
	include_once($_SERVER["DOCUMENT_ROOT"].$_fname);
}
if (!defined("BX_FILE_PERMISSIONS"))
{
	define("BX_FILE_PERMISSIONS", 0644);
}
if (!defined("BX_DIR_PERMISSIONS"))
{
	define("BX_DIR_PERMISSIONS", 0755);
}
//global var, is used somewhere
$GLOBALS["sDocPath"] = $GLOBALS["APPLICATION"]-&gt;GetCurPage();
if ((!(defined("STATISTIC_ONLY") &amp;&amp; STATISTIC_ONLY &amp;&amp; mb_substr($GLOBALS["APPLICATION"]-&gt;GetCurPage(), 0, mb_strlen(BX_ROOT."/admin/")) != BX_ROOT."/admin/")) &amp;&amp; COption::GetOptionString("main", "include_charset", "Y")=="Y" &amp;&amp; LANG_CHARSET &lt;&gt; '')
{
	header("Content-Type: text/html; charset=".LANG_CHARSET);
}
if (COption::GetOptionString("main", "set_p3p_header", "Y")=="Y")
{
	header("P3P: policyref=\"/bitrix/p3p.xml\", CP=\"NON DSP COR CUR ADM DEV PSA PSD OUR UNR BUS UNI COM NAV INT DEM STA\"");
}
$license = $application-&gt;getLicense();
header("X-Powered-CMS: Bitrix Site Manager (" . ($license-&gt;isDemoKey() ? "DEMO" : $license-&gt;getPublicHashKey()) . ")");
if (COption::GetOptionString("main", "update_devsrv", "") == "Y")
{
	header("X-DevSrv-CMS: Bitrix");
}
if (!defined("BX_CRONTAB_SUPPORT"))
{
	define("BX_CRONTAB_SUPPORT", defined("BX_CRONTAB"));
}
//agents
if (COption::GetOptionString("main", "check_agents", "Y") == "Y")
{
	$application-&gt;addBackgroundJob(["CAgent", "CheckAgents"], [], \Bitrix\Main\Application::JOB_PRIORITY_LOW);
}
//send email events
if (COption::GetOptionString("main", "check_events", "Y") !== "N")
{
	$application-&gt;addBackgroundJob(['\Bitrix\Main\Mail\EventManager', 'checkEvents'], [], \Bitrix\Main\Application::JOB_PRIORITY_LOW-1);
}
$healerOfEarlySessionStart = new HealerEarlySessionStart();
$healerOfEarlySessionStart-&gt;process($application-&gt;getKernelSession());
$kernelSession = $application-&gt;getKernelSession();
$kernelSession-&gt;start();
$application-&gt;getSessionLocalStorageManager()-&gt;setUniqueId($kernelSession-&gt;getId());
foreach (GetModuleEvents("main", "OnPageStart", true) as $arEvent)
{
	ExecuteModuleEventEx($arEvent);
}
//define global user object
$GLOBALS["USER"] = new CUser;
//session control from group policy
$arPolicy = $GLOBALS["USER"]-&gt;GetSecurityPolicy();
$currTime = time();
if (
	(
		//IP address changed
		$kernelSession['SESS_IP']
		&amp;&amp; $arPolicy["SESSION_IP_MASK"] &lt;&gt; ''
		&amp;&amp; (
			(ip2long($arPolicy["SESSION_IP_MASK"]) &amp; ip2long($kernelSession['SESS_IP']))
			!=
			(ip2long($arPolicy["SESSION_IP_MASK"]) &amp; ip2long($_SERVER['REMOTE_ADDR']))
		)
	)
	||
	(
		//session timeout
		$arPolicy["SESSION_TIMEOUT"]&gt;0
		&amp;&amp; $kernelSession['SESS_TIME']&gt;0
		&amp;&amp; $currTime-$arPolicy["SESSION_TIMEOUT"]*60 &gt; $kernelSession['SESS_TIME']
	)
	||
	(
		//signed session
		isset($kernelSession["BX_SESSION_SIGN"])
		&amp;&amp; $kernelSession["BX_SESSION_SIGN"] &lt;&gt; bitrix_sess_sign()
	)
	||
	(
		//session manually expired, e.g. in $User-&gt;LoginHitByHash
		isSessionExpired()
	)
)
{
	$compositeSessionManager = $application-&gt;getCompositeSessionManager();
	$compositeSessionManager-&gt;destroy();
	$application-&gt;getSession()-&gt;setId(Main\Security\Random::getString(32));
	$compositeSessionManager-&gt;start();
	$GLOBALS["USER"] = new CUser;
}
$kernelSession['SESS_IP'] = $_SERVER['REMOTE_ADDR'];
if (empty($kernelSession['SESS_TIME']))
{
	$kernelSession['SESS_TIME'] = $currTime;
}
elseif (($currTime - $kernelSession['SESS_TIME']) &gt; 60)
{
	$kernelSession['SESS_TIME'] = $currTime;
}
if (!isset($kernelSession["BX_SESSION_SIGN"]))
{
	$kernelSession["BX_SESSION_SIGN"] = bitrix_sess_sign();
}
//session control from security module
if (
	(COption::GetOptionString("main", "use_session_id_ttl", "N") == "Y")
	&amp;&amp; (COption::GetOptionInt("main", "session_id_ttl", 0) &gt; 0)
	&amp;&amp; !defined("BX_SESSION_ID_CHANGE")
)
{
	if (!isset($kernelSession['SESS_ID_TIME']))
	{
		$kernelSession['SESS_ID_TIME'] = $currTime;
	}
	elseif (($kernelSession['SESS_ID_TIME'] + COption::GetOptionInt("main", "session_id_ttl")) &lt; $kernelSession['SESS_TIME'])
	{
		$compositeSessionManager = $application-&gt;getCompositeSessionManager();
		$compositeSessionManager-&gt;regenerateId();
		$kernelSession['SESS_ID_TIME'] = $currTime;
	}
}
define("BX_STARTED", true);
if (isset($kernelSession['BX_ADMIN_LOAD_AUTH']))
{
	define('ADMIN_SECTION_LOAD_AUTH', 1);
	unset($kernelSession['BX_ADMIN_LOAD_AUTH']);
}
$bRsaError = false;
$USER_LID = false;
if (!defined("NOT_CHECK_PERMISSIONS") || NOT_CHECK_PERMISSIONS!==true)
{
	$doLogout = isset($_REQUEST["logout"]) &amp;&amp; (strtolower($_REQUEST["logout"]) == "yes");
	if ($doLogout &amp;&amp; $GLOBALS["USER"]-&gt;IsAuthorized())
	{
		$secureLogout = (\Bitrix\Main\Config\Option::get("main", "secure_logout", "N") == "Y");
		if (!$secureLogout || check_bitrix_sessid())
		{
			$GLOBALS["USER"]-&gt;Logout();
			LocalRedirect($GLOBALS["APPLICATION"]-&gt;GetCurPageParam('', array('logout', 'sessid')));
		}
	}
	// authorize by cookies
	if (!$GLOBALS["USER"]-&gt;IsAuthorized())
	{
		$GLOBALS["USER"]-&gt;LoginByCookies();
	}
	$arAuthResult = false;
	//http basic and digest authorization
	if (($httpAuth = $GLOBALS["USER"]-&gt;LoginByHttpAuth()) !== null)
	{
		$arAuthResult = $httpAuth;
		$GLOBALS["APPLICATION"]-&gt;SetAuthResult($arAuthResult);
	}
	//Authorize user from authorization html form
	//Only POST is accepted
	if (isset($_POST["AUTH_FORM"]) &amp;&amp; $_POST["AUTH_FORM"] &lt;&gt; '')
	{
		if (COption::GetOptionString('main', 'use_encrypted_auth', 'N') == 'Y')
		{
			//possible encrypted user password
			$sec = new CRsaSecurity();
			if (($arKeys = $sec-&gt;LoadKeys()))
			{
				$sec-&gt;SetKeys($arKeys);
				$errno = $sec-&gt;AcceptFromForm(['USER_PASSWORD', 'USER_CONFIRM_PASSWORD', 'USER_CURRENT_PASSWORD']);
				if ($errno == CRsaSecurity::ERROR_SESS_CHECK)
				{
					$arAuthResult = array("MESSAGE"=&gt;GetMessage("main_include_decode_pass_sess"), "TYPE"=&gt;"ERROR");
				}
				elseif ($errno &lt; 0)
				{
					$arAuthResult = array("MESSAGE"=&gt;GetMessage("main_include_decode_pass_err", array("#ERRCODE#"=&gt;$errno)), "TYPE"=&gt;"ERROR");
				}
				if ($errno &lt; 0)
				{
					$bRsaError = true;
				}
			}
		}
		if (!$bRsaError)
		{
			if (!defined("ADMIN_SECTION") || ADMIN_SECTION !== true)
			{
				$USER_LID = SITE_ID;
			}
			$_POST["TYPE"] = $_POST["TYPE"] ?? null;
			if (isset($_POST["TYPE"]) &amp;&amp; $_POST["TYPE"] == "AUTH")
			{
				$arAuthResult = $GLOBALS["USER"]-&gt;Login(
					$_POST["USER_LOGIN"] ?? '',
					$_POST["USER_PASSWORD"] ?? '',
					$_POST["USER_REMEMBER"] ?? ''
				);
			}
			elseif (isset($_POST["TYPE"]) &amp;&amp; $_POST["TYPE"] == "OTP")
			{
				$arAuthResult = $GLOBALS["USER"]-&gt;LoginByOtp(
					$_POST["USER_OTP"] ?? '',
					$_POST["OTP_REMEMBER"] ?? '',
					$_POST["captcha_word"] ?? '',
					$_POST["captcha_sid"] ?? ''
				);
			}
			elseif (isset($_POST["TYPE"]) &amp;&amp; $_POST["TYPE"] == "SEND_PWD")
			{
				$arAuthResult = CUser::SendPassword(
					$_POST["USER_LOGIN"] ?? '',
					$_POST["USER_EMAIL"] ?? '',
					$USER_LID,
					$_POST["captcha_word"] ?? '',
					$_POST["captcha_sid"] ?? '',
					$_POST["USER_PHONE_NUMBER"] ?? ''
				);
			}
			elseif (isset($_POST["TYPE"]) &amp;&amp; $_POST["TYPE"] == "CHANGE_PWD")
			{
				$arAuthResult = $GLOBALS["USER"]-&gt;ChangePassword(
					$_POST["USER_LOGIN"] ?? '',
					$_POST["USER_CHECKWORD"] ?? '',
					$_POST["USER_PASSWORD"] ?? '',
					$_POST["USER_CONFIRM_PASSWORD"] ?? '',
					$USER_LID,
					$_POST["captcha_word"] ?? '',
					$_POST["captcha_sid"] ?? '',
					true,
					$_POST["USER_PHONE_NUMBER"] ?? '',
					$_POST["USER_CURRENT_PASSWORD"] ?? ''
				);
			}
			if ($_POST["TYPE"] == "AUTH" || $_POST["TYPE"] == "OTP")
			{
				//special login form in the control panel
				if ($arAuthResult === true &amp;&amp; defined('ADMIN_SECTION') &amp;&amp; ADMIN_SECTION === true)
				{
					//store cookies for next hit (see CMain::GetSpreadCookieHTML())
					$GLOBALS["APPLICATION"]-&gt;StoreCookies();
					$kernelSession['BX_ADMIN_LOAD_AUTH'] = true;
					// die() follows
					CMain::FinalActions('<script type="text/javascript">window.onload=function(){(window.BX || window.parent.BX).AUTHAGENT.setAuthResult(false);};</script>');
				}
			}
		}
		$GLOBALS["APPLICATION"]-&gt;SetAuthResult($arAuthResult);
	}
	elseif (!$GLOBALS["USER"]-&gt;IsAuthorized() &amp;&amp; isset($_REQUEST['bx_hit_hash']))
	{
		//Authorize by unique URL
		$GLOBALS["USER"]-&gt;LoginHitByHash($_REQUEST['bx_hit_hash']);
	}
}
//logout or re-authorize the user if something importand has changed
$GLOBALS["USER"]-&gt;CheckAuthActions();
//magic short URI
if (defined("BX_CHECK_SHORT_URI") &amp;&amp; BX_CHECK_SHORT_URI &amp;&amp; CBXShortUri::CheckUri())
{
	//local redirect inside
	die();
}
//application password scope control
if (($applicationID = $GLOBALS["USER"]-&gt;getContext()-&gt;getApplicationId()) !== null)
{
	$appManager = Main\Authentication\ApplicationManager::getInstance();
	if ($appManager-&gt;checkScope($applicationID) !== true)
	{
		$event = new Main\Event("main", "onApplicationScopeError", Array('APPLICATION_ID' =&gt; $applicationID));
		$event-&gt;send();
		$context-&gt;getResponse()-&gt;setStatus("403 Forbidden");
		$application-&gt;end();
	}
}
//define the site template
if (!defined("ADMIN_SECTION") || ADMIN_SECTION !== true)
{
	$siteTemplate = "";
	if (isset($_REQUEST["bitrix_preview_site_template"]) &amp;&amp; is_string($_REQUEST["bitrix_preview_site_template"]) &amp;&amp; $_REQUEST["bitrix_preview_site_template"] &lt;&gt; "" &amp;&amp; $GLOBALS["USER"]-&gt;CanDoOperation('view_other_settings'))
	{
		//preview of site template
		$signer = new Bitrix\Main\Security\Sign\Signer();
		try
		{
			//protected by a sign
			$requestTemplate = $signer-&gt;unsign($_REQUEST["bitrix_preview_site_template"], "template_preview".bitrix_sessid());
			$aTemplates = CSiteTemplate::GetByID($requestTemplate);
			if ($template = $aTemplates-&gt;Fetch())
			{
				$siteTemplate = $template["ID"];
				//preview of unsaved template
				if (isset($_GET['bx_template_preview_mode']) &amp;&amp; $_GET['bx_template_preview_mode'] == 'Y' &amp;&amp; $GLOBALS["USER"]-&gt;CanDoOperation('edit_other_settings'))
				{
					define("SITE_TEMPLATE_PREVIEW_MODE", true);
				}
			}
		}
		catch(\Bitrix\Main\Security\Sign\BadSignatureException $e)
		{
		}
	}
	if ($siteTemplate == "")
	{
		$siteTemplate = CSite::GetCurTemplate();
	}
	if (!defined('SITE_TEMPLATE_ID'))
	{
		define("SITE_TEMPLATE_ID", $siteTemplate);
	}
	define("SITE_TEMPLATE_PATH", getLocalPath('templates/'.SITE_TEMPLATE_ID, BX_PERSONAL_ROOT));
}
else
{
	// prevents undefined constants
	if (!defined('SITE_TEMPLATE_ID'))
	{
		define('SITE_TEMPLATE_ID', '.default');
	}
	define('SITE_TEMPLATE_PATH', '/bitrix/templates/.default');
}
//magic parameters: show page creation time
if (isset($_GET["show_page_exec_time"]))
{
	if ($_GET["show_page_exec_time"]=="Y" || $_GET["show_page_exec_time"]=="N")
	{
		$kernelSession["SESS_SHOW_TIME_EXEC"] = $_GET["show_page_exec_time"];
	}
}
//magic parameters: show included file processing time
if (isset($_GET["show_include_exec_time"]))
{
	if ($_GET["show_include_exec_time"]=="Y" || $_GET["show_include_exec_time"]=="N")
	{
		$kernelSession["SESS_SHOW_INCLUDE_TIME_EXEC"] = $_GET["show_include_exec_time"];
	}
}
//magic parameters: show include areas
if (isset($_GET["bitrix_include_areas"]) &amp;&amp; $_GET["bitrix_include_areas"] &lt;&gt; "")
{
	$GLOBALS["APPLICATION"]-&gt;SetShowIncludeAreas($_GET["bitrix_include_areas"]=="Y");
}
//magic sound
if ($GLOBALS["USER"]-&gt;IsAuthorized())
{
	$cookie_prefix = COption::GetOptionString('main', 'cookie_name', 'BITRIX_SM');
	if (!isset($_COOKIE[$cookie_prefix.'_SOUND_LOGIN_PLAYED']))
	{
		$GLOBALS["APPLICATION"]-&gt;set_cookie('SOUND_LOGIN_PLAYED', 'Y', 0);
	}
}
//magic cache
\Bitrix\Main\Composite\Engine::shouldBeEnabled();
// should be before proactive filter on OnBeforeProlog
$userPassword = $_POST["USER_PASSWORD"] ?? null;
$userConfirmPassword = $_POST["USER_CONFIRM_PASSWORD"] ?? null;
foreach(GetModuleEvents("main", "OnBeforeProlog", true) as $arEvent)
{
	ExecuteModuleEventEx($arEvent);
}
if (!defined("NOT_CHECK_PERMISSIONS") || NOT_CHECK_PERMISSIONS !== true)
{
	//Register user from authorization html form
	//Only POST is accepted
	if (isset($_POST["AUTH_FORM"]) &amp;&amp; $_POST["AUTH_FORM"] != '' &amp;&amp; isset($_POST["TYPE"]) &amp;&amp; $_POST["TYPE"] == "REGISTRATION")
	{
		if (!$bRsaError)
		{
			if (COption::GetOptionString("main", "new_user_registration", "N") == "Y" &amp;&amp; (!defined("ADMIN_SECTION") || ADMIN_SECTION !== true))
			{
				$arAuthResult = $GLOBALS["USER"]-&gt;Register(
					$_POST["USER_LOGIN"] ?? '',
					$_POST["USER_NAME"] ?? '',
					$_POST["USER_LAST_NAME"] ?? '',
					$userPassword,
					$userConfirmPassword,
					$_POST["USER_EMAIL"] ?? '',
					$USER_LID,
					$_POST["captcha_word"] ?? '',
					$_POST["captcha_sid"] ?? '',
					false,
					$_POST["USER_PHONE_NUMBER"] ?? ''
				);
				$GLOBALS["APPLICATION"]-&gt;SetAuthResult($arAuthResult);
			}
		}
	}
}
if ((!defined("NOT_CHECK_PERMISSIONS") || NOT_CHECK_PERMISSIONS!==true) &amp;&amp; (!defined("NOT_CHECK_FILE_PERMISSIONS") || NOT_CHECK_FILE_PERMISSIONS!==true))
{
	$real_path = $context-&gt;getRequest()-&gt;getScriptFile();
	if (!$GLOBALS["USER"]-&gt;CanDoFileOperation('fm_view_file', array(SITE_ID, $real_path)) || (defined("NEED_AUTH") &amp;&amp; NEED_AUTH &amp;&amp; !$GLOBALS["USER"]-&gt;IsAuthorized()))
	{
		if ($GLOBALS["USER"]-&gt;IsAuthorized() &amp;&amp; $arAuthResult["MESSAGE"] == '')
		{
			$arAuthResult = array("MESSAGE"=&gt;GetMessage("ACCESS_DENIED").' '.GetMessage("ACCESS_DENIED_FILE", array("#FILE#"=&gt;$real_path)), "TYPE"=&gt;"ERROR");
			if (COption::GetOptionString("main", "event_log_permissions_fail", "N") === "Y")
			{
				CEventLog::Log("SECURITY", "USER_PERMISSIONS_FAIL", "main", $GLOBALS["USER"]-&gt;GetID(), $real_path);
			}
		}
		if (defined("ADMIN_SECTION") &amp;&amp; ADMIN_SECTION==true)
		{
			if (isset($_REQUEST["mode"]) &amp;&amp; ($_REQUEST["mode"] === "list" || $_REQUEST["mode"] === "settings"))
			{
				echo "<script>top.location='".$GLOBALS["APPLICATION"]->GetCurPage()."?".DeleteParam(array("mode"))."';</script>";
				die();
			}
			elseif (isset($_REQUEST["mode"]) &amp;&amp; $_REQUEST["mode"] === "frame")
			{
				echo "<script type=\"text/javascript\">
					var w = (opener? opener.window:parent.window);
					w.location.href='".$GLOBALS["APPLICATION"]->GetCurPage()."?".DeleteParam(array("mode"))."';
				</script>";
				die();
			}
			elseif (defined("MOBILE_APP_ADMIN") &amp;&amp; MOBILE_APP_ADMIN==true)
			{
				echo json_encode(Array("status"=&gt;"failed"));
				die();
			}
		}
		/** @noinspection PhpUndefinedVariableInspection */
		$GLOBALS["APPLICATION"]-&gt;AuthForm($arAuthResult);
	}
}
       //Do not remove this
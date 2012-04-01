<?php
/*
 * @author Sergey Nehaenko <sergey.nekhaenko@gmail.com> <nekhaenko.ru>
 * @version 1.0
 * @release_date 31.03.2012
 */
class browser
{
	public $browser;
	public function __construct()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		echo $ua.'<br>';
		/* pattern part start */
		$iphone = "/iPhone/"; /* iPhone device */
		$ipad = "/iPad/"; /* iPad device */
		$ipod = "/iPod/"; /* iPod device */
		$android = "/Android/"; /* Google Android device */
		$black_berry = "/BlackBerry/"; /* Black Berry mobile device */
		$opera_mini = "/Opera Mini/"; /* Opera Mini mobile Browser */
		$opera_mobile = "/Opera Mobi/"; /* Opera Mobile mobile Browser */
		$opera = "/Opera/"; /* Opera Browser */
		$s60 = "/S60/"; /* Nokia S60 */
		$mozilla_firefox = "/Firefox/"; /* Mozilla Firefox desctop Browser */
		$google_chrome = "/Chrome/"; /* Google Chrome desctop browser */
		$chromium = "/Chromium/"; /* Chromium desctop browser */
		$safari = "/Safari/"; /* Apple Safari desctop browser */
		/* pattern part stop */
		
		/* detect type part start */
		
		if(preg_match($ipod,$ua))
		{
			/* iPod device */
			$this->browser['device'] = 'iPod';
			$this->get_safari_mobile();
			$this->get_opera_mobile();
			$this->get_opera_mini();
		}
		else
		if(preg_match($ipad,$ua))
		{
			/* iPad device */
			$this->browser['device'] = 'iPad';
			$this->get_safari_mobile();
			$this->get_opera_mobile();
			$this->get_opera_mini();
		}
		else
		if(preg_match($iphone,$ua))
		{
			/* iPhone device */
			$this->browser['device'] = 'iPhone';
			$this->get_safari_mobile();
			$this->get_opera_mobile();
			$this->get_opera_mini();
		}
		else
		if(preg_match($android,$ua))
		{
			/* Android device */
			$this->browser['device'] = 'Android';
			$this->get_safari_mobile();
			$this->get_opera_mobile();
			$this->get_opera_mini();
		}
		else
		if(preg_match($black_berry,$ua))
		{
			/* Black Berry Device */
			$this->browser['device'] = 'Black Berry';
		}
		else
		if(preg_match($s60,$ua))
		{
			/* Nokia S60 */
			$this->browser['device'] = 'Nokia S60';
			$this->get_opera_mini();
			$this->get_opera_mobile();
		}
		else
		if(preg_match($opera_mini,$ua))
		{
			/* Opera Mini Device */
			$this->browser['device'] = 'Opera Mini';
			$this->get_opera_mini();
		}
		else
		if(preg_match($opera_mobile,$ua))
		{
			/* Opera Mobile Device */
			$this->browser['device'] = 'Opera Mibile';
			$this->get_opera_mobile();
		}
		else
		if(preg_match($opera,$ua))
		{
			/* Opera Browser desctop */
			$this->browser['device'] = 'PC';
			$this->get_opera_desctop();
		}
		else
		if(preg_match($mozilla_firefox,$ua))
		{
			/* Mozilla Firefox Browser desctop */
			$this->browser['device'] = 'PC';
			$this->get_firefox_desctop();
		}
		else
		if(preg_match($chromium,$ua))
		{
			$this->browser['device'] = 'PC';
			$this->get_chromium_desctop();
		}
		else
		if(preg_match($google_chrome,$ua))
		{
			/* Google Chrome Browser desctop */
			$this->browser['device'] = 'PC';
			$this->get_chrome_desctop();
		}
		else
		if(preg_match($safari,$ua))
		{
			$this->browser['device'] = 'PC';
			$this->get_safari();
		}
		
		$this->get_os();
		/* detect type part stop */
	}
	
	private function get_opera_desctop()
	{
		$this->browser['browser']['title'] = 'Opera';
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		$version = "/Version\/[0-9.]{1,8}/";
		preg_match($version,$ua,$v);
		$version = $v[0];
		$version = str_replace('Version/','',$version);
		$this->browser['browser']['version'] = $version;
	}
	private function get_opera_mobile()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match("/Opera Mobi/",$ua))
		{
			$this->browser['browser']['title'] = 'Opera Mobile';
			$version = "/Opera Mobi\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Opera Mobi/','',$version);
			$version = substr($version,0,1).'.'.substr($version,1,1);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_opera_mini()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match("/Opera Mini/",$ua))
		{
			$this->browser['browser']['title'] = 'Opera Mini';
			$version = "/Opera Mini\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Opera Mini/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_firefox_desctop()
	{
		$this->browser['browser']['title'] = 'Mozilla Firefox';
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		$version = "/Firefox\/[0-9.]{1,8}/";
		preg_match($version,$ua,$v);
		$version = $v[0];
		$version = str_replace('Firefox/','',$version);
		$this->browser['browser']['version'] = $version;
	}
	private function get_chrome_desctop()
	{
		$this->browser['browser']['title'] = 'Google Chrome';
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		$version = "/Chrome\/[0-9.]{1,15}/";
		preg_match($version,$ua,$v);
		$version = $v[0];
		$version = str_replace('Chrome/','',$version);
		$this->browser['browser']['version'] = $version;
	}
	private function get_chromium_desctop()
	{
		$this->browser['browser']['title'] = 'Chromium';
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		$version = "/Chromium\/[0-9.]{1,15}/";
		preg_match($version,$ua,$v);
		$version = $v[0];
		$version = str_replace('Chromium/','',$version);
		$this->browser['browser']['version'] = $version;
	}
	private function get_safari_mobile()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/Safari/',$ua))
		{
			$this->browser['browser']['title'] = 'Safari mobile';
			$version = "/Version\/[0-9.]{1,12}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Version/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_safari()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		if(preg_match('/Safari/',$ua))
		{
			$this->browser['browser']['title'] = 'Safari';
			$version = "/Version\/[0-9.]{1,8}/";
			preg_match($version,$ua,$v);
			$version = $v[0];
			$version = str_replace('Version/','',$version);
			$this->browser['browser']['version'] = $version;
		}
	}
	private function get_os()
	{
		$ua = $_SERVER['HTTP_USER_AGENT']; /* User Agent of Browser */
		
		/* pattern part start */
		
		$ubuntu = "/Ubuntu/"; /* Ubuntu */
		$linux = "/X11/"; /* Linux */
		$ios = "/(CPU iPhone|CPU OS [0-9_]{2,10} like Mac OS X)/"; /* iOS */
		$windows = "/(Windows|Win|WIN)/"; /* Windows */
		$macos = "/Mac OS X/"; /* Mac OS X */ 
		$android = "/Android/"; /* Android */
		$symbian = "/SymbOS/"; /* Symbian */
		/* pattern part end */
		if(preg_match($ubuntu,$ua))
		{
			$this->browser['os']['title'] = 'Ubuntu';
			$v = "/Ubuntu\/[0-9.]{2,5}/";
			if(preg_match($v,$ua))
			{
				preg_match($v,$ua,$result);
				$version = $result[0];
				$version = str_replace('Ubuntu/','',$version);
				$this->browser['os']['version'] = $version;
			}
		}
		else
		if(preg_match($linux,$ua))
		{
			$this->browser['os']['title'] = 'Linux';
		}
		if(preg_match($ios,$ua))
		{
			$this->browser['os']['title'] = 'iOS';
			$v = "/OS [0-9_]{2,10}/";
			preg_match($v,$ua,$result);
			$version = $result[0];
			$version = str_replace('OS ','',$version);
			$version = str_replace('_','.',$version);
			$this->browser['os']['version'] = $version;
		}
		else
		if(preg_match($windows,$ua))
		{
			$this->browser['os']['title'] = 'Windows ';
			$win8 = '/NT 6.2/'; /* Windows 8 */
			$win7 = '/NT 6.1/'; /* Windows 7 */
			$vista = '/NT 6.0/'; /* Windows Vista */
			$xp = '/NT (5.1|5.2)/'; /* Windows XP */
			$mobile = '/Mobile/'; /* Windows Mobile */
			
			if(preg_match($win7,$ua))
			{
				$this->browser['os']['title'] .= '7';
			}
			else
			if(preg_match($vista,$ua))
			{
				$this->browser['os']['title'] .= 'Vista';
			}
			else
			if(preg_match($xp,$ua))
			{
				$this->browser['os']['title'] .= 'XP';
			}
			else
			if(preg_match($win8,$ua))
			{
				$this->browser['os']['title'] .= '8';
			}
			else
			if(preg_match($mobile,$ua))
			{
				$this->browser['os']['title'] .= 'Mobile';
			}
		}
		else
		if(preg_match($macos,$ua))
		{
			$this->browser['os']['title'] = 'Mac OS X';
			$v = '/Mac OS X [0-9_.]{2,10}/';
			preg_match($v,$ua,$result);
			$version = $result[0];
			$version = str_replace('OS ','',$version);
			$version = str_replace('_','.',$version);
			$this->browser['os']['version'] = $version;
		}
		else
		if(preg_match($android,$ua))
		{
			$this->browser['os']['title'] = 'Android';
			$v = '/Android [0-9_.]{2,10}/';
			if(preg_match($v,$ua,$result))
			{
				preg_match($v,$ua,$result);
				$version = $result[0];
				$version = str_replace('Android ','',$version);
				$this->browser['os']['version'] = $version;
			}
		}
		else
		if(preg_match($symbian,$ua))
		{
			$this->browser['os']['title'] = 'Symbian';
		}
	}
}
?>
<?php


/**
 * Created by PhpStorm.
 * User: juriem
 * Date: 07/10/16
 * Time: 13:05
 */
class GitHubTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var RemoteWebDriver
	 */
	protected $webDriver;
	protected $url = 'https://liinav.fastned.v2.now.dev/';

	public function setUp()
	{
		$this->webDriver = RemoteWebDriver::create('http://127.0.0.1:4444/wd/hub', DesiredCapabilities::chrome());
	}

	protected function tearDown()
	{
		$this->webDriver->close();
	}

	protected function getWebDriver($url = null)
	{
		$url = $url === null ? $this->url : $url;
		return $this->webDriver->get($url);
	}

	public function testIfPageHasLoginForm()
	{
		$webDriver = $this->getWebDriver();

		$element = $webDriver->findElement(WebDriverBy::id('loginForm'));

		$userName = $element->findElement(WebDriverBy::name('username'));
		$password = $element->findElement(WebDriverBy::name('password'));
		$this->assertTrue($userName->isDisplayed());
		$this->assertTrue($password->isDisplayed());
	}



	public function testKeyboard()
	{
		$webDriver = $this->getWebDriver();

		/*
		 *
		 */
		$element = $webDriver->findElement(WebDriverBy::id('loginForm'));
		$userName = $element->findElement(WebDriverBy::name('username'));
		$password = $element->findElement(WebDriverBy::name('password'));
		$userName->sendKeys('incorrect phone number');
		$button = $element->findElement(WebDriverBy::name('login'));

		var_dump($webDriver->getPageSource());
	}


//	public function testInvalidPhones()
//	{
//		$webDriver = $this->getWebDriver();
//		$webDriver = $webDriver->get($this->url);
//
//
//		$element = $webDriver->findElement(WebDriverBy::id('username'));
//		$element->click();
//		$webDriver->getKeyboard()->sendKeys('abrvalk');
//		$button = $webDriver->findElement(WebDriverBy::name('login'));
//		$button->click();
//
//		$element = $this->webDriver->findElement(WebDriverBy::id('loginBoxPassword'));
//		$alert = $element->findElement(WebDriverBy::className('alert-error'));
//
//
//		$this->assertTrue(true);
//	}

}
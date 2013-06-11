<?php

namespace VS\VitrineBundle\Tests\Views;

/**
 * Tests for PHPUnit_Extensions_Selenium2TestCase.
 *
 * @package    PHPUnit_Selenium
 * @author     Giorgio Sironi <info@giorgiosironi.com>
 * @copyright  2010-2013 Sebastian Bergmann <sebastian@phpunit.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.phpunit.de/
 */
class ArticleViewTest extends \PHPUnit_Extensions_Selenium2TestCase
{
	protected function setUp()
    {
    	$this->setHost('localhost');
    	$this->setPort(5555);
        $this->setBrowser('*firefox');
        $this->setBrowserUrl('http://vengeful.org/');
    }

    // public function testHasArticles(){
    // 	$this->setUrl('vs');
    //     $element = $this->byCssSelector('body');
    //     $this->assertEquals('Click here for next page', $element->text());
    // }

}
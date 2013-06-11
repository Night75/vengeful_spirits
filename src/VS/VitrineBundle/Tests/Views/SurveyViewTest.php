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
class SurveyViewTest extends \PHPUnit_Extensions_Selenium2TestCase
{
	protected function setUp()
    {
    	$this->setHost('localhost');
    	$this->setPort(5555);
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://vengeful.org/');
    }

    public function testSurveyVoteIsSubmited(){
    	$this->url('vs');

        $this->byXPath("//div[@id='survey-vote']//input[@type='radio'][1]")->click();
        $this->byCssSelector("form.form_event")->submit();

        // Success si cet element existe
        try{
            $this->byId('survey-result');
            $resultsElements = $this->elements($this->using('css selector')->value('#survey-result li')); 
            $this->assertGreaterThan(1, count($resultsElements));
            foreach ($resultsElements as $element) {
                $this->assertNotEmpty($element->text());
            }
        } catch (\PHPUnit_Extensions_Selenium2TestCase_WebDriverException $e) {
            $this->fail('Le vote ne retourne pas les résultats');
        }
        /*
        $this->click("id=vs_vitrinebundle_survey_vote_type_survey_vote_16");
        $this->click("css=div.bt-wrapper-survey-validation > input.bt-gold");
        $this->waitForPageToLoad("30000");
        */

    }

}
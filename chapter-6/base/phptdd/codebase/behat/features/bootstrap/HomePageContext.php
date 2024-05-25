<?php

use Behat\Mink\Mink;
use Behat\Mink\Session;
use Behat\Mink\Driver\GoutteDriver;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\MinkAwareContext;

class HomePageContext extends MinkContext implements MinkAwareContext
{
    public function __construct()
    {
        $mink   = new Mink([
            'goutte' => new Session(new GoutteDriver()), // Headless browser
        ]);
        $this->setMink($mink);
        $this->getMink()->getSession('goutte')->start();
    }
    
    /**
     * @Given I have access to the home page URL
     */
    public function iHaveAccessToTheHomePageUrl()
    {
        // throw new PendingException();
        return true;
    }

    /**
     * @When I visit the home page
     */
    public function iVisitTheHomePage()
    {
        // throw new PendingException();
        // Using the Goutte Headless emulator
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $sessionHeadless->visit("symfony/public"); //let the emulator visit a url
        // $sessionHeadless->getPage()->clickLink('Create your first page'); //emulator clicking on a link. This directs the browser to an external page, thereby causing the 
    }

    /**
     * @Then I should see the Symfony Logo
     */
    public function iShouldSeeTheSymfonyLogo()
    {
        // throw new PendingException();
        // throw new Exception();
        
        // Headless emulator test:
        $assertHeadless = $this->assertSession('goutte');
        $assertHeadless->elementExists('css', '.logo');
        $assertHeadless->pageTextContains('Welcome To Symfony 6');
    }
}
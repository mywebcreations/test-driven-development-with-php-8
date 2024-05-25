<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;

class HomePageContext implements Context
{
    /**
     * @Given I have access to the home page URL
     */
    public function iHaveAccessToTheHomePageUrl()
    {
        throw new PendingException();
    }

    /**
     * @When I visit the home page
     */
    public function iVisitTheHomePage()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the Symfony Logo
     */
    public function iShouldSeeTheSymfonyLogo()
    {
        throw new PendingException();
        // throw new Exception();
    }
}
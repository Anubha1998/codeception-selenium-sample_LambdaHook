<?php

class FirstCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        try {
            // Navigate to the test page
            $I->amOnPage('/sample-todo-app/');

            // Perform your test actions
            $I->checkOption('/html/body/div/div/div/ul/li[4]/input');
            $I->checkOption('/html/body/div/div/div/ul/li[5]/input');

            // If any exception or failure occurs here, it will be caught below
        } catch (\Throwable $e) {
            // If the test failed, execute the script to mark it as failed
            $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webDriver) {
                $webDriver->executeScript('lambda-status=failed');
            });

            // Re-throw the exception to ensure Codeception reports the test as failed
            throw $e;
        }

        // If the test passes, execute the script to mark it as passed
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webDriver) {
            $webDriver->executeScript('lambda-status=passed');
        });
    }
}

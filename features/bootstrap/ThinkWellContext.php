<?php
require_once __DIR__ . '/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;

use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;

use Behat\Mink\Mink;
use Behat\MinkExtension\Context\MinkAwareContext;

class FeatureContext extends PageObjectContext implements MinkAwareContext {
    
    private $mink;
    protected $minkParameters;
    private $scenario;
    
    protected $current;

    /**
     * Sets Mink instance.
     *
     * @param Mink $mink Mink session manager
     */    
    public function setMink(Mink $mink)
    {
        $this->mink = $mink;
    }
    /**
     * Returns Mink instance.
     *
     * @return Mink
     */
    public function getMink()
    {
        if (null === $this->mink) {
            throw new \RuntimeException(
                'Mink instance has not been set on Mink context class. ' . 
                'Have you enabled the Mink Extension?'
            );
        }
        return $this->mink;
    }
    /**
     * Sets parameters provided for Mink.
     *
     * @param array $parameters
     */
    public function setMinkParameters(array $parameters)
    {
        $this->minkParameters = $parameters;
    }
    
    /**
     * @When I go to the :arg1 page
     */
    public function iGoToThePage($arg1) {
        try {
            $this->current = $this->getPage($arg1);
            sleep(1);            
            $this->current->open();
            sleep(1);
        } catch (Exception $e) {
            \Psy\Shell::debug(get_defined_vars(),$this);
            throw $e;
        }
    }
    /**
     * @Then I should see :arg1 link
     */
    public function iShouldSeeLink($arg1)  {
        assertNotNull($this->current->linkExistsWithText($arg1));
    }

}
    

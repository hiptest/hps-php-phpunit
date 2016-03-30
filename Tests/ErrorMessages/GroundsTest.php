<?php
require_once(__DIR__.'/../Actionwords.php');

class GroundsTest extends PHPUnit_Framework_TestCase {
  public $actionwords;
  public function setUp() {
    $this->actionwords = new Actionwords();

    // As a coffee lover
    // I have to empty the grounds
    // So I don't end up with a total mess around the coffee machine
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // And I handle everything except the grounds
    $this->actionwords->iHandleEverythingExceptTheGrounds();
  }

  public function testMessageEmptyGroundsIsDisplayedAfter30CoffeesAreTaken() {
    // When I take "30" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(30);
    // Then message "Empty grounds" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Empty grounds");
  }

  public function testWhenTheGroundsAreEmptiedMessageIsRemoved() {
    // Given I take "30" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(30);
    // When I empty the coffee grounds
    $this->actionwords->iEmptyTheCoffeeGrounds();
    // Then message "Ready" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Ready");
  }
}
?>
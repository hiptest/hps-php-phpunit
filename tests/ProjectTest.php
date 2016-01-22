<?php
require_once('Actionwords.php');

class ProjectTest extends PHPUnit_Framework_TestCase {
  public $actionwords;
  public function setUp() {
    $this->actionwords = new Actionwords();
  }

  public function testBeansRunOutUid5beb658d06984a0aa8bb684329869b90() {
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // When thirty eight coffees are taken without filling beans
    $this->actionwords->thirtyEightCoffeesAreTakenWithoutFillingBeans();
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
    // And message "Fill beans" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Fill beans");
    // When I take "2" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(2);
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
    // And message "Fill beans" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Fill beans");
    // When I take a coffee
    $this->actionwords->iTakeACoffee();
    // Then coffee should not be served
    $this->actionwords->coffeeShouldNotBeServed();
  }

  public function testWaterRunsAwayUid37da9fe6383647058ddbb8e4bae00d73() {
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // When fifty coffees have been taken without filling the tank
    $this->actionwords->fiftyCoffeesHaveBeenTakenWithoutFillingTheTank();
    // Then message "Fill tank" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Fill tank");
    // When I take a coffee
    $this->actionwords->iTakeACoffee();
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
    // When I take "10" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(10);
    // Then coffee should not be served
    $this->actionwords->coffeeShouldNotBeServed();
    // And message "Fill tank" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Fill tank");
    // When I fill the water tank
    $this->actionwords->iFillTheWaterTank();
    // Then message "Ready" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Ready");
  }

  public function testFullGroundsDoesNotBlockCoffeeUid96ba26401ca14cf99ffebcfa8e25ed7b() {
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // When I take "29" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(29);
    // Then message "Ready" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Ready");
    // When I take a coffee
    $this->actionwords->iTakeACoffee();
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
    // And message "Empty grounds" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Empty grounds");
    // When I fill the water tank
    $this->actionwords->iFillTheWaterTank();
    // And I fill the beans tank
    $this->actionwords->iFillTheBeansTank();
    // And I take "20" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(20);
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
    // And message "Empty grounds" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Empty grounds");
  }

  public function simpleUse($lang, $ready_message) {
    // Given I start the coffee machine "<lang>"
    $this->actionwords->iStartTheCoffeeMachine($lang);
    // When I take a coffee
    $this->actionwords->iTakeACoffee();
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
  }

  public function testSimpleUseEnglishUid8978def826d94cc6a3aedcc21c2d83c6() {
    $this->simpleUse('en', 'Ready');
  }

  public function testSimpleUseFrenchUid47d9311c7575436aa3ede49b87c8ef01() {
    $this->simpleUse('fr', 'Pret');
  }


  public function messagesAreBasedOnLanguage($lang, $ready_message) {
    // When I start the coffee machine "<lang>"
    $this->actionwords->iStartTheCoffeeMachine($lang);
    // Then message "<ready_message>" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed($ready_message);
  }

  public function testMessagesAreBasedOnLanguageEnglishUid4aa34a604f9c472abd7a430bfdc74999() {
    $this->messagesAreBasedOnLanguage('en', 'Ready');
  }

  public function testMessagesAreBasedOnLanguageFrenchUidDae977f87dd4435dadc083ef2271464a() {
    $this->messagesAreBasedOnLanguage('fr', 'Pret');
  }


  public function testNoMessagesAreDisplayedWhenMachineIsShutDownUid61d627c93c494bc7ac4ac33a47a62f11() {
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // When I shutdown the coffee machine
    $this->actionwords->iShutdownTheCoffeeMachine();
    // Then message "" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("");
  }
}
?>
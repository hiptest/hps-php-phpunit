<?php
require_once(__DIR__.'/Actionwords.php');

class NominalCaseTest extends PHPUnit_Framework_TestCase {
  public $actionwords;
  public function setUp() {
    $this->actionwords = new Actionwords();
  }

  public function testSimpleUse() {
    // Well, sometimes, you just get a coffee.
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // When I take a coffee
    $this->actionwords->iTakeACoffee();
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
  }

  public function messagesAreBasedOnLanguage($lang, $ready_message) {
    // Well, sometimes, you just get a coffee.
    // When I start the coffee machine "<lang>"
    $this->actionwords->iStartTheCoffeeMachine($lang);
    // Then message "<ready_message>" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed($ready_message);
  }

  public function testMessagesAreBasedOnLanguageEnglish() {
    $this->messagesAreBasedOnLanguage('en', 'Ready');
  }

  public function testMessagesAreBasedOnLanguageFrench() {
    $this->messagesAreBasedOnLanguage('fr', 'Pret');
  }


  public function testNoMessagesAreDisplayedWhenMachineIsShutDown() {
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // When I shutdown the coffee machine
    $this->actionwords->iShutdownTheCoffeeMachine();
    // Then message "" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("");
  }
}
?>
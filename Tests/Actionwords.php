<?php
require_once('src/CoffeeMachine.php');

class Actionwords {
  var $sut;

  function __construct() {
    $this->sut = new CoffeeMachine();
  }

  public function iStartTheCoffeeMachine($lang = "en") {
    $this->sut->start($lang);
  }

  public function iShutdownTheCoffeeMachine() {
    $this->sut->stop();
  }

  public function messageMessageShouldBeDisplayed($message) {
    PHPUnit_Framework_Assert::assertEquals($message, $this->sut->getMessage());
  }

  public function coffeeShouldBeServed() {
    PHPUnit_Framework_Assert::assertTrue($this->sut->coffeeServed);
  }

  public function coffeeShouldNotBeServed() {
    PHPUnit_Framework_Assert::assertFalse($this->sut->coffeeServed);
  }

  public function iTakeACoffee() {
    $this->sut->takeCoffee();
  }

  public function iEmptyTheCoffeeGrounds() {
    $this->sut->emptyGrounds();
  }

  public function iFillTheBeansTank() {
    $this->sut->fillBeans();
  }

  public function iFillTheWaterTank() {
    $this->sut->fillTank();
  }

  public function iTakeCoffeeNumberCoffees($coffee_number = 10) {
    while (($coffee_number > 0)) {
      $this->iTakeACoffee();
      $coffee_number = $coffee_number - 1;
    }
  }

  public function theCoffeeMachineIsStarted() {
    $this->iStartTheCoffeeMachine();
  }

  public function fiftyCoffeesHaveBeenTakenWithoutFillingTheTank() {
    $this->iTakeCoffeeNumberCoffees(30);
    $this->iFillTheBeansTank();
    $this->iEmptyTheCoffeeGrounds();
    $this->iTakeCoffeeNumberCoffees(20);
    $this->iFillTheBeansTank();
    $this->iEmptyTheCoffeeGrounds();
  }

  public function thirtyEightCoffeesAreTakenWithoutFillingBeans() {
    $this->iTakeCoffeeNumberCoffees(37);
    $this->iEmptyTheCoffeeGrounds();
    $this->iFillTheWaterTank();
    $this->iTakeACoffee();
  }
}
?>
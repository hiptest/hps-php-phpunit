<?php
class CoffeeMachine {

  var $coffeeServed;
  var $started;
  var $tankContent;
  var $beansContent;
  var $groundsContent;

  function __construct() {
    $started = false;

    # Yes it's a magic machine :)
    $this->fillTank();
    $this->fillBeans();
    $this->emptyGrounds();

    $this->coffeeServed = false;
  }

  public function start($lang = 'en') {
    $this->started = true;
    $this->lang = $lang;
  }

  public function stop() {
    $this->started = false;
  }

  public function getMessage() {
    if (! $this->started) {
      return '';
    }

    if ($this->tankContent <= 10) {
      return $this->translateMessage('tank');
    }

    if ($this->beansContent < 3) {
      return $this->translateMessage('beans');
    }


    if ($this->groundsContent >= 30) {
      return $this->translateMessage('grounds');
    }

    return $this->translateMessage('ready');
  }

  public function takeCoffee() {
    if ($this->tankContent == 0 || $this->beansContent == 0) {
      $this->coffeeServed = false;
    } else {
      $this->coffeeServed = true;
      $this->tankContent -= 1;
      $this->beansContent -= 1;
      $this->groundsContent += 1;
    }
  }

  public function fillTank() {
    $this->tankContent = 60;
  }

  public function fillBeans() {
    $this->beansContent = 40;
  }

  public function emptyGrounds() {
    $this->groundsContent = 0;
  }
  

  private function translateMessage($key) {
    $i18n = [
      'en' => [
        'tank' => 'Fill tank',
        'beans' => 'Fill beans',
        'grounds' => 'Empty grounds',
        'ready' => 'Ready'
      ],
      'fr' => [
        'tank' => 'Remplir reservoir',
        'beans' => 'Ajouter grains',
        'grounds' => 'Vider marc',
        'ready' =>  'Pret'
      ]
    ];

    return $i18n[$this->lang][$key];
  }
}
?>

<?php
class CoffeeMachine {

  var $coffeeServed;
  var $started;
  var $tankContent;
  var $beansContent;
  var $groundsContent;
  var $countdownToDescale;
  var $displaySettings;
  var $waterHardness;
  var $grinder;

  function __construct() {
    $started = false;

    # Yes it's a magic machine :)
    $this->fillTank();
    $this->fillBeans();
    $this->emptyGrounds();
    $this->descale();

    $this->coffeeServed = false;
    $this->displaySettings = false;
    $this->waterHardness = '2';
    $this->grinder = 'medium';
  }

  public function showSettings() {
    $this->displaySettings = true;
  }

  public function hideSettings() {
    $this->displaySettings = false;
  }

  public function getSettings() {
    return [
      'water hardness' => $this->waterHardness,
      'grinder' => $this->grinder
    ];
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

    if ($this->displaySettings) {
      return $this->translateMessage('settings');
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

    if ($this->isDescalingNeeded()) {
      return $this->translateMessage('descale');
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
      $this->countdownToDescale -= 1;
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

  public function descale() {
    $this->countdownToDescale = 500;
  }

  public function isDescalingNeeded() {
    return $this->countdownToDescale <= 0;
  }

  private function translateMessage($key) {
    $i18n = [
      'en' => [
        'tank' => 'Fill tank',
        'beans' => 'Fill beans',
        'grounds' => 'Empty grounds',
        'ready' => 'Ready',
        'settings' => "Settings:\n - 1: water hardness\n - 2: grinder",
        'descale' => 'Descaling is needed'
      ],
      'fr' => [
        'tank' => 'Remplir reservoir',
        'beans' => 'Ajouter grains',
        'grounds' => 'Vider marc',
        'ready' =>  'Pret',
        'settings' => "Configurer:\n - 1: durete de l'eau\n - 2: mouture",
        'descale' => 'Detartrage requis'
      ]
    ];

    return $i18n[$this->lang][$key];
  }
}
?>

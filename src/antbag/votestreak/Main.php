<?php

namespace antbag\votestreak;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use CortexPE\Commando\PacketHooker;
use antbag\votestreak\Listeners\Voting38Listener;
use antbag\votestreak\Commands\StreakCommand;

class Main extends PluginBase {
  
  private $Voting38 = false;
  private $data;
  public static $instance;

  public function onEnable(): void {
    self::$instance = $this;
    $this->data = new Config($this->getDataFolder() ."streaks.yml", Config::YAML);
    if(!PacketHooker::isRegistered()) {
      PacketHooker::register($this);
    }
    $this->getServer()->getCommandMap()->register("streak", new StreakCommand($this, "streak", "See your streaks"));
    
    if($this->getServer()->getPluginManager()->get("Voting38") != null && $this->getConfig()->get("Voting38") == true) {
      $this->getServer()->getPluginManager()->registerEvents(new Voting38Listener($this), $this);
    } else {
      $this->getLogger("You need to enable Voting38 in conifg in order to make this plugin work");
    }
  }
  
  public function addStreak(Player $player) {
    $playerName = $player->getName();
    $currentStreak = $this->getCurrentStreak($playerName);
    $newStreak = $currentStreak + 1 . $timenow;
    $this->updateStreak($playerName, $newStreak);
  }
    
  public function getCurrentStreak(string $playerName): int {
    return $this->data->get($playerName, 0);
  }
    
  public function updateStreak(string $playerName, int $newStreak): void {
    $this->data->set($playerName, $newStreak);
    $this->data->save();
  }

  public static function getInstance(): Main {
    return self::$instance;
  }
}

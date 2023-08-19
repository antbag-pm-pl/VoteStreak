<?php

namespace antbag\votestreak;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use CortexPE\Commando\PacketHooker;
use antbag\votestreak\Listeners\Voting38Listener;
use antbag\votestreak\Commands\StreakCommand;

class Main extends PluginBase {
  
  private $Voting38 = false;
  public static $instance;
      // Enable Function
  public function onEnable(): void {
    self::$instance = $this;
    $streaks = new Config($this->getDataFolder() ."streaks.yml", Config::YAML);
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
  
  public static function getInstance(): Main {
  return self::$instance;
  }
  
  public function addStreak(Player $player) {
    $playerName = $player->getName();
    $currentStreak = $this->getCurrentStreak($playerName);
    $newStreak = $currentStreak + 1 . $timenow;
    $this->updateStreak($playerName, $newStreak);
  }
    
  public function getCurrentStreak(string $playerName): int {
    $data = new Config($this->getDataFolder() . "streaks.yml", Config::YAML);
    return $data->get($playerName, 0);
  }
    
  public function updateStreak(string $playerName, int $newStreak): void {
    $data = new Config($this->getDataFolder() . "streaks.yml", Config::YAML);
    $data->set($playerName, $newStreak);
    $data->save();
  }
    
  public function getPlayerWithTopStreak(): ?string {
    $data = new Config($this->getDataFolder() ."streaks.yml", Config::YAML);
    $allStreaks = $data->getAll();
      
    $topPlayer = null;
    $topStreak = -1;
      
    foreach($allStreaks as $playerName => $streak) {
      if($streak > $topStreak) {
        $topStreak = $streak;
        $topPlayer = $playerName;
        }
      }
    }
  
}

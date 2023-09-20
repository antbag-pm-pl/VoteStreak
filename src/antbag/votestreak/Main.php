<?php

namespace antbag\votestreak;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use CortexPE\Commando\PacketHooker;
use antbag\votestreak\Listeners\Voting38Listener;
use antbag\votestreak\Commands\StreakCommand;
use pocketmine\player\Player;

class Main extends PluginBase {
  
  private $data;
  public static $instance;

  public function onEnable(): void {
    self::$instance = $this;
    $this->data = new Config($this->getDataFolder() ."streaks.yml", Config::YAML);
    if(!PacketHooker::isRegistered()) {
      PacketHooker::register($this);
    }
    $this->getServer()->getCommandMap()->register("VoteStreak", new StreakCommand($this, "streak", "See your streaks"));
    $this->getServer()->getPluginManager()->registerEvents(new Voting38Listener($this), $this);
  }
  
  public function addStreak(Player $player) {
    $playerName = $player->getName();
    $currentStreak = $this->getCurrentStreak($playerName);
    $newStreak = $currentStreak + 1;
    $this->updateStreak($playerName, $newStreak);
  }
  
  public function resetStreak(string $playerName): int {
    $this->data->set($playerName, 0);
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

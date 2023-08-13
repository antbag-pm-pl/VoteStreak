<?php

namespace antbag\votestreak;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\DisablePluginException;
use pocketmine\utils\Config;
use CortexPE\Commando\PacketHooker;
use antbag\votestreak\Listener\Voting38Listener;
use antbag\votestreak\Commands\StreakCommand;

class Main extends PluginBase {
  
  private $Voting38 = false;
      // Enable Function
  public function onEnable(): void {
    $streaks = new Config($this->getDataFolder() ."streaks.yml", Config::YAML);
    if(!PacketHooker::isRegistered()) {
      PacketHooker::register($this);
    }
    $this->getServer()->getCommandMap()->register("streak", new StreakCommand($this, "streak", "See your streaks"));
  } 
}

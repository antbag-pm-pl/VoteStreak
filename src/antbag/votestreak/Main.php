<?php

namespace antbag\votestreak;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\DisablePluginException;
use pocketmine\utils\Config;
use CortexPE\Commando\PacketHooker;

class Main extends PluginBase implements Listener {
  
  private $Voting38 = false;
  
  
  public function onLoad(): void {
    $this->saveDefaultConfig();
    $cfg = $this->getConfig();
    //checks for config value and if its out of date it says so else it says it loaded
    $cfgver = $cfg->get("Version");
    if ($cfgver !== 0.1){
      $this->getLogger()->warning("Warning: Config is Out of Date, please reinstall config");
    }
    else {
    $this->getLogger()->info(TEXTFORMAT::Green . "Successfully Loaded VoteStreak!");
  }
  // if voting38 is present and config has it enabled then init plugin
    if($this->getServer()->getPluginManager()->getPlugin("Voting38") !== null && $this->getConfig()->get("Voting38") == true) {
      $this->Voting38 = true;
      $this->getServer()->getPluginManager()->registerEvents(new Voting38Listener($this), $this);
      $this->getLogger()->info(TEXTFORMAT::Green . "Successfully Found Voting38!");
      //if voting38 is bot present but the config has voting38 disabled then init plugin
      if ($this->getServer()->getPluginManager()->getPlugin("Voting38") === null && $this->getConfig()->get("Voting38") == false) {
      $this->Voting38 = false;
      $this->getLogger()->info(TEXTFORMAT::Red . "Caution: Voting38 not found. ". TEXTFORMAT::Orange . "But you got This option disabled so thats not too bad.");
  }
  // if voting38 is present but config has voting38 disabled then initplugin
    elseif ($this->getServer()->getPluginManager()->getPlugin("Voting38") !== null && $this->getConfig()->get("Voting38") == false) {
      $this->Voting38 = false;
      $this->getLogger()->info(TEXTFORMAT::Green . " Voting38  found. ". TEXTFORMAT::Orange . "But you got This option disabled so thats not too bad."
                              );
    }
  }
  // Disable Plugin if Voting38 not found and config has Voting38 Enabled
    else {
   $this->getLogger()->error("ERROR: Voting38 Not Found but Config has enabled. Disabling plugin");
  throw new DisablePluginException;
    }
  }
  // Enable Function
  public function onEnable(): void {
    $streaks = new Config($this->getDataFolder() ."streaks.yml", Config::YAML);
    if(!PacketHooker::isRegistered()) {
      PacketHooker::register($this);
    }
    $this->getServer()->getCommandMap()->register("streak", new StreakCommand($this, "streak", "See your streaks"));
  } 
}

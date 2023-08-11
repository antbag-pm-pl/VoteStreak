<?php

namespace antbag\votestreak;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {
  
  private $Voting38 = false;
  
  
  public function onLoad(): void {
    $this->saveDefaultConfig();
    $cfg = $this->getConfig();
    $cfgver = $cfg->get("Version");
    if ($cfgver !== 0.1){
      $this->getLogger()->warning("Warning: Config is Out of Date, please reinstall config");
    else {
    $this->getLogger()->info(TEXTFORMAT::Green . "Successfully Loaded VoteStreak!");
  }
    if($this->getServer()->getPluginManager()->getPlugin("Voting38") != null && $this->getConfig()->get("Voting38") == true) {
      $this->Voting38 = true;
      $this->getServer()->getPluginManager()->registerEvents(new Voting38Listener($this), $this);
      $this->getLogger()->info(TEXTFORMAT::Green . "Successfully Found Voting38!");
      if ($this->getServer()->getPluginManager()->getPlugin("Voting38") == null && $this->getConfig()->get("Voting38") == false) {
      $this->Voting38 = false;
      $this->getLogger()->info(TEXTFORMAT::Red . "Caution: Voting38 not found. ". TEXTFORMAT::Orange . "But you got This option disabled so thats not too bad.");
  }
    elseif ($this->getServer()->getPluginManager()->getPlugin("Voting38") != null && $this->getConfig()->get("Voting38") == false) {
      $this->Voting38 = false;
      $this->getLogger()->info(TEXTFORMAT::Green . " Voting38  found. ". TEXTFORMAT::Orange . "But you got This option disabled so thats not too bad."
                              );
        $this->getLogger()->warning("Warning: Config is Out of Date, please reinstall config");
    }
  }
    else {
   $this->getLogger()->error("ERROR: Voting38 Not Found but Config has enabled. Disabling plugin");
  $this->getServer()->getPluginManager()->disablePlugin();
    }

  }
  
  pub 
}
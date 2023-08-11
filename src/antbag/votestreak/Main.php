<?php

namespace antbag\votestreak;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {
  
  private $Voting38 = false;
  
  public function onEnable(): void {
    
    if($this->getServer()->getPluginManager()->getPlugin("Voting38") != null && $this->getConfig()->get("Voting38") == true) {
      $this->Voting38 = true;
      $this->getServer()->getPluginManager()->registerEvents(new Voting38Listener($this), $this);
    }
  }
}
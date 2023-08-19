<?php

namespace antbag\votestreak\Commands\subcommands;

# Libs
use CortexPE\Commando\BaseSubCommand;
use pocketmine\Command\Command;
use pocketmine\Command\CommandSender;
use antbag\votestreak\Manager\StreakManager;

class TopStreakSubCommand extends BaseSubCommand {
  
  public function prepare(): void {
    $this->setPermission("votestreak.top.command");
  }
  
  public function onRun(CommandSender $sender, string $aliasUsed, array $args) : void {
    if($sender instanceof Player) {
    
    $topPlayer = 
    }
    if($sender->hasPermission("votestreak.top.command")) {
      if($topPlayer !== null) {
        $sender->sendMessage("Player with top streak: $topPlayer");
      } else {
        $sender->sendMessage("No player has a streak yet.");
      }
    }
  }
}
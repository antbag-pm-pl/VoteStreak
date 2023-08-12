<?php

namespace antbag\votestreak\Commands\subcommands;

# Libs
use CortexPE\Commando\BaseSubCommand;

class TopStreakSubCommand extends SubCommand {
  
  public function onRun(CommandSender $sender, string $aliasUsed, array $args) : void {
    if($sender instanceof Player) {
      
    }
    if($sender->hasPermission()) {
      if($topPlayer !== null) {
        $sender->sendMessage("Player with top streak: $topPlayer");
      } else {
        $sender->sendMessage("No player has a streak yet.");
      }
    }
  }
}
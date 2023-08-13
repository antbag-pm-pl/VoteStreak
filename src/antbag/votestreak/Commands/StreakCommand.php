<?php

namespace antbag\votestreak\Commands;

use CortexPE\Commando\BaseCommand;
use antbag\votestreak\commands\subcommands\TopStreakSubCommand;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use antbag\votestreak\Menu\StreakUI;

class StreakCommand extends BaseCommand {
  
  public function __construct(StreakUI $plugin) {
    $this->plugin = $plugin;
  }
  
  public function onprepare(): void {
    $this->setPermission("votestreak.streak.command");
    $this->registerSubCommand(new TopStreakSubCommand("top", "A commad to check The top player streak"));
  }
  
  public function onRun(CommandSender $sender, string $aliasUsed, array $args) : void {
    if($sender instanceof Player) {
      
    }
    if($sender->hasPermission("votestreak.streak.command")) {
      $this->plugin->StreakUI($sender);
    }
  }
}

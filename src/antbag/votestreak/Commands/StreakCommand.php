<?php

namespace antbag\votestreak\Commands;

use CortexPE\Commando\BaseCommand;
use antbag\votestreak\commands\subcommands\TopStreakSubCommand;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use antbag\votestreak\Menu\StreakUI;
use jojoe77777\FormAPI\SimpleForm;

class StreakCommand extends BaseCommand {
  
  
  public function onprepare(): void {
    $this->setPermission("votestreak.streak.command");
    $this->registerSubCommand(new TopStreakSubCommand("top", "A commad to check The top player streak"));
  }
  
  public function onRun(CommandSender $sender, string $aliasUsed, array $args) : void {
    if($sender instanceof Player) {
      
    }
    if($sender->hasPermission("votestreak.streak.command")) {
      $this->StreakUI($sender);
    }
  }
  
  public function StreakUI(Player $player) {
    $form = new SimpleForm(function(Player $player, int $data): void {
    if($data !== null) {
          
    }
    });
    $form->setTitle("VoteStreaks");
    $form->setContent("Your current VoteStreak: " .$player->getStreak());
    $form->sendToPlayer($player);
  }
    
    public function getStreak() {
      $streakManager = $this->StreakManager();
      $this->getCurrentStreak($streakManager, $player);
      return true;
    }
  
}

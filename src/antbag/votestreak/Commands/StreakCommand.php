<?php

namespace antbag\votestreak\Commands;

use CortexPE\Commando\BaseCommand;
use pocketmine\command\CommandSender;
use antbag\votestreak\Main;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\Utils\TextFormat;

class StreakCommand extends BaseCommand {
  
  
  public function prepare(): void {
    $this->setPermission("votestreak.streak.command");
  }
  
  public function onRun(CommandSender $sender, string $aliasUsed, array $args) : void {
    if($sender instanceof Player) {
      $sender->sendMessage(TEXTFORMAT::RED . TEXTFORMAT::BOLD . "You must be a player to run this command");
    }
    if($sender->hasPermission("votestreak.streak.command")) {
      $this->StreakUI($sender);
    }
  }
  
  public function StreakUI(Player $player) {
    $Name = $player->getName();
    
    $form = new SimpleForm(function(Player $player, int $data): void {
    if($data !== null) {
          
    }
    });
    $form->setTitle("VoteStreaks");
    $form->setContent("Your current VoteStreak: " . TEXTFORMAT::YELLOW . Main::getInstance()->getCurrentStreak($Name));
    $form->sendToPlayer($player);
  }
 
}

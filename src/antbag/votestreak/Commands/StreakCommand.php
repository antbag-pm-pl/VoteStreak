<?php

namespace antbag\votestreak\Commands;

use CortexPE\Commando\BaseCommand;
use pocketmine\command\CommandSender;
use antbag\votestreak\Main;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\utils\TextFormat;
use antbag\votestreak\Commands\subcommands\ResetSubCommand;

class StreakCommand extends BaseCommand {
  
  
  public function prepare(): void {
    $this->setPermission("votestreak.streak.command");
    $this->registerSubCommand(new ResetSubCommand('reset', 'reset a streak of a user'));
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
    return $form;
  }
 
}

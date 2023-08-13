<?php

namespace antbag\votestreak\Commands;

use CortexPE\Commando\BaseCommand;
use antbag\votestreak\Commands\subcommands\TopStreakSubCommand;
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
    $playerName = $player->getName();
    
    $form = new SimpleForm(function(Player $player, int $data): void {
    if($data !== null) {
          
    }
    });
    $form->setTitle("VoteStreaks");
    $form->setContent("Your current VoteStreak: " .$this->getStreak($playerName));
    $form->sendToPlayer($player);
  }
    
    public function getStreak(string $playerName): int {
      $data = new Config($this->getDataFolder() . "streaks.yml", Config::YAML);
      return $data->get($playerName, 0);
    }
  
}

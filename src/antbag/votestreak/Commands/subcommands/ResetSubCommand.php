<?php

namespace antbag\votestreak\Commands\subcommands;

use pocketmine\command\CommandSender;
use CortexPE\Commando\BaseSubCommand;
use pocketmine\player\Player;

class ResetSubCommand extends BaseSubCommand {

    protected function prepare(): void {
      $this->setPermission("votestreak.reset.command");
      $this->registerArgument(0, new RawStringArgument("player", true));
    }

    public function onRun(CommandSender $sender, string $aliasUsed, array $args) : void {
      if(isset($args["player"])){
        $playerName = $args["player"];
        $player = $this->getPlugin()->getServer()->getPlayerExact($playerName);
            
        if($player !== null){
            Main::getInstance()->resetStreak($playerName);
            $sender->sendMessage("§aReset the streak for " . $playerName);
        } else {
            $sender->sendMessage("§cPlayer " . $playerName . " is not online.");
        }
    } else {
        $sender->sendMessage("§cThe player you typed appears to be unknown or not online");
    }
  }
}

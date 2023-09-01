<?php

namespace antbag\votestreak\Commands\subcommands;

use pocketmine\command\CommandSender;
use CortexPE\Commando\BaseSubCommand;

class ResetCommand extends BaseSubCommand {

    protected function prepare(): void {
        $this->setPermission("votestreak.command.reset");
        $this->registerArgument(0, new RawStringArgument("player", true));
    }

    public function onRun(CommandSender $sender, string $aliasUsed, array $args) : void {
        if(isset($args["player"])){
            $playerName = $args["player"];
            $player = $this->getPlugin()->getServer()->getPlayerExact($playerName);
            
            if($player !== null){
                Main::getInstance()->resetStreak($playerName);
                $sender->sendMessage("Reset the streak for " . $playerName);
            } else {
                $sender->sendMessage("Player " . $playerName . " is not online.");
            }
        } else {
            $this->sendUsage();
        }
    }
}

<?php

namespace BanUI;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\entity\Effect;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use jojoe77777\FormAPI;
class Main extends PluginBase implements Listener {	
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "BanUI by MegaGastPvP.");
    }
    public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "BanUI disabled.");
    }	
    public function onCommand(CommandSender $sender, Command $cmd, string $label,array $args) : bool {		
		switch($cmd->getName()){		
			case "bangui":
				if($sender instanceof Player) {	
					$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");				
					if($api === null || $api->isDisabled()){					
					}					
					$form = $api->createSimpleForm(function (Player $sender, array $data){
					$result = $data[0];					
					if($result === null){						
					}
						switch($result){							
							case 0:																
                                                               $this->getServer()->dispatchCommand($sender, trim(implode(" ", ["ban ".$result.""])));														
    							       break;																						
						}					
					});					
					$form->setTitle("Ban Screen");
					$form->setContent("Please choose who your banning.");
					$form->addInput(TextFormat::BOLD . "Who you are banning");	
					$form->sendToPlayer($sender);										
				}
				else{
					$sender->sendMessage(TextFormat::RED . "Use this Command in-game.");
					return true;
				}
			break;						
		}
		return true;
    }	
}
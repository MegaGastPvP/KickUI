<?php
namespace KickUI;
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
class KickUI extends PluginBase implements Listener {	
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "KickUI by MegaGastPvP.");
    }
    public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "KickUI disabled.");
    }	
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {		
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
                     $this->getServer()->dispatchCommand($sender, trim(implode(" ", ["kick ".$result.""])));														
    							       break;																						
						}					
					});					
					$form->setTitle("Kick Screen");
					$form->setContent("Please choose who your kicking.");
					$form->addInput(TextFormat::BOLD . "Who you are kicking");	
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

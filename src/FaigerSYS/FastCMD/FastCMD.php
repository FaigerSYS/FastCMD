<?php
namespace FaigerSYS\FastCMD;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\TextFormat as CLR;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

class FastCMD extends PluginBase implements Listener {
	
	public function onEnable() {
		$this->getLogger()->info(CLR::GOLD . 'FastCMD enabling...');
		
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
		$this->getLogger()->info(CLR::GOLD . 'FastCMD enabled!');
	}
	
	/**
	 * @priority LOWEST
	 */
	public function onPlayerCommand(PlayerCommandPreprocessEvent $e) {
		$msg = $e->getMessage();
		if (($msg{0} ?? null) !== '/') {
			$cmd = explode(' ', $msg, 2)[0];
			if ($this->getServer()->getCommandMap()->getCommand($cmd) !== null) {
				$e->setMessage('/' . $msg);
			}
		}
	}
	
}

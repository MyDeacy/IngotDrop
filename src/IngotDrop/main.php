<<?php
namespace IngotDrop;
use pocketmine\Plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\block\Block;
use pocketmine\item\Item;
class main extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function onBreak(BlockBreakEvent $event){
		$player = $event -> getPlayer();
		if($player->getGamemode() === 0){
			$block = $event->getBlock();
			$id = $block->getId();
			switch($id){
				case "15":
					$item = array(Item::get(265, 0, 1));
				break;
				
				case "14":
					$item = array(Item::get(266, 0, 1));
				break;
				default:
				return true;
			}
			
			$event->setDrops($item);
		}	
	}

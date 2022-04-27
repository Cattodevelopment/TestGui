<?php 

namespace DaMagicGuy\TestGui;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\player\Player;



use pocketmine\events\Listener;
use pocketmine\event\PlayerJoinEvent;
use pocketmine\event\PlayerInteractEvent;
use pocketmine\event\InventoryTransactionEvent;
use pocketmine\event\PlayerDropItemEvent;


use Sonsa04\InventoryAPI;
use Sonsa04\InventoryAPI\block\inventory\DoubleChestInventory;
use Sonsa04\InventoryAPI\task;
use Sonsa04\InventoryAPI\task\DelayTask;






class Main extends PluginBase implements Listener {
  public function onEnable() : void {

    $this->inventoryApi = $this->getServer()->getPluginManager()->getPlugin("InventoryAPI");

  }

  public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {

    switch ($command){

      case "test":

        if ($sender instanceof Player) {

          $this->openMyChest($sender);

        }

      break;

    }

    return true;

  }

  public function openMyChest(Player $player) {

    $inventory = $this->inventoryApi->createChestGUI(); // Single chest

    $inventory->setName("Test Chest UwU"); // Set name

    $inventory->setViewOnly(); // Prevent user from getting the item

    $item = VanillaItems::COMPASS();

    $item->setCustomName("Hub Item");

    $inventory->addItem($item); // Add item

    $inventory->addItem($item); // Add item

    $inventory->setItem(9, $item); // Set item

    $inventory->setClickCallback([$this, "clickFunction"]); // Add click callback

    $inventory->setCloseCallback([$this, "closeFunction"]); // Add close callback

    $inventory->send($player); // Send inventory to user

  }

  public function clickFunction(Player $player, Inventory $inventory, Item $source, Item $target, int $slot) {

    // Your logic
    
  }

  public function closeFunction(Player $player, Inventory $inventory) {

    // Your logic

  }
 }

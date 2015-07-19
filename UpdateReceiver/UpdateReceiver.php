<?php

namespace Shaygan\TelegramBotApiBundle\UpdateReceiver;

use Shaygan\TelegramBotApiBundle\Type\Update;
use Symfony\Component\DependencyInjection\Container;

/**
 *
 * @author Iman Ghasrfakhri <iman@i-gh.ir>
 */
class UpdateReceiver implements UpdateReceiverInterface
{

    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function handleUpdate(Update $update)
    {
        $cmd = $update->message->chat;
        $config = $this->container->getParameter("shaygan_telegram_bot_api.config");

        switch ($cmd) {
            case "/about":
            case "/about@{$config['bot_name']}":
                $text = "I'm a samble Telegram Bot";
                break;
            case "/help":
            case "/help@{$config['bot_name']}":
            default :
                $text = "Command List:\n";
                $text .= "/about - About this bot\n";
                $text .= "/help - show this help message\n";
                break;
        }
        $this->container->get("shaygan.telegram_bot_api")
                ->sendMessage(
                        $update->message->chat->id, $text
        );
    }

}

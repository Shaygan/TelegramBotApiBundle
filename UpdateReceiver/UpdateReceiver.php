<?php

namespace Shaygan\TelegramBotApiBundle\UpdateReceiver;

use Shaygan\TelegramBotApiBundle\TelegramBotApi;
use Shaygan\TelegramBotApiBundle\Type\Update;
use TelegramBot\Api\Types\Chat;

/**
 *
 * @author Iman Ghasrfakhri <iman@i-gh.ir>
 */
class UpdateReceiver implements UpdateReceiverInterface
{

    private $config;
    private $telegramBotApi;

    public function __construct(TelegramBotApi $telegramBotApi, $config)
    {
        $this->telegramBotApi = $telegramBotApi;
        $this->config = $config;
    }

    public function handleUpdate(Update $update)
    {
        $cmd = $update->message->getChat();

        switch ($cmd) {
            case "/about":
            case "/about@{$this->config['bot_name']}":
                $text = "I'm a samble Telegram Bot";
                break;
            case "/help":
            case "/help@{$this->config['bot_name']}":
            default :
                $text = "Command List:\n";
                $text .= "/about - About this bot\n";
                $text .= "/help - show this help message\n";
                break;
        }
        /** @var Chat $chat */
        $chat = $update->message->getChat();
        $this->telegramBotApi->sendMessage($chat->getId(), $text);
    }
}

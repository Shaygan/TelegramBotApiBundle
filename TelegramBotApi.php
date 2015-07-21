<?php

/**
 * Description of TelegramBotApi
 *
 * @author iman
 */

namespace Shaygan\TelegramBotApiBundle;

use Symfony\Component\DependencyInjection\Container;
use TelegramBot\Api\BotApi;

class TelegramBotApi extends BotApi
{

    public function __construct(Container $container)
    {
        $token = $container->getParameter('shaygan_telegram_bot_api.config');
//        var_dump($token);
        parent::__construct($token['token']);
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

}

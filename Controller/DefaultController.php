<?php

namespace Shaygan\TelegramBotApiBundle\Controller;

use Exception;
use Shaygan\TelegramBotApiBundle\Type\Update;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Shaygan\TelegramBotApiBundle\UpdateReceive\UpdateReceiveInterface;

class DefaultController extends Controller
{

    public function setupWebhookAction($secret)
    {
        $api = $this->get("shaygan.telegram_bot_api");
        $config = $this->getParameter("shaygan_telegram_bot_api.config");

        if (empty($config['webhook']['domain'])) {
            throw new Exception("'shaygan_telegram_bot_api.webhook.domain' is not set in config.yml", 0);
        }
        $url = "https://" . $config['webhook']['domain'] . $config['webhook']['path_prefix'] . "/telegram-bot/update";
        if (null !== $secret) {
            $url .= "/" . $secret;
        }
        $res = $api->setwebhook($url);
        return new JsonResponse([
            'ok' => $res,
            'url' => $url
        ]);
    }

    public function updateAction($secret, Request $request)
    {
//        $data0 = $request->getContent();
        $data0 = '{"update_id":8937330,
"message":{"message_id":1314,"from":{"id":74083533,"first_name":"Iman","last_name":"Ghasrfakhri","username":"Ghasrfakhri"},"chat":{"id":74083533,"first_name":"Iman","last_name":"Ghasrfakhri","username":"Ghasrfakhri"},"date":1437309600,"text":"\/test"}}';

        $data = json_decode($data0);

        $api = $this->get("shaygan.telegram_bot_api");
        $config = $this->getParameter("shaygan_telegram_bot_api.config");

        if (empty($config['webhook']['update_receiver'])) {
            throw new Exception("'webhook.update_receiver' is not valud service name", 0);
        }

        $updateReceiver = $this->getUpdateReceiverService($config['webhook']['update_receiver']);

        $update = new Update($data);

        $updateReceiver->handleUpdate($update);

        return new JsonResponse([
            'ok' => true
        ]);
    }

    /**
     * 
     * @return UpdateReceiveInterface
     */
    protected function getUpdateReceiverService($serviceName)
    {
        return $this->container
                        ->get($serviceName);
    }

}

<?php

namespace Shaygan\TelegramBotApiBundle\UpdateReceiver;

use Shaygan\TelegramBotApiBundle\Type\Update;

/**
 *
 * @author Iman Ghasrfakhri <iman@i-gh.ir>
 */
interface UpdateReceiverInterface
{

    public function handleUpdate(Update $update);
}

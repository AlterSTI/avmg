<?php
declare(strict_types=1);

namespace Av\GSM\SMS;

use
    InvalidArgumentException,
    RuntimeException;
/** ***********************************************************************************************
 * Base abstract class for sending SMS using GSM providers
 *
 * @package av_gsm
 * @author  Barabash
 *************************************************************************************************/
abstract class AbstractSMS implements SMSInterface
{
    private $content        ='';
    private $recipients     = [];
    private $sender         = '';

    /** **********************************************************************
     * set SMS text body
     *
     * @param string $content               SMS text body
     ************************************************************************/
    final public function setContent(string $content) : void
    {
        $this->content = htmlspecialchars(strip_tags($content));
        return;
    }
    /** **********************************************************************
     * get SMS text body
     *
     * @return  string $content             SMS text body
     ************************************************************************/
    final public function getContent() : string
    {
        return $this->content;
    }
    /** **********************************************************************
     * set SMS recipients
     *
     * @param string[] $recipients          SMS recipients
     ************************************************************************/
    final public function setRecipients(array $recipients) : void
    {
        $this->recipients = $recipients;
        return;
    }
    /** **********************************************************************
     * get SMS recipients
     *
     * @return string[]                     SMS recipients
     ************************************************************************/
    final public function getRecipients() : array
    {
        return $this->recipients;
    }
    /** **********************************************************************
     * set SMS recipients
     *
     * @param string $sender                SMS sender
     ************************************************************************/
    final public function setSender(string $sender) : void
    {
        $this->sender = $sender;
        return;
    }
    /** **********************************************************************
     * get SMS sender
     *
     * @return string SMS sender
     ************************************************************************/
    final public function getSender() : string
    {
        return $this->sender;
    }
    /** **********************************************************************
     * sending SMS with body form setContent to recipients from setRecipients
     *
     * @throws InvalidArgumentException     incorrect SMS setter params
     * @throws RuntimeException             SMS sending error
     ************************************************************************/
    final public function send() : void
    {
        if (strlen($this->sender) === 0){
            throw new InvalidArgumentException('Имя отправителя не может быть пустым');
        } elseif (count($this->recipients) === 0){
            throw new InvalidArgumentException('Отсутствуют получатели сообщения');
        } elseif (strlen($this->content) === 0){
            throw new InvalidArgumentException('Тело сообщения не может быть пустым');
        }

        try {
            $this->sendSMS($this->sender, $this->recipients, $this->content);
        } catch (RuntimeException $exception){
            echo $exception->getMessage();
        }
    }
    /** **********************************************************************
     * sending SMS with body form setContent to recipients from setRecipients
     *
     * @param string $sender
     * @param array  $recipients
     * @param string $content
     *
     * @throws RuntimeException             SMS sending error
     ************************************************************************/
    abstract protected function sendSMS(string $sender, array $recipients, string $content) : void;
}
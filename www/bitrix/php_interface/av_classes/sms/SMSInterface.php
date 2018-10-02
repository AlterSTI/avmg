<?php
declare(strict_types=1);

namespace Av\GSM\SMS;

use
    InvalidArgumentException,
    RuntimeException;
/** ***********************************************************************************************
 * Base interface for sending SMS using GSM providers
 *
 * @package av_gsm
 * @author  Barabash
 *************************************************************************************************/
interface SMSInterface
{
    /** **********************************************************************
     * set SMS text body
     *
     * @param string $content               SMS text body
     ************************************************************************/
    public function setContent(string $content) : void;
    /** **********************************************************************
     * get SMS text body
     *
     * @return  string $content             SMS text body
     ************************************************************************/
    public function getContent() : string;
    /** **********************************************************************
     * set SMS recipients
     *
     * @param string[] $recipients          SMS recipients
     ************************************************************************/
    public function setRecipients(array $recipients) : void;
    /** **********************************************************************
     * get SMS recipients
     *
     * @return string[]                     SMS recipients
     ************************************************************************/
    public function getRecipients() : array;
    /** **********************************************************************
     * set SMS recipients
     *
     * @param string $sender                SMS sender
     ************************************************************************/
    public function setSender(string $sender) : void;
    /** **********************************************************************
     * get SMS sender
     *
     * @return string SMS sender
     ************************************************************************/
    public function getSender() : string;
    /** **********************************************************************
     * sending SMS with body form setContent to recipients from setRecipients
     *
     * @throws InvalidArgumentException     incorrect SMS setter params
     * @throws RuntimeException             SMS sending error
     ************************************************************************/
    public function send() : void;
}
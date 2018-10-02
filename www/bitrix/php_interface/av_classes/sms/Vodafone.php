<?php
declare(strict_types=1);

namespace Av\GSM\SMS;

use
    RuntimeException,
    UnexpectedValueException,
    RangeException;

class Vodafone extends AbstractSMS {
    /** **********************************************************************
     * sending SMS with body form setContent to recipients from setRecipients
     *
     * @param string $sender
     * @param array  $recipients
     * @param string $content
     *
     * @throws RuntimeException             SMS sending error
     ************************************************************************/
    protected function sendSMS(string $sender, array $recipients, string $content) : void {
        try {
            $this->incomingDataValidation($sender, $recipients, $content);
            $nameListOfRecipients = $this->createListOfRecipients($recipients);
            $nameContentTemplate  = $this->createTemplateOfSMS($content);
            $this->createDispatch($sender, $nameListOfRecipients, $nameContentTemplate);
        }
        catch (UnexpectedValueException | RangeException $exception ){
            throw new RuntimeException($exception->getMessage());
        }
        catch (RuntimeException $exception){
            throw $exception;
        }
    }
    /** **********************************************************************
     * validation incoming parameters
     *
     * @param string $sender
     * @param array  $recipients
     * @param string $content
     *
     * @throws UnexpectedValueException    incoming parameters not validation
     ************************************************************************/
    private function incomingDataValidation(string $sender, array $recipients, string $content) : void {
        if (strlen($sender) > 50) {
            throw new RangeException('Длинна логина отправителя больше максимального значения 85 байт');
        } elseif (strlen(implode(',', $recipients)) > 1024){
            throw new RangeException('Длинна списка получаетелей больше максимального значения 1024 байт');
        } elseif (strlen($content) > 1400){
            throw new RangeException('Сообщения больше максимального значения 1024 байт');
        }
    }

    /** **********************************************************************
     * create header for sending requests
     *
     * @param string $username
     * @param string $passwordUser
     *
     *
     * @return array
     *
     * @throws RuntimeException             Purge username or passwordUser
     *************************************************************************/
    private function createHeader(string $username, string $passwordUser) : array {
        if (strlen($username) === 0 || strlen($passwordUser) === 0){
            throw new RuntimeException('Пустое поле логин или пароль');
        }
        $createdNonce = date('Y-m-d\TH:i:s\Z');
        $nonce = base64_encode(md5(openssl_random_pseudo_bytes(16)));
        $passwordDigest = base64_encode(sha1($nonce.$createdNonce.$passwordUser));
        return [
            'Authorization'   => $this->outline.' realm="'.$this->realm.'",profile="'.$this->profile.'"',
            'X-WSSE'          => $this->authType.
                                 ' Username="'.$username.'",
                                   PasswordDigest="'.$passwordDigest.'",
                                   Nonce="'.$nonce.'",
                                   Created="'.$createdNonce.'"
                                 ',
            'X-RequestHeader' => $this->xRequestHeader.' TransId=" '.$this->transId.'"',
            'receptUrl'       => $this->receptUrl,
            'receptFlag'      => $this->receptFlag
        ];
    }
    /** **********************************************************************
     * create a list of recipients and send request to Vodafone
     *
     * @param array $recipients
     *
     *
     * @return string                       name of group
     *
     * @throws RuntimeException
     *************************************************************************/
    private function createListOfRecipients (array $recipients) : string {
        try {
            $groupName = 'group_'.$recipients[0].'_'.time();

            if (strlen($recipients[0]) !== 0) throw new UnexpectedValueException('Не удалось получить имя списка получателей');

            $xml = $this->createListOfRecipientsXML($recipients, $groupName);
            $this->sendRequest('GroupOperateRequest', $xml);

            return $groupName;

        } catch (RuntimeException $exception){
            throw $exception;
        }
    }
    /** **********************************************************************
     * create a list of recipients XML
     *
     * @param array $recipients
     * @param string $groupName
     *
     * @return string                        XML with recipients
     *************************************************************************/
    private function createListOfRecipientsXML (array $recipients, string $groupName) : string {

        $userString = implode(',', $recipients);
        return '<groupOperateRequest xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="GroupOperateReq.xsd">
                    <groupOperateInfo>
                        <operation>1</operation>        
                        <creator>'.$this->creator.'</creator>
                        <groupInfo>
                            <groupName>'.$groupName.'</groupName>
                            <userMode>1</userMode>
                            <groupDesc>'.$groupName.'</groupDesc>
                            <shareMode>0</shareMode>
                            <numberMode>0</numberMode>
                           <userString>'.$userString.'</userString>
                            <extElements>
                            </extElements>
                        </groupInfo>
                        <extElements>
                        </extElements>
                    </groupOperateInfo>
                </groupOperateRequest>
            ';
    }
    /** **********************************************************************
     * create a template of SMS and send request to Vodafone
     *
     * @param string $content
     *
     * @return string                       name of template
     *
     * @throws RuntimeException
     *************************************************************************/
    private function createTemplateOfSMS (string $content) : string {
        try {
            $templateName = 'template_'.time();

            if (strlen($templateName) !== 0) throw new UnexpectedValueException('Не удалось получить имя шаблона сообщения');

            $xml = $this->createTemplateOfSMSXML($content, $templateName);
            $this->sendRequest('creatContent', $xml);
            return $templateName;

        } catch (RuntimeException $exception){
            throw $exception;
        }

    }
    /** **********************************************************************
     * create a content template XML
     *
     * @param string $content
     * @param string $templateName
     *
     * @return string                        XML with recipients
     *************************************************************************/
    private function createTemplateOfSMSXML ($content, $templateName) : string {
        return '<contentOperateRequest xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="ContentOperateReq.xsd">
                    <contentOperateInfo>
                        <operation>1</operation>
                        <creator>'.$this->creator.'</creator>
                        <contentName>'.$templateName.'</contentName>
                        <contentDes>'.$templateName.'</contentDes>
                        <contentInfo>
                            <contentType>1</contentType>
                            <smsContent>'.$content.'</smsContent>
                        </contentInfo>
                        <extElements>
                        </extElements>
                    </contentOperateInfo>
                </contentOperateRequest>
        ';
    }
    /** **********************************************************************
     * create a dispatch and send request to Vodafone
     *
     * @param string $sender
     * @param string $nameListOfRecipients
     * @param string $nameContentTemplate
     *
     * @throws RuntimeException
     *************************************************************************/
    private function createDispatch (string $sender, string $nameListOfRecipients, string $nameContentTemplate) : void{
        try{
            $taskName = 'task_'.$nameListOfRecipients.'_'.$nameContentTemplate.'_'.time();
            $xml = $this->createDispatchXML($sender, $nameListOfRecipients, $nameContentTemplate, $taskName);
            $this->sendRequest('pushtask', $xml);

        } catch (RuntimeException $exception){
            throw $exception;
        }
    }
    /** **********************************************************************
     * create a dispatch XML
     *
     * @param string $sender,
     * @param string $nameListOfRecipients
     * @param string $nameContentTemplate
     * @param string $taskName
     *
     * @return string                        XML dispatch
     *************************************************************************/
    private function createDispatchXML(string $sender, string $nameListOfRecipients, string $nameContentTemplate, string $taskName) : string {
        return '<pushTaskRequest xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="createinfoTask.xsd">
                    <pushTaskInfo>
                        <taskName>'.$taskName.'</taskName>
                        <taskDesc>'.$taskName.'</taskDesc>
                        <accessCode>'.$sender.'</accessCode>
                        <creator>'.$this->creator.'</creator>
                        <effectiveTime></effectiveTime>
                        <enableTermination>0</enableTermination>
                        <expireTime></expireTime>
                        <sendMode>
                            <triggerMode>2</triggerMode>
                        </sendMode>
                        <rateType>1</rateType>
                        <rateValue>2</rateValue>
                        <contentName>'.$nameContentTemplate.'</contentName>
                        <userGroupName>'.$nameListOfRecipients.'</userGroupName>
                        <extElements>
                          <paymentType>1</paymentType>
                        </extElements>
                    </pushTaskInfo>
                </pushTaskRequest>            
        ';
    }
    /** **********************************************************************
     * send request with XML body
     *
     * @param string $methodName             API method
     * @param string $xml                    xml to send in request body
     *
     * @throws RuntimeException             error connection or other problems
     *************************************************************************/
    private function sendRequest (string $methodName, string $xml) : void{
        $header = $this->createHeader($this->username, $this->passwordUser);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER      => 0,
            CURLOPT_POST                => 1,
            CURLOPT_HEADER              => 0,
            CURLOPT_RETURNTRANSFER      => 1,
            CURLOPT_HTTPHEADER          => $header,
            CURLOPT_URL                 => $this->VodafoneRequestUrl.$methodName,
            CURLOPT_POSTFIELDS          => 'xmlRequest = '.$xml
        ));
        if (curl_exec($curl) === false){
            throw new RuntimeException('Ошибка отправки: '.curl_error($curl));
        }

    }

    private $outline            = 'WSSE';
    private $realm              = 'SDP';
    private $profile            = 'UsernameToken';
    private $authType           = 'UsernameToken';
    private $username           = 'avmetalgroup';
    private $passwordUser       = 'Gbe2ydka';
    private $xRequestHeader     = 'request';
    private $transId            = '';
    private $receptUrl          = 'https://avmg.com.ua';
    private $receptFlag         = 0;
    private $creator            = 'avmetalgroup';
    private $VodafoneRequestUrl = 'http://businessmessaging.in.ua:8319/sag/services/task/';
}
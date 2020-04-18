<?php

define("SG_NOME", "Sistema Solar Engenharia");
define("SG_LOGO", "http://test.mediaplus.com.br/nomedosite/includes/imgs/logo.png");
define("SG_COR", "#135691");
define("SG_USER", "sistemasolar");
define("SG_EMAIL", "sistemasolarengenharia@mediaplus.com.br");
define("SG_SENHA", "ssemp3commerce");
define("SG_SITE", "sistemasolar.eng.br");

class SendgridImplement
{

    private $url = 'https://api.sendgrid.com/';
    private $user = SG_USER;
    private $pass = SG_SENHA;
    private $from = SG_EMAIL;
    private $fromname = SG_USER;
    private $replyto = SG_EMAIL;

    function __construct()
    {
    }

    function send($to, $subject, $html)
    {

        $params = array(
            'api_user'  => $this->user,
            'api_key'   => $this->pass,
            'to'        => $to,
            'subject'   => $subject,
            'html'      => html_entity_decode($html),
            'text'      => $html,
            'from'      => $this->from,
            'fromname'  => html_entity_decode($this->fromname),
            'replyto'   => $this->replyto
        );

        $request =  $this->url . 'api/mail.send.json';

        $session = curl_init($request);
        curl_setopt($session, CURLOPT_POST, true);
        curl_setopt($session, CURLOPT_POSTFIELDS, $params);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($session);
        curl_close($session);
    }

    function template($title, $message)
    {

        $html = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html>
        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="telephone=no" name="format-detection">
            <title></title>
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
            <style type="text/css">
            a {text-decoration: none;}
            * { font-family: Roboto; }
            html, body { max-width: 600px; padding: 0px; margin: 0px; }
            </style>
        </head>
        <body>
            <table width="600" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <td align="center" style=" background: #fff; padding:20px 0 20px 0; border: 1px solid #e6efea; ">
                            <img src="' . SG_LOGO . '" />
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                    </tr>
                </thead>
                <tbody style=" background: #fff; ">
                    <tr>
                        <td align="left" style="padding: 20px 0 20px 20px; color: ' . SG_COR . ' font-size:22px; font-weight: 700; border: 1px solid #e6efea; ">
                        ' . html_entity_decode(utf8_decode($title)) . '
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="padding: 20px 0 20px 20px; color: #333; font-size: 14px; border: 1px solid #e6efea; border-top: none; ">
                        ' . html_entity_decode($message) . '
                        </td>
                    </tr>
                    <tr>
                        <td style=" background: ' . SG_COR . ' padding: 20px 0 20px 0; color: #fff; font-size: 10px; border: 1px solid #e6efea; border-top: none; " align="center">
                        ' . SG_NOME . ' <br />
                        <a href="' . SG_SITE . '" style="color:#fff;">' . SG_SITE . '</a> <br />
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
        </html>
        ';

        return $html;
    }
}

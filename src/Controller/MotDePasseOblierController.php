<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangerPasswordType;
use App\Form\RechercheType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MotDePasseOblierController extends AbstractController
{
    #[Route('/mot/de/passe/oblier/{code}/{mail}', name: 'app_mot_de_passe_oblier')]
    public function index(MailerInterface $mailer,ManagerRegistry $doctrine,Request $request,$code,$mail): Response
    {
        $user = new User();
        $form  = $this->createForm(RechercheType::class,$user);
        $form->handleRequest($request);
      //  $mail = $form->getData('username');
      //  $user->setUsername($mail);
      $mail = $user->getUserName();
        echo $mail;
     $em1=$doctrine->getRepository(User :: class)->findBy(['email' => $mail  ]);
     $code = 0 ; 
     for ($i = 1; $i <= 10; $i++) {
         $code=$i*$i*$i+$i+13254*$i; 
     }
     
     if($form->isSubmitted() && $mail !=""  ) {
       
   
         
   
            $email = (new  Email())
            ->from('khiariemna2@gmail.com')
            ->to($mail) 
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('verification de mot de passe sur dealTroc !')
            ->text('Sending emails is fun again!')
            ->html('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
            
            <head>
                <meta charset="UTF-8">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                <meta name="x-apple-disable-message-reformatting">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta content="telephone=no" name="format-detection">
                <title></title>
                <!--[if (mso 16)]>
                <style type="text/css">
                a {text-decoration: none;}
                </style>
                <![endif]-->
                <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
                <!--[if gte mso 9]>
            <xml>
                <o:OfficeDocumentSettings>
                <o:AllowPNG></o:AllowPNG>
                <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
            </xml>
            <![endif]-->
            </head>
            
            <body>
                <div class="es-wrapper-color">
                    <!--[if gte mso 9]>
                        <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                            <v:fill type="tile" color="#fafafa"></v:fill>
                        </v:background>
                    <![endif]-->
                    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="esd-email-paddings" valign="top">
                                    <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                                        <tbody>
                                            <tr>
                                                <td class="es-adaptive esd-stripe" align="center" esd-custom-block-id="88589">
                                                    <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td class="esd-structure es-p10" align="left">
                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td align="center" class="es-infoblock esd-block-text">
                                                                                                    <p>Put your preheader text here. <a href="https://viewstripo.email" class="view" target="_blank">View in browser</a></p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="es-header" align="center">
                                        <tbody>
                                            <tr>
                                                <td class="es-adaptive esd-stripe" align="center" esd-custom-block-id="88593">
                                                    <table class="es-header-body" style="background-color: #3d5ca3;" width="600" cellspacing="0" cellpadding="0" bgcolor="#3d5ca3" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" style="background-color: #3d5ca3;" bgcolor="#3d5ca3" align="left">
                                                                    <!--[if mso]><table width="560" cellpadding="0" 
                                    cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
                                                                    <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="es-m-p20b esd-container-frame" width="270" align="left">
                                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="esd-block-image es-m-p0l es-m-txt-c" align="left" style="font-size:0"><a href="https://viewstripo.email" target="_blank"><img src="https://tlr.stripocdn.email/content/guids/CABINET_66498ea076b5d00c6f9553055acdb37a/images/12051527590691841.png" alt style="display: block;" width="183"></a></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso]></td><td width="20"></td><td width="270" valign="top"><![endif]-->
                                                                    <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="270" align="left">
                                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="esd-block-button es-p10t es-m-txt-c" align="right"><span class="es-button-border"><a href="https://viewstripo.email/" class="es-button" target="_blank">Try free class</a></span></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso]></td></tr></table><![endif]-->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td class="esd-stripe" style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                                                    <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td class="esd-structure es-p40t es-p20r es-p20l" style="background-color: transparent; background-position: left top;" bgcolor="transparent" align="left">
                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                    <table style="background-position: left top;" width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="esd-block-image es-p5t es-p5b" align="center" style="font-size:0"><a target="_blank"><img src="https://tlr.stripocdn.email/content/guids/CABINET_dd354a98a803b60e2f0411e893c82f56/images/23891556799905703.png" alt style="display: block;" width="175"></a></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="esd-block-text es-p15t es-p15b" align="center">
                                                                                                    <h1 style="color: #333333; font-size: 20px;"><strong>FORGOT YOUR </strong></h1>
                                                                                                    <h1 style="color: #333333; font-size: 20px;"><strong>&nbsp;PASSWORD?</strong></h1>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="esd-block-text es-p40r es-p40l" align="left">
                                                                                                    <p style="text-align: center;">HI,&nbsp;%FIRSTNAME|% %LASTNAME|%</p>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="esd-block-text es-p35r es-p40l" align="left">
                                                                                                    <p style="text-align: center;">There was a request to change your password!</p>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="esd-block-text es-p25t es-p40r es-p40l" align="center">
                                                                                                    <p>If did not make this request, just ignore this email. Otherwise, please click the button below to change your password:</p>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="esd-block-button es-p40t es-p40b es-p10r es-p10l" align="center"><span class="es-button-border">VOTRE CODE EST :</span></td>
                                                                                                <td><h1>'.$code.'</h1></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="esd-structure es-p20t es-p10r es-p10l" style="background-position: center center;" align="left">
                                                                    <!--[if mso]><table width="580" cellpadding="0" cellspacing="0"><tr><td width="199" valign="top"><![endif]-->
                                                                    <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="199" align="left">
                                                                                    <table style="background-position: center center;" width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="esd-block-text es-p15t es-m-txt-c" align="right">
                                                                                                    <p style="font-size: 16px; color: #666666;"><strong>Follow us:</strong></p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso]></td><td width="20"></td><td width="361" valign="top"><![endif]-->
                                                                    <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="361" align="left">
                                                                                    <table style="background-position: center center;" width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="esd-block-social es-p10t es-p5b es-m-txt-c" align="left" style="font-size:0">
                                                                                                    <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/facebook-rounded-gray.png" alt="Fb" title="Facebook" width="32"></a></td>
                                                                                                                <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/twitter-rounded-gray.png" alt="Tw" title="Twitter" width="32"></a></td>
                                                                                                                <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/instagram-rounded-gray.png" alt="Ig" title="Instagram" width="32"></a></td>
                                                                                                                <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/youtube-rounded-gray.png" alt="Yt" title="Youtube" width="32"></a></td>
                                                                                                                <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/linkedin-rounded-gray.png" alt="In" title="Linkedin" width="32"></a></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso]></td></tr></table><![endif]-->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="esd-structure es-p5t es-p20b es-p20r es-p20l" style="background-position: left top;" align="left">
                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="esd-block-text" esd-links-color="#666666" align="center">
                                                                                                    <p style="font-size: 14px;">Contact us: <a target="_blank" style="font-size: 14px; color: #666666;" href="tel:123456789">123456789</a> | <a target="_blank" href="mailto:your@mail.com" style="font-size: 14px; color: #666666;">your@mail.com</a></p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="es-footer" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td class="esd-stripe" style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                                                    <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td class="esd-structure es-p10t es-p30b es-p20r es-p20l" style=" background-color: #0b5394; background-position: left top;" bgcolor="#0b5394" align="left">
                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="esd-block-text es-p5t es-p5b" align="left">
                                                                                                    <h2 style="font-size: 16px; color: #ffffff;"><strong>Have quastions?</strong></h2>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td esd-links-underline="none" esd-links-color="#ffffff" class="esd-block-text es-p5b" align="left">
                                                                                                    <p style="font-size: 14px; color: #ffffff;">We are here to help, learn more about us <a target="_blank" style="font-size: 14px; color: #ffffff; text-decoration: none;">here</a></p>
                                                                                                    <p style="font-size: 14px; color: #ffffff;">or <a target="_blank" style="font-size: 14px; text-decoration: none; color: #ffffff;">contact us</a><br></p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td class="esd-stripe" style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                                                    <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td class="esd-structure es-p15t" style="background-position: left top;" align="left">
                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="esd-block-menu">
                                                                                                    <table class="es-menu" width="100%" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr class="links">
                                                                                                                <td class="es-p10t es-p10b es-p5r es-p5l" style="padding-bottom: 1px; padding-top: 0px; " width="33.33%" valign="top" bgcolor="transparent" align="center"><a target="_blank" href="https://viewstripo.email" style="color: #3D5CA3; font-size: 14px;">Sing up</a></td>
                                                                                                                <td class="es-p10t es-p10b es-p5r es-p5l" style="border-left: 1px solid #3d5ca3; padding-bottom: 1px; padding-top: 0px; " width="33.33%" valign="top" bgcolor="transparent" align="center"><a target="_blank" href="https://viewstripo.email" style="color: #3D5CA3; font-size: 14px;">Blog</a></td>
                                                                                                                <td class="es-p10t es-p10b es-p5r es-p5l" style="border-left: 1px solid #3d5ca3; padding-bottom: 1px; padding-top: 0px; " width="33.33%" valign="top" bgcolor="transparent" align="center"><a target="_blank" href="https://viewstripo.email" style="color: #3D5CA3; font-size: 14px;">About us</a></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="esd-block-spacer es-p20b es-p20r es-p20l" align="center" style="font-size:0">
                                                                                                    <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td style="border-bottom: 1px solid #fafafa; background: none; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="es-footer" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td class="esd-stripe" style="background-color: #fafafa;" bgcolor="#fafafa" align="center" esd-custom-block-id="88330">
                                                    <table class="es-footer-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td class="esd-structure es-p15t es-p5b es-p20r es-p20l" align="left">
                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td esd-links-underline="underline" align="center" class="esd-block-text">
                                                                                                    <p style="font-size: 12px; color: #666666;">This daily newsletter was sent to info@name.com from company name because you subscribed. If you would not like to receive this email <a target="_blank" style="font-size: 12px; text-decoration: underline;" class="unsubscribe">unsubscribe here</a>.</p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="es-content esd-footer-popover" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td class="esd-stripe" esd-custom-block-id="42537" align="center">
                                                    <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td class="esd-structure es-p30t es-p30b es-p20r es-p20l" align="left">
                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="esd-block-image es-infoblock made_with" align="center" style="font-size:0"><a target="_blank" href="https://viewstripo.email/?utm_source=templates&utm_medium=email&utm_campaign=education&utm_content=trigger_newsletter2"><img src="https://tlr.stripocdn.email/content/guids/cab_pub_7cbbc409ec990f19c78c75bd1e06f215/images/78411525331495932.png" alt style="display: block;" width="125"></a></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </body>
            
            </html> ');

     $mailer->send($email);
     return $this->redirectToRoute('app_verfiercode',['code'=>$code , 'mail'=>$mail]);
    }
        return $this->render('mot_de_passe_oblier/index.html.twig',['form' =>$form->createView(),'mail'=>$mail,'em1'=>$em1,'code'=>$code]);
    

 
    }
    #[Route('/mot/de/passe/oblierchanger/{nom}', name: 'app_mot_de_passe_oblierchanger')]
    public function index1($nom,ManagerRegistry $doctrine, Request $request,MailerInterface $mailer): Response
    {
        
      
       $user= new User();
     
       $user=$doctrine->getRepository(User::class)->findOneBy(['email',$nom]);
       $form=$this->createForm(ChangerPasswordType::class,$user);
       $form->handleRequest($request);
       
  if($form->isSubmitted() && $form->isValid() ) {

    
    $entityManager = $doctrine->getManager();
    $entityManager->persist($user);
    $entityManager->flush();
       $email = (new Email())
       ->from('DealTroc@gmail.com')
       ->to($nom)
       //->cc('cc@example.com')
       //->bcc('bcc@example.com')
       //->replyTo('fabien@example.com')
       //->priority(Email::PRIORITY_HIGH)
       ->subject('Bienvenue sur DealTroc')
       ->text('Sending emails is fun again!')
       ->html('votre mot de passe a été changer avec sucée');

   $mailer->send($email);
     return $this->redirectToRoute('security_login');
   
  }

        return $this->render('mot_de_passe_oblier/changermotdepasse.html.twig',['form' =>$form->createView(),"mail"=>$nom ]);
    }
}

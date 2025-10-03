<?php

namespace App\Utilities\Emails;

class TicketApproval
{
    /**
     * @param $data
     * @return string
     */
    public function send($data)
    {
        $htmlContent = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html style="font-family: \'Exo 2\', sans-serif;">
                <head>
                    <meta charset="UTF-8" />
                    <meta content="width=device-width, initial-scale=1" name="viewport" />
                    <meta name="x-apple-disable-message-reformatting" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <meta content="telephone=no" name="format-detection" />
                    <title>'.$data['subject'].'</title>
                    <!--[if (mso 16)]>
                        <style type="text/css">
                            a {
                                text-decoration: none;
                            }
                        </style>
                    <![endif]-->
                    <!--[if gte mso 9]>
                        <style>
                            sup {
                                font-size: 100% !important;
                            }
                        </style>
                    <![endif]-->
                    <!--[if gte mso 9]>
                        <xml>
                            <o:OfficeDocumentSettings>
                                <o:AllowPNG></o:AllowPNG>
                                <o:PixelsPerInch>96</o:PixelsPerInch>
                            </o:OfficeDocumentSettings>
                        </xml>
                    <![endif]-->
                    <!--[if !mso]><!-- -->
                    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
                    <!--<![endif]-->
                    <style type="text/css">
                        .rollover div {
                            font-size: 0;
                        }
                        .rollover:hover .rollover-first {
                            max-height: 0px !important;
                            display: none !important;
                        }
                        .rollover:hover .rollover-second {
                            max-height: none !important;
                            display: block !important;
                        }
                        .es-menu.es-table-not-adapt td a:hover,
                        a.es-button:hover {
                            text-decoration: underline !important;
                        }
                        #outlook a {
                            padding: 0;
                        }
                        .es-button {
                            mso-style-priority: 100 !important;
                            text-decoration: none !important;
                        }
                        a[x-apple-data-detectors] {
                            color: inherit !important;
                            text-decoration: none !important;
                            font-size: inherit !important;
                            font-family: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                        }
                        .es-desk-hidden {
                            display: none;
                            float: left;
                            overflow: hidden;
                            width: 0;
                            max-height: 0;
                            line-height: 0;
                            mso-hide: all;
                        }
                        @media only screen and (max-width: 600px) {
                            p,
                            ul li,
                            ol li,
                            a {
                                line-height: 150% !important;
                            }
                            h1,
                            h2,
                            h3,
                            h1 a,
                            h2 a,
                            h3 a {
                                line-height: 120% !important;
                            }
                            h1 {
                                font-size: 28px !important;
                                text-align: left;
                            }
                            h2 {
                                font-size: 24px !important;
                                text-align: left;
                            }
                            h3 {
                                font-size: 20px !important;
                                text-align: left;
                            }
                            .es-header-body h1 a,
                            .es-content-body h1 a,
                            .es-footer-body h1 a {
                                font-size: 28px !important;
                                text-align: left;
                            }
                            .es-header-body h2 a,
                            .es-content-body h2 a,
                            .es-footer-body h2 a {
                                font-size: 24px !important;
                                text-align: left;
                            }
                            .es-header-body h3 a,
                            .es-content-body h3 a,
                            .es-footer-body h3 a {
                                font-size: 20px !important;
                                text-align: left;
                            }
                            .es-menu td a {
                                font-size: 16px !important;
                            }
                            .es-header-body p,
                            .es-header-body ul li,
                            .es-header-body ol li,
                            .es-header-body a {
                                font-size: 16px !important;
                            }
                            .es-content-body p,
                            .es-content-body ul li,
                            .es-content-body ol li,
                            .es-content-body a {
                                font-size: 16px !important;
                            }
                            .es-footer-body p,
                            .es-footer-body ul li,
                            .es-footer-body ol li,
                            .es-footer-body a {
                                font-size: 16px !important;
                            }
                            .es-infoblock p,
                            .es-infoblock ul li,
                            .es-infoblock ol li,
                            .es-infoblock a {
                                font-size: 12px !important;
                            }
                            *[class="gmail-fix"] {
                                display: none !important;
                            }
                            .es-m-txt-c,
                            .es-m-txt-c h1,
                            .es-m-txt-c h2,
                            .es-m-txt-c h3 {
                                text-align: center !important;
                            }
                            .es-m-txt-r,
                            .es-m-txt-r h1,
                            .es-m-txt-r h2,
                            .es-m-txt-r h3 {
                                text-align: right !important;
                            }
                            .es-m-txt-l,
                            .es-m-txt-l h1,
                            .es-m-txt-l h2,
                            .es-m-txt-l h3 {
                                text-align: left !important;
                            }
                            .es-m-txt-r img,
                            .es-m-txt-c img,
                            .es-m-txt-l img {
                                display: inline !important;
                            }
                            .es-button-border {
                                display: inline-block !important;
                            }
                            a.es-button,
                            button.es-button {
                                font-size: 20px !important;
                                display: inline-block !important;
                            }
                            .es-adaptive table,
                            .es-left,
                            .es-right {
                                width: 100% !important;
                            }
                            .es-content table,
                            .es-header table,
                            .es-footer table,
                            .es-content,
                            .es-footer,
                            .es-header {
                                width: 100% !important;
                                max-width: 600px !important;
                            }
                            .es-adapt-td {
                                display: block !important;
                                width: 100% !important;
                            }
                            .adapt-img {
                                width: 100% !important;
                                height: auto !important;
                            }
                            .es-m-p0 {
                                padding: 0 !important;
                            }
                            .es-m-p0r {
                                padding-right: 0 !important;
                            }
                            .es-m-p0l {
                                padding-left: 0 !important;
                            }
                            .es-m-p0t {
                                padding-top: 0 !important;
                            }
                            .es-m-p0b {
                                padding-bottom: 0 !important;
                            }
                            .es-m-p20b {
                                padding-bottom: 20px !important;
                            }
                            .es-mobile-hidden,
                            .es-hidden {
                                display: none !important;
                            }
                            tr.es-desk-hidden,
                            td.es-desk-hidden,
                            table.es-desk-hidden {
                                width: auto !important;
                                overflow: visible !important;
                                float: none !important;
                                max-height: inherit !important;
                                line-height: inherit !important;
                            }
                            tr.es-desk-hidden {
                                display: table-row !important;
                            }
                            table.es-desk-hidden {
                                display: table !important;
                            }
                            td.es-desk-menu-hidden {
                                display: table-cell !important;
                            }
                            .es-menu td {
                                width: 1% !important;
                            }
                            table.es-table-not-adapt,
                            .esd-block-html table {
                                width: auto !important;
                            }
                            table.es-social {
                                display: inline-block !important;
                            }
                            table.es-social td {
                                display: inline-block !important;
                            }
                            .es-m-p5 {
                                padding: 5px !important;
                            }
                            .es-m-p5t {
                                padding-top: 5px !important;
                            }
                            .es-m-p5b {
                                padding-bottom: 5px !important;
                            }
                            .es-m-p5r {
                                padding-right: 5px !important;
                            }
                            .es-m-p5l {
                                padding-left: 5px !important;
                            }
                            .es-m-p10 {
                                padding: 10px !important;
                            }
                            .es-m-p10t {
                                padding-top: 10px !important;
                            }
                            .es-m-p10b {
                                padding-bottom: 10px !important;
                            }
                            .es-m-p10r {
                                padding-right: 10px !important;
                            }
                            .es-m-p10l {
                                padding-left: 10px !important;
                            }
                            .es-m-p15 {
                                padding: 15px !important;
                            }
                            .es-m-p15t {
                                padding-top: 15px !important;
                            }
                            .es-m-p15b {
                                padding-bottom: 15px !important;
                            }
                            .es-m-p15r {
                                padding-right: 15px !important;
                            }
                            .es-m-p15l {
                                padding-left: 15px !important;
                            }
                            .es-m-p20 {
                                padding: 20px !important;
                            }
                            .es-m-p20t {
                                padding-top: 20px !important;
                            }
                            .es-m-p20r {
                                padding-right: 20px !important;
                            }
                            .es-m-p20l {
                                padding-left: 20px !important;
                            }
                            .es-m-p25 {
                                padding: 25px !important;
                            }
                            .es-m-p25t {
                                padding-top: 25px !important;
                            }
                            .es-m-p25b {
                                padding-bottom: 25px !important;
                            }
                            .es-m-p25r {
                                padding-right: 25px !important;
                            }
                            .es-m-p25l {
                                padding-left: 25px !important;
                            }
                            .es-m-p30 {
                                padding: 30px !important;
                            }
                            .es-m-p30t {
                                padding-top: 30px !important;
                            }
                            .es-m-p30b {
                                padding-bottom: 30px !important;
                            }
                            .es-m-p30r {
                                padding-right: 30px !important;
                            }
                            .es-m-p30l {
                                padding-left: 30px !important;
                            }
                            .es-m-p35 {
                                padding: 35px !important;
                            }
                            .es-m-p35t {
                                padding-top: 35px !important;
                            }
                            .es-m-p35b {
                                padding-bottom: 35px !important;
                            }
                            .es-m-p35r {
                                padding-right: 35px !important;
                            }
                            .es-m-p35l {
                                padding-left: 35px !important;
                            }
                            .es-m-p40 {
                                padding: 40px !important;
                            }
                            .es-m-p40t {
                                padding-top: 40px !important;
                            }
                            .es-m-p40b {
                                padding-bottom: 40px !important;
                            }
                            .es-m-p40r {
                                padding-right: 40px !important;
                            }
                            .es-m-p40l {
                                padding-left: 40px !important;
                            }
                            .m-c-p16r {
                                padding-right: 8vw;
                            }
                            .es-desk-hidden {
                                display: table-row !important;
                                width: auto !important;
                                overflow: visible !important;
                                max-height: inherit !important;
                            }
                        }
                    </style>
                </head>
                <body style="width: 100%; font-family: \'Exo 2\', sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; padding: 0; margin: 0;">
                    <div class="es-wrapper-color" style="background-color: #12022f;">
                        <!--[if gte mso 9]>
                            <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                                <v:fill type="tile" src="images/group_10_R1m.png" color="#12022f" origin="0.5, 0" position="0.5, 0"></v:fill>
                            </v:background>
                        <![endif]-->
                        <table
                            class="es-wrapper"
                            width="100%"
                            cellspacing="0"
                            cellpadding="0"
                            background="/email/images/group_10_R1m.png"
                            style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                border-collapse: collapse;
                                border-spacing: 0px;
                                padding: 0;
                                margin: 0;
                                width: 100%;
                                height: 100%;
                                background-image: url(/email/images/group_10_R1m.png);
                                background-repeat: no-repeat;
                                background-position: center top;
                                background-color: #12022f;
                            "
                        >
                            <tr>
                                <td valign="top" style="padding: 0; margin: 0;">
                                    <table
                                        class="es-header"
                                        cellspacing="0"
                                        cellpadding="0"
                                        align="center"
                                        style="
                                            mso-table-lspace: 0pt;
                                            mso-table-rspace: 0pt;
                                            border-collapse: collapse;
                                            border-spacing: 0px;
                                            table-layout: fixed !important;
                                            width: 100%;
                                            background-color: transparent;
                                            background-repeat: repeat;
                                            background-position: center top;
                                        "
                                    >
                                        <tr>
                                            <td class="es-m-p15r es-m-p15l" align="center" style="padding: 0; margin: 0;">
                                                <table
                                                    class="es-header-body"
                                                    cellspacing="0"
                                                    cellpadding="0"
                                                    bgcolor="#ffffff"
                                                    align="center"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 640px;"
                                                >
                                                    <tr>
                                                        <td align="left" style="padding: 0; margin: 0; padding-top: 30px; padding-left: 40px; padding-right: 40px;">
                                                            <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                <tr>
                                                                    <td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr class="es-mobile-hidden">
                                                                                <td align="center" height="15" style="padding: 0; margin: 0;"></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            class="es-m-p30t es-m-p20b es-m-p20r es-m-p20l"
                                                            align="left"
                                                            bgcolor="#ffffff"
                                                            style="margin: 0; padding-top: 25px; padding-bottom: 25px; padding-left: 40px; padding-right: 40px; background-color: #ffffff; border-radius: 20px;"
                                                        >
                                                            <!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:158px" valign="top"><![endif]-->
                                                            <table cellpadding="0" cellspacing="0" align="left" class="es-left" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; float: left;">
                                                                <tr>
                                                                    <td class="es-m-p20b" align="center" valign="top" style="padding: 0; margin: 0; width: 128px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr>
                                                                                <td align="center" style="padding: 0; margin: 0; font-size: 0px;" height="30">
                                                                                    <a
                                                                                        target="_blank"
                                                                                        href="https://strategicshift.ophelconsult.com/"
                                                                                        style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #000000; font-size: 18px;"
                                                                                    >
                                                                                        <img src="/web/assets/img/logo.png" alt style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" width="128" />
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td class="es-hidden" style="padding: 0; margin: 0; width: 30px;"></td>
                                                                </tr>
                                                            </table>
                                                            <!--[if mso]></td><td style="width:342px" valign="top"><![endif]-->
                                                            <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; float: left;">
                                                                <tr>
                                                                    <td align="left" class="es-m-p20b" style="padding: 0; margin: 0; width: 342px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr>
                                                                                <td height="30" align="center" style="padding: 0; margin: 0;">
                                                                                    <table
                                                                                        cellpadding="0"
                                                                                        cellspacing="0"
                                                                                        width="auto"
                                                                                        class="es-menu es-table-not-adapt"
                                                                                        role="presentation"
                                                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"
                                                                                    >
                                                                                        <tr class="links">
                                                                                            <td align="center" valign="top" class="es-m-p15r" id="esd-menu-id-0" style="padding: 0; margin: 0; padding-right: 30px; border: 0;">
                                                                                                <a
                                                                                                    target="_blank"
                                                                                                    href="https://strategicshift.ophelconsult.com/"
                                                                                                    style="
                                                                                                        -webkit-text-size-adjust: none;
                                                                                                        -ms-text-size-adjust: none;
                                                                                                        mso-line-height-rule: exactly;
                                                                                                        text-decoration: none;
                                                                                                        display: block;
                                                                                                        font-family: \'Exo 2\', sans-serif;
                                                                                                        color: #000000;
                                                                                                        font-size: 18px;
                                                                                                    "
                                                                                                >
                                                                                                    Home
                                                                                                </a>
                                                                                            </td>
                                                                                            <td align="center" valign="top" class="es-m-p15r" id="esd-menu-id-1" style="padding: 0; margin: 0; padding-right: 30px; border: 0;">
                                                                                                <a
                                                                                                    target="_blank"
                                                                                                    href="https://strategicshift.ophelconsult.com/#tickets"
                                                                                                    style="
                                                                                                        -webkit-text-size-adjust: none;
                                                                                                        -ms-text-size-adjust: none;
                                                                                                        mso-line-height-rule: exactly;
                                                                                                        text-decoration: none;
                                                                                                        display: block;
                                                                                                        font-family: \'Exo 2\', sans-serif;
                                                                                                        color: #000000;
                                                                                                        font-size: 18px;
                                                                                                    "
                                                                                                >
                                                                                                    Tickets
                                                                                                </a>
                                                                                            </td>
                                                                                            <td align="center" valign="top" id="esd-menu-id-2" style="padding: 0; margin: 0; border: 0;">
                                                                                                <a
                                                                                                    target="_blank"
                                                                                                    href="https://strategicshift.ophelconsult.com/#speakers"
                                                                                                    style="
                                                                                                        -webkit-text-size-adjust: none;
                                                                                                        -ms-text-size-adjust: none;
                                                                                                        mso-line-height-rule: exactly;
                                                                                                        text-decoration: none;
                                                                                                        display: block;
                                                                                                        font-family: \'Exo 2\', sans-serif;
                                                                                                        color: #000000;
                                                                                                        font-size: 18px;
                                                                                                        font-weight: 700;
                                                                                                    "
                                                                                                >
                                                                                                    Speakers
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!--[if mso]></td><td style="width:30px"></td><td style="width:30px" valign="top"><![endif]-->
                                                            <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; float: right;">
                                                                <tr>
                                                                    <td align="left" style="padding: 0; margin: 0; width: 30px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr>
                                                                                <td align="center" style="padding: 0; margin: 0; font-size: 0px;">
                                                                                    <a
                                                                                        target="_blank"
                                                                                        class="rollover"
                                                                                        href=""
                                                                                        style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #000000; font-size: 18px;"
                                                                                    >
                                                                                        <img
                                                                                            class="rollover-first"
                                                                                            src="/email/images/menu.png"
                                                                                            alt
                                                                                            style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                            width="30"
                                                                                        />
                                                                                        <div style="font-size: 0; mso-hide: all;">
                                                                                            <img
                                                                                                width="30"
                                                                                                class="rollover-second"
                                                                                                style="display: none; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; max-height: 0px;"
                                                                                                src="/email/images/menu_hover.png"
                                                                                                alt
                                                                                            />
                                                                                        </div>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!--[if mso]></td></tr></table><![endif]-->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding: 0; margin: 0; padding-top: 30px; padding-left: 40px; padding-right: 40px;">
                                                            <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                <tr>
                                                                    <td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr>
                                                                                <td align="center" height="15" style="padding: 0; margin: 0;"></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table
                                        cellpadding="0"
                                        cellspacing="0"
                                        class="es-content"
                                        align="center"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%;"
                                    >
                                        <tr>
                                            <td class="es-m-p15r es-m-p15l" align="center" style="padding: 0; margin: 0;">
                                                <table
                                                    class="es-content-body"
                                                    align="center"
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 640px;"
                                                >
                                                    <tr>
                                                        <td class="es-m-p30t es-m-p30b es-m-p20r es-m-p20l" align="left" bgcolor="#ffffff" style="padding: 40px; margin: 0; background-color: #ffffff; border-radius: 20px 20px 0px 0px;">
                                                            <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                <tr>
                                                                    <td align="left" style="padding: 0; margin: 0; width: 560px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr>
                                                                                <td align="left" class="es-m-txt-l" style="padding: 0; margin: 0;">
                                                                                    <h1
                                                                                        style="
                                                                                            margin: 0;
                                                                                            line-height: 43px;
                                                                                            mso-line-height-rule: exactly;
                                                                                            font-family: \'Exo 2\', sans-serif;
                                                                                            font-size: 36px;
                                                                                            font-style: normal;
                                                                                            font-weight: bold;
                                                                                            color: #000000;
                                                                                            text-transform: uppercase;
                                                                                        "
                                                                                    >
                                                                                        Confirmation and Welcome To '.get_settings()->title.'
                                                                                    </h1>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="left" style="padding: 0; margin: 0; padding-top: 15px;">
                                                                                    <p
                                                                                        style="
                                                                                            margin: 0;
                                                                                            -webkit-text-size-adjust: none;
                                                                                            -ms-text-size-adjust: none;
                                                                                            mso-line-height-rule: exactly;
                                                                                            font-family: \'Exo 2\', sans-serif;
                                                                                            line-height: 27px;
                                                                                            color: #666666;
                                                                                            font-size: 18px;
                                                                                        "
                                                                                    >
                                                                                        We hope this email finds you well. Thank you for registering for the '.get_settings()->title.'! We are thrilled to have you on board and look forward to an engaging and insightful event.
                                                                                    </p>
                                                                                    <p
                                                                                        style="
                                                                                            margin: 0;
                                                                                            -webkit-text-size-adjust: none;
                                                                                            -ms-text-size-adjust: none;
                                                                                            mso-line-height-rule: exactly;
                                                                                            font-family: \'Exo 2\', sans-serif;
                                                                                            line-height: 27px;
                                                                                            color: #666666;
                                                                                            font-size: 18px;
                                                                                        "
                                                                                    >
                                                                                        <br />
                                                                                    </p>
                                                                                    <p
                                                                                        style="
                                                                                            margin: 0;
                                                                                            -webkit-text-size-adjust: none;
                                                                                            -ms-text-size-adjust: none;
                                                                                            mso-line-height-rule: exactly;
                                                                                            font-family: \'Exo 2\', sans-serif;
                                                                                            line-height: 27px;
                                                                                            color: #666666;
                                                                                            font-size: 18px;
                                                                                        "
                                                                                    >
                                                                                        As an attendee, you will gain access to valuable insights, innovative strategies, and a platform to connect with professionals who are also passionate about driving strategic shifts in their respective fields.<br />
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="left" style="padding: 0; margin: 0; padding-top: 30px;">
                                                                                    <!--[if mso]>
                                                                                        <a href="https://strategicshift.ophelconsult.com/" target="_blank" hidden>
                                                                                            <v:roundrect
                                                                                                xmlns:v="urn:schemas-microsoft-com:vml"
                                                                                                xmlns:w="urn:schemas-microsoft-com:office:word"
                                                                                                esdevVmlButton
                                                                                                href="https://strategicshift.ophelconsult.com/"
                                                                                                style="height: 52px; v-text-anchor: middle; width: 232px;"
                                                                                                arcsize="50%"
                                                                                                strokecolor="#ffdda9"
                                                                                                strokeweight="2px"
                                                                                                fillcolor="#ffdda9"
                                                                                            >
                                                                                                <w:anchorlock></w:anchorlock>
                                                                                                <center style="color: #000000; font-family: \'Exo 2\', sans-serif; font-size: 20px; font-weight: 400; line-height: 20px; mso-text-raise: 1px;">
                                                                                                    More Details
                                                                                                </center>
                                                                                            </v:roundrect>
                                                                                        </a>
                                                                                    <![endif]-->
                                                                                    <!--[if !mso]><!-- -->
                                                                                    <span
                                                                                        class="msohide es-button-border"
                                                                                        style="
                                                                                            border-style: solid;
                                                                                            border-color: #ffdda9;
                                                                                            background: #ffdda9;
                                                                                            border-width: 0px 0px 2px 0px;
                                                                                            display: inline-block;
                                                                                            border-radius: 30px;
                                                                                            width: auto;
                                                                                            mso-hide: all;
                                                                                        "
                                                                                    >
                                                                                        <a
                                                                                            href="'.route('ticket.view', $data['code']).'"
                                                                                            class="es-button"
                                                                                            target="_blank"
                                                                                            style="
                                                                                                mso-style-priority: 100 !important;
                                                                                                text-decoration: none;
                                                                                                -webkit-text-size-adjust: none;
                                                                                                -ms-text-size-adjust: none;
                                                                                                mso-line-height-rule: exactly;
                                                                                                color: #000000;
                                                                                                font-size: 20px;
                                                                                                padding: 15px 30px 15px 30px;
                                                                                                display: inline-block;
                                                                                                background: #ffdda9;
                                                                                                border-radius: 30px;
                                                                                                font-family: \'Exo 2\', sans-serif;
                                                                                                font-weight: normal;
                                                                                                font-style: normal;
                                                                                                line-height: 24px;
                                                                                                width: auto;
                                                                                                text-align: center;
                                                                                                mso-padding-alt: 0;
                                                                                                mso-border-alt: 10px solid #ffdda9;
                                                                                            "
                                                                                        >
                                                                                            Ticket Details
                                                                                        </a>
                                                                                    </span>
                                                                                    <!--<![endif]-->
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding: 0; margin: 0; padding-top: 30px; padding-left: 40px; padding-right: 40px;">
                                                            <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                <tr>
                                                                    <td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr>
                                                                                <td align="center" height="15" style="padding: 0; margin: 0;"></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding: 0; margin: 0; padding-top: 30px; padding-left: 40px; padding-right: 40px;">
                                                            <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                <tr>
                                                                    <td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr>
                                                                                <td align="center" height="15" style="padding: 0; margin: 0;"></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table
                                        cellpadding="0"
                                        cellspacing="0"
                                        class="es-footer"
                                        align="center"
                                        style="
                                            mso-table-lspace: 0pt;
                                            mso-table-rspace: 0pt;
                                            border-collapse: collapse;
                                            border-spacing: 0px;
                                            table-layout: fixed !important;
                                            width: 100%;
                                            background-color: transparent;
                                            background-repeat: repeat;
                                            background-position: center top;
                                        "
                                            >
                                        <tr>
                                            <td class="es-m-p15r es-m-p15l" align="center" style="padding: 0; margin: 0;">
                                                <table
                                                    class="es-footer-body"
                                                    cellspacing="0"
                                                    cellpadding="0"
                                                    align="center"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 640px;"
                                                        >
                                                    <tr>
                                                        <td class="es-m-p30t es-m-p30b es-m-p20r es-m-p20l" align="left" bgcolor="#ffffff" style="padding: 40px; margin: 0; background-color: #ffffff; border-radius: 20px;">
                                                            <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                <tr>
                                                                    <td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr>
                                                                                <td align="center" class="es-m-txt-l" style="padding: 0; margin: 0; font-size: 0px;" height="30">
                                                                                    <a
                                                                                        target="_blank"
                                                                                        href="https://strategicshift.ophelconsult.com/"
                                                                                        style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #391484; font-size: 16px;"
                                                                                            >
                                                                                        <img src="/web/assets/img/logo.png" alt style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" width="128" />
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center" class="es-m-txt-l" style="padding: 0; margin: 0; padding-top: 20px; font-size: 0;">
                                                                                    <table
                                                                                        cellpadding="0"
                                                                                        cellspacing="0"
                                                                                        class="es-table-not-adapt es-social"
                                                                                        role="presentation"
                                                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"
                                                                                            >
                                                                                        <tr>
                                                                                            <td align="center" valign="top" style="padding: 0; margin: 0; padding-right: 15px;">
                                                                                                <a href="https://www.facebook.com/groups/1248124482276080/permalink/1697395844015606/?mibextid=S66gvF">
                                                                                                    <img
                                                                                                        title="Facebook"
                                                                                                        src="/email/images/facebook-logo-black.png"
                                                                                                        alt="Fb"
                                                                                                        width="32"
                                                                                                        height="32"
                                                                                                        style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                                            />
                                                                                                </a>
                                                                                            </td>
                                                                                            <td align="center" valign="top" style="padding: 0; margin: 0; padding-right: 15px;">
                                                                                                <a href="https://www.instagram.com/p/CwFMN0wMJpS/?igshid=MzRlODBiNWFlZA==">
                                                                                                    <img
                                                                                                        title="Instagram"
                                                                                                        src="/email/images/instagram-logo-black.png"
                                                                                                        alt="Inst"
                                                                                                        width="32"
                                                                                                        height="32"
                                                                                                        style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                                            />
                                                                                                </a>
                                                                                            </td>
                                                                                            <td align="center" valign="top" style="padding: 0; margin: 0;">
                                                                                                <a href="https://t.me/OphelConsultandEnterpriseGroup/764">
                                                                                                    <img
                                                                                                        title="Telegram"
                                                                                                        src="/email/images/telegram-logo-black.png"
                                                                                                        alt="Yt"
                                                                                                        width="32"
                                                                                                        height="32"
                                                                                                        style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;"
                                                                                                            />
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center" class="es-m-txt-l" style="padding: 0; margin: 0; padding-top: 15px;">
                                                                                    <p
                                                                                        style="
                                                                                            margin: 0;
                                                                                            -webkit-text-size-adjust: none;
                                                                                            -ms-text-size-adjust: none;
                                                                                            mso-line-height-rule: exactly;
                                                                                            font-family: \'Exo 2\', sans-serif;
                                                                                            line-height: 24px;
                                                                                            color: #666666;
                                                                                            font-size: 16px;
                                                                                        "
                                                                                            >
                                                                                            Once again, thank you for choosing to be a part of the '.get_settings()->title.'. We are excited to have you with us and cannot wait to witness the valuable contributions you will bring to the event.
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding: 0; margin: 0; padding-top: 30px; padding-left: 40px; padding-right: 40px;">
                                                            <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                <tr>
                                                                    <td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr class="es-mobile-hidden">
                                                                                <td align="center" height="15" style="padding: 0; margin: 0;"></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table
                                        cellpadding="0"
                                        cellspacing="0"
                                        class="es-content"
                                        align="center"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%;"
                                            >
                                        <tr>
                                            <td align="center" style="padding: 0; margin: 0;">
                                                <table
                                                    bgcolor="transparent"
                                                    class="es-content-body"
                                                    align="center"
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;"
                                                        >
                                                    <tr>
                                                        <td align="left" style="margin: 0; padding-left: 20px; padding-right: 20px; padding-top: 30px; padding-bottom: 30px;">
                                                            <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                <tr>
                                                                    <td valign="top" align="center" style="padding: 0; margin: 0; width: 600px;">
                                                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                                            <tr>
                                                                                <td class="es-infoblock made_with" align="center" style="padding: 0; margin: 0; line-height: 120%; font-size: 0; color: #cccccc;">
                                                                                    <a
                                                                                        target="_blank"
                                                                                        href="https://strategicshift.ophelconsult.com/"
                                                                                        style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; text-decoration: underline; color: #cccccc; font-size: 12px;"
                                                                                            >
                                                                                        <img src="/web/assets/img/favicon.png" alt width="125" style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" />
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </body>
            </html>
        ';

        return $htmlContent;
    }
}

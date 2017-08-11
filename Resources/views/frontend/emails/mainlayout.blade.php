<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

    <style type="text/css">

        body {
            width: 100%;
            background-color: #4c4e4e;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }

        /* ----------- responsivity ----------- */
        @media only screen and (max-width: 640px) {

            /*------ top header ------ */
            .header-bg {
                width: 440px !important;
                height: 10px !important;
            }

            .main-header {
                line-height: 28px !important;
            }

            .main-subheader {
                line-height: 28px !important;
            }

            .container {
                width: 440px !important;
            }

            .container-middle {
                width: 420px !important;
            }

            .mainContent {
                width: 400px !important;
            }

            .main-image {
                width: 400px !important;
                height: auto !important;
            }

            .banner {
                width: 400px !important;
                height: auto !important;
            }

            /*------ sections ---------*/
            .section-item {
                width: 400px !important;
            }

            .section-img {
                width: 400px !important;
                height: auto !important;
            }

            /*------- prefooter ------*/
            .prefooter-header {
                padding: 0 10px !important;
                line-height: 24px !important;
            }

            .prefooter-subheader {
                padding: 0 10px !important;
                line-height: 24px !important;
            }

            /*------- footer ------*/
            .top-bottom-bg {
                width: 420px !important;
                height: auto !important;
            }

        }

        @media only screen and (max-width: 479px) {

            /*------ top header ------ */
            .header-bg {
                width: 280px !important;
                height: 10px !important;
            }

            .top-header-left {
                width: 260px !important;
                text-align: center !important;
            }

            .top-header-right {
                width: 260px !important;
            }

            .main-header {
                line-height: 28px !important;
                text-align: center !important;
            }

            .main-subheader {
                line-height: 28px !important;
                text-align: center !important;
            }

            /*------- header ----------*/
            .logo {
                width: 260px !important;
            }

            .nav {
                width: 260px !important;
            }

            .container {
                width: 280px !important;
            }

            .container-middle {
                width: 260px !important;
            }

            .mainContent {
                width: 240px !important;
            }

            .main-image {
                width: 240px !important;
                height: auto !important;
            }

            .banner {
                width: 240px !important;
                height: auto !important;
            }

            /*------ sections ---------*/
            .section-item {
                width: 240px !important;
            }

            .section-img {
                width: 240px !important;
                height: auto !important;
            }

            /*------- prefooter ------*/
            .prefooter-header {
                padding: 0 10px !important;
                line-height: 28px !important;
            }

            .prefooter-subheader {
                padding: 0 10px !important;
                line-height: 28px !important;
            }

            /*------- footer ------*/
            .top-bottom-bg {
                width: 260px !important;
                height: auto !important;
            }

        }


    </style>

</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td height="30"></td>
    </tr>
    <tr bgcolor="#4c4e4e">
        <td width="100%" align="center" valign="top" bgcolor="#4c4e4e">

            <!---------   top header   ------------>
            <table border="0" width="600" cellpadding="0" cellspacing="0" align="center" class="container">
                <tbody>
                <tr>
                    <td><img style="display: block;"
                             src="{{ url('modules/iforms/img/top-header-bg.png') }}" alt=""
                             class="header-bg"></td>
                </tr>

                <tr bgcolor="009CDE">
                    <td height="5"></td>
                </tr>

                <tr bgcolor="009CDE">
                    <td align="center">
                        <table border="0" width="560" align="center" cellpadding="0" cellspacing="0"
                               class="container-middle">
                            <tbody>
                            <tr>
                                <td>
                                    <table border="0" align="left" cellpadding="0" cellspacing="0"
                                           class="top-header-left">
                                        <tbody>
                                        <tr>
                                            <td align="center">
                                                <table border="0" cellpadding="0" cellspacing="0" class="date">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <img editable="true" mc:edit="icon1" width="13"
                                                                 style="display: block;"
                                                                 src="{{ url('modules/iforms/img/icon-cal.png') }}"
                                                                 alt="icon 1">
                                                        </td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td mc:edit="date"
                                                            style="color: #fefefe; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                            <singleline>
                                                                Lunes 26 de Julio
                                                            </singleline>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table border="0" align="left" cellpadding="0" cellspacing="0"
                                           class="top-header-right">
                                        <tbody>
                                        <tr>
                                            <td width="30" height="20"></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table border="0" align="right" cellpadding="0" cellspacing="0"
                                           class="top-header-right">
                                        <tbody>
                                        <tr>
                                            <td align="center">
                                                <table border="0" cellpadding="0" cellspacing="0" align="center"
                                                       class="tel">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <img editable="true" mc:edit="icon2" width="17"
                                                                 style="display: block;"
                                                                 src="{{ url('modules/iforms/img/icon-tel.png') }}"
                                                                 alt="icon 2">
                                                        </td>
                                                        <td>&nbsp;&nbsp;</td>
                                                        <td mc:edit="tel"
                                                            style="color: #fefefe; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                            <singleline>
                                                                Teléfono : +1 (555) 555-5555
                                                            </singleline>
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

                <tr bgcolor="009CDE">
                    <td height="20"></td>
                </tr>

                <tr bgcolor="009CDE">
                    <td align="center">
                        <a href="http://promailthemes.com/campaigner/layout1/white/blue/index.html"
                           style="display: block;"><img editable="true" mc:edit="logo" width="155"
                                                        style="display: block;"
                                                        src="{{Theme::url('img/logo.png')}}"
                                                        alt="logo"></a>
                    </td>
                </tr>
                <tr bgcolor="009CDE">
                    <td height="20"></td>
                </tr>

                </tbody>
            </table>

            <!----------    end top header    ------------>


            <!----------   main content------------>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="container"
                   bgcolor="F2F2F2">


                <!--------- Header  ---------->
                <tbody>

                <tr bgcolor="F2F2F2">
                    <td height="20"></td>
                </tr>
                <!---------- end header --------->


                <!--------- main section --------->
                <tr>
                    <td>
                        <table border="0" width="560" align="center" cellpadding="0" cellspacing="0"
                               class="container-middle">

                            <tbody>
                            <tr>
                                <td align="center"><img style="display: block;" width="560" height="auto"
                                                        src="{{ url('modules/iforms/img/top-rounded-bg.png') }}"
                                                        alt="" class="top-bottom-bg"></td>
                            </tr>

                            <tr bgcolor="ffffff">
                                <td height="7"></td>
                            </tr>

                            <tr bgcolor="ffffff">
                                <td height="20"></td>
                            </tr>

                            <tr bgcolor="ffffff">
                                <td>
                                    @yield('content')
                                </td>
                            </tr>

                            <tr bgcolor="ffffff">
                                <td height="25"></td>
                            </tr>

                            <tr>
                                <td align="center"><img style="display: block;" width="560" height="auto"
                                                        src="{{ url('modules/iforms/img/bottom-rounded-bg.png') }}"
                                                        alt="" class="top-bottom-bg"></td>
                            </tr>

                            </tbody>
                        </table>
                    </td>
                </tr><!--------- end main section --------->


                <tr>
                    <td height="20"></td>
                </tr>

                <!---------- prefooter  --------->

                <tr>
                    <td>
                        <table border="0" width="560" align="center" cellpadding="0" cellspacing="0"
                               class="container-middle">
                            <tbody>
                            <tr>
                                <td>
                                    <table border="0" align="center" cellpadding="0" cellspacing="0" class="nav">
                                        <tbody>
                                        <tr>
                                            <td height="10"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" mc:edit="socials"
                                                style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;">
                                                <table border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <a style="display: block; width: 16px;"
                                                               href="#"><img
                                                                        editable="true" mc:edit="facebook" width="16"
                                                                        style="display: block;"
                                                                        src="{{ url('modules/iforms/img/social-facebook.png') }}"
                                                                        alt="facebook"></a>
                                                        </td>
                                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                            <a style="display: block; width: 16px;"
                                                               href="#"><img
                                                                        editable="true" mc:edit="twitter" width="16"
                                                                        style="display: block;"
                                                                        src="{{ url('modules/iforms/img/social-twitter.png') }}"
                                                                        alt="twitter"></a>
                                                        </td>
                                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                            <a style="display: block; width: 16px;"
                                                               href=#"><img
                                                                        editable="true" mc:edit="linkedin" width="16"
                                                                        style="display: block;"
                                                                        src="{{ url('modules/iforms/img/social-linkedin.png') }}"
                                                                        alt="linkedin"></a>
                                                        </td>
                                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                            <a style="display: block; width: 16px;"
                                                               href="#"><img
                                                                        editable="true" mc:edit="youtube" width="16"
                                                                        style="display: block;"
                                                                        src="{{ url('modules/iforms/img/social-youtube.png') }}"
                                                                        alt="youtube"></a>
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
                </tr><!---------- end prefooter  --------->


                <tr>
                    <td height="30"></td>
                </tr>

                <tr>
                    <td align="center" mc:edit="copy2"
                        style="color: #939393; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;"
                        class="prefooter-subheader">
                        <multiline>
                            <span style="color: #009CDE">Dirección :</span> 123 Street City &nbsp;&nbsp;&nbsp; <span
                                    style="color: #009CDE">Tlf :</span> 6665554443 &nbsp;&nbsp;&nbsp;<span
                                    style="color: #009CDE">Email :</span> example(@)promail.com

                        </multiline>
                    </td>
                </tr>

                <tr>
                    <td height="30"></td>
                </tr>
                </tbody>
            </table>
            <!------------ end main Content ----------------->


            <!---------- footer  --------->
            <table border="0" width="600" cellpadding="0" cellspacing="0" class="container">
                <tbody>
                <tr bgcolor="009CDE">
                    <td height="14"></td>
                </tr>
                <tr bgcolor="009CDE">
                    <td mc:edit="copy3" align="center"
                        style="color: #cecece; font-size: 10px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                        <multiline>
                            Copyright © {{date('Y')}} Todos Los Derechos Reservados
                        </multiline>
                    </td>
                </tr>

                <tr>
                    <td><img style="display: block;"
                             src="{{ url('modules/iforms/img/bottom-footer-bg.png') }}" alt=""
                             class="header-bg"></td>
                </tr>
                </tbody>
            </table>
            <!---------  end footer --------->
        </td>
    </tr>

    <tr>
        <td height="30"></td>
    </tr>

    </tbody>
</table>


</body>
</html>
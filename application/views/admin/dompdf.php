<html>
<head>
    <title>TITLE EXAMPLE - XYZ</title>
    <style>
        @page { margin: 200px 25px; }
        header { position: fixed; top: -200px; left: 0px; right: 0px; height: 50px; }
        header .title { font-size: 1.1rem; font-weight: 600; border: 2px solid black; border-radius: 3px; margin-left: 15px; padding: 10px; }
        footer { position: fixed; bottom: -160px; left: 0px; right: 0px; height: 100px; }
        footer img { width: 100%; height: 100%; }
        .table { border-collapse: collapse; }
        .table, .table th, .table td { border: 1px solid black; }
        .table th { font-size: 14px; background-color: #cdcdcd; padding: 10px; }
        .table td { font-size: 12px; }
        .table .th td { font-size: 13px; padding: 5px 10px 5px 10px; }
        .table .whiteBB td { border-bottom-color: white;}
        .pushFirst { padding: 10px 10px 10px 10px; }
        .pushTop { padding: 10px 10px 2px 10px; }
        .pushBottom { padding: 2px 10px 10px 10px; }
        .pushNormal { padding: 2px 10px 2px 10px; }
    </style>
</head>
<body>
<!-- Define header and footer blocks before your content -->
<header>
    <table style="width: 100%;">
        <tr>
            <td style="width: 45%;"><img src="<?=_STE_LOGO_?>" style="height: 200px; width: 280px;"></td>
            <td style="width: 20%; text-align: center;"></td>
            <td style="width: 35%; text-align: center;"><div class="title" style="width: 200px; margin-top: 60px; background-color: #cdcdcd; font-family: Arial, Helvetica, sans-serif;">TITLE EXAMPLE</div></td>
        </tr>
    </table>
</header>

<footer>
    <div style="width: 100%; border: 2px solid black; border-radius: 2px; padding: 5px; margin: 0px 15px 0px 18px ; text-align: left;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 100%;">
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->adresse?></p>
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->ville.", ".$info->pays?></p>
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->telephone.(!empty($info->fix)?" &nbsp;/&nbsp; ".$info->fix : "")?></p>
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->email?></p>
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->web?></p>
                </td>
            </tr>
        </table>
    </div>
</footer>

<!-- Wrap the content of your PDF inside a main tag -->
<main style="margin-right: 20px; margin-left: 20px;">
    <table style="width: 100%;">
        <tr>
            <td style="width: 40% !important; vertical-align: top;">
                <div style="width: 100%; border: 2px solid black; padding: 10px; font-size: 14px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">Code Example</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;">XYZ</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">Date Example</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;">XYZ</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">N° Example</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;">XYZ</td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="width: 5% !important;"><br></td>
            <td style="width: 55% !important; vertical-align: top;">
                <div style="width: 100%; border: 2px solid black; padding: 10px; font-size: 14px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">Name Example</td>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600; vertical-align: top;">XYZ</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">ICE Example</td>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600; vertical-align: top;">XYZ</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">Adresse Example</td>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600; vertical-align: top;">XYZ</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <table class="table" style="width: 100%; margin-top: 20px;">
        <tr>
            <th style="width: 5%;">Example</th>
            <th style="width: 52%;">Example</th>
            <th style="width: 15%;">Example</th>
            <th style="width: 10%;">Example</th>
            <th style="width: 18%;">Example</th>
        </tr>
        <tr>
            <td style="width: 5%;"><br><br><br></td>
            <td style="width: 52%;"><br><br><br></td>
            <td style="width: 15%;"><br><br><br></td>
            <td style="width: 10%;"><br><br><br></td>
            <td style="width: 18%;"><br><br><br></td>
        </tr>
        <tr class="th">
            <td colspan="4"><strong style="font-size: 14px;">Example</strong></td>
            <td><strong style="font-size: 14px;">XYZ</td>
        </tr>
        <tr class="th">
            <td colspan="4"><strong style="font-size: 14px;">Example</td>
            <td><strong style="font-size: 14px;">XYZ</td>
        </tr>
        <tr class="th" style="background-color: #cdcdcd;">
            <td colspan="4"><strong style="font-size: 14px;">Example</strong></td>
            <td><strong style="font-size: 14px;">XYZ</td>
        </tr>
    </table>
</main>

</body>
</html>
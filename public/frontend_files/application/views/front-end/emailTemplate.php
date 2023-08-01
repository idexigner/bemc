<html>
<head>
    <meta charset="utf-8" />
    <title>Rx-MiMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div>
    <table style="border-collapse: collapse;border-spacing: 0;width: 100%" class="contents">
        <tbody>
        <tr>
            <td style="padding: 0;vertical-align: top;padding-left: 90px;padding-right: 90px" class="padded">
                <p style="Margin-top: 0;color: #4e5561;font-size: 16px;font-family: sans-serif;line-height: 25px;Margin-bottom: 25px;font-weight: 400">
                    Hi <?php echo $Name;?>,
                    <br><?php echo $Item;?>—has been added to
                    <a href="https://www.rxmimsbd.com">www.rxmimsbd.com</a> . Please click here <a href="<?php echo $Link;?>">www.rxmimsbd.com</a> to view. Thanks.
                    <br><br><br>
                    If you want to unsubscribe then click here <a href="<?php echo site_url('User/unsubscribeNotification?UnsubscribeLink=').$UnsubscribeLink;?>">unsubscribe</a>
                </p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>

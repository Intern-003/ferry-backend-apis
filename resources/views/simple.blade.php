<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Enquiry</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f6f9; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0"
           style="padding:30px 10px; background-color:#f4f6f9;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                       style="max-width:600px; width:100%; background:#ffffff;
                              border-radius:8px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background-color:#0d6efd; padding:25px; text-align:center; color:#ffffff;">
                            <h1 style="margin:0; font-size:24px;">
                                Customer Enquiry
                            </h1>
                            <p style="margin:10px 0 0; font-size:14px;">
                                New enquiry received from your website
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px; color:#333333;">

                            <p style="font-size:16px;">
                                Hello Team,
                            </p>

                            <p style="font-size:14px; line-height:1.6;">
                                You have received a new customer enquiry.
                                Please find the details below.
                            </p>

                            <table width="100%" cellpadding="10" cellspacing="0"
                                   style="border-collapse:collapse; font-size:14px;">

                                <tr>
                                    <td style="border-bottom:1px solid #eeeeee; width:35%;">
                                        <strong>Name</strong>
                                    </td>
                                    <td style="border-bottom:1px solid #eeeeee;">
                                        {{ $data['name'] ?? 'Not provided' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="border-bottom:1px solid #eeeeee;">
                                        <strong>Mobile</strong>
                                    </td>
                                    <td style="border-bottom:1px solid #eeeeee;">
                                        {{ $data['mobile'] ?? 'Not provided' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="border-bottom:1px solid #eeeeee;">
                                        <strong>Email</strong>
                                    </td>
                                    <td style="border-bottom:1px solid #eeeeee;">
                                        {{ $data['email'] ?? 'Not provided' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="border-bottom:1px solid #eeeeee;">
                                        <strong>Enquiry Type</strong>
                                    </td>
                                    <td style="border-bottom:1px solid #eeeeee;">
                                        {{ $data['enquiry'] ?? 'Not provided' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="vertical-align:top;">
                                        <strong>Message</strong>
                                    </td>
                                    <td style="line-height:1.6; white-space:pre-line;">
                                        {{ $data['message'] ?? 'No message provided' }}
                                    </td>
                                </tr>

                            </table>

                            <p style="margin-top:25px; font-size:14px; line-height:1.6;">
                                Please contact the customer to respond to this enquiry.
                            </p>

                            <p style="font-size:14px;">
                                Regards,<br>
                                <strong>Website Support Team</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f0f2f5; padding:15px;
                                   text-align:center; font-size:12px; color:#777777;">
                            This is an automated email notification.
                            Please do not reply directly unless appropriate.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>



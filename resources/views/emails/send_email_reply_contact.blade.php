<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Response to Your Inquiry | KK Patel Super Speciality Hospital</title>
    <style>
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #f1f5f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #334155; }
        @media screen and (max-width: 600px) {
            .email-container { width: 100% !important; margin: auto !important; }
            .content-padding { padding: 22px 16px !important; }
            .header-padding { padding: 22px 16px !important; }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f1f5f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f1f5f9; padding: 30px 10px;">
        <tr>
            <td align="center">
                <!-- Main Card -->
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" class="email-container" style="max-width: 600px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08); border: 1px solid #e2e8f0;">
                    
                    <!-- Header -->
                    <tr>
                        <td class="header-padding" style="background: linear-gradient(135deg, #69275c 0%, #4a1540 100%); padding: 28px 35px; text-align: center;">
                            <div style="display: inline-block; background-color: #ffffff; padding: 6px 14px; border-radius: 8px; margin-bottom: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                                <span style="font-size: 16px; font-weight: 800; color: #69275c; letter-spacing: 0.5px;">KK PATEL</span>
                                <span style="font-size: 14px; font-weight: 600; color: #0284c7;">HOSPITAL</span>
                            </div>
                            <h1 style="color: #ffffff; font-size: 19px; font-weight: 800; margin: 0 0 4px; letter-spacing: 0.3px;">SUPER SPECIALITY HOSPITAL</h1>
                            <p style="color: #cbd5e1; font-size: 12px; margin: 0; font-weight: 500;">Bhuj - Mirzapar Highway, Bhuj &bull; NABH Accredited</p>
                        </td>
                    </tr>

                    <!-- Top Teal/Purple Line -->
                    <tr>
                        <td style="height: 4px; background: linear-gradient(90deg, #69275c 0%, #00a896 50%, #0284c7 100%); font-size: 0; line-height: 0;">&nbsp;</td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td class="content-padding" style="padding: 35px 35px; background-color: #ffffff;">
                            
                            <!-- Topic Badge -->
                            <div style="text-align: center; margin-bottom: 24px;">
                                <div style="display: inline-block; width: 62px; height: 62px; border-radius: 50%; background: #f0fdf4; border: 2px solid #bbf7d0; line-height: 62px; font-size: 26px; text-align: center;">
                                    💬
                                </div>
                                <h2 style="font-size: 21px; font-weight: 800; color: #0f172a; margin: 14px 0 6px;">Response to Your Inquiry</h2>
                                <p style="font-size: 13.5px; color: #64748b; margin: 0;">Official Communication from Patient Care Desk</p>
                            </div>

                            <!-- Greeting -->
                            <p style="font-size: 15px; color: #334155; line-height: 1.6; margin: 0 0 14px;">
                                Dear <strong style="color: #0f172a;">{{ $data['contactname'] }}</strong>,
                            </p>

                            <p style="font-size: 14px; color: #475569; line-height: 1.6; margin: 0 0 20px;">
                                Thank you for contacting <strong>KK Patel Super Speciality Hospital</strong>. Our patient care and administrative team has reviewed your communication. Please find our official response below:
                            </p>

                            @if(!empty($data['message']))
                            <!-- Original Inquiry Box (if available) -->
                            <div style="background-color: #f8fafc; border-left: 3px solid #94a3b8; border-radius: 6px; padding: 12px 16px; margin-bottom: 20px;">
                                <span style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-bottom: 4px;">
                                    Your Original Inquiry:
                                </span>
                                <p style="font-size: 13px; color: #334155; margin: 0; font-style: italic; line-height: 1.5;">
                                    "{{ $data['message'] }}"
                                </p>
                            </div>
                            @endif

                            <!-- Official Reply Card -->
                            <div style="background-color: #fbf5fa; border: 1.5px solid #f3e8f1; border-left: 5px solid #69275c; border-radius: 12px; padding: 20px 22px; margin-bottom: 26px;">
                                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <span style="font-size: 12px; font-weight: 800; color: #69275c; text-transform: uppercase; letter-spacing: 0.6px;">
                                        🏥 Hospital Support Desk Response:
                                    </span>
                                </div>
                                <div style="font-size: 14.5px; color: #1e293b; line-height: 1.7; white-space: pre-line;">
{{ $data['replied'] }}
                                </div>
                            </div>

                            <!-- Further Assistance -->
                            <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px; margin-bottom: 20px;">
                                <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.5;">
                                    Have more questions or need immediate appointment scheduling? Feel free to reply to this email, visit our website at <a href="{{ url('/') }}" style="color: #69275c; font-weight: 700; text-decoration: underline;">kkphospital.org</a>, or call our central desk at <strong style="color: #0f172a;">02832 232233</strong>.
                                </p>
                            </div>

                            <!-- Sign Off -->
                            <div style="margin-top: 24px; padding-top: 18px; border-top: 1px solid #f1f5f9;">
                                <p style="font-size: 14px; color: #475569; margin: 0 0 4px; font-weight: 600;">Warm regards,</p>
                                <p style="font-size: 14px; color: #69275c; margin: 0; font-weight: 800;">Patient Care &amp; Public Relations Desk</p>
                                <p style="font-size: 12px; color: #64748b; margin: 2px 0 0;">KK Patel Super Speciality Hospital, Bhuj</p>
                            </div>

                        </td>
                    </tr>

                    <!-- Hospital Footer -->
                    <tr>
                        <td style="background-color: #0f172a; padding: 24px 30px; text-align: center; color: #94a3b8; font-size: 12px; line-height: 1.6;">
                            <p style="color: #e2e8f0; font-weight: 700; margin: 0 0 6px; font-size: 13px;">
                                KK Patel Super Speciality Hospital
                            </p>
                            <p style="margin: 0 0 8px; color: #94a3b8;">
                                Bhuj - Mirzapar Highway, Bhuj, Kutch, Gujarat - 370001
                            </p>
                            <p style="margin: 0 0 10px; color: #cbd5e1;">
                                <strong style="color: #38bdf8;">OPD Helpline:</strong> 02832 232233 &bull;
                                <strong style="color: #f43f5e;">24x7 Emergency:</strong> 02832 236000 &bull;
                                <strong style="color: #10b981;">Email:</strong> info@kkphospital.org
                            </p>
                            <p style="margin: 0; font-size: 11px; color: #64748b;">
                                &copy; {{ date('Y') }} KK Patel Super Speciality Hospital. All rights reserved. &bull; Managed by Shree Kutchi Leva Patel Kanya Kelavani Mandal
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>

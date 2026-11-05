<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset | KK Patel Super Speciality Hospital</title>
    <style>
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #f1f5f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #334155; }
        @media screen and (max-width: 600px) {
            .email-container { width: 100% !important; margin: auto !important; }
            .content-padding { padding: 24px 18px !important; }
            .header-padding { padding: 24px 18px !important; }
            .btn-cta { display: block !important; width: 100% !important; text-align: center !important; }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f1f5f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f1f5f9; padding: 30px 10px;">
        <tr>
            <td align="center">
                <!-- Main Email Card -->
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" class="email-container" style="max-width: 600px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08); border: 1px solid #e2e8f0;">
                    
                    <!-- Top Brand Header Bar -->
                    <tr>
                        <td class="header-padding" style="background: linear-gradient(135deg, #69275c 0%, #4a1540 100%); padding: 30px 35px; text-align: center;">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center">
                                        <div style="display: inline-block; background-color: #ffffff; padding: 6px 14px; border-radius: 8px; margin-bottom: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                                            <span style="font-size: 16px; font-weight: 800; color: #69275c; letter-spacing: 0.5px;">KK PATEL</span>
                                            <span style="font-size: 14px; font-weight: 600; color: #0284c7;">HOSPITAL</span>
                                        </div>
                                        <h1 style="color: #ffffff; font-size: 20px; font-weight: 800; margin: 0 0 4px; letter-spacing: 0.3px;">SUPER SPECIALITY HOSPITAL</h1>
                                        <p style="color: #cbd5e1; font-size: 12px; margin: 0; font-weight: 500;">Bhuj - Mirzapar Highway, Bhuj &bull; NABH Accredited</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Accent Line -->
                    <tr>
                        <td style="height: 4px; background: linear-gradient(90deg, #69275c 0%, #0284c7 50%, #00a896 100%); font-size: 0; line-height: 0;">&nbsp;</td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td class="content-padding" style="padding: 35px 40px; background-color: #ffffff;">
                            
                            <!-- Security Badge -->
                            <div style="text-align: center; margin-bottom: 24px;">
                                <div style="display: inline-block; width: 64px; height: 64px; border-radius: 50%; background: #fdf2f8; border: 2px solid #fbcfe8; line-height: 64px; font-size: 28px; text-align: center;">
                                    🔐
                                </div>
                                <h2 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 14px 0 6px;">Password Reset Request</h2>
                                <p style="font-size: 14px; color: #64748b; margin: 0;">Secure Clinical &amp; Patient Portal Authentication</p>
                            </div>

                            <!-- Greeting -->
                            <p style="font-size: 15px; color: #334155; line-height: 1.6; margin: 0 0 16px;">
                                Hello <strong style="color: #0f172a;">{{ $data['email'] }}</strong>,
                            </p>

                            <p style="font-size: 14.5px; color: #475569; line-height: 1.6; margin: 0 0 24px;">
                                We received a request to reset the password for your KK Patel Hospital portal account. If you initiated this request, please click the secure button below to set a new password:
                            </p>

                            <!-- CTA Button -->
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 28px 0;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ $data['url'] }}" target="_blank" class="btn-cta" style="display: inline-block; background: linear-gradient(135deg, #69275c 0%, #8c2374 50%, #0284c7 100%); color: #ffffff; text-decoration: none; padding: 14px 34px; border-radius: 50px; font-size: 15px; font-weight: 800; letter-spacing: 0.4px; box-shadow: 0 8px 20px rgba(105, 39, 92, 0.35);">
                                            Reset My Password &rarr;
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Alternative Link Box -->
                            <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 14px 18px; margin: 24px 0 20px;">
                                <p style="font-size: 12px; color: #64748b; margin: 0 0 6px; font-weight: 600;">Button not working? Copy and paste this URL into your browser:</p>
                                <p style="font-size: 12px; color: #0284c7; margin: 0; word-break: break-all; font-family: monospace;">
                                    <a href="{{ $data['url'] }}" style="color: #0284c7; text-decoration: underline;">{{ $data['url'] }}</a>
                                </p>
                            </div>

                            <!-- Security Advisory Box -->
                            <div style="background-color: #fffbeb; border-left: 4px solid #f59e0b; border-radius: 6px; padding: 12px 16px; margin-top: 24px;">
                                <p style="font-size: 13px; color: #92400e; margin: 0; line-height: 1.5;">
                                    <strong>Security Notice:</strong> If you did not request this password reset, please ignore this email or notify our hospital IT helpdesk immediately. Your account remains completely safe.
                                </p>
                            </div>

                            <!-- Sign Off -->
                            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #f1f5f9;">
                                <p style="font-size: 14px; color: #475569; margin: 0 0 4px; font-weight: 600;">Warm regards,</p>
                                <p style="font-size: 14px; color: #69275c; margin: 0; font-weight: 800;">IT &amp; Digital Health Team</p>
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
                                <strong style="color: #38bdf8;">OPD:</strong> 02832 232233 &bull;
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

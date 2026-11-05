<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment Update | KK Patel Super Speciality Hospital</title>
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
            .btn-cta { display: block !important; width: 100% !important; text-align: center !important; }
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

                    <!-- Top Rose/Amber Accent Line -->
                    <tr>
                        <td style="height: 4px; background: linear-gradient(90deg, #f43f5e 0%, #fb923c 50%, #69275c 100%); font-size: 0; line-height: 0;">&nbsp;</td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td class="content-padding" style="padding: 35px 35px; background-color: #ffffff;">
                            
                            <!-- Status Banner -->
                            <div style="text-align: center; margin-bottom: 24px;">
                                <div style="display: inline-block; width: 62px; height: 62px; border-radius: 50%; background: #fff1f2; border: 2px solid #fecdd3; line-height: 62px; font-size: 26px; text-align: center;">
                                    🗓️
                                </div>
                                <h2 style="font-size: 21px; font-weight: 800; color: #9f1239; margin: 14px 0 6px;">Appointment Update</h2>
                                <div>
                                    <span style="display: inline-block; background: #fff1f2; color: #be123c; border: 1px solid #fecdd3; padding: 4px 14px; border-radius: 50px; font-size: 11.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px;">
                                        &bull; Status: Unable to Confirm Slot &bull;
                                    </span>
                                </div>
                            </div>

                            <!-- Greeting -->
                            <p style="font-size: 15px; color: #334155; line-height: 1.6; margin: 0 0 14px;">
                                Dear <strong style="color: #0f172a;">{{ $data['appointmentname'] }}</strong>,
                            </p>

                            <p style="font-size: 14px; color: #475569; line-height: 1.6; margin: 0 0 20px;">
                                Thank you for choosing <strong>KK Patel Super Speciality Hospital</strong>. We regret to inform you that your requested consultation slot with <strong>{{ $data['username'] }}</strong> could not be scheduled at the requested time due to emergency surgical commitments, doctor leave, or heavy clinical queue volume.
                            </p>

                            <!-- Requested Details Summary -->
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; margin-bottom: 24px;">
                                <tr>
                                    <td style="background-color: #f1f5f9; color: #475569; padding: 10px 16px; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px;">
                                        Requested Consultation Details
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 14px 16px;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 8px;">
                                            <tr>
                                                <td width="35%" style="font-size: 12.5px; color: #64748b; font-weight: 600;">Doctor:</td>
                                                <td width="65%" style="font-size: 13.5px; color: #0f172a; font-weight: 700;">{{ $data['username'] }}</td>
                                            </tr>
                                        </table>
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 8px;">
                                            <tr>
                                                <td width="35%" style="font-size: 12.5px; color: #64748b; font-weight: 600;">Department:</td>
                                                <td width="65%" style="font-size: 13px; color: #0284c7; font-weight: 600;">{{ $data['departmentname'] }}</td>
                                            </tr>
                                        </table>
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td width="35%" style="font-size: 12.5px; color: #64748b; font-weight: 600;">Requested Slot:</td>
                                                <td width="65%" style="font-size: 13px; color: #475569; font-weight: 600;">{{ $data['date'] }} at {{ $data['time'] }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Easy Next Steps Box -->
                            <div style="background-color: #f0f9ff; border: 1.5px solid #bae6fd; border-radius: 12px; padding: 18px 20px; margin-bottom: 24px;">
                                <h3 style="font-size: 14px; font-weight: 800; color: #0369a1; margin: 0 0 10px; text-transform: uppercase; letter-spacing: 0.5px;">
                                    What You Can Do Next:
                                </h3>
                                <p style="font-size: 13px; color: #0c4a6e; line-height: 1.5; margin: 0 0 14px;">
                                    We sincerely apologize for any inconvenience caused. You can easily pick an alternate consultation date or choose another specialist doctor from the same department:
                                </p>
                                
                                <div style="text-align: center; margin: 16px 0 10px;">
                                    <a href="{{ url('/appointment') }}" target="_blank" class="btn-cta" style="display: inline-block; background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); color: #ffffff; text-decoration: none; padding: 12px 28px; border-radius: 50px; font-size: 13.5px; font-weight: 800; letter-spacing: 0.3px; box-shadow: 0 6px 16px rgba(2, 132, 199, 0.3);">
                                        Choose Another Date / Time Slot &rarr;
                                    </a>
                                </div>
                            </div>

                            <!-- Phone Helpdesk Assistance -->
                            <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px; margin-bottom: 20px;">
                                <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.5;">
                                    <strong>Prefer speaking with our team?</strong> Call our Central OPD Scheduling Helpdesk directly at <strong style="color: #69275c;">02832 232233</strong> and our executive will assist you with immediate priority booking.
                                </p>
                            </div>

                            <!-- Urgent Care Reminder -->
                            <div style="background-color: #fff1f2; border-left: 4px solid #f43f5e; border-radius: 6px; padding: 12px 16px; margin-bottom: 20px;">
                                <p style="font-size: 12.5px; color: #9f1239; margin: 0; line-height: 1.5;">
                                    <strong>Medical Emergency Notice:</strong> If you are experiencing acute pain, severe breathing difficulty, chest discomfort, or other critical symptoms, do not wait for an OPD slot. Visit our <strong>24/7 Casualty &amp; Emergency Department</strong> immediately or call our ambulance service at <strong>108</strong> / <strong>02832 236000</strong>.
                                </p>
                            </div>

                            <!-- Sign Off -->
                            <div style="margin-top: 24px; padding-top: 18px; border-top: 1px solid #f1f5f9;">
                                <p style="font-size: 14px; color: #475569; margin: 0 0 4px; font-weight: 600;">Warm regards,</p>
                                <p style="font-size: 14px; color: #69275c; margin: 0; font-weight: 800;">Central OPD Scheduling Desk</p>
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

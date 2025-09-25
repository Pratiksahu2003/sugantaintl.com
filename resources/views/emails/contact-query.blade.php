<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Query - SuGanta Internationals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .email-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: #000;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .query-title {
            font-size: 18px;
            font-weight: bold;
            color: #000;
            margin-bottom: 20px;
            text-align: center;
        }
        .query-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            border-left: 4px solid #000;
        }
        .detail-row {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        .label {
            font-weight: bold;
            color: #000;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .value {
            color: #333;
            font-size: 14px;
        }
        .message-content {
            background: white;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
            white-space: pre-wrap;
            font-size: 14px;
            line-height: 1.5;
        }
        .footer {
            background: #f8f9fa;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h2>New Query Received</h2>
            <p>SuGanta Internationals</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="query-title">📧 Query Details</div>
            
            <div class="query-details">
                <div class="detail-row">
                    <div class="label">Name</div>
                    <div class="value">{{ $data['name'] }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="label">Email</div>
                    <div class="value">{{ $data['email'] }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="label">Service Type</div>
                    <div class="value">{{ $data['subject'] }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="label">Date & Time</div>
                    <div class="value">{{ $data['timestamp'] }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="label">Message</div>
                    <div class="message-content">{{ $data['message'] }}</div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            Query sent from {{ $data['source'] ?? 'contact form' }} on sugantaintl.com
        </div>
    </div>
</body>
</html>

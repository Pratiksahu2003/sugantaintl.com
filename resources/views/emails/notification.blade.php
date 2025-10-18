<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $notification->title }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 30px;
        }
        .notification-icon {
            text-align: center;
            margin-bottom: 20px;
        }
        .notification-icon i {
            font-size: 48px;
            color: #667eea;
        }
        .notification-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            text-align: center;
        }
        .notification-message {
            font-size: 16px;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        .action-button {
            text-align: center;
            margin: 25px 0;
        }
        .action-button a {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: transform 0.2s ease;
        }
        .action-button a:hover {
            transform: translateY(-2px);
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .footer p {
            margin: 0;
            color: #6c757d;
            font-size: 14px;
        }
        .notification-data {
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 4px 4px 0;
        }
        .notification-data h4 {
            margin: 0 0 10px 0;
            color: #495057;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .notification-data ul {
            margin: 0;
            padding-left: 20px;
        }
        .notification-data li {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .timestamp {
            text-align: center;
            color: #6c757d;
            font-size: 12px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Star JD</h1>
        </div>
        
        <div class="content">
            <div class="notification-icon">
                <i class="{{ $notification->icon }}"></i>
            </div>
            
            <div class="notification-title">
                {{ $notification->title }}
            </div>
            
            <div class="notification-message">
                {{ $notification->message }}
            </div>
            
            @if($notification->data && count($notification->data) > 0)
            <div class="notification-data">
                <h4>Details</h4>
                <ul>
                    @foreach($notification->data as $key => $value)
                        <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            @if($notification->action_url && $notification->action_text)
            <div class="action-button">
                <a href="{{ $notification->action_url }}">{{ $notification->action_text }}</a>
            </div>
            @endif
            
            <div class="timestamp">
                {{ $notification->created_at->format('F j, Y \a\t g:i A') }}
            </div>
        </div>
        
        <div class="footer">
            <p>This is an automated notification from Star JD Dashboard.</p>
            <p>If you have any questions, please contact our support team.</p>
        </div>
    </div>
</body>
</html>

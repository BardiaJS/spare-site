<x-layout>
    <div class="banned-container">
        <div class="container">
            <div class="banned-content">
                <!-- آیکون اصلی -->
                <div class="banned-icon">
                    <div class="icon-circle">
                        <i class="fas fa-user-slash"></i>
                    </div>
                </div>

                <!-- متن اصلی -->
                <div class="banned-message">
                    <h1 class="message-title">دسترسی شما محدود شده است</h1>
                    <p class="message-subtitle">شما توسط مدیریت سیستم بن شده‌اید</p>
                </div>

                <!-- کارت اطلاعات -->
                <div class="info-card">
                    <div class="card-header">
                        <i class="fas fa-info-circle"></i>
                        <span>وضعیت حساب کاربری</span>
                    </div>
                    <div class="card-body">
                        <div class="status-item">
                            <div class="status-icon warning">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="status-content">
                                <h4>حساب کاربری موقتاً غیرفعال</h4>
                                <p>دسترسی شما به برخی قابلیت‌های سیستم محدود شده است</p>
                            </div>
                        </div>
                        
                        <div class="status-item">
                            <div class="status-icon clock">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="status-content">
                                <h4>در حال بررسی</h4>
                                <p>وضعیت شما توسط تیم پشتیبانی در حال بررسی می‌باشد</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- راهنمای اقدامات -->
                <div class="action-guide">
                    <h3 class="guide-title">راهنمای اقدامات</h3>
                    <div class="guide-steps">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>منتظر بمانید</h4>
                                <p>وضعیت شما توسط مدیریت در حال بررسی است</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>ارتباط با پشتیبانی</h4>
                                <p>در صورت نیاز می‌توانید با پشتیبانی تماس بگیرید</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>بررسی دوره‌ای</h4>
                                <p>صفحه را به صورت دوره‌ای برای اطلاع از وضعیت بررسی کنید</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- دکمه‌های اقدام -->
                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="location.reload()">
                        <i class="fas fa-redo me-2"></i>
                        بروزرسانی وضعیت
                    </button>
                    <a href="/contact" class="btn btn-outline">
                        <i class="fas fa-headset me-2"></i>
                        تماس با پشتیبانی
                    </a>
                </div>

                <!-- شمارنده -->
                <div class="counter-section">
                    <div class="counter-text">
                        <i class="fas fa-sync-alt me-2"></i>
                        بروزرسانی خودکار در 
                        <span id="countdown">60</span> 
                        ثانیه
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --light-bg: #f8f9fa;
            --dark-color: #2d3748;
            --text-muted: #6c757d;
        }

        body {
            font-family: "Noto Sans Arabic", "Nunito", sans-serif;
            background: linear-gradient(135deg, #fff5f5 0%, #ffe6e6 100%);
            min-height: 100vh;
            margin: 0;
        }

        .banned-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .banned-content {
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        /* آیکون اصلی */
        .banned-icon {
            margin-bottom: 2rem;
        }

        .icon-circle {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--danger-color), #c82333);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 15px 35px rgba(220, 53, 69, 0.3);
            position: relative;
            animation: pulse 2s infinite;
        }

        .icon-circle::before {
            content: '';
            position: absolute;
            width: 140px;
            height: 140px;
            border: 2px solid rgba(220, 53, 69, 0.2);
            border-radius: 50%;
            animation: ripple 2s infinite;
        }

        .icon-circle i {
            font-size: 3.5rem;
            color: white;
        }

        /* متن اصلی */
        .banned-message {
            margin-bottom: 3rem;
        }

        .message-title {
            color: var(--danger-color);
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .message-subtitle {
            color: var(--text-muted);
            font-size: 1.2rem;
            margin-bottom: 0;
        }

        /* کارت اطلاعات */
        .info-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #ffe6e6;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, var(--danger-color), #c82333);
            color: white;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .card-body {
            padding: 2rem;
        }

        .status-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .status-item:last-child {
            margin-bottom: 0;
        }

        .status-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.2rem;
        }

        .status-icon.warning {
            background: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
            border: 2px solid rgba(255, 193, 7, 0.3);
        }

        .status-icon.clock {
            background: rgba(23, 162, 184, 0.1);
            color: var(--info-color);
            border: 2px solid rgba(23, 162, 184, 0.3);
        }

        .status-content h4 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .status-content p {
            color: var(--text-muted);
            margin: 0;
            line-height: 1.6;
        }

        /* راهنمای اقدامات */
        .action-guide {
            margin-bottom: 2rem;
        }

        .guide-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .guide-steps {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-right: 4px solid var(--info-color);
            transition: all 0.3s ease;
        }

        .step:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .step-number {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--info-color), #138496);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        .step-content h4 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.25rem;
            font-size: 1rem;
        }

        .step-content p {
            color: var(--text-muted);
            margin: 0;
            font-size: 0.9rem;
        }

        /* دکمه‌های اقدام */
        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            padding: 12px 25px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
            color: white;
        }

        .btn-outline {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-outline:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* شمارنده */
        .counter-section {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            display: inline-block;
        }

        .counter-text {
            color: var(--text-muted);
            font-weight: 600;
        }

        #countdown {
            color: var(--danger-color);
            font-weight: 700;
            font-size: 1.1em;
        }

        /* انیمیشن‌ها */
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 15px 35px rgba(220, 53, 69, 0.3);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 20px 40px rgba(220, 53, 69, 0.4);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 15px 35px rgba(220, 53, 69, 0.3);
            }
        }

        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(1.3);
                opacity: 0;
            }
        }

        /* رسپانسیو */
        @media (max-width: 768px) {
            .message-title {
                font-size: 1.8rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 250px;
            }

            .step {
                padding: 1rem;
            }

            .icon-circle {
                width: 100px;
                height: 100px;
            }

            .icon-circle i {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 576px) {
            .banned-container {
                padding: 1rem;
            }

            .message-title {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .status-item {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }

            .step {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let countdown = 60;
            const countdownElement = document.getElementById('countdown');
            
            const timer = setInterval(function() {
                countdown--;
                countdownElement.textContent = countdown;
                
                if (countdown <= 0) {
                    clearInterval(timer);
                    location.reload();
                }
            }, 1000);
        });
    </script>
</x-layout>
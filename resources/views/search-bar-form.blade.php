<x-layout>
    <div class="search-container">
        <div class="container">
            <div class="search-section">
                <!-- هدر جست‌وجو -->
                <div class="search-header text-center mb-4">
                    <div class="search-icon mb-3">
                        <i class="fas fa-search"></i>
                    </div>
                    <h2 class="search-title">جست‌وجوی پیشرفته</h2>
                    <p class="search-subtitle">محصولات و مطالب مورد نظر خود را پیدا کنید</p>
                </div>

                <!-- فرم جست‌وجو -->
                <div class="search-form-wrapper">
                    <form action="/search-user-input/result" method="GET" class="search-form" id="searchForm">
                        <div class="search-input-group">
                            <div class="input-wrapper">
                                <input 
                                    type="text" 
                                    id="searchInput"
                                    name="term" 
                                    class="search-input" 
                                    placeholder="چه چیزی را جست‌وجو می‌کنید؟..."
                                    value="{{ request('term') }}"
                                    autocomplete="off"
                                />
                                <div class="input-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <button type="submit" class="search-btn">
                                <i class="fas fa-search me-2"></i>
                                جست‌وجو
                            </button>
                        </div>

                    </form>
                </div>

                <!-- پیشنهادات جست‌وجو -->
                <div class="search-suggestions mt-4">
                    <div class="suggestions-header">
                        <h6 class="suggestions-title">
                            <i class="fas fa-lightbulb me-2"></i>
                            پیشنهادات جست‌وجو
                        </h6>
                    </div>
                    <div class="suggestions-tags">
                        <button class="suggestion-tag" data-search="قطعات یدکی">
                            <i class="fas fa-cog me-1"></i>
                            قطعات یدکی
                        </button>
                        <button class="suggestion-tag" data-search="لوازم جانبی">
                            <i class="fas fa-tools me-1"></i>
                            لوازم جانبی
                        </button>
                        <button class="suggestion-tag" data-search="سیستم ترمز">
                            <i class="fas fa-car me-1"></i>
                            سیستم ترمز
                        </button>
                        <button class="suggestion-tag" data-search="موتور">
                            <i class="fas fa-engine me-1"></i>
                            موتور
                        </button>
                    </div>
                </div>

                <!-- تاریخچه جست‌وجو -->
                <div class="search-history mt-4" id="searchHistory" style="display: none;">
                    <div class="history-header">
                        <h6 class="history-title">
                            <i class="fas fa-history me-2"></i>
                            تاریخچه جست‌وجو
                        </h6>
                        <button class="clear-history" id="clearHistory">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="history-items" id="historyItems">
                        <!-- تاریخچه به صورت داینامیک پر می‌شود -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --danger-color: #dc3545;
            --light-bg: #f8f9fa;
            --dark-color: #2d3748;
            --search-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .search-container {
            padding: 3rem 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 60vh;
            display: flex;
            align-items: center;
        }

        .search-section {
            max-width: 800px;
            margin: 0 auto;
            width: 100%;
        }

        /* هدر جست‌وجو */
        .search-header {
            color: white;
        }

        .search-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .search-icon i {
            font-size: 2.5rem;
            color: white;
        }

        .search-title {
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 2.2rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .search-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        /* فرم جست‌وجو */
        .search-form-wrapper {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--search-shadow);
            margin-top: 2rem;
        }

        .search-input-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .input-wrapper {
            position: relative;
            flex: 1;
        }

        .search-input {
            width: 100%;
            padding: 1.25rem 3rem 1.25rem 1.25rem;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: var(--light-bg);
            font-family: "Noto Sans Arabic", "Nunito", sans-serif;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
            background: white;
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.2rem;
        }

        .search-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 0 2rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            font-family: "Noto Sans Arabic", "Nunito", sans-serif;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
        }

        /* فیلترهای جست‌وجو */
        .search-filters {
            border-top: 1px solid #e9ecef;
            padding-top: 1.5rem;
        }

        .filter-options {
            display: flex;
            gap: 2rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin: 0;
        }

        .form-check-input {
            margin-left: 0.5rem;
            margin-right: 0;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-label {
            display: flex;
            align-items: center;
            color: var(--dark-color);
            font-weight: 500;
            cursor: pointer;
        }

        /* پیشنهادات جست‌وجو */
        .search-suggestions {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .suggestions-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .suggestions-title {
            color: white;
            margin: 0;
            font-weight: 600;
            font-size: 1rem;
        }

        .suggestions-tags {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .suggestion-tag {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            font-family: "Noto Sans Arabic", "Nunito", sans-serif;
        }

        .suggestion-tag:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* تاریخچه جست‌وجو */
        .search-history {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .history-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .history-title {
            color: white;
            margin: 0;
            font-weight: 600;
            font-size: 1rem;
            flex: 1;
        }

        .clear-history {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .clear-history:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        .history-items {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .history-item {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: between;
        }

        .history-item:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .history-text {
            flex: 1;
        }

        .history-delete {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .history-delete:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        /* رسپانسیو */
        @media (max-width: 768px) {
            .search-container {
                padding: 2rem 0;
                min-height: 50vh;
            }

            .search-title {
                font-size: 1.8rem;
            }

            .search-input-group {
                flex-direction: column;
            }

            .search-btn {
                padding: 1rem 2rem;
            }

            .filter-options {
                gap: 1rem;
            }

            .search-form-wrapper {
                padding: 1.5rem;
            }

            .search-icon {
                width: 60px;
                height: 60px;
            }

            .search-icon i {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }

            .search-form-wrapper {
                padding: 1.25rem;
            }

            .search-input {
                padding: 1rem 2.5rem 1rem 1rem;
                font-size: 1rem;
            }

            .suggestions-tags {
                gap: 0.5rem;
            }

            .suggestion-tag {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }
        }

        /* انیمیشن‌ها */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .search-header {
            animation: fadeInUp 0.8s ease-out;
        }

        .search-form-wrapper {
            animation: fadeInUp 0.6s ease-out 0.2s both;
        }

        .search-suggestions {
            animation: fadeInUp 0.6s ease-out 0.4s both;
        }

        /* افکت‌های ویژه */
        .search-input::placeholder {
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .search-input:focus::placeholder {
            color: #adb5bd;
        }

        /* حالت لودینگ */
        .search-loading {
            position: relative;
        }

        .search-loading::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchForm = document.getElementById('searchForm');
            const suggestionTags = document.querySelectorAll('.suggestion-tag');
            const searchHistory = document.getElementById('searchHistory');
            const historyItems = document.getElementById('historyItems');
            const clearHistory = document.getElementById('clearHistory');

            // بارگذاری تاریخچه جست‌وجو از localStorage
            function loadSearchHistory() {
                const history = JSON.parse(localStorage.getItem('searchHistory') || '[]');
                if (history.length > 0) {
                    searchHistory.style.display = 'block';
                    historyItems.innerHTML = '';
                    history.slice(0, 5).forEach(term => {
                        const historyItem = document.createElement('div');
                        historyItem.className = 'history-item';
                        historyItem.innerHTML = `
                            <span class="history-text">${term}</span>
                            <button class="history-delete" data-term="${term}">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        historyItems.appendChild(historyItem);
                    });

                    // اضافه کردن event listener برای آیتم‌های تاریخچه
                    document.querySelectorAll('.history-item').forEach(item => {
                        item.addEventListener('click', function(e) {
                            if (!e.target.closest('.history-delete')) {
                                const term = this.querySelector('.history-text').textContent;
                                searchInput.value = term;
                                searchForm.submit();
                            }
                        });
                    });

                    // اضافه کردن event listener برای دکمه‌های حذف
                    document.querySelectorAll('.history-delete').forEach(btn => {
                        btn.addEventListener('click', function(e) {
                            e.stopPropagation();
                            const term = this.getAttribute('data-term');
                            removeFromSearchHistory(term);
                        });
                    });
                }
            }

            // ذخیره جست‌وجو در تاریخچه
            function saveToSearchHistory(term) {
                if (!term.trim()) return;
                
                let history = JSON.parse(localStorage.getItem('searchHistory') || '[]');
                
                // حذف عبارت اگر قبلاً وجود داشته
                history = history.filter(item => item !== term);
                
                // اضافه کردن به ابتدای آرایه
                history.unshift(term);
                
                // محدود کردن به ۱۰ آیتم
                history = history.slice(0, 10);
                
                localStorage.setItem('searchHistory', JSON.stringify(history));
                loadSearchHistory();
            }

            // حذف از تاریخچه
            function removeFromSearchHistory(term) {
                let history = JSON.parse(localStorage.getItem('searchHistory') || '[]');
                history = history.filter(item => item !== term);
                localStorage.setItem('searchHistory', JSON.stringify(history));
                loadSearchHistory();
            }

            // پاک کردن کل تاریخچه
            clearHistory.addEventListener('click', function() {
                localStorage.removeItem('searchHistory');
                searchHistory.style.display = 'none';
            });

            // اضافه کردن event listener برای پیشنهادات
            suggestionTags.forEach(tag => {
                tag.addEventListener('click', function() {
                    const searchTerm = this.getAttribute('data-search');
                    searchInput.value = searchTerm;
                    searchForm.submit();
                });
            });

            // ذخیره جست‌وجو هنگام ارسال فرم
            searchForm.addEventListener('submit', function(e) {
                const term = searchInput.value.trim();
                if (term) {
                    saveToSearchHistory(term);
                }
            });

            // جست‌وجوی خودکار (اختیاری)
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                // اگر بخواهید جست‌وجوی خودکار داشته باشید
                // searchTimeout = setTimeout(() => {
                //     if (this.value.length >= 3) {
                //         // جست‌وجوی خودکار
                //     }
                // }, 500);
            });

            // فوکوس خودکار روی فیلد جست‌وجو
            searchInput.focus();

            // بارگذاری اولیه تاریخچه
            loadSearchHistory();
        });
    </script>
</x-layout>
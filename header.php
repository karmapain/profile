<?php
    // Включите файл и получите значение base64
    $your_base64_image_data = file_get_contents('header_background.php');
?>

<style>
    header {
        background-color: #FFD764;
        color: #fff;
        text-align: center;
        background-position: center top;
        background-size: cover;
        background-repeat: no-repeat;
        height: 20vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        background: url("<?php echo $your_base64_image_data; ?>");
        background-size: 100%;
    }

    nav {
        text-align: center;
        margin-top: auto;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
        margin: 0;
        display: inline-block;
        position: relative;
        z-index: 1;
    }

    nav a:before {
        background-color: #283544; /*#4C8891*/
        content: "";
        position: absolute;
        border-top: 2px solid rgba(255, 255, 255, 0.2);
        border-right: 2px solid rgba(255, 255, 255, 0.2);
        border-left: 2px solid rgba(255, 255, 255, 0.2);
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        transform: skewX(-30deg);
        z-index: -1;
    }

    nav a:hover:before {
        background-color:#4C8891;
    }

    nav a.current:before {
        content: "";
        position: absolute;
        outline: 2px solid #4C8891; /* Цвет border */
        background-color:#4C8891;
        box-sizing: border-box;
        z-index: -1;
    }

    a {
        text-decoration: none;
        color: inherit;
        background-color: transparent;
    }

    #session {
        position: absolute;
        top: 10px;
        left: 10px;
        display: flex;
        width: 25%;
    }

    #session #timer_button {
        margin: 15px;
        height: 100%;
        width: 30%;
        background-color: #29354d55;
        color: #fffc;
        border: 1px solid #fffc;
        padding: 10px 5px;
        cursor: pointer;
        transition: background-color 3s ease;
    }

    #session #timer_button {
        /* Добавьте начальное значение для opacity */
        opacity: 1;
        transition: opacity 3s ease; /* Плавная анимация для opacity */
    }

    #session:hover #timer_button {
        opacity: 1;
        transition: opacity 3s ease;
    }

    /* Анимация появления */
    @keyframes fadeIn {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }

    /* Применяем анимацию только к видимой кнопке */
    #session #timer_button:not(:hover) {
        animation: fadeIn 1s 7s forwards; /* Запускаем анимацию fadeIn через 3 секунды и удерживаем конечное значение opacity */
    }

    #session #timer_button:hover {
        opacity: 1;
        transition: opacity 3s ease;
    }

    #timer_button.button_hover {
        opacity: 1;
    }

    #language-btns {
        position: absolute;
        top: 25px;
        right: 25px;
    }

    #language-btns button {
        margin-right: 5px;
        background-color: #29354d;
        color: #fff;
        border: 1px solid #fff;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #language-btns button:hover {
        background-color: #4C8891cc;
        color: #fff;
        border: 1px solid #29354d;
    }

    #language-btns button.active,
    #language-btns button:active {
        color: #fff;
        border: 1px solid #29354d;
        background-color: #4C8891cc;
    }

    #language-btns button.active:hover,
    #language-btns button:active:hover {
        color: #29354d;
        border: 1px solid #29354d;
        background-color: #4C8891cc;
    }

    /* Новые стили для картинки в settings */
    .settings {
        display: inline-block; /* Добавляем этот стиль для размещения картинки в ряд с текстом */
        vertical-align: middle; /* Выравниваем вертикально относительно центра блока nav */
    }

    .settings img {
        width: 20px; /* Устанавливаем желаемую ширину картинки */
    }

    @keyframes blink {
        0%, 100% {
            border-color: red; /* Цвет бордера на половине времени анимации */
        }
        50% {
            border-color: transparent; /* Начальный и конечный цвет бордера */
        }
    }

    .connect_notification {
        background-color: #252;
        border: 1px solid #ddd;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: 10px auto;
    }

    .connect_btn-ok {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }
</style>

<header>
    <?php
        $currentLanguage = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'ru';

        // Ваши языковые настройки для текущего языка
        $languages = [
            'ru' => [
                'error_label' => 'Неправильный Логин или пороль',
                'login' => 'Вход',
                'iin_label' => 'Логин:',
                'password_label' => 'Пароль:',
                'cpass_label' => 'Восстановить пороль',
                'submit_label' => 'Войти',
                'login_label' => 'Вход',
                'announce_label' => 'Объявление',
                'help_label' => 'О проекте',
                'ask_label' => 'Вопрос-ответ',
                'metodic_label' => 'Методические материалы',
                'order_label' => 'Порядок участия',
                'univerlist_label' => 'Список Университетов',
                'options_title' => 'Настройки',
                'main_label' => 'Главная',
                'back_label' => 'Назад',
                'leave_label' => 'Выход',
                'options_label' => 'Настройки',
                'userpage_label' => 'Страница Пользователя',
                'search_label' => 'Поиск',
                'searchb_label' => 'Найти',
                'general_label' => 'Общие сведения',
             ],
            'kaz' => [
                'error_label' => 'Құпия сөзді немесе Логiн тексеріңіз',
                'login' => 'Кіру',
                'iin_label' => 'Логiн:',
                'password_label' => 'Құпия сөз:',
                'cpass_label' => 'Құпия сөзді өзгерту',
                'submit_label' => 'Кіру',
                'login_label' => 'Кіру',
                'announce_label' => 'Хабарлама',
                'help_label' => 'Жоба жайлы',
                'ask_label' => 'Сұрақ-жауап',
                'metodic_label' => 'Әдістемелік материялдар',
                'order_label' => 'Қатысу тәртібі',
                'univerlist_label' => 'Университеттер тізімі',
                'options_title' => 'Баптаулар',
                'main_label' => 'Басты Бет',
                'leave_label' => 'Шығу',
                'back_label' => 'Артқа',
                'options_label' => 'Баптаулар',
                'search_label' => 'Іздеу жүйесі',
                'searchb_label' => 'Табу',
                'general_label' => 'Жалпы ақпарат',
            ]
        ];

        // Функция для установки языка в куки
        function setLanguageCookie($language) {
            setcookie('language', $language, time() + 7 * 24 * 60 * 60, "/");
        }

        // Установка языка в зависимости от куки или языка браузера
        $language = isset($_COOKIE['language']) ? $_COOKIE['language'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $language = in_array($language, ['ru', 'kaz']) ? $language : 'ru';

        // Обработка запроса на изменение языка
        if (isset($_GET['lang'])) {
            $requestedLanguage = $_GET['lang'];
            if (in_array($requestedLanguage, ['ru', 'kaz'])) {
                setLanguageCookie($requestedLanguage);
                $language = $requestedLanguage;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["language"])) {
            $language = $_POST["language"];

            // Сохраните выбранный язык в сессии или куках
            $_SESSION['language'] = $language;
        }

        function getLimitTime() {
            // Ваш код для получения текущего значения limit_time
            return isset($_COOKIE['limit_time']) ? $_COOKIE['limit_time'] : '';
        }
    ?>
    <h1><a href="index.php" onclick="setPage('search.php')">Cрочники 2.0</a></h1>

    <?php
        if(isset($_COOKIE['user_login'])){
            echo '<div id="session">
                <li style="display: grid; color: #fff; marin: 2px; width: 70%">
                    <span id="session-timer">До окончания сессии осталось:</span>
                    <span id="timer"></span>
                </li>
                <button id="timer_button" onclick="add_session()">Продлить сессию</button>
            </div>
            ';
        }
    ?>

    <script>
        // Функция для обновления таймера
        // Идентификатор таймера
        let timerInterval;

        // Функция для обновления таймера
        function updateTimer() {
            const timerElement = document.getElementById('timer');
            const timerElement2 = document.getElementById('session-timer');
            const header = document.querySelector('header'); // Исправлено на document.querySelector
            const user_login = "<?php echo isset($_COOKIE['user_login']) ? $_COOKIE['user_login'] : ''; ?>";

            if (!user_login) {
                return;
            }

            var limit_time = "<?php echo getLimitTime(); ?>";

            const currentTime = Math.floor(new Date().getTime() / 1000);
            const timeRemaining = Math.max(0, limit_time - currentTime);
            const minutes = Math.floor(timeRemaining / 60);
            const seconds = timeRemaining % 60;

            timerElement.textContent = `${minutes} мин ${seconds} сек`;

            // Добавляем условие для изменения цвета текста при оставшихся 3 минутах
            if (minutes == 3 && seconds == 0) {
                // Воспроизводим звук
                <?php
                    if(isset($_COOKIE['sound'])){
                        if($_COOKIE['sound']=='true'){
                            echo 'playSound_1();';
                        }
                    } else {
                        echo 'playSound_1();';
                    }
                ?>
            }

            if (minutes == 0 && seconds == 13) {
                // Воспроизводим звук
                <?php
                    if(isset($_COOKIE['sound'])){
                        if($_COOKIE['sound']=='true'){
                            echo 'playSound_2();';
                        }
                    } else {
                        echo 'playSound_2();';
                    }
                ?>
            }

            if (minutes <= 2) {
                // Проверяем, если таймер еще не начал мерцать
                if (!timerBlinking) {
                    timerBlinking = setInterval(() => {
                        // Переключаем между красным и белым цветами
                        if (timerElement.style.color === 'red') {
                            timerElement.style.color = 'white';
                            timerElement2.style.color = 'white';
                        } else {
                            timerElement.style.color = 'red';
                            timerElement2.style.color = 'red';
                        }
                    }, 1000); // Изменяем цвет каждые 500 миллисекунд (половина секунды)
                }
                header.style.borderBottom = '3px solid red';
                header.style.animation = 'blink 2s infinite';
            } else {
                // Сбрасываем мерцание
                clearInterval(timerBlinking);
                timerBlinking = null;
                timerElement.style.color = ''; // Сбрасываем цвет
                timerElement2.style.color = '';
                header.style.borderBottom = '';
                header.style.animation = '';
            }

            // Перенаправление на страницу выхода, если время сессии истекло
            if (timeRemaining === 0) {
                window.location.href = 'index.php?logout=1';
                clearInterval(timerInterval); // Прерываем обновление после перенаправления
            }
        }


        // Функция для воспроизведения звука
        function playSound_1() {
            const audio = new Audio('src/session_time.mp3'); // Укажите путь к вашему звуковому файлу
            audio.play();
        }

        function playSound_2() {
            const audio2 = new Audio('src/session_end.mp3'); // Укажите путь к вашему звуковому файлу
            audio2.play();
        }

        // Переменная для отслеживания состояния мигания
        let timerBlinking;



        // Запуск таймера и его обновление каждую секунду
        timerInterval = setInterval(updateTimer, 1000);

        // Обновляем таймер при загрузке страницы
        window.addEventListener('load', updateTimer);

        function setPage(page) {
            var expirationDate = new Date();
            expirationDate.setTime(expirationDate.getTime() + (0.5 * 60 * 60 * 1000)); // 0.5 час
            var expires = "expires=" + expirationDate.toUTCString();

            document.cookie = "page=" + page + "; path=/; " + expires;
            // В функции changeLanguage вместо location.reload()
            document.documentElement.lang = lang;
        }

        function add_session() {
            // Выполняем AJAX-запрос
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_session.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === 'success') {
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    } else {
                        alert('Произошла ошибка при выполнении запроса');
                    }
                }
            };

            xhr.send();
        }

        // Функция для мерцания элемента
        function blinkElement() {
            const timerElement = document.getElementById('session-timer');
            const timerElement2 = document.getElementById('timer');
            const blinkClass = 'blink';
            let blinkCount = 0;
            let timerBlinking;

            // Запускаем мерцание каждые 500 миллисекунд в течение 3 секунд
            timerBlinking = setInterval(() => {
                timerElement.style.color = 'green';
                timerElement2.style.color = 'green';
                setTimeout(() => {
                    timerElement.style.color = '';
                    timerElement2.style.color = '';
                }, 500);

                blinkCount++;

                // Останавливаем мерцание после 4 итераций (2 секунды)
                if (blinkCount === 4) {
                    clearInterval(timerBlinking);
                }
            }, 1000);
        }


        // Функция для получения значения куки по имени
        function getCookie(name) {
            var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }

        function changeLanguage(lang) {
            // Отправить запрос на сервер для смены языка
            fetch('change_language.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ language: lang }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to change language');
                }
                // Установить куку с выбранным языком на 7 дней
                document.cookie = `language=${lang}; max-age=${7 * 24 * 60 * 60}`;
                // Перезагрузить страницу после успешной смены языка
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        if (document.cookie.includes('timer')) {
            // Вызываем функцию blinkElement, если кука 'timer' существует
            blinkElement();
            document.cookie = 'timer=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        }
    </script>

    <nav>
        <div class="settings" style="margin-right: 5px;">
            <a href="search.php" style="align-items: center; display: flex" onclick="setPage('search.php')" class="<?php echo isset($_COOKIE['page']) && $_COOKIE['page'] === 'search.php' ? 'current' : ''; ?>">
                <?php echo $languages[$currentLanguage]['search_label']; ?>&nbsp;
                <img src="css/imgs/search.png" alt="" style="height: 20px; width: 20px;">
            </a>
        </div>
        <a href="univers.php" onclick="setPage('univers.php')" class="<?php echo isset($_COOKIE['page']) && $_COOKIE['page'] === 'univers.php' ? 'current' : ''; ?>"><?php echo $languages[$currentLanguage]['univerlist_label']; ?></a>

        <a href="project_info.php" onclick="setPage('project_info.php')" class="<?php echo isset($_COOKIE['page']) && $_COOKIE['page'] === 'project_info.php' ? 'current' : ''; ?>"><?php echo $languages[$currentLanguage]['general_label']; ?></a>

        <a href="participation_order.php" onclick="setPage('participation_order.php')" class="<?php echo isset($_COOKIE['page']) && $_COOKIE['page'] === 'participation_order.php' ? 'current' : ''; ?>"><?php echo $languages[$currentLanguage]['order_label']; ?></a>

        <a href="methodological_materials.php" onclick="setPage('methodological_materials.php')" class="<?php echo isset($_COOKIE['page']) && $_COOKIE['page'] === 'methodological_materials.php' ? 'current' : ''; ?>"><?php echo $languages[$currentLanguage]['metodic_label']; ?></a>

        <a href="faq.php" onclick="setPage('faq.php')" class="<?php echo isset($_COOKIE['page']) && $_COOKIE['page'] === 'faq.php' ? 'current' : ''; ?>"><?php echo $languages[$currentLanguage]['ask_label']; ?></a>

        <a href="support.php" onclick="setPage('support.php')" class="<?php echo isset($_COOKIE['page']) && $_COOKIE['page'] === 'support.php' ? 'current' : ''; ?>"><?php echo $languages[$currentLanguage]['help_label']; ?></a>

        <a href="announcements.php" onclick="setPage('announcements.php')" class="<?php echo isset($_COOKIE['page']) && $_COOKIE['page'] === 'announcements.php' ? 'current' : ''; ?>"><?php echo $languages[$currentLanguage]['announce_label']; ?></a>

        <div class="settings" style="margin-left: 5px;">
            <a href="options.php" style="align-items: center; display: flex" onclick="setPage('options.php')" class="<?php echo isset($_COOKIE['page']) && $_COOKIE['page'] === 'options.php' ? 'current' : ''; ?>">
                <?php echo $languages[$currentLanguage]['options_label']; ?>&nbsp;
                <img src="css/imgs/settings.png" alt="" style="height: 20px; width: 20px;">
            </a>
        </div>
    </nav>

    <div id="language-btns">
        <?php
            if (isset($_COOKIE['user_login'])) {
                include "db.php";
                $login = $_COOKIE['user_login'];

                // Используем параметризованный запрос
                $query = "SELECT * FROM users WHERE login=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $login);
                $stmt->execute();
                $result = $stmt->get_result();

                $query2 = "SELECT * FROM admin WHERE login=?";
                $stmt2 = $conn->prepare($query2);
                $stmt2->bind_param("s", $login);
                $stmt2->execute();
                $result2 = $stmt2->get_result();

                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    echo '<a onclick="setPage(\'teacher_main.php\')" href=\'teacher_main.php\'><button class="' . (isset($_COOKIE['page']) && $_COOKIE['page'] === 'teacher_main.php' ? 'active' : '') . '">' . $user["full_name"] . '</button></a>';
                } else if ($result2->num_rows == 1) {
                    $user = $result2->fetch_assoc();
                    echo '<a onclick="setPage(\'teacher_main.php\')" href=\'admin_main.php\'><button class="' . (isset($_COOKIE['page']) && $_COOKIE['page'] === 'teacher_main.php' ? 'active' : '') . '">' . $user["full_name"] . '</button></a>';
                } else {
                    echo "Нет в базе данных";
                }

                // Закрытие соединения с базой данных
                $stmt->close();
                $conn->close();
            } else {
                echo '<a onclick="setPage(\'auth_page.php\')" href=\'auth_page.php\'><button class="' . (isset($_COOKIE['page']) && $_COOKIE['page'] === 'auth_page.php' ? 'active' : '') . '">';
                echo $languages[$currentLanguage]['login'];
                echo "</button></a>";
            }
        ?>
        <button id="kaz" onclick="changeLanguage('kaz')">KAZ</button>
        <button if="ru" onclick="changeLanguage('ru')">RU</button>
    </div>
</header>

<?php
    if(isset($_COOKIE['user_login'])){
        include 'chat.php';
    }
?>

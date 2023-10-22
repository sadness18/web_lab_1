<?php
    //require_once 'include/database.php';
    //require_once 'include/functions.php';

    //if(isset($_POST["add_file"])) // при нажатии кнопки add_file (Применить) вызываем функцию переноса выбранных файлов на сервер
        //$res = get_files_on_server($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <script src="incude/script.js"></script>
    <title>web</title>
</head>

<body>
    <header>

    </header>
    <main>
        <div id="upper_title"> <!-- Блок подписей для нижних блоков -->
            <h3 style="float: left;">Конфетти</h3>
            <h3>Числа Фибоначчи</h3>
        </div>

        <div id="drow_n_num"> <!-- Блок объединяющий поле рисования и поле чисел -->
            <canvas id="MyCanvas"></canvas> <!-- Поле рисования кругов -->
            <script>
                var canvas = document.getElementById('MyCanvas'); // получаем элемент canvas по id
                var ctx = canvas.getContext('2d'); // получаем его "контекст"
                var mouse = {
                    x: 0,
                    y: 0
                }; // позиция курсора мыши

                canvas.addEventListener("mousemove", setMousePosition, false); // при движении мыши вызываем функцию setMousePosition
                canvas.addEventListener("click", draw_circle); // при клике на ЛКМ (при отпускании нажатой ЛКМ) вызываем функцию draw_circle

                function setMousePosition(e) {
                    mouse.x = e.clientX - this.offsetLeft;
                    mouse.y = e.clientY - this.offsetTop;
                }

                function getRandomNum(min, max) {
                    return Math.floor(Math.random() * (max - min)) + min;
                }

                function draw_circle() {
                    ctx.beginPath();
                    ctx.arc(mouse.x, mouse.y, getRandomNum(10, 50), 0, 2 * Math.PI, true);
                    ctx.fillStyle = "rgba(" + getRandomNum(0, 255) + ", " + getRandomNum(0, 255) + ", " + getRandomNum(0, 255) + ", 1)";
                    ctx.fill();
                    ctx.stroke();
                }
                
                
            </script>

            <div id="Fnum"> <!-- Блок чисел Фибоначчи -->
                <div id = "Fnum_btn"> <!-- Блок кнопок -->
                    <button id = "addNew">Показать новое число</button>
                    <button id = "clear">Очистить</button>
                </div>
                <ol style="margin-top: 5px; color: #535353;">
                    <li>1</li>
                    <li>1</li>
                </ol>
                <script>
                    var sendButtonAddNew = document.getElementById('addNew');
                    sendButtonAddNew.addEventListener("click", addNewItem);
                    
                    var sendButtonClear = document.getElementById('clear');
                    sendButtonClear.addEventListener("click", removeAllItem);

                    function addNewItem() {
                        var parent = document.getElementsByTagName("ol")[0]; // получаем список ol
                        var li = document.createElement("li"); // создаем новый элемент li и заносим в переменную li

                        var litext = document.getElementsByTagName("li"); // получаем коллекцию элементов li во всем документе
                        var penultimateValue = litext[litext.length - 2].innerHTML; // получаем содержимое предпоследнего элемента li в коллекции
                        var lastValue = litext[litext.length - 1].innerHTML; // получаем содержимое последнего элемента li в коллекции
                        var newValue = Number(penultimateValue) + Number(lastValue); // складываем предпоследний и последний элементы
                        
                        li.textContent = newValue; // добавляем в новоиспеченный li результат суммы
                        parent.appendChild(li); // добавляем li в список ol
                    }
                    
                    function removeAllItem()
                    {
                        /*var litext = document.getElementsByTagName("li"); // получаем коллекцию элементов li во всем документе
                        
                        for (var i = 2, len = litext.length; i < len; i++)
                            {
                                litext[i].remove();
                            }*/
                        
                        var parent = document.getElementsByTagName("ol")[0]; // получаем список ol
                        parent.innerHTML = '';
                        
                        var li = document.createElement("li"); // создаем новый элемент li и заносим в переменную li
                        li.textContent = "1";
                        parent.appendChild(li); // добавляем li в список ol
                        li = document.createElement("li"); // создаем новый элемент li и заносим в переменную li
                        li.textContent = "1";
                        parent.appendChild(li); // добавляем li в список ol
                    }
                    
                    var canvas = document.getElementById('MyCanvas'); // Получаем элемент canvas
                    var Fnum = document.getElementById("Fnum"); // получаем блок чисел Фиибоначчи
                    //alert(Fnum.offsetWidth);
                    canvas.width = Fnum.offsetWidth; // задаем полю canvas ширину, соответствующую ширине поля ЧФ
                    canvas.height = Fnum.offsetHeight; // задаем полю canvas высоту, соответствующую высоте поля ЧФ
                </script>
            </div>
        </div>

        <div id="datetime"> <!-- Блок даты и времени -->
            <div style = "background: rgba(0, 0, 0, 0); width: 50%;"> <!-- Блок объединяющий текующие дату и время -->
                <div id = "nowdate"></div> <!-- Дата -->

                <div id = "time"> <!-- Время -->
                    <div class = "clock_num"></div> <!-- Часы -->
                    <div class = "clock_symbol"><pre style = "background: rgba(0, 0, 0, 0);"> : </pre></div> <!-- Двоеточие -->
                    <div class = "clock_num"></div> <!-- Минуты-->
                    <div class = "clock_symbol"><pre style = "background: rgba(0, 0, 0, 0);"> : </pre></div> <!-- Двоеточие -->
                    <div class = "clock_num"></div> <!-- Секунды -->
                </div>
            </div>
            
            <div style = "background: rgba(0, 0, 0, 0); width: 50%; display: flex;">
                <div id = "summer"> <!-- Блок отсчета времени до лета -->
                    <div class = "time_left_str"><pre style = "background: #afd0b0;">До лета осталось: </pre></div> <!-- До лета осталось: -->
                    <div class = "time_left"></div> <!-- Дни -->
                    <div class = "time_left_str"></div>
                    <div class = "time_left"></div> <!-- Часы -->
                    <div class = "time_left_str"></div>
                    <div class = "time_left"></div> <!-- Минуты -->
                    <div class = "time_left_str"></div>
                    <div class = "time_left"></div> <!-- Секунды -->
                    <div class = "time_left_str"></div>
                </div>
            </div>
            
            <script>
                window.onload = clock();
                function clock()
                {
                    var date = new Date();
                    var hours = date.getHours();
                    var minutes = date.getMinutes();
                    var seconds = date.getSeconds();
                    
                    var weekday = date.getDay();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var year = date.getFullYear();
                    
                    if(hours < 10)
                        hours = "0" + hours;
                    if(minutes < 10)
                        minutes = "0" + minutes;
                    if(seconds < 10)
                        seconds = "0" + seconds;
                    
                    var tm = document.getElementsByClassName('clock_num'); // получаем все блоки, имеющие класс clock_num (часы, минуты, секунды)
                    tm[0].innerHTML = hours;
                    tm[1].innerHTML = minutes;
                    tm[2].innerHTML = seconds;
                    
                    var nd = document.getElementById("nowdate");
                    switch(weekday)
                        {
                            case 0:
                                nd.innerHTML = "Сегодня воскресенье, " + day;
                                break;
                            case 1:
                                nd.innerHTML = "Сегодня понедельник, " + day;
                                break;
                            case 2:
                                nd.innerHTML = "Сегодня вторник, " + day;
                                break;
                            case 3:
                                nd.innerHTML = "Сегодня среда, " + day;
                                break;
                            case 4:
                                nd.innerHTML = "Сегодня четверг, " + day;
                                break;
                            case 5:
                                nd.innerHTML = "Сегодня пятница, " + day;
                                break;
                            case 6:
                                nd.innerHTML = "Сегодня суббота, " + day;
                                break;
                            default:
                                nd.innerHTML = "Ошибка дня недели, " + day;
                                break;
                        }
                    switch(month)
                        {
                            case 0:
                                nd.innerHTML += " января " + year + " г.";
                                break;
                            case 1:
                                nd.innerHTML += " февраля " + year + " г.";
                                break;
                            case 2:
                                nd.innerHTML += " марта " + year + " г.";
                                break;
                            case 3:
                                nd.innerHTML += " апреля " + year + " г.";
                                break;
                            case 4:
                                nd.innerHTML += " мая " + year + " г.";
                                break;
                            case 5:
                                nd.innerHTML += " июня " + year + " г.";
                                break;
                            case 6:
                                nd.innerHTML += " июля " + year + " г.";
                                break;
                            case 7:
                                nd.innerHTML += " августа " + year + " г.";
                                break;
                            case 8:
                                nd.innerHTML += " сентября " + year + " г.";
                                break;
                            case 9:
                                nd.innerHTML += " октября " + year + " г.";
                                break;
                            case 10:
                                nd.innerHTML += " ноября " + year + " г.";
                                break;
                            case 11:
                                nd.innerHTML += " декабря " + year + " г.";
                                break;
                            default:
                                nd.innerHTML += " ошибка месяца " + year + " г.";
                                break;
                        }
                    var t = document.getElementById("time"); // получаем блок с текущим временем
                    var s = document.getElementById("summer"); // получаем блок с таймером до лета
                    nd.style.height = t.offsetHeight + 'px'; // делаем высоту блока с датой такой же как высота блока с текущим временем
                    s.style.height = t.offsetHeight + 'px'; // делаем высоту блока с таймером такой же как высота блока с текущим временем
                    
                    var summerDate = new Date(2024, 5, 1, 0, 0, 0, 0);
                    var timeLeft = (summerDate - date) + 1000;
                    var summer = document.getElementById("summer");
                    
                    if (timeLeft < 0)
                        {
                            summer.innerHTML = "Ура, товарищи! Лето!";
                        }
                    else
                        {
                            var secondsLeft = Math.floor((timeLeft/1000)%60);
                            var minutesLeft = Math.floor((timeLeft/1000/60)%60);
                            var hoursLeft = Math.floor((timeLeft/1000/60/60)%24);
                            var daysLeft = Math.floor((timeLeft/1000/60/60/24));
                            
                            if (secondsLeft < 10) secondsLeft = '0' + secondsLeft;
                            if (minutesLeft < 10) minutesLeft = '0' + minutesLeft;
                            if (hoursLeft < 10) hoursLeft = '0' + hoursLeft;
                            
                            var summerLeftTime = document.getElementsByClassName("time_left");
                            var summerLeftTimeStr = document.getElementsByClassName("time_left_str");
                            
                            summerLeftTime[0].innerHTML = daysLeft;
                            summerLeftTime[1].innerHTML = hoursLeft;
                            summerLeftTime[2].innerHTML = minutesLeft;
                            summerLeftTime[3].innerHTML = secondsLeft;
                            
                            function declOfNum(n, text_forms) // функция выбора формы склонения слова в зависимости от числа
                            {
                                n = Math.abs(n) % 100; var n1 = n % 10;
                                if (n > 10 && n < 20) { return text_forms[2]; }
                                if (n1 > 1 && n1 < 5) { return text_forms[1]; }
                                if (n1 == 1) { return text_forms[0]; }
                                return text_forms[2];
                            }
                            
                            summerLeftTimeStr[1].innerHTML = "<pre style = 'background: #afd0b0;'> " + declOfNum(daysLeft, ['день', 'дня', 'дней']) + " </pre>";
                            summerLeftTimeStr[2].innerHTML = "<pre style = 'background: #afd0b0;'> " + declOfNum(hoursLeft, ['час', 'часа', 'часов']) + " </pre>";
                            summerLeftTimeStr[3].innerHTML = "<pre style = 'background: #afd0b0;'> " + declOfNum(minutesLeft, ['минута', 'минуты', 'минут']) + " </pre>";
                            summerLeftTimeStr[4].innerHTML = "<pre style = 'background: #afd0b0;'> " + declOfNum(secondsLeft, ['секунда', 'секунды', 'секунд']) + "</pre>";
                        }
                    
                    setTimeout("clock()", 1000);
                }
            </script>
        </div>
    </main>
</body>

</html>

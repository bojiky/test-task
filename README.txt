Для просмотра формы необходимо перейти на /contact, в случае XAMPP форма будет по адресу http://localhost:8000/contact. 
Добавлена валидация данных, не позволяющая ввести недействительный адрес электронной почты или телефон в неверном формате.
Данные из формы отправляются Ajax-запросами.
Таблица создана с помощью миграции.
AjaxController.php расположен в \App\Http\Controllers.
Папку Vendor на GitHub не заливала, поскольку она превышает 25 МБ.
Используемая версия php: 8.2.12

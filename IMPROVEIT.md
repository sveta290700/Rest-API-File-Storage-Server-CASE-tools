#### Improve it lab5 (Laravel 8 REST API File Storage Server + case tools)
Был взят проект https://github.com/sveta290700/lab3 на момент коммита https://github.com/sveta290700/lab3/commit/e6e4cca0f3e713c660d73bfdcff5a7a65aedab51 и на api/Http/Controllers/FileController.php, содержащем код написанного ранее API для работы с файлами, применены case-инструменты для улучшения качества ПО в порядке, описанном ниже.
##### 1) phpstan:
<a href="https://ibb.co/xjrGJt9"><img src="https://i.ibb.co/r6XM4R8/1.png" alt="1" border="0"></a>
Для исправления найденных ошибок были добавлены свойства класса FileModel, а также геттеры и сеттеры для них; явно прописаны типы возвращаемых значений функций; явно прописано подключение функции where для корректного вызова запроса из БД. Ещё один анализ показал отсутствие ошибок.
<a href="https://ibb.co/pwhKqr1"><img src="https://i.ibb.co/QQDH0jJ/2.png" alt="2" border="0"></a>
##### 2-3) phpcs и phpcbf:
Сначала был использован phpcs.
<a href="https://ibb.co/0VkSh6Z"><img src="https://i.ibb.co/TqZSm7R/3.png" alt="3" border="0"></a>
<a href="https://imgbb.com/"><img src="https://i.ibb.co/FXyNTBs/4.png" alt="4" border="0"></a>
По предложению phpcs был использован phpcbf.
<a href="https://imgbb.com/"><img src="https://i.ibb.co/NSkVmFS/5.png" alt="5" border="0"></a>
Количество ошибок уменьшилось с 16 до 10.
<a href="https://imgbb.com/"><img src="https://i.ibb.co/Dkrm8DK/6.png" alt="6" border="0"></a>
Оставшиеся ошибки касались phpdoc и \n после else. После исправлений phpcs перестал выдавать какую-либо информацию, что говорит об успешном устранении найденных недочётов.
<a href="https://imgbb.com/"><img src="https://i.ibb.co/fX6mv7p/7.png" alt="7" border="0"></a>
##### 4) phpmd:
<a href="https://ibb.co/hfX1LvQ"><img src="https://i.ibb.co/vYsvV8y/8.png" alt="8" border="0"></a>
Были испробованы разные варианты правил: ошибок либо не было найдено, либо выдавались предупреждения.
##### 5) ecs:
<a href="https://ibb.co/TkYd8Tg"><img src="https://i.ibb.co/PNF0hY6/9.png" alt="9" border="0"></a>
Ошибок найдено не было.
##### 6) php-cs-fixer:
<a href="https://ibb.co/2gHHvdf"><img src="https://i.ibb.co/dGxxPDz/14.png" alt="14" border="0"></a>
Были внесены минимальные изменения в код (перенос некоторых строк на новую).
##### CLI:
После проверки всеми вышеперечисленными инструментами, был произведён повторный их запуск через командную строку.
###### 1) phpstan:
<a href="https://ibb.co/JRWqFn4"><img src="https://i.ibb.co/TBD1qcS/10.png" alt="10" border="0"></a>
###### 2-3) phpcs и phpcbf:
<a href="https://ibb.co/3zqTKb3"><img src="https://i.ibb.co/hfjg0N6/11.png" alt="11" border="0"></a>
###### 4) phpmd:
<a href="https://ibb.co/2KCGR9j"><img src="https://i.ibb.co/pXMYN73/12.png" alt="12" border="0"></a>
###### 5) ecs:
<a href="https://ibb.co/QHBc5V0"><img src="https://i.ibb.co/Yd9WrSg/13.png" alt="13" border="0"></a>
##### 6) php-cs-fixer:
<a href="https://ibb.co/mRymJsW"><img src="https://i.ibb.co/XW59XBR/15.png" alt="15" border="0"></a>

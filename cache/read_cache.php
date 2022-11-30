<?php
function getCache(string $cache_file) : mixed
{
    $cache = "";
    $cache_time = 900; // Время жизни кэша в секундах(15 минут)
    {
        if ((time() - $cache_time) < filemtime($cache_file)) {
                // Если его время жизни ещё не прошло
                $cache = file_get_contents($cache_file); // Выводим содержимое файла
                exit; // Завершаем скрипт, чтобы сэкономить время на дальнейшей обработке
        }
        ob_start();
    }
return $cache;
}

function setCache($cache_file) : mixed {
    $file = strrchr($_SERVER["SCRIPT_NAME"], "/");// Получаем название файла
    $file = substr($file, 1); // Удаляем слеш
    $cache_file = "/cache/$file.temp"; // Файл будет находиться в
    $handle = fopen($cache_file, 'w'); // Открываем файл для записи и стираем его содержимое
    fwrite($handle, ob_get_contents()); // Сохраняем всё содержимое буфера в файл
    fclose($handle); // Закрываем файл
    return ;
}

function clearCache() {
    
}

function clearAllCache() {

}


//1. В чем заключается суть ключевого слова global? Когда его применение целесообразно?

global позволяет пользовательской функции работать с глобальными переменными

//2. Какие суперглобальные переменные вы знаете?

$GLOBALS - ассоциативный массив, содержит сылки на все переменные глобальной области видимости.
$_SERVER - массив, создается сервером, содержит заголовки, пути, размещение скриптов.
$_GET - ассоциативный массив, передаваемый посредством HTTP GET запросов.
$_POST - ассоциативный массив, передаваемый посредством HTTP POST запросов.
$_FILES - ассоциативный массив элементов, загруженных в текущий скрипт через метод HTTP POST.
$_COOKIE - ассоциативный массив значений, переданных скрипту через HTTP Cookies.
$_SESSION - переменные сессий, ассоциативный массив.
$_REQUEST - ассоциативный массив, содержит $_GET, $_POST и $_COOKIE.
$_ENV - ассоциативный массив значений, переданных скрипту через переменные окружения.

//3. Когда нужно использовать закрывающий дескриптор “?>“?

Закрывающий дескриптор необходим для php файлов, содержащих html код.

//4. Что выведет программа в каждом случае и почему?

<?php

function changeX($x){
    $x += 5;
    echo $x;
}

$x = 1;
echo $x; // 1 - изначально х = 1
changeX($x); // 6 - функция выводит результат вычисления х + 1
echo $x; // 1 - при этом переменная х не изменилась

?>

// 5. Что выведет программа в каждом случае и почему?

<?php

function test() {
    static $a = 0;
    echo $a;
    $a++;
}

test(); // 0 - присваивание значения переменной при первом вызове функции
test(); // 1 - при последующих вызовах переменная получает сохраненное ранее значение,
// т.к. после echo сработал инкремент, в переменной а теперь 1
test(); // 2 - после echo сработал инкремент, в переменной а теперь 2

?>


// 6. Как перевернуть массив? Есть массив array(‘h’, ‘e’, ‘l’, ‘l’, ‘o’), как из него получить array(‘o’, ‘l’, ‘l’, ‘e’, ‘h’)?

<?php
$array = ['h', 'e', 'l', 'l', 'o'];
$arrRev = array_reverse($array);
?>

//7. Как перевернуть строку задом наперед?

<?php

echo strrev("Hello!"); // !olleH

function stringReverse($str) {
    $rev = null; // переменная для новой строки
    for ($i = 1; $i <= mb_strlen($str); $i++) {
        $rev .= mb_substr($str, -$i, 1); // +1 символ с конца строки
    }
    return $rev;
}

?>

//8. Что будет результатом работы данного кода?

<?php

$a=0;
if($b=$a) // переменной b присваивается значение переменной а, после чего значение b приводится к boolean
            // 0 приводится к false, условие не срабатывает
    echo "One";
else
    echo "Two"; // результат работы данного кода

?>

//9. Сгенерировать три случайных числа в диапазоне от 0 до 10. Если сумма этих чисел меньше 15, сгенерировать новую тройку.

<?php
$a = rand(0, 10);
$b = rand(0, 10);
$c = rand(0, 10);

if ($a + $b + $c < 15) {
    $a = rand(0, 10);
    $b = rand(0, 10);
    $c = rand(0, 10);
}

// или с массивом:

function getRand($num) {
    $result = [];
    for ($i = 0; $i < $num; $i++) {
        array_push($result, rand(0, 10));
    }
    return $result;
}

$arr = getRand(3);

if (array_sum($arr) < 15) {
    $arr = getRand(3);
}

?>

//10. Какое число выведет данный код?

<?php

$i = 10;
$i += ++$i + $i + $i++;
echo $i;

// сначала сработает пре-инкремент, в переменной уже 11
// 11 += 11 + 11 + 11+1
// теперь сработает пост-инкремент, потом присваивание - операция с наименьшим приоритетом
// 11 += 11 +11 + 12
// получаем 45

?>

//11. Что выведет приведенный ниже код?

<?php

$a = "1";
$a[$a] = "2"; // строка преобразуется в число - $a[1], в строке под индексом 0 у нас "1", под индексом 1 - "2"
echo $a; // 12 (строка)

?>


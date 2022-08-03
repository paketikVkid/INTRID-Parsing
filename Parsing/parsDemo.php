//$result_1 - Учитывать все слова без тегов, но без значений внутри title= и alt=
$doc = phpQuery::newDocument($html);
//Считывание текста
$result_1 = $doc->find("'")->text();
//Удаление знаков препинания
$result_1 = preg_replace('#[^a-zA-Za-яА-Я0-9]#', ' ', $result_1);
//Преобразование str в array
$result_1 = explode(" ", $result_1);
//Преобразование значений массива в нижний регистр
foreach ($result_1 as &$value) {
$value = mb_strtolower($value);
}
//Удаление из $result_1 повторяющихся элементов с $arrayBadWords
$result_1 = array_diff($result_1, $arrayBadWords);
//Возвращает массив, ключами которого являются значения массива $result_1, а значениями - количество повторений значений $result_1
$result_1 = array_count_values($result_1);
//Удаление из $result " "
unset($result_1[""]);
//Сортировка по убыванию
arsort($result_1);
print_r($result_1);
phpQuery::unloadDocuments();


// $result_2 - Учитывать все слова без тегов, в том числе контент из title= и alt=
$doc = phpQuery::newDocument($html);
$result_2 = $doc->find("'")->text();



//Удаление знаков препинания
$result_2 = preg_replace('#[^a-zA-Za-яА-Я0-9]#', ' ', $result_2);
//Преобразование str в array
$result_2 = explode(" ", $result_2);
//Преобразование значений массива в нижний регистр
foreach ($result_1 as &$value) {
$value = mb_strtolower($value);
}
//Удаление из $result_1 повторяющихся элементов с $arrayBadWords
$result_2 = array_diff($result_2, $arrayBadWords);
//Возвращает массив, ключами которого являются значения массива $result_1, а значениями - количество повторений значений $result_1
$result_2 = array_count_values($result_2);
unset($result_2[""]);
//Сортировка по убыванию
arsort($result_2);
print_r($result_2);
phpQuery::unloadDocuments();



// $result_3 - Учитывать словесный контент только из внутренности title= и alt= без остального текста
$doc = phpQuery::newDocument($html);
//Запись тега span
$result_3 = $doc->find("span")->text();

//Удаление знаков препинания
$result_3 = preg_replace('#[^a-zA-Za-яА-Я0-9]#', ' ', $result_3);
//Преобразование str в array
$result_3 = explode(" ", $result_3);
//Преобразование значений массива в нижний регистр
foreach ($result_1 as &$value) {
$value = mb_strtolower($value);
}
//Удаление из $result_1 повторяющихся элементов с $arrayBadWords
$result_3 = array_diff($result_3, $arrayBadWords);
//Возвращает массив, ключами которого являются значения массива $result_1, а значениями - количество повторений значений $result_1
$result_3 = array_count_values($result_3);
unset($result_3[""]);
//Сортировка по убыванию
arsort($result_3);
print_r($result_3);
phpQuery::unloadDocuments();


// $result_4 - Учитывать все слова без тегов, в том числе из title= и alt=, не учитывать текст внутри тега <noindex></noindex>
$doc = phpQuery::newDocument($html);
//Удаление noindex
$result_4 = $doc->find("noindex")->remove();
//Считывание оставшегося текста
$result_4 = $doc->find("'")->text();

//Удаление знаков препинания
$result_4 = preg_replace('#[^a-zA-Za-яА-Я0-9]#', ' ', $result_4);
//Преобразование str в array
$result_4 = explode(" ", $result_4);
//Преобразование значений массива в нижний регистр
foreach ($result_4 as &$value) {
$value = mb_strtolower($value);
}
//Удаление из $result_4 повторяющихся элементов с $arrayBadWords
$result_4 = array_diff($result_4, $arrayBadWords);
//Возвращает массив, ключами которого являются значения массива $result_4, а значениями - количество повторений значений $result_4
$result_4 = array_count_values($result_4);
unset($result_4[""]);
//Сортировка по убыванию
arsort($result_4);
print_r($result_4);
phpQuery::unloadDocuments();



// $result_5 - Учитывать все слова без тегов, но без значений внутри title= и alt=, не учитывать текст внутри тега <noindex></noindex>
$doc = phpQuery::newDocument($html);
//Удаление noindex и span
$result_5 = $doc->find("noindex")->remove();
$result_5 = $doc->find("span")->remove();
//Считывание оставшегося текста
$result_5 = $doc->find("'")->text();

//Удаление знаков препинания
$result_5 = preg_replace('#[^a-zA-Za-яА-Я0-9]#', ' ', $result_5);

//Преобразование str в array
$result_5 = explode(" ", $result_5);
//Преобразование значений массива в нижний регистр
foreach ($result_5 as &$value) {
$value = mb_strtolower($value);
}
//Удаление из $result_5 повторяющихся элементов с $arrayBadWords
$result_5 = array_diff($result_5, $arrayBadWords);
//Возвращает массив, ключами которого являются значения массива $result_5, а значениями - количество повторений значений $result_5
$result_5 = array_count_values($result_5);
unset($result_5[""]);
//Сортировка по убыванию
arsort($result_5);
print_r($result_5);
phpQuery::unloadDocuments();
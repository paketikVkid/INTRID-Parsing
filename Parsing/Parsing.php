<?php
require 'phpQuery-onefile.php';
//url сайта
// $html = file_get_contents('');

$html = '<p><b>Строительные хомутовые</b> леса на рынке имеют такое же большое распространение, как и прочие аналоги данного товара. В каталоге нашей компании представлено большое количество товаров в данной <span class="decor" title="Категория товара">категории</span>, вследствие чего есть возможность подобрать такой вариант, который будет максимально отвечать требованиям потенциального покупателя.</b>

<p>При необходимости можно будет получить помощь и консультирование от специалиста компании в вопросах, которые имеют непосредственное отношение к выбору подходящего товара, а также к оформлению заказа на его приобретение.<noindex>А с какой целью вообще применяются хомуторвые леса?</noindex> И из чего они состоят?</p>

<p>Строительные хомутовые леса на рынке имеют такое же большое распространение, как и прочие аналоги данного товара. В каталоге нашей компании представлено большое количество товаров в данной категории, вследствие чего есть возможность подобрать такой <span class="decor" alt="Вариация товара" title="Вариация">вариант</span>, который будет максимально отвечать требованиям потенциального покупателя.</p>

<p>При необходимости можно будет получить помощь и консультирование от специалиста компании в вопросах, которые имеют непосредственное отношение к выбору подходящего товара, а также к оформлению заказа на его приобретение.<noindex> А с какой целью вообще применяются хомуторвые леса?</noindex> И из чего они состоят?</p>';

//Исключаемые слова, заполняемые пользователем
$arrayBadWords = [
	'строительные',
	'хомутовые',
	'аналоги',
	'же',
	'в',
	'и',
	''
];



class Result
{
	public $data;
	public $badWords;


	//$result_1 - Учитывать все слова без тегов, но без значений внутри title= и alt=, не учитывать текст внутри тега <noindex></noindex>
	public function getResult_1()
	{
		$doc = phpQuery::newDocument($this->text);

		$entry = $doc->find("");
		$entry->find('noindex')->remove();
		$dataText = pq($entry)->text();


		// $entry = $doc->find("");
		// $dataHtml = pq($entry)->html();
		// preg_match_all("#(title|alt)=[\"'][a-zA-Za-яА-Я0-9 ]*[\"']#", $dataHtml,  $mas);
		// foreach ($mas as $value) {
		// 	$mas1[] = implode(" ", $value);
		// 	$matches = implode(" ", $mas1);
		// }
		// $matches = preg_replace('#(title|alt)#', ' ', $matches);
		// $dataHtml = $matches;


		$data = $dataText;
		$this->data = $data;

		return print_r($this->strToArray($this->badWords));
	}


	//$result_2 - Учитывать все слова без тегов, но без значений внутри title= и alt=
	public function getResult_2()
	{
		$doc = phpQuery::newDocument($this->text);

		$entry = $doc->find("");
		$dataText = pq($entry)->text();


		// $entry = $doc->find("");
		// $dataHtml = pq($entry)->html();
		// preg_match_all("#(title|alt)=[\"'][a-zA-Za-яА-Я0-9 ]*[\"']#", $dataHtml,  $mas);
		// foreach ($mas as $value) {
		// 	$mas1[] = implode(" ", $value);
		// 	$matches = implode(" ", $mas1);
		// }
		// $matches = preg_replace('#(title|alt)#', ' ', $matches);
		// $dataHtml = $matches;


		$data = $dataText;
		$this->data = $data;

		return print_r($this->strToArray($this->badWords));
	}


	//$result_3 - Учитывать словесный контент только из внутренности title= и alt= без остального текста
	public function getResult_3()
	{
		$doc = phpQuery::newDocument($this->text);

		// $entry = $doc->find("");
		// $dataText = pq($entry)->text();


		$entry = $doc->find("");
		$dataHtml = pq($entry)->html();
		preg_match_all("#(title|alt)=[\"'][a-zA-Za-яА-Я0-9 ]*[\"']#", $dataHtml,  $mas);
		foreach ($mas as $value) {
			$mas1[] = implode(" ", $value);
			$matches = implode(" ", $mas1);
		}
		$matches = preg_replace('#(title|alt)#', ' ', $matches);
		$dataHtml = $matches;


		$data = $dataHtml;
		$this->data = $data;

		return print_r($this->strToArray($this->badWords));
	}



	// $result_4 - Учитывать все слова без тегов, в том числе контент из title= и alt=
	public function getResult_4()
	{
		$doc = phpQuery::newDocument($this->text);

		$entry = $doc->find("");
		$dataText = pq($entry)->text();

		$entry = $doc->find("");
		$dataHtml = pq($entry)->html();
		preg_match_all("#(title|alt)=[\"'][a-zA-Za-яА-Я0-9 ]*[\"']#", $dataHtml,  $mas);
		foreach ($mas as $value) {
			$mas1[] = implode(" ", $value);
			$matches = implode(" ", $mas1);
		}
		$matches = preg_replace('#(title|alt)#', ' ', $matches);
		$dataHtml = $matches;

		$data = $dataText . $dataHtml;
		$this->data = $data;

		return print_r($this->strToArray($this->badWords));
	}

	//$result_5 - Учитывать все слова без тегов, в том числе из title= и alt=, не учитывать текст внутри тега <noindex></noindex>
	public function getResult_5()
	{
		$doc = phpQuery::newDocument($this->text);

		$entry = $doc->find("");
		$entry->find('noindex')->remove();
		$dataText = pq($entry)->text();

		$entry = $doc->find("");
		$dataHtml = pq($entry)->html();
		preg_match_all("#(title|alt)=[\"'][a-zA-Za-яА-Я0-9 ]*[\"']#", $dataHtml,  $mas);
		foreach ($mas as $value) {
			$mas1[] = implode(" ", $value);
			$matches = implode(" ", $mas1);
		}
		$matches = preg_replace('#(title|alt)#', ' ', $matches);
		$dataHtml = $matches;

		$data = $dataText . $dataHtml;
		$this->data = $data;
		return print_r($this->strToArray($this->badWords));
	}



	public function strToArray($badWords)
	{

		$data = $this->data;

		//Удаление знаков препинания
		$data = preg_replace('#[^a-zA-Za-яА-Я0-9]#', ' ', $data);
		//Преобразование str в array
		$data = explode(" ", $data);
		//Преобразование значений массива в нижний регистр
		foreach ($data as &$value) {
			$value = mb_strtolower($value);
		}
		//Удаление из $result повторяющихся элементов с $badWords
		$data = array_diff($data, $badWords);
		//Возвращает массив, ключами которого являются значения массива $result, а значениями - количество повторений значений $result
		$data = array_count_values($data);
		//Удаление из $result " "
		unset($data[""]);
		//Сортировка
		arsort($data);
		return $data;
	}
}



$parsing = new Result();
$parsing->badWords = $arrayBadWords;
$parsing->text = $html;


// $result_1 = $parsing->getResult_1();
// $result_2 = $parsing->getResult_2();
// $result_3 = $parsing->getResult_3();
// $result_4 = $parsing->getResult_4();
$result_5 = $parsing->getResult_5();

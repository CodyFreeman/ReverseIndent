<?php
declare(strict_types = 1);
namespace Freeman\ReverseIndent\ReverseIndent;
class ReverseIndent{

	/**
	 * @const string NEWLINE Newline character
	 */
	const NEWLINE = "\n";

	/**
	 * @const string CARRIAGE_RETURN Carriage Return character
	 */
	const CARRIAGE_RETURN = "\r";

	/**
	 * @var array $newlineChars Array of newline characters
	 */
	protected $newlineChars = [self::NEWLINE, self::CARRIAGE_RETURN];

	/**
	 * Runs the input string through a reversal of indentation and returns it in a string
	 * @param string $input String that needs to have indentation reversed
	 * @return string Reverse indented string
	 */
	public function run(string $input):string{
		$data = $this->formatInput($input);
		$spaces = $this->countSpaces($data);
		$data = $this->removeSpaces($data);
		$data = $this->constructReversal($data, $spaces);

		return $this->formatOutput($data);
	}

	/**
	 * Explodes the string into an array and removes newline characters
	 * @param string $input Input string to perform operation on
	 * @return array Returns an array of the exploded string input without newline characters
	 */
	protected function formatInput(string $input):array{
		$data = explode(self::NEWLINE, $input);
		foreach($data as $lineNum => $line){
			$data[$lineNum] = str_replace($this->newlineChars, '', $line);
		}
		return $data;
	}

	/**
	 * Counts the leading spaces on each line of the array supplied
	 * @param array $data Array of data
	 * @return array Returns mirrored array where values of the keys are the count of spaces
	 */
	protected function countSpaces(array $data):array{
		foreach($data as $lineNum => $line){
			if($line){
				$data[$lineNum] = strspn($line, ' ');
			}
		}
		return $data;
	}

	/**
	 * Removes leading spaces from each string of an array
	 * @param array $data Array of strings
	 * @return array Array without leading spaces
	 */
	protected function removeSpaces(array $data):array{
		foreach($data as $lineNum => $line){
			$data[$lineNum] = ltrim($line, ' ');
		}
		return $data;
	}

	/**
	 * Formats an array of strings into having reverse indentation compared to the provided array of how many spaces each line had
	 * @param array $data Array of strings without leading spaces
	 * @param array $spaces Array of the count of leading spaces on input array
	 * @return array Returns array of strings with reversed indentation
	 */
	protected function constructReversal(array $data, array $spaces):array{
		$max = max($spaces);
		foreach($data as $lineNum => $line){
			$data[$lineNum] = $this->insertSpaces($line, $max - $spaces[$lineNum]);
		}
		return $data;
	}

	/**
	 * Inserts leading spaces in a string
	 * @param string $input A string
	 * @param int $amount The amount of leading spaces to insert
	 * @return string Returns string with the amount of leading spaces indicated
	 */
	protected function insertSpaces(string $input, int $amount):string{
		for($i = 1; $i < $amount; $i++){
			$input = ' ' . $input;
		}
		return $input;
	}

	/**
	 * Implodes an array and inserts newline characters
	 * @param array $data Array of strings
	 * @return string Returns a string containing content of the values of the array provided
	 */
	protected function formatOutput(array $data){
		return implode(self::NEWLINE, $data);
	}
}

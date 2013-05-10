<?php

namespace Fuel\Tasks;

class Create
{

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r create
	 *
	 * @return string
	 */
	public static function run($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning DEFAULT task [Create:Run]";
		echo "\n-------------------------------------------\n\n";

		/***************************
		 Put in TASK DETAILS HERE
		 **************************/
	}



	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r create:seminar "arguments"
	 *
	 * @return string
	 */
	public static function seminar($seminar_title ,$slides='')
	{
            (null === $seminar_title) and exit;
            $seminar    = \Model_Seminar::forge();
            $seminar->title = $seminar_title;
            $seminar->slides= $slides;
            $seminar->save();
	}

}
/* End of file tasks/create.php */

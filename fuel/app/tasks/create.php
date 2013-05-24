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

        public static function sample()
        {
            $sample_arr = array(
                array(
                    'id'    => 1,
                    'title' => '集合知プログラミング読書会',
                    'date'  => '2013-04-06',
                    'requirements'  => '',
                    'notes' => '',
                    'slides'=> 'https://docs.google.com/presentation/d/1Q5FJWcymdwalFfhYoIEHFo1565rjLQKm6Ob0OGjbDFI/edit?usp=sharing',
                    'references'    => '集合知プログラミング',
                ),
                array(
                    'id'    => 2,
                    'title' => 'フレームワークに触ろう - fuelphp padrino',
                    'date'  => '2013-04-20',
                    'requirements'  => '',
                    'notes' => '',
                    'slides'=> 'https://docs.google.com/presentation/d/1pROnetghdwS9bz6K58OG11jMmAIOXcVMYbnC_mGaK-Q/edit?usp=sharing',
                    'references'    => '',
                ),
                array(
                    'id'    => 3,
                    'title' => 'Engineerでも知っておきたいDesignの基本',
                    'date'  => '2013-04-27',
                    'requirements'  => '',
                    'notes' => '',
                    'slides'=> 'https://docs.google.com/file/d/0B3gddgi1VarzVnRGMXZqd0J3YVU/edit?usp=sharing',
                    'references'    => '',
                ),
                array(
                    'id'    => 4,
                    'title' => '分散処理入門',
                    'date'  => '2013-05-04',
                    'requirements'  => '',
                    'notes' => '',
                    'slides'=> 'http://www.slideshare.net/ryukln/hadoopstartup',
                    'references'    => '「分散システム ~原理とパラダイム~」タネンバウム'.PHP_EOL.'http://www.amazon.co.jp/分散システム-第二版-アンドリュー・S・タネンバウム/dp/4894714981'.PHP_EOL.'「Googleを支える技術」西田圭介'.PHP_EOL.'http://www.amazon.co.jp/exec/obidos/ASIN/4774134325/secodezine-22/'.PHP_EOL.'「はじめてのHadoop」 田澤孝之、横井浩、松井一比良'.PHP_EOL.'http://gihyo.jp/book/2012/978-4-7741-5389-6'.PHP_EOL.'阪大の講義資料'.PHP_EOL.'http://www-higashi.ist.osaka-u.ac.jp/~nakata/mobile-cp/chap-01j.pdf',
                ),
            );
            foreach($sample_arr as $sample)
            {
                $seminar    = \Model_Seminar::find($sample['id']);
                if(!$seminar)$seminar    = \Model_Seminar::forge();
                unset($sample['id']);
                $seminar->set($sample);
                $seminar->save();
            }

        }

}
/* End of file tasks/create.php */

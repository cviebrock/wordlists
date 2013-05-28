<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class WordsImportCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'words:import';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Import a list of words from the command line.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$filename = $this->argument('filename');

		if ( !File::exists($filename) ) {
			$this->error("The file $filename does not exist.");
			return false;
		}

		if ( !File::isFile($filename) ) {
			$this->error("The file $filename is not a file.");
			return false;
		}

		if ( Str::lower( File::extension($filename) ) == 'zip' ) {
			$this->error("ZIP file support in progress.");
			return false;
		}

		$this->info("Importing $filename");

		$c = 0;
		$wordlist = [];
		/* hack */
		$table = new Word; $table = $table->getTable();

		$base = array_fill_keys(Word::$letters, 0);

		$spl = new SplFileObject( $filename, 'r');

		DB::statement("BEGIN EXCLUSIVE TRANSACTION");

		while (!$spl->eof()) {

	    if ($c++ % 100 == 0) {
    		echo ".";
	    }

	    if ($c % 2000 == 0) {
    		echo " $c\n";
				DB::statement("COMMIT");
				DB::statement("BEGIN EXCLUSIVE TRANSACTION");
	    }


	    $word = Str::lower(trim($spl->current()));
	    $word = Word::createNew( $word );
	    $word->save();
			$spl->next();
		}

		DB::statement("COMMIT");


		$this->info("Finished importing $c words.");


	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('filename', InputArgument::REQUIRED, 'The file to import (can be TXT or ZIP).'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}

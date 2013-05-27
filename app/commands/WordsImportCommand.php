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

		$this->info("Reading $filename");

		$spl = new SplFileObject( $filename, 'r');
		$i = 0;
		while (!$spl->eof() && $i++ < 20) {
	    $word = Str::lower(trim($spl->current()));
	    Word::createNew( $word );
 			$spl->next();
 		}


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

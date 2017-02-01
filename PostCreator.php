<?php
class PostCreator
{
	private static $instance;

	private function __construct()
	{
	}

	private function __clone()
	{
	}

	static function getInstance() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Factory method which creates post, saves options into it and returns it
	 *
	 * @param string $className
	 * @param array $options
	 * @return \Model\Renderable|Renderable
	 * @throws ClassNotFoundException
	 * @throws InvalidPostKeyException
	 */
	static function make(string $className, array $options): Model\Renderable
	{
		$namespacePaths = include 'config.php';
		if (array_key_exists($className, $namespacePaths)) {
			if (class_exists($namespacePaths[$className])) {
				return new $namespacePaths[$className]($options);
			} else {
				throw new ClassNotFoundException();
			}
		} else {
			throw new InvalidPostKeyException();
		}
	}
}

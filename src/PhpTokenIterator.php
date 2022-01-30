<?php declare(strict_types = 1);

namespace WebChemistry\ClassFinder;

use PhpToken;

final class PhpTokenIterator
{


	private int $index = 0;

	/**
	 * @param PhpToken[] $tokens
	 */
	public function __construct(
		private array $tokens
	)
	{
	}

	public function next(): ?PhpToken
	{
		return $this->tokens[$this->index++] ?? null;
	}

	public function hasNext(): bool
	{
		return isset($this->tokens[$this->index + 1]);
	}

	public function getPrevious(): ?PhpToken
	{
		return $this->tokens[$this->index - 2] ?? null;
	}

	public function nextUntil(string... $tokenNames): ?PhpToken
	{
		while ($token = $this->next()) {
			if (in_array($token->getTokenName(), $tokenNames, true)) {
				return $token;
			}
		}

		return null;
	}

}

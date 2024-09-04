<?php

namespace TablePress\PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

use TablePress\PhpOffice\PhpSpreadsheet\IComparable;
use TablePress\PhpOffice\PhpSpreadsheet\Style\Color;

class Shadow implements IComparable
{
	// Shadow alignment
	const SHADOW_BOTTOM = 'b';
	const SHADOW_BOTTOM_LEFT = 'bl';
	const SHADOW_BOTTOM_RIGHT = 'br';
	const SHADOW_CENTER = 'ctr';
	const SHADOW_LEFT = 'l';
	const SHADOW_TOP = 't';
	const SHADOW_TOP_LEFT = 'tl';
	const SHADOW_TOP_RIGHT = 'tr';

	/**
	 * Visible.
	 * @var bool
	 */
	private $visible;

	/**
	 * Blur radius.
	 *
	 * Defaults to 6
	 * @var int
	 */
	private $blurRadius;

	/**
	 * Shadow distance.
	 *
	 * Defaults to 2
	 * @var int
	 */
	private $distance;

	/**
	 * Shadow direction (in degrees).
	 * @var int
	 */
	private $direction;

	/**
	 * Shadow alignment.
	 * @var string
	 */
	private $alignment;

	/**
	 * Color.
	 * @var \TablePress\PhpOffice\PhpSpreadsheet\Style\Color
	 */
	private $color;

	/**
	 * Alpha.
	 * @var int
	 */
	private $alpha;

	/**
	 * Create a new Shadow.
	 */
	public function __construct()
	{
		// Initialise values
		$this->visible = false;
		$this->blurRadius = 6;
		$this->distance = 2;
		$this->direction = 0;
		$this->alignment = self::SHADOW_BOTTOM_RIGHT;
		$this->color = new Color(Color::COLOR_BLACK);
		$this->alpha = 50;
	}

	/**
	 * Get Visible.
	 */
	public function getVisible(): bool
	{
		return $this->visible;
	}

	/**
	 * Set Visible.
	 *
	 * @return $this
	 */
	public function setVisible(bool $visible)
	{
		$this->visible = $visible;

		return $this;
	}

	/**
	 * Get Blur radius.
	 */
	public function getBlurRadius(): int
	{
		return $this->blurRadius;
	}

	/**
	 * Set Blur radius.
	 *
	 * @return $this
	 */
	public function setBlurRadius(int $blurRadius)
	{
		$this->blurRadius = $blurRadius;

		return $this;
	}

	/**
	 * Get Shadow distance.
	 */
	public function getDistance(): int
	{
		return $this->distance;
	}

	/**
	 * Set Shadow distance.
	 *
	 * @return $this
	 */
	public function setDistance(int $distance)
	{
		$this->distance = $distance;

		return $this;
	}

	/**
	 * Get Shadow direction (in degrees).
	 */
	public function getDirection(): int
	{
		return $this->direction;
	}

	/**
	 * Set Shadow direction (in degrees).
	 *
	 * @return $this
	 */
	public function setDirection(int $direction)
	{
		$this->direction = $direction;

		return $this;
	}

	/**
	 * Get Shadow alignment.
	 */
	public function getAlignment(): string
	{
		return $this->alignment;
	}

	/**
	 * Set Shadow alignment.
	 *
	 * @return $this
	 */
	public function setAlignment(string $alignment)
	{
		$this->alignment = $alignment;

		return $this;
	}

	/**
	 * Get Color.
	 */
	public function getColor(): Color
	{
		return $this->color;
	}

	/**
	 * Set Color.
	 *
	 * @return $this
	 */
	public function setColor(Color $color)
	{
		$this->color = $color;

		return $this;
	}

	/**
	 * Get Alpha.
	 */
	public function getAlpha(): int
	{
		return $this->alpha;
	}

	/**
	 * Set Alpha.
	 *
	 * @return $this
	 */
	public function setAlpha(int $alpha)
	{
		$this->alpha = $alpha;

		return $this;
	}

	/**
	 * Get hash code.
	 *
	 * @return string Hash code
	 */
	public function getHashCode(): string
	{
		return md5(
			($this->visible ? 't' : 'f')
			. $this->blurRadius
			. $this->distance
			. $this->direction
			. $this->alignment
			. $this->color->getHashCode()
			. $this->alpha
			. __CLASS__
		);
	}

	/**
	 * Implement PHP __clone to create a deep clone, not just a shallow copy.
	 */
	public function __clone()
	{
		$vars = get_object_vars($this);
		foreach ($vars as $key => $value) {
			if (is_object($value)) {
				$this->$key = clone $value;
			} else {
				$this->$key = $value;
			}
		}
	}
}

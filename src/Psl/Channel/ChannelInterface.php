<?php

declare(strict_types=1);

namespace Psl\Channel;

use Countable;

/**
 * @template T
 */
interface ChannelInterface extends Countable
{
    /**
     * Returns the channel capacity if it’s bounded.
     *
     * @return null|positive-int
     *
     * @psalm-mutation-free
     */
    public function getCapacity(): ?int;

    /**
     * Closes the channel.
     *
     * The remaining messages can still be received.
     */
    public function close(): void;

    /**
     * Returns true if the channel is closed.
     *
     * @psalm-mutation-free
     */
    public function isClosed(): bool;

    /**
     * Returns the number of messages in the channel.
     *
     * @return int<0, max>
     *
     * @psalm-mutation-free
     */
    public function count(): int;

    /**
     * Returns true if the channel is full.
     *
     * Unbounded channels are never full.
     *
     * @psalm-mutation-free
     */
    public function isFull(): bool;

    /**
     * Returns true if the channel is empty.
     *
     * @psalm-mutation-free
     */
    public function isEmpty(): bool;
}

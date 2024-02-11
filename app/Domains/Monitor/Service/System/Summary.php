<?php declare(strict_types=1);

namespace App\Domains\Monitor\Service\System;

class Summary extends SystemAbstract
{
    /**
     * @var string
     */
    protected string $uptime;

    /**
     * @var string
     */
    protected string $tasks;

    /**
     * @var string
     */
    protected string $cpus;

    /**
     * @var string
     */
    protected string $memory;

    /**
     * @var string
     */
    protected string $swap;

    /**
     * @return self
     */
    public function __construct()
    {
        $this->load();
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return [
            'uptime' => $this->uptime,
            'tasks' => $this->tasks,
            'cpus' => $this->cpus,
            'memory' => $this->memory,
            'swap' => $this->swap,
        ];
    }

    /**
     * @return void
     */
    protected function load(): void
    {
        $info = $this->cmdLines('top -b -E g -n 1 | head -5');

        $this->uptime = implode(' ', $info[0]);
        $this->tasks = implode(' ', $info[1]);
        $this->cpus = implode(' ', $info[2]);
        $this->memory = implode(' ', $info[3]);
        $this->swap = implode(' ', $info[4]);
    }
}
